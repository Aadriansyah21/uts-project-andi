<?php
include 'config.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    if(empty($nama) || empty($alamat)){
        echo "<script>alert('Isi semua field');</script>";
    } else {
        mysqli_query($conn,"INSERT INTO pelanggan(nama,alamat)
        VALUES('$nama','$alamat')");

        header("Location: pelanggan.php");
    }
}
?>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama">
    <input type="text" name="alamat" placeholder="Alamat">
    <button name="simpan">Simpan</button>
</form>