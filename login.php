<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "<p>Invalid Password</p>";
        }
    } else {
        echo "<p>User not found</p>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Login | Mehfil-e-Magic</title>
<h1>Welcome to Mehfil-e-Magic</h1>
<h2>Login to your account</h2>

</head>
<body>


    <h1>Login</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <p>Don’t have an account? <a href="register.php">Register</a></p>
    <footer>
    <p>© 2025 Mehfil-e-Magic | Developed by Kainat Khan</p>
</footer>

</body>
</html>
