<?php
include 'config.php';

if(isset($_POST['register'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($username) || empty($password)){
        echo "<script>alert('Isi semua field');</script>";
    } else {

        $cek = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

        if(mysqli_num_rows($cek) > 0){
            echo "<script>alert('Username sudah terdaftar');</script>";
        } else {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $insert = mysqli_query($conn,"INSERT INTO users(username,password)
            VALUES('$username','$hash')");

            if($insert){
                echo "<script>alert('Register berhasil'); window.location='login.php';</script>";
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="register">Daftar</button>
    </form>

    <a href="login.php">Login</a>
</div>

</body>
</html>