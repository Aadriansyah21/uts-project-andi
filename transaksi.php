<?php
session_start();
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $layanan = $_POST['layanan'];
    $berat = $_POST['berat'];

    $total = $berat * 7000;

    mysqli_query($conn,"INSERT INTO transaksi VALUES('','$nama','$layanan','$berat','$total','Diproses')");
}
?>

<h2>Transaksi Laundry</h2>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama Pelanggan"><br><br>

    <select name="layanan">
        <option>Cuci Kering</option>
        <option>Cuci Setrika</option>
        <option>Setrika</option>
    </select><br><br>

    <input type="number" name="berat" placeholder="Berat (kg)"><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Layanan</th>
    <th>Berat</th>
    <th>Total</th>
    <th>Status</th>
</tr>

<?php

$no=1;
$data = mysqli_query($conn,"SELECT * FROM transaksi");

while($d=mysqli_fetch_array($data)){
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama_pelanggan'] ?></td>
    <td><?= $d['layanan'] ?></td>
    <td><?= $d['berat'] ?> Kg</td>
    <td>Rp <?= $d['total'] ?></td>
    <td><?= $d['status'] ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="dashboard.php">Kembali</a>