<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Forgot Password</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<style>
    body {
        background-color: #121A2A;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        color: white;
        font-family: Arial, sans-serif;
    }
    .forgot-password-container {
        background: #1C2A40;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }
    h3 {
        margin-bottom: 10px;
    }
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .btn-submit {
        background-color: #FF8C00;
        color: white;
        border: none;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }
    .btn-submit:hover {
        background-color: #E07B00;
    }
    .message {
        margin-top: 15px;
        font-size: 14px;
    }
</style>
</head>
<body>

<div class="forgot-password-container">
    <h3>Forgot Password?</h3>
    <p>Please enter the email associated with your account.</p>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p class='message' style='color: red;'>Invalid email format.</p>";
        } else {
            // Generate password reset token
            $token = bin2hex(random_bytes(32)); // Secure random token

            // Create reset link
            $reset_link = "https://yourwebsite.com/reset-password.php?token=" . $token;

            // Email subject & message
            $subject = "Password Reset Request";
            $message = "Click the link below to reset your password:\n\n$reset_link\n\nIf you didn't request this, please ignore this email.";
            $headers = "From: no-reply@yourwebsite.com\r\nReply-To: no-reply@yourwebsite.com";

            // Send email (Use PHPMailer for better reliability)
            if (mail($email, $subject, $message, $headers)) {
                echo "<p class='message' style='color: green;'>Password reset link has been sent to your email.</p>";
            } else {
                echo "<p class='message' style='color: red;'>Error sending email. Please try again.</p>";
            }
        }
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email address" required>
        </div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>

</body>
</html>