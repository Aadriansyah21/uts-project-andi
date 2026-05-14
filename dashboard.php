<?php
session_start();
if(!isset($_SESSION['login'])) header("Location: login.php");
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
        <li><a href="transaksi.php">Transaksi</a></li>
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

<div class="dashboard-image">

    <a href="transaksi.php?layanan=Setrika" class="layanan-card">
        <img src="setrika.jpeg" alt="Setrika">
        <div class="layanan-info">
            <h3>Setrika</h3>
            <div class="harga">Rp 5.000 / kg</div>
            <span class="pesan">Pesan Sekarang →</span>
        </div>
    </a>

    <a href="transaksi.php?layanan=Cuci Setrika" class="layanan-card">
        <img src="cuci_setrika.jpeg" alt="Cuci Setrika">
        <div class="layanan-info">
            <h3>Cuci Setrika</h3>
            <div class="harga">Rp 9.000 / kg</div>
            <span class="pesan">Pesan Sekarang →</span>
        </div>
    </a>

    <a href="transaksi.php?layanan=Cuci Kering" class="layanan-card">
        <img src="cuci_kering.jpeg" alt="Cuci Kering">
        <div class="layanan-info">
            <h3>Cuci Kering</h3>
            <div class="harga">Rp 7.000 / kg</div>
            <span class="pesan">Pesan Sekarang →</span>
        </div>
    </a>

</div>

</body>
</html>