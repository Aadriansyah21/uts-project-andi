<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users 
    WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-box">
    <form method="POST">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Login</button>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </form>
</div>

</body>
</html>