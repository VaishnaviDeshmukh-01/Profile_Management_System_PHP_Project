<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";
    if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0) {
        header("Location: login.php");
    } else {
        echo "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
   <h2>Reset Password</h2> 
   <form method="POST">
    Email: <input type="email" name="email" required><br>
    New Password: <input type="password" name="new_password" required><br>
    <input type="submit" value="Reset">
   </form>
   </div>
   <script>
    alert('Reset Your Password')
   </script>
</body>
</html>