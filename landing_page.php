<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laundry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="landing-nav">
    <h2>Laundry</h2>
    <ul>
        <li><a href="#layanan">Layanan</a></li>
        <li><a href="#tentang">Tentang</a></li>
        <li><a href="login.php" class="btn-login">Login</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-text">
        <h1>Laundry Cepat, Bersih, dan Terpercaya</h1>
        <p>
            Solusi laundry modern untuk kebutuhan harianmu.
            Proses cepat, harga terjangkau, hasil maksimal.
        </p>
        <a href="login.php" class="hero-btn">Mulai Sekarang</a>
    </div>

    <div class="hero-image">
        <img src="cuci_setrika.jpeg" alt="Laundry">
    </div>
</section>

<!-- LAYANAN -->
<section class="layanan-section" id="layanan">
    <h2>Layanan Kami</h2>

    <div class="layanan-grid">

        <div class="layanan-box">
            <img src="setrika.jpeg" alt="">
            <h3>Setrika</h3>
            <p>Rapikan pakaianmu dengan hasil licin dan wangi.</p>
            <span>Rp 5.000 / kg</span>
        </div>

        <div class="layanan-box">
            <img src="cuci_setrika.jpeg" alt="">
            <h3>Cuci Setrika</h3>
            <p>Cuci bersih dan rapi dalam satu paket.</p>
            <span>Rp 9.000 / kg</span>
        </div>

        <div class="layanan-box">
            <img src="cuci_kering.jpeg" alt="">
            <h3>Cuci Kering</h3>
            <p>Pakaian bersih dan kering siap pakai.</p>
            <span>Rp 7.000 / kg</span>
        </div>

    </div>
</section>

<!-- TENTANG -->
<section class="tentang" id="tentang">
    <h2>Tentang Laundry</h2>
    <p>
        Sistem laundry berbasis web yang memudahkan pengelolaan pelanggan,
        transaksi, dan layanan secara cepat dan terstruktur.
    </p>
</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 Laundry | Sistem Informasi Laundry</p>
</footer>

</body>
</html>