<?php 
session_start();

$tipe = $_SESSION["tipe"];


if($tipe == "siswa"){
	header("Location: profil.php");
}else{
	header("Location: profilIndustri.php");
}

 ?>