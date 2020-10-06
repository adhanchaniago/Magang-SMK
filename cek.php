<?php 
session_start();

$tipe = $_SESSION["tipe"];

echo "$tipe";

if($tipe == "siswa"){
	header("Location: profil.php");
}else{
	header("Location: profilIndustri.php");
}

 ?>