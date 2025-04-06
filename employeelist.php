<?php
include("./authCheck.php");
require("./db.php");
$error = "";
$success = false;
$db = new MySQLDatabase();

$employees = $db->fetchData('employees');

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
                    <h4>Employee List</h4>
                    <h6>Manage your Employees</h6>
                </div>
                <div class="page-btn">
                    <a href="addemployee.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                            class="me-2">Add Employee</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>First name </th>
                                    <th>Last name </th>
                                    <th>User name </th>
                                    <th>Phone</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($employees as $data) { ?>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td class="productimgname">
                                            <?= $data['first_name'] ?>
                                        </td>
                                        <td><?= $data['last_name'] ?></td>
                                        <td>
                                            <?= $data['username'] ?>
                                        </td>
                                        <td>
                                            <?= $data['phone'] ?>
                                        </td>
                                        <td><?= $data['email'] ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
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