<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}
?>

<h2>Dashboard Laundry</h2>

<a href="pelanggan.php">Data Pelanggan</a><br>
<a href="transaksi.php">Transaksi</a><br>
<a href="logout.php">Logout</a>