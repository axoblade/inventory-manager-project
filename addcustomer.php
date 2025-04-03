<?php
require("./authCheck.php");
require("./db.php");
$error = "";
$success = false;
$db = new MySQLDatabase();

if (isset($_POST['addCustomer'])) {
    $insertData = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'country' => $_POST['country'],
        'city' => $_POST['city'],
        'address' => $_POST['address'],
    ];
    $insertId = $db->insert('customers', $insertData);
    if ($insertId) {
        $success = true;
    } else {
        $error = "Failed to create customer";
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
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">


            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>


        <?php
        include_once("./navbar.php")
        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Customer Management</h4>
                        <h6>Add/Update Customer</h6>
                    </div>
                </div>

                <form method="POST">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (!empty($error)) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> <?= $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
                            }

                            if (!empty($success)) {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Customer added successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input type="text" name="name" required />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" required class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Choose Country</label>
                                        <select class="select" name="country" required>
                                            <option>Choose Country</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Kenya">Kenya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="select" name="city" required>
                                            <option>Choose City</option>
                                            <option value="Kampala">Kampala</option>
                                            <option value="Jinja">Jinja</option>
                                            <option value="Mombasa">Mombasa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="addCustomer" class="btn btn-submit me-2">Submit</button>
                                    <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
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