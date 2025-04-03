<?php
session_start();
include 'db_connect.php';

if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['login_time'] = time(); // For timeout
        header("Location: dashboard.php");
    } else {
        echo "Invalid password!";
    }
}

// Session timeout check
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time'] > 30)) {
    session_destroy();
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <form method="post">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
    <a href="reset_password.php">Reset Password</a>
    </form>
    </div>
</body>
</html>