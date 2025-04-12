<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $college = $_POST['college'];
    $sql = "UPDATE users SET age='$age', mobile_number='$mobile', college_name='$college' WHERE email='$email'";
    mysqli_query($conn, $sql);
    header("Refresh:0");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Profile</h2>
        <div class="profile-info">
            <p>Name: <?php echo isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : 'N/A'; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Age: <?php echo $user['age'] ?? 'N/A'; ?></p>
            <p>Mobile: <?php echo $user['mobile_number'] ?? 'N/A'; ?></p>
            <p>College: <?php echo $user['college_name'] ?? 'N/A'; ?></p>
        </div>
        <h3>Update Profile</h3>
        <form method="POST">
            Age: <input type="number" name="age" value="<?php echo $user['age'] ?? ''; ?>">
            Mobile: <input type="text" name="mobile" value="<?php echo $user['mobile_number'] ?? ''; ?>">
            College: <input type="text" name="college" value="<?php echo $user['college_name'] ?? ''; ?>">
            <input type="submit" value="Update">
        </form>
        <a href="logout.php">Logout</a>
    </div>
    <script>
        alert('Update Your Profile');
    </script>
</body>
</html>