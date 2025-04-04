<?php
require("./authCheck.php");
require("./db.php");
$error = "";
$success = false;
$db = new MySQLDatabase();

if (isset($_POST['addEmployee'])) {
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $insertData = [
                'first_name' => $_POST['firstName'],
                'last_name' => $_POST['lastName'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'username' => $_POST['userName'],
                'role' => $_POST['role'],
                'password' => $hashedPassword
        ];
        $insertId = $db->insert('employees', $insertData);
        if ($insertId) {
                $success = true;
        } else {
                $error = "Failed to create employee";
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
        <?php
        include_once("./navbar.php");
        ?>

        <div class="page-wrapper">
                <div class="content">
                        <div class="page-header">
                                <div class="page-title">
                                        <h4>Employee Management</h4>
                                        <h6>Add/Update Employee</h6>
                                </div>
                        </div>

                        <div class="card">
                                <?php
                                if (!empty($error)) {
                                ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error!</strong> <?= $error; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                <?php
                                }

                                if (!empty($success)) {
                                ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success!</strong> Employee added successfully
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                <?php
                                }
                                ?>
                                <form method="POST">
                                        <div class="card-body">
                                                <div class="row">
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>First Name</label>
                                                                        <input type="text" name="firstName" required>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input type="text" name="lastName" required>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>UserName</label>
                                                                        <input type="text" name="userName" required>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>Password</label>
                                                                        <div class="pass-group">
                                                                                <input type="password" class=" pass-input" name="password" required>
                                                                                <span class="fas toggle-password fa-eye-slash"></span>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>Phone</label>
                                                                        <input type="number" class="form-control" name="phone" required>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="email" name="email" required class="form-control">
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                        <label>Role</label>
                                                                        <select class="select" name="role" required>
                                                                                <option value="admin">Admin</option>
                                                                                <option value="cashier">Cashier</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-12">
                                                        <button type="submit" name="addEmployee" class="btn btn-submit me-2">Submit</button>
                                                        <a href="userlist.php" class="btn btn-cancel">Cancel</a>
                                                </div>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>

        <script src="assets/js/jquery-3.6.0.min.js"></script>

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