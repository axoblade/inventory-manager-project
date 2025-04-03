<?php
session_start();
$error = null;

if (isset($_POST['login'])) {
    $userName = $_POST["username"];
    $password = $_POST["password"];

    if ($userName == "mpirirwetabitha0@gmail.com" && $password == "MTabby1996") {

        $_SESSION["isLoggedIn"] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style1.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-userheading">
                            <h3>Welcome to E's Store</h3>
                            <h4>Please login to your account</h4>

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
                            ?>
                        </div>
                        <form method="POST">
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" name="username" placeholder="Enter your email address">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h3><a href="forgetpassword.php" class="hover-a">Forgot Password?</a></h3>
                                </div>
                            </div>
                            <div class="form-login">
                                <button class="btn btn-login" type="submit" name="login">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <!--<img src="assets/img/login.jpg" alt="img">-->
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>