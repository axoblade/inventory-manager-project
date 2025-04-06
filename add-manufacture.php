<?php
require("./db.php");
$db = new MySQLDatabase();

// Fetch raw materials and finished products
$rawMaterials = $db->fetchData('products', ['isRawMaterial' => "Yes"]);
$finishedProducts = $db->fetchData('products', ['isRawMaterial' => "No"]);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batchNo = $_POST['batchNo'] ?? '';
    $batchDate = $_POST['batchDate'] ?? date('Y-m-d');
    $batchExpiry = $_POST['batchExpiry'] ?? '';
    $rawMaterialsData = json_decode($_POST['rawMaterials'], true) ?? [];
    $endProductsData = json_decode($_POST['endProducts'], true) ?? [];

    // Validate data
    $errors = [];
    if (empty($batchNo)) {
        $errors[] = 'Batch number is required';
    }
    if (empty($batchDate)) {
        $errors[] = 'Batch date is required';
    }
    if (empty($rawMaterialsData)) {
        $errors[] = 'At least one raw material is required';
    }
    if (empty($endProductsData)) {
        $errors[] = 'At least one finished product is required';
    }

    // If no errors, process the data
    if (empty($errors)) {
        try {
            // 1. Create batch record
            $batchId = $db->insert('manufacturing_batches', [
                'batch_no' => $batchNo,
                'batch_date' => $batchDate,
                'batch_expiry' => $batchExpiry
            ]);

            // 2. Add raw materials
            foreach ($rawMaterialsData as $item) {
                $db->insert('batch_raw_materials', [
                    'batch_id' => $batchId,
                    'product_id' => $item['itemId'],
                    'qty' => $item['qty'],
                    'cost' => $item['cost']
                ]);

                // 3. Deduct from inventory
                $db->query("UPDATE products SET avQty = avQty - ? WHERE product_id = ?", [$item['qty'], $item['itemId']]);
            }

            // 4. Add finished products
            foreach ($endProductsData as $item) {
                $db->insert('batch_finished_products', [
                    'batch_id' => $batchId,
                    'product_id' => $item['itemId'],
                    'qty' => $item['qty'],
                    'cost' => $item['cost']
                ]);

                // 5. Add to inventory
                $db->query("UPDATE products SET avQty = avQty + ? WHERE product_id = ?", [$item['qty'], $item['itemId']]);
            }

            // Redirect to success page
            header('Location: manufacturelist.php?success=1');
            exit;
        } catch (Exception $e) {
            $errors[] = 'Error processing batch: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Inventory Management System</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include_once("./navbar.php"); ?>
    <div class="page-wrapper">
        <div class="content">
            <form method="POST" id="batchForm">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Create Manufacturing Batch</h4>
                        <h6>Add/Update Batch Production</h6>
                    </div>
                </div>

                <!-- Display errors if any -->
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Batch Number</label>
                                    <input type="text" name="batchNo" class="form-control"
                                        value="<?php echo isset($_POST['batchNo']) ? htmlspecialchars($_POST['batchNo']) : ''; ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Batch Date</label>
                                    <div class="input-groupicon">
                                        <input type="date" name="batchDate" class="form-control"
                                            value="<?php echo isset($_POST['batchDate']) ? htmlspecialchars($_POST['batchDate']) : date('Y-m-d'); ?>"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Batch Expiry Date</label>
                                    <div class="input-groupicon">
                                        <input type="date" name="batchExpiry" class="form-control"
                                            value="<?php echo isset($_POST['batchExpiry']) ? htmlspecialchars($_POST['batchExpiry']) : ''; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <h5>Raw Materials</h5>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#rawMaterialsModal">
                                    Add Raw Materials
                                </button>
                                <div class="table-responsive">
                                    <table class="table" id="rawMaterialsTable">
                                        <thead>
                                            <tr>
                                                <th>Material</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Selected raw materials will appear here -->
                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" name="rawMaterials" id="rawMaterialsData">
                            </div>

                            <div class="col-lg-6">
                                <h5>Finished Products</h5>
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#finishedProductsModal">
                                    Add Finished Products
                                </button>
                                <div class="table-responsive">
                                    <table class="table" id="finishedProductsTable">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Selected finished products will appear here -->
                                        </tbody>
                                    </table>
                                </div>
                                <input type="hidden" name="endProducts" id="endProductsData">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="total-section">
                                    <h5>Batch Summary</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Total Raw Materials Cost: <span id="totalRawMaterialsCost">0.00</span>
                                            </h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Total Finished Products Value: <span
                                                    id="totalFinishedProductsValue">0.00</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Create Batch</button>
                                <a href="manufacturelist.php" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Raw Materials Selection Modal -->
    <div class="modal fade" id="rawMaterialsModal" tabindex="-1" aria-labelledby="rawMaterialsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rawMaterialsModalLabel">Select Raw Materials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Material Name</th>
                                <th>Available Qty</th>
                                <th>Cost Price</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rawMaterials as $item): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="raw-material-checkbox"
                                            value="<?php echo $item['product_id']; ?>"
                                            data-name="<?php echo htmlspecialchars($item['name']); ?>"
                                            data-cost="<?php echo htmlspecialchars($item['cost']); ?>"
                                            data-avqty="<?php echo htmlspecialchars($item['avQty'] ?? 0); ?>">
                                    </td>
                                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                                    <td><?php echo htmlspecialchars($item['avQty'] ?? 0); ?></td>
                                    <td><?php echo number_format($item['cost']); ?></td>
                                    <td><?php echo htmlspecialchars($item['description'] ?? ''); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addRawMaterials">Add Selected Materials</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Finished Products Selection Modal -->
    <div class="modal fade" id="finishedProductsModal" tabindex="-1" aria-labelledby="finishedProductsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finishedProductsModalLabel">Select Finished Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Product Name</th>
                                <th>Selling Price</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($finishedProducts as $item): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="finished-product-checkbox"
                                            value="<?php echo $item['product_id']; ?>"
                                            data-name="<?php echo htmlspecialchars($item['name']); ?>"
                                            data-price="<?php echo htmlspecialchars($item['price']); ?>">
                                    </td>
                                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                                    <td><?php echo number_format($item['price']); ?></td>
                                    <td><?php echo htmlspecialchars($item['description'] ?? ''); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addFinishedProducts">Add Selected
                        Products</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add selected raw materials to the table
            document.getElementById('addRawMaterials').addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('.raw-material-checkbox:checked');
                const tableBody = document.querySelector('#rawMaterialsTable tbody');

                checkboxes.forEach(checkbox => {
                    const itemId = checkbox.value;
                    const itemName = checkbox.dataset.name;
                    const itemCost = checkbox.dataset.cost;
                    const avQty = parseFloat(checkbox.dataset.avqty) || 0;

                    if (!document.querySelector(`#rawMaterialsTable tr[data-id="${itemId}"]`)) {
                        const newRow = document.createElement('tr');
                        newRow.setAttribute('data-id', itemId);
                        newRow.innerHTML = `
                            <td>${itemName}</td>
                            <td>
                                <input type="number" class="form-control raw-qty" value="1" min="1" 
                                       max="${avQty}" required>
                                <small class="text-muted">Available: ${avQty}</small>
                            </td>
                            <td><input type="number" class="form-control raw-cost" value="${itemCost}" min="0" step="0.01" required readonly></td>
                            <td class="raw-total">${itemCost}</td>
                            <td><button type="button" class="btn btn-sm btn-danger remove-raw-material">Remove</button></td>
                        `;
                        tableBody.appendChild(newRow);
                        addRawMaterialRowEventListeners(newRow);
                    }
                });

                bootstrap.Modal.getInstance(document.getElementById('rawMaterialsModal')).hide();
                updateTotals();
            });

            // Add selected finished products to the table
            document.getElementById('addFinishedProducts').addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('.finished-product-checkbox:checked');
                const tableBody = document.querySelector('#finishedProductsTable tbody');

                checkboxes.forEach(checkbox => {
                    const itemId = checkbox.value;
                    const itemName = checkbox.dataset.name;
                    const itemPrice = checkbox.dataset.price;

                    if (!document.querySelector(`#finishedProductsTable tr[data-id="${itemId}"]`)) {
                        // Calculate cost based on raw materials (this is a placeholder - you might want to implement your own logic)
                        const rawMaterialsCost = calculateTotalRawMaterialsCost();
                        const suggestedCost = rawMaterialsCost > 0 ? (rawMaterialsCost * 0.9) :
                            itemPrice * 0.7; // Example calculation

                        const newRow = document.createElement('tr');
                        newRow.setAttribute('data-id', itemId);
                        newRow.innerHTML = `
                            <td>${itemName}</td>
                            <td><input type="number" class="form-control product-qty" value="1" min="1" required></td>
                            <td><input type="number" class="form-control product-cost" value="${suggestedCost.toFixed(2)}" min="0" step="0.01" required></td>
                            <td class="product-total">${suggestedCost.toFixed(2)}</td>
                            <td><button type="button" class="btn btn-sm btn-danger remove-finished-product">Remove</button></td>
                        `;
                        tableBody.appendChild(newRow);
                        addFinishedProductRowEventListeners(newRow);
                    }
                });

                bootstrap.Modal.getInstance(document.getElementById('finishedProductsModal')).hide();
                updateTotals();
            });

            function addRawMaterialRowEventListeners(row) {
                const qtyInput = row.querySelector('.raw-qty');
                const costInput = row.querySelector('.raw-cost');

                const calculateTotal = () => {
                    const qty = parseFloat(qtyInput.value) || 0;
                    const cost = parseFloat(costInput.value) || 0;
                    const total = qty * cost;
                    row.querySelector('.raw-total').textContent = total.toFixed(2);
                    updateRawMaterialsData();
                    updateTotals();
                };

                qtyInput.addEventListener('change', calculateTotal);
                costInput.addEventListener('change', calculateTotal);

                row.querySelector('.remove-raw-material').addEventListener('click', function() {
                    row.remove();
                    updateRawMaterialsData();
                    updateTotals();
                });
            }

            function addFinishedProductRowEventListeners(row) {
                const qtyInput = row.querySelector('.product-qty');
                const costInput = row.querySelector('.product-cost');

                const calculateTotal = () => {
                    const qty = parseFloat(qtyInput.value) || 0;
                    const cost = parseFloat(costInput.value) || 0;
                    const total = qty * cost;
                    row.querySelector('.product-total').textContent = total.toFixed(2);
                    updateFinishedProductsData();
                    updateTotals();
                };

                qtyInput.addEventListener('change', calculateTotal);
                costInput.addEventListener('change', calculateTotal);

                row.querySelector('.remove-finished-product').addEventListener('click', function() {
                    row.remove();
                    updateFinishedProductsData();
                    updateTotals();
                });
            }

            // Update the hidden input with raw materials JSON data
            function updateRawMaterialsData() {
                const items = [];
                document.querySelectorAll('#rawMaterialsTable tbody tr').forEach(row => {
                    items.push({
                        itemId: row.getAttribute('data-id'),
                        qty: row.querySelector('.raw-qty').value,
                        cost: row.querySelector('.raw-cost').value
                    });
                });
                document.getElementById('rawMaterialsData').value = JSON.stringify(items);
            }

            // Update the hidden input with finished products JSON data
            function updateFinishedProductsData() {
                const items = [];
                document.querySelectorAll('#finishedProductsTable tbody tr').forEach(row => {
                    items.push({
                        itemId: row.getAttribute('data-id'),
                        qty: row.querySelector('.product-qty').value,
                        cost: row.querySelector('.product-cost').value
                    });
                });
                document.getElementById('endProductsData').value = JSON.stringify(items);
            }

            // Calculate total raw materials cost
            function calculateTotalRawMaterialsCost() {
                let total = 0;
                document.querySelectorAll('#rawMaterialsTable tbody tr').forEach(row => {
                    const qty = parseFloat(row.querySelector('.raw-qty').value) || 0;
                    const cost = parseFloat(row.querySelector('.raw-cost').value) || 0;
                    total += qty * cost;
                });
                return total;
            }

            // Calculate total finished products value
            function calculateTotalFinishedProductsValue() {
                let total = 0;
                document.querySelectorAll('#finishedProductsTable tbody tr').forEach(row => {
                    const qty = parseFloat(row.querySelector('.product-qty').value) || 0;
                    const cost = parseFloat(row.querySelector('.product-cost').value) || 0;
                    total += qty * cost;
                });
                return total;
            }

            // Update summary totals
            function updateTotals() {
                const rawTotal = calculateTotalRawMaterialsCost();
                const finishedTotal = calculateTotalFinishedProductsValue();

                document.getElementById('totalRawMaterialsCost').textContent = rawTotal.toFixed(2);
                document.getElementById('totalFinishedProductsValue').textContent = finishedTotal.toFixed(2);
            }

            // Form submission
            document.getElementById('batchForm').addEventListener('submit', function(e) {
                updateRawMaterialsData();
                updateFinishedProductsData();

                // Basic validation
                const rawMaterials = JSON.parse(document.getElementById('rawMaterialsData').value || '[]');
                const endProducts = JSON.parse(document.getElementById('endProductsData').value || '[]');

                if (rawMaterials.length === 0) {
                    e.preventDefault();
                    alert('Please add at least one raw material');
                    return false;
                }

                if (endProducts.length === 0) {
                    e.preventDefault();
                    alert('Please add at least one finished product');
                    return false;
                }

                return true;
            });

            // Initialize any existing rows (for edit scenarios)
            document.querySelectorAll('#rawMaterialsTable tr').forEach(row => {
                addRawMaterialRowEventListeners(row);
            });

            document.querySelectorAll('#finishedProductsTable tr').forEach(row => {
                addFinishedProductRowEventListeners(row);
            });
        });
    </script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>