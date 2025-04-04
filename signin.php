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
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | E's Store</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #121A2A; /* Dark blue background */
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-userheading h3 {
            font-size: 28px;
            font-weight: bold;
            color: #0A3D62;
            margin-bottom: 5px;
        }

        .form-login {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-login label {
            font-weight: bold;
            color: #333;
        }

        .form-login input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.3s;
        }

        .form-login input:focus {
            border-color: #0A3D62;
            box-shadow: 0px 0px 5px rgba(10, 61, 98, 0.5);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #0A3D62;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #082947;
        }

        .forgot-password {
            color: #0A3D62;
            text-decoration: none;
        }
    </style>
</head>

<body>

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
       <div class="login-wrapper">
        <div class="login-userheading">
            <h3>Welcome to Elian and Eloy's Store</h3>
            <h4>Please login to your account</h4>
        </div>
        <form method="POST">
            <div class="form-login">
                <label>Email</label>
                <input type="text" name="username" placeholder="Enter your email address">
            </div>
            <div class="form-login">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-login">
                <a href="forgetpassword.php" class="forgot-password">Forgot Password?</a>
            </div>
            <div class="form-login">
                <button class="btn-login" type="submit" name="login">Sign In</button>
            </div>
        </form>
    </div>                
                        
</body>

</html>