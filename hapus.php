<?php
include 'koneksi.php';
$id = $_GET['id'];
$query=mysqli_query($config, "DELETE FROM stok WHERE kode_barang = '$id'");
echo "<meta http-equiv='refresh' content='1;url=stok.php'>";
?>