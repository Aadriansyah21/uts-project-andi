<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        if(password_verify($password, $data['password'])){
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;

            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Password salah');</script>";
        }

    } else {
        echo "<script>alert('Username tidak ditemukan');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button name="login">Login</button><br>
        <a href="register.php">Register</a>
    </form>
    
</div>

</body>
</html>