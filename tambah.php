<?php
include 'config.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_tlpn = $_POST['no_tlpn'];

    if(empty($nama) || empty($alamat)){
        echo "<script>alert('Isi semua field');</script>";
    } else {
        mysqli_query($conn,"INSERT INTO pelanggan(nama,alamat,no_tlpn)
        VALUES('$nama','$alamat', '$no_tlpn')");

        header("Location: pelanggan.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

    <h2>Tambah Data Pelanggan</h2>

    <form method="POST">
        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="alamat" placeholder="Alamat">
        <input type="text" name="no_tlpn" placeholder="No Telepon">

        <button name="simpan">Simpan</button>
    </form>

</div>

</body>
</html>

