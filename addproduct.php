<?php
require("./authCheck.php");
require("./db.php");

$error = "";
$success = false;
$db = new MySQLDatabase();
$suppliers = $db->fetchData('service_providers');

if (isset($_POST['addProduct'])) {
    $insertData = [
        'name' => $_POST['productName'],
        'description' => $_POST['description'],
        'avQty' => $_POST['avQty'],
        'cost' => $_POST['cost'],
        'isRawMaterial' => $_POST['rawMaterial'],
        'price' => $_POST['price'],
        'minQty' => $_POST['minQty'],
        'sku' => $_POST['sku'],
        'supplier_id' => $_POST['supplier_id'] ?? null
    ];
    $insertId = $db->insert('products', $insertData);
    if ($insertId) {
        $success = true;
    } else {
        $error = "Failed to create product";
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
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="rawMaterial"]').on('change', function() {
                if ($(this).val() === 'Yes') {
                    $('#supplierField').slideDown();
                } else {
                    $('#supplierField').slideUp();
                }
            });
        });
    </script>

    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <div class="header">
            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon"><span></span><span></span><span></span></span>
            </a>
            <ul class="nav user-menu">
                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search"><i class="fa fa-search"></i></a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
                        </form>
                    </div>
                </li>
                <div class="dropdown mobile-user-menu">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="generalsettings.html">Settings</a>
                        <a class="dropdown-item" href="signin.html">Logout</a>
                    </div>
                </div>
            </ul>
        </div>

        <?php include_once("./navbar.php"); ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Product Add</h4>
                        <h6>Create new product/Rawmaterial</h6>
                    </div>
                </div>
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?= $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Product added successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="productName" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Is Raw material</label>
                                        <select class="select" required name="rawMaterial">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12" id="supplierField" style="display:none;">
                                    <div class="form-group">
                                        <label>Select Supplier</label>
                                        <select class="select form-control" name="supplier_id">
                                            <?php
                                            if (!empty($suppliers) && is_array($suppliers)) {
                                                foreach ($suppliers as $supplier) {
                                                    echo '<option value="' . htmlspecialchars($supplier['supplier_id']) . '">' . htmlspecialchars($supplier['name']) . '</option>';
                                                }
                                            } else {
                                                echo '<option disabled>No suppliers available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" name="sku" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Minimum Qty</label>
                                        <input type="number" class="form-control" name="minQty" value="1">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Av. Quantity</label>
                                        <input type="number" class="form-control" name="avQty" value="0">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Selling Price</label>
                                        <input type="number" class="form-control" name="price" value="0" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Cost Price</label>
                                        <input type="number" class="form-control" name="cost" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-submit me-2" type="submit" name="addProduct">Submit</button>
                                    <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>