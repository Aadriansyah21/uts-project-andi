<?php
session_start();
include 'config.php';

if(!isset($_SESSION['login'])) header("Location: login.php");

$harga = ['Cuci Kering'=>7000,'Cuci Setrika'=>9000,'Setrika'=>5000];

if(isset($_POST['simpan'])){
    $nama=$_POST['nama']; $layanan=$_POST['layanan']; $berat=(int)$_POST['berat'];
    $total = $berat * ($harga[$layanan] ?? 7000);
    $id = (int)$_POST['id'];
    if($id)
        mysqli_query($conn,"UPDATE transaksi SET nama_pelanggan='$nama',layanan='$layanan',berat='$berat',total='$total' WHERE id=$id");
    else
        mysqli_query($conn,"INSERT INTO transaksi (nama_pelanggan,layanan,berat,total) VALUES ('$nama','$layanan','$berat','$total')");
    header("Location: transaksi.php"); exit;
}

if(isset($_GET['hapus'])){
    mysqli_query($conn,"DELETE FROM transaksi WHERE id=".(int)$_GET['hapus']);
    header("Location: transaksi.php"); exit;
}

$edit = isset($_GET['edit']) ? mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM transaksi WHERE id=".(int)$_GET['edit'])) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Laundry</title>
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

<div class="transaksi-container">
    <h2 class="transaksi-title">Transaksi Laundry</h2>

    <div class="transaksi-card">
        <form method="POST" class="transaksi-form">
            <input type="hidden" name="id" value="<?= $edit['id'] ?? 0 ?>">
            <input type="text" name="nama" placeholder="Nama Pelanggan" value="<?= $edit['nama_pelanggan'] ?? '' ?>" required>
            <select name="layanan" id="layanan" onchange="hitungTotal()">
                <?php foreach($harga as $k=>$v): ?>
                <option value="<?=$k?>" <?= ($edit['layanan']??'')==$k?'selected':'' ?>>
                    <?=$k?> - Rp <?=number_format($v,0,',','.')?>/kg
                </option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="berat" id="berat" placeholder="Berat (kg)" value="<?= $edit['berat'] ?? '' ?>" required onchange="hitungTotal()">
            <p id="estimasi" style="color:#2563eb;font-weight:bold;margin-bottom:15px;"></p>
            <button type="submit" name="simpan" class="<?= $edit ? 'btn btn-warning' : '' ?>" style="width:100%">
                <?= $edit ? 'Update Transaksi' : 'Simpan' ?>
            </button>
            <?php if($edit): ?>
            <a href="transaksi.php">Batal</a>
            <?php endif; ?>
        </form>
    </div>

    <table class="transaksi-table">
    <tr><th>No</th>
        <th>Nama</th>
        <th>Layanan</th>
        <th>Berat</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>
        <?php $no=1; $data=mysqli_query($conn,"SELECT * FROM transaksi");
        while($d=mysqli_fetch_array($data)): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$d['nama_pelanggan']?></td>
            <td><?=$d['layanan']?></td>
            <td><?=$d['berat']?> Kg</td>
            <td>Rp <?=number_format($d['total'],0,',','.')?></td>
            <td>
                <a href="?edit=<?=$d['id']?>" class="btn btn-warning">Edit</a>
                <a href="?hapus=<?=$d['id']?>" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="dashboard.php" class="btn-kembali">Kembali</a>
</div>

<script>
function hitungTotal(){
    const harga={'Cuci Kering':7000,'Cuci Setrika':9000,'Setrika':5000};
    const berat=document.getElementById('berat').value;
    const layanan=document.getElementById('layanan').value;
    document.getElementById('estimasi').innerText = berat>0
        ? 'Estimasi Total: Rp '+( harga[layanan]*berat).toLocaleString('id-ID') : '';
}
window.onload=hitungTotal;
</script>
</body>
</html>