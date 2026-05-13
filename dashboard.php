<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <h2>Laundry</h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="pelanggan.php">Pelanggan</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<div class="container">
    <h1>Selamat datang <?php echo $_SESSION['username']; ?></h1>
    <p class="dashboard-text">
        Halaman ini digunakan untuk mengelola data pelanggan dan transaksi laundry secara terstruktur. <br>
        Melalui dashboard ini, user dapat menambahkan, mengubah, melihat, dan menghapus data sesuai kebutuhan operasional.
    </p>
</div>

</body>
</html>