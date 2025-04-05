<?php
require("./db.php");
$db = new MySQLDatabase();

$suppliers = $db->fetchData('service_providers');

$rawMaterials = $db->fetchData('products', ['isRawMaterial' => "Yes"]);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $supplierId = $_POST['supplierId'] ?? '';
        $purchaseDate = $_POST['purchaseDate'] ?? date('Y-m-d');
        $items = json_decode($_POST['items'], true) ?? [];

        // Validate data
        $errors = [];
        if (empty($supplierId)) {
                $errors[] = 'Supplier is required';
        }
        if (empty($items)) {
                $errors[] = 'At least one item is required';
        }

        // If no errors, process the data
        if (empty($errors)) {
                try {

                        // 1. Create purchase record
                        $purchaseId = $db->insert('purchases', [
                                'supplier_id' => $supplierId,
                                'purchase_date' => $purchaseDate
                        ]);

                        // 2. Add purchase items
                        foreach ($items as $item) {
                                $db->insert('purchase_items', [
                                        'purchase_id' => $purchaseId,
                                        'product_id' => $item['itemId'],
                                        'qty' => $item['qty'],
                                        'cost' => $item['unitPrice']
                                ]);

                                // 3. Update inventory (optional)
                                $db->query("UPDATE products SET avQty = avQty + ? WHERE product_id = ?", [$item['qty'], $item['itemId']]);
                        }

                        // Redirect to success page
                        header('Location: purchaselist.php?success=1');
                        exit;
                } catch (Exception $e) {
                        $errors[] = 'Error processing purchase: ' . $e->getMessage();
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
        <?php
        include_once("./navbar.php");
        ?>
        <div class="page-wrapper">
                <div class="content">
                        <form method="POST" id="purchaseForm">
                                <div class="page-header">
                                        <div class="page-title">
                                                <h4>Purchase Raw Materials</h4>
                                                <h6>Add/Update Purchase</h6>
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
                                                                        <label>Supplier Name</label>
                                                                        <div class="row">
                                                                                <div class="col-lg-10 col-sm-10 col-10">
                                                                                        <select class="select" name="supplierId" required>
                                                                                                <option value="">Select</option>
                                                                                                <?php foreach ($suppliers as $supplier): ?>
                                                                                                        <option value="<?php echo $supplier['supplier_id']; ?>"
                                                                                                                <?php echo isset($_POST['supplierId']) && $_POST['supplierId'] == $supplier['id'] ? 'selected' : ''; ?>>
                                                                                                                <?php echo htmlspecialchars($supplier['name']); ?>
                                                                                                        </option>
                                                                                                <?php endforeach; ?>
                                                                                        </select>
                                                                                </div>
                                                                                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                                                                        <div class="add-icon">
                                                                                                <a href="addsupplier.php"><img src="assets/img/icons/plus1.svg"
                                                                                                                alt="img"></a>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>Purchase Date</label>
                                                                        <div class="input-groupicon">
                                                                                <input type="date" name="purchaseDate" class="form-control"
                                                                                        value="<?php echo isset($_POST['purchaseDate']) ? htmlspecialchars($_POST['purchaseDate']) : date('Y-m-d'); ?>"
                                                                                        required>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>

                                                <!-- Add Item Button -->
                                                <div class="row mt-3">
                                                        <div class="col-lg-12">
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                                        data-bs-target="#itemsModal">
                                                                        Add Items
                                                                </button>
                                                        </div>
                                                </div>

                                                <!-- Selected Items Table -->
                                                <div class="row mt-3">
                                                        <div class="col-lg-12">
                                                                <div class="table-responsive">
                                                                        <table class="table" id="selectedItemsTable">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th>Product</th>
                                                                                                <th>Quantity</th>
                                                                                                <th>Unit Price</th>
                                                                                                <th>Total</th>
                                                                                                <th>Action</th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <!-- Selected items will appear here -->
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="row mt-3">
                                                        <div class="col-lg-12 float-md-right">
                                                                <input type="hidden" name="items" id="itemsData">
                                                        </div>
                                                        <div class="col-lg-12">
                                                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                                                <a href="purchaselist.php" class="btn btn-cancel">Cancel</a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </form>
                </div>
        </div>


        <!-- Items Selection Modal -->
        <div class="modal fade" id="itemsModal" tabindex="-1" aria-labelledby="itemsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="itemsModalLabel">Select Items</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <table class="table">
                                                <thead>
                                                        <tr>
                                                                <th>Select</th>
                                                                <th>Product Name</th>
                                                                <th>Cost Price</th>
                                                                <th>Description</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <?php foreach ($rawMaterials as $item): ?>
                                                                <tr>
                                                                        <td>
                                                                                <input type="checkbox" class="item-checkbox"
                                                                                        value="<?php echo $item['product_id']; ?>"
                                                                                        data-name="<?php echo htmlspecialchars($item['name']); ?>"
                                                                                        data-cost="<?php echo htmlspecialchars($item['cost']); ?>">
                                                                        </td>
                                                                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                                                                        <td><?php echo number_format($item['cost']); ?>
                                                                        </td>
                                                                        <td><?php echo htmlspecialchars($item['description'] ?? ''); ?></td>
                                                                </tr>
                                                        <?php endforeach; ?>
                                                </tbody>
                                        </table>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="addSelectedItems">Add Selected Items</button>
                                </div>
                        </div>
                </div>
        </div>

        <script>
                document.addEventListener('DOMContentLoaded', function() {
                        // Add selected items to the table
                        document.getElementById('addSelectedItems').addEventListener('click', function() {
                                const checkboxes = document.querySelectorAll('.item-checkbox:checked');
                                const tableBody = document.querySelector('#selectedItemsTable tbody');

                                checkboxes.forEach(checkbox => {
                                        const itemId = checkbox.value;
                                        const itemName = checkbox.dataset.name;
                                        const itemCost = checkbox.dataset.cost;

                                        if (!document.querySelector(`#selectedItemsTable tr[data-id="${itemId}"]`)) {
                                                const newRow = document.createElement('tr');
                                                newRow.setAttribute('data-id', itemId);
                                                newRow.innerHTML = `
                    <td>${itemName}</td>
                    <td><input type="number" class="form-control qty" value="1" min="1" required></td>
                    <td><input type="number" class="form-control cost" value="${itemCost}" min="0" step="0.01" required></td>
                    <td class="total">${itemCost}</td>
                    <td><button type="button" class="btn btn-sm btn-danger remove-item">Remove</button></td>
                `;
                                                tableBody.appendChild(newRow);
                                                addRowEventListeners(newRow);
                                        }
                                });

                                bootstrap.Modal.getInstance(document.getElementById('itemsModal')).hide();
                        });

                        function addRowEventListeners(row) {
                                const qtyInput = row.querySelector('.qty');
                                const costInput = row.querySelector('.cost');

                                const calculateTotal = () => {
                                        const qty = parseFloat(qtyInput.value) || 0;
                                        const cost = parseFloat(costInput.value) || 0;
                                        const total = qty * cost;
                                        row.querySelector('.total').textContent = total.toFixed(2);
                                        updateItemsData();
                                };

                                qtyInput.addEventListener('change', calculateTotal);
                                costInput.addEventListener('change', calculateTotal);

                                row.querySelector('.remove-item').addEventListener('click', function() {
                                        row.remove();
                                        updateItemsData();
                                });
                        }

                        // Update the hidden input with JSON data
                        function updateItemsData() {
                                const items = [];
                                document.querySelectorAll('#selectedItemsTable tbody tr').forEach(row => {
                                        items.push({
                                                itemId: row.getAttribute('data-id'),
                                                qty: row.querySelector('.qty').value,
                                                unitPrice: row.querySelector('.cost').value
                                        });
                                });
                                document.getElementById('itemsData').value = JSON.stringify(items);
                        }

                        // Form submission
                        document.getElementById('purchaseForm').addEventListener('submit', function(e) {
                                updateItemsData();

                                // Basic validation
                                const items = JSON.parse(document.getElementById('itemsData').value);
                                if (items.length === 0) {
                                        e.preventDefault();
                                        alert('Please add at least one item');
                                        return false;
                                }

                                return true;
                        });

                        // Initialize any existing rows (for edit scenarios)
                        document.querySelectorAll('#selectedItemsTable tr').forEach(row => {
                                addRowEventListeners(row);
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