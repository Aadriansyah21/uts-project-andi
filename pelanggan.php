<?php
session_start();
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

$data = mysqli_query($conn,"SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Data Pelanggan</h2>
<a href="tambah.php" class="btn-tambah">Tambah Data</a>
<a href="dashboard.php" class="btn-kembali">Dashboard</a>

<table border="1">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No_Tlpn</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td><?= $row['no_tlpn'] ?></td>
    <td>
        <a href="hapus.php?id=<?= $row['id'] ?>">Hapus</a>
        <a href="edit.php?id=<?= $row['id'] ?>">edit</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>