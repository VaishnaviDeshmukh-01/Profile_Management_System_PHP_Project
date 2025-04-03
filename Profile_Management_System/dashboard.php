<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $college = $_POST['college'];
    $email = $_SESSION['email'];

    $sql = "UPDATE users SET age='$age', mobile_number='$mobile', college_name='$college' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        header("Location: profile.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Welcome, <?php echo isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : 'User'; ?>!</h2>
    <form method="post">
        Age: <input type="number" name="age" required><br>
        Mobile Number: <input type="text" name="mobile" required><br>
        College Name: <input type="text" name="college" required><br>
        <input type="submit" value="Submit">
    </form>
    <a href="logout.php">Logout</a>
    </div>
</body>
</html>