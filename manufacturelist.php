<?php
require("./authCheck.php");
require("./db.php");
$error = "";
$success = false;
$db = new MySQLDatabase();

$purchases = $db->fetchData('manufacturing_batches');

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

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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
            <div class="page-header">
                <div class="page-title">
                    <h4>Items Manufactured List</h4>
                    <h6>List your previous manufactures</h6>
                </div>
                <div class="page-btn">
                    <a href="add-manufacture.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                            class="me-2">Add Manufacture</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <?php
                    if (isset($_GET['success'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Batch added successfully
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>Batch #</th>
                                        <th>Manufacture Date</th>
                                        <th>Batch Expiry</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($purchases as $purchase) {
                                    ?>
                                        <tr>
                                            <td><?= $purchase['batch_no'] ?></td>
                                            <td><?= $purchase['batch_date'] ?></td>
                                            <td><?= $purchase['batch_expiry'] ?></td>
                                            <td>
                                                <a class="me-3" href="manufacture-batch-details.php">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>