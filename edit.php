<?php
include 'config.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM pelanggan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn,"UPDATE pelanggan 
    SET nama='$nama', alamat='$alamat'
    WHERE id='$id'");

    header("Location: pelanggan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
    <h2>Edit Data</h2>

    <form method="POST">
        <input type="text" name="nama" value="<?= $row['nama'] ?>">
        <input type="text" name="alamat" value="<?= $row['alamat'] ?>">
        <button name="update">Update</button>
    </form>
</div>

</body>
</html>