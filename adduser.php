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
                                        <h4>User Management</h4>
                                        <h6>Add/Update User</h6>
                                </div>
                        </div>

                        <div class="card">
                                <div class="card-body">
                                        <div class="row">
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text">
                                                        </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text">
                                                        </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                                <label>User Name</label>
                                                                <input type="text">
                                                        </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                                <label>Password</label>
                                                                <div class="pass-group">
                                                                        <input type="password" class=" pass-input">
                                                                        <span class="fas toggle-password fa-eye-slash"></span>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text">
                                                        </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text">
                                                        </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                                <label>Role</label>
                                                                <select class="select">
                                                                        <option value="admin">Admin</option>
                                                                        <option value="cashier">Cashier</option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="col-lg-12">
                                                        <div class="form-group">
                                                                <label> User Image</label>
                                                                <div class="image-upload">
                                                                        <input type="file">
                                                                        <div class="image-uploads">
                                                                                <img src="assets/img/icons/upload.svg" alt="img">
                                                                                <h4>Drag and drop a file to upload</h4>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-12">
                                                        <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                                                        <a href="userlist.html" class="btn btn-cancel">Cancel</a>
                                                </div>
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

        <script src="assets/plugins/select2/js/select2.min.js"></script>

        <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

        <script src="assets/js/script.js"></script>
</body>

</html>