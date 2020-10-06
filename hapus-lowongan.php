<?php 
require("koneksi.php");

$no = $_GET["no"];

$perintah = "DELETE FROM lowongan WHERE no='$no' ";
mysqli_query($koneksi,$perintah);
$cek = mysqli_affected_rows($koneksi);
if($cek>0){
	echo "<script> alert('postingan berhasil dihapus');
	document.location.href='profilIndustri.php';</script>";
	exit;
}

 ?>