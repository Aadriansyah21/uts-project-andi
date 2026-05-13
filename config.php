<?php
$conn = mysqli_connect("localhost","root","","db_laudry");

if(!$conn){
    die("Koneksi gagal:".mysqli_connect_error());
}
?>