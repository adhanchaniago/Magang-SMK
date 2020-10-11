<?php 

// koneksi database
$koneksi = mysqli_connect("localhost","root","","magang");


//registasi akun
function regristasi($data){
	global $koneksi;

	//mengambil data
	$email     = htmlspecialchars($data["email"]);
	$password  = htmlspecialchars($data["password"]);
	$password1 = htmlspecialchars($data["password1"]);
	$tipe      = htmlspecialchars($data["tipe"]);

	//cek apakah email sudah terdaftar
	$result = mysqli_query($koneksi,"SELECT email FROM akun WHERE email = '$email'");

	if(mysqli_fetch_assoc($result)){
		echo "<script>alert('email sudah terdaftar');</script>";
		return false;
	}

	//cek apakah password sama
	if($password === $password1){

		$pass = md5("qw3rt77".md5($password));
		
		//menambhakan data kedalam database
		$perintah = "INSERT INTO akun VALUES('','$email','$pass','user','$tipe')";
		mysqli_query($koneksi,$perintah);

		//melakukan query untuk mendapatkan id
		$perintah2 = "SELECT * FROM akun WHERE email='$email'";
		$query = mysqli_query($koneksi,$perintah2);
		$data = mysqli_fetch_assoc($query);
		$_SESSION["id"]=$data["id"];
		$_SESSION["level"] = $data["level"];
		$_SESSION["tipe"]  = $data["tipe"];
		$_SESSION["email"] = $data["email"];

		return mysqli_affected_rows($koneksi);

	}else{
		echo "<script> alert('Konfirmasi password tidak sesuai');</script>";
		return false;
	}
}


//login akun
function login($data){
	global $koneksi;

	//mendaptkan data
	$email    = htmlspecialchars($data["email"]);
	$password = htmlspecialchars($data["password"]);

	//melakukan query untuk mendapatkan data akun
	$result = mysqli_query($koneksi,"SELECT * FROM akun WHERE email='$email'");


	//cek apakah email terdaftar
	if(mysqli_num_rows($result)===1){
		//melakukan enkripsi password
		$pass = md5("qw3rt77".md5($password));

		//melakukan pengecekan password
		$row = mysqli_fetch_assoc($result);


		if($pass === $row["password"]){
			$_SESSION["level"] = $row["level"];
			$_SESSION["tipe"]  = $row["tipe"];
			$_SESSION["id"]    = $row["id"];
			$_SESSION["email"] = $row["email"];
			if($row["tipe"]=="siswa"){
				$id = $row["id"];
				$query = mysqli_query($koneksi,"SELECT * FROM profil_siswa WHERE id='$id'");
				$hasil = mysqli_fetch_assoc($query);
				$_SESSION["nama"]=$hasil["nama"];
				header("Location: cek.php");
				exit;
			}else{
				header("Location: cek.php");
				exit;
			}
			
		}else{
			echo "<script> alert('Password yang anda masukan salah');</script>";
			return false;
		}

	}else{
		echo "<script> alert('Email Belum Terdaftar');</script>";
		return false;
	}
}


//function tampil data
function tampil($perintah){
	global $koneksi;

	$query = mysqli_query($koneksi,$perintah);
	$hasil = mysqli_fetch_assoc($query);

	return $hasil;
}


//function tampil data
function tampil1($perintah){
	global $koneksi;

	$query = mysqli_query($koneksi,$perintah);
	$data = [];
	while ($hasil = mysqli_fetch_assoc($query)) {
	 	$data [] = $hasil;
	 } 

	return $data;
}


//menambahkan data biodata siswa
function tambahBiodataSiswa($data,$id){
	global $koneksi;

	$id      = $id;
	$nama    = htmlspecialchars($data["nama"]);
	$kota    = htmlspecialchars($data["kota"]);
	$sekolah = htmlspecialchars($data["sekolah"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar  = upload();

	$perintah = "INSERT INTO profil_siswa VALUES(
				'$id','$nama','$kota','$sekolah','$jurusan','$gambar')";
	mysqli_query($koneksi,$perintah);
	$_SESSION["tipe"]="siswa";
	$_SESSION["nama"]  = $nama;
	return mysqli_affected_rows($koneksi);
}

//menambahkan data biodata perusahaan
function tambahBiodataPerusahaan($data,$id){
	global $koneksi;

	$id     = $id;
	$nama   = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$telp   = htmlspecialchars($data["telp"]);
	$email  = htmlspecialchars($data["email"]);
	$gambar = upload1();

	$perintah = "INSERT INTO profil_perusahaan VALUES(
				'$id','$nama','$alamat','$telp','$email','$gambar')";
	mysqli_query($koneksi,$perintah);

	$_SESSION["tipe"]="perusahaan";
	return mysqli_affected_rows($koneksi);
}


//menambahkan data karya siswa
function tambahKarya($data,$id,$waktu){
	global $koneksi;

	$id = $id;
	$judul = $data["judul"];
	$link = $data["link"];
	$gambar=upload();

	$perintah = "INSERT INTO karya_siswa VALUES('','$id','$judul','$link','$gambar','$waktu')";
	mysqli_query($koneksi,$perintah);

	return mysqli_affected_rows($koneksi);
}


//menambahkan data lowongan kerja
function tambahLowongan($data,$id,$waktu,$nama,$foto){
	global $koneksi;

	$kebutuhan = $data["kebutuhan"];
	$alamat = $data["alamat"];
	$jurusan = $data["jurusan"];
	$gaji = $data["gaji"];
	$kota = $data["kota"];

	$perintah = "INSERT INTO lowongan VALUES
	('','$id','$nama','$kebutuhan','$alamat','$kota','$jurusan','$gaji','$waktu','$foto')";
	mysqli_query($koneksi,$perintah);

	return mysqli_affected_rows($koneksi);
}

//update data karya siswa
function updateKarya($data,$no){
	global $koneksi;

	$judul = $data["judul"];
	$link = $data["link"];
	$gambarLama = $data['gambarLama'];

	//cek apakah gambar diperbarui atau tidak
	if($_FILES['gambar']['error']===4){
		$gambar = $gambarLama;
	}else{
		$gambar=upload();
	}

	$perintah = "UPDATE karya_siswa SET 
							judul='$judul',
							link='$link',
							foto='$gambar' 
							WHERE no='$no'";
	mysqli_query($koneksi,$perintah);

	return mysqli_affected_rows($koneksi);
}


//update profil siswa
function updateProfilSiswa($data,$id){
	global $koneksi;

	$id      = $id;
	$nama    = htmlspecialchars($data["nama"]);
	$kota    = htmlspecialchars($data["kota"]);
	$sekolah = htmlspecialchars($data["sekolah"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama  = htmlspecialchars($data["gambarLama"]);

	if($_FILES["gambar"]["error"]===4){
		$gambar = $gambarLama;
	}else{
		$gambar = ulpoad();
	}

	$perintah = "UPDATE profil_siswa SET 
							nama='$nama',
							kota='$kota',
							sekolah='$sekolah', 
							jurusan='$jurusan',
							foto ='$gambar' 
				WHERE id='$id'";
	mysqli_query($koneksi,$perintah);
	return mysqli_affected_rows($koneksi);
}


//update profil Perusahaan
function updateProfilPerusahaan($data,$id){
	global $koneksi;

	$id     = $id;
	$nama   = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$telp   = htmlspecialchars($data["telp"]);
	$email  = htmlspecialchars($data["email"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);


	if($_FILES["gambar"]["error"]===4){
		$gambar = $gambarLama;
	}else{
		$gambar = ulpoad();
	}

	$perintah = "UPDATE profil_perusahaan SET 
							nama='$nama',
							alamat='$alamat',
							telp='$telp', 
							email='$email',
							foto ='$gambar' 
				WHERE id='$id'";
	mysqli_query($koneksi,$perintah);
	return mysqli_affected_rows($koneksi);
}



//update data lowwongan
function updateLowongan($data,$no){
	global $koneksi;

	$kebutuhan = $data["kebutuhan"];
	$alamat = $data["alamat"];
	$jurusan = $data["jurusan"];
	$gaji = $data["gaji"];
	$kota = $data["kota"];

	$perintah = "UPDATE lowongan SET
							kebutuhan ='$kebutuhan',
							lokasi    ='$alamat',
							jurusan   ='$jurusan',
							gaji      ='$gaji',
							kota 	  ='$kota'
							WHERE no='$no'";
	mysqli_query($koneksi,$perintah);

	return mysqli_affected_rows($koneksi);
}











//function upload gambar
function upload(){

	$namaFiles = $_FILES["gambar"]["name"];
	$ukuran    = $_FILES["gambar"]["size"];
	$error     = $_FILES["gambar"]["error"];
	$tmp_name  = $_FILES["gambar"]["tmp_name"];

	//cek apakah yang di ulpoad adalah gambar
	$ekstensi = ["jpg","jpeg","png"];
	$ekstensiGambar = explode(".", $namaFiles);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensi)){
		echo "<script>alert('yang anda upload bukan gambar');</script>";
		return false;
	}

	//cek ukuruan gambar
	if($ukuran>1000000){
		echo "<script>alert('ukuran gambar lebih dari 1MB');</script>";
		return false;
	}

	//generate nama file
	$nama_baru = uniqid();
	$nama_baru .= ".";	
	$nama_baru .= $ekstensiGambar;	

	//melakuka upload
	move_uploaded_file($tmp_name, 'img/profil/siswa/'.$nama_baru);

	return $nama_baru;
}

function upload1(){

	$namaFiles = $_FILES["gambar"]["name"];
	$ukuran    = $_FILES["gambar"]["size"];
	$error     = $_FILES["gambar"]["error"];
	$tmp_name  = $_FILES["gambar"]["tmp_name"];

	//cek apakah yang di ulpoad adalah gambar
	$ekstensi = ["jpg","jpeg","png"];
	$ekstensiGambar = explode(".", $namaFiles);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensi)){
		echo "<script>alert('yang anda upload bukan gambar');</script>";
		return false;
	}

	//cek ukuruan gambar
	if($ukuran>1000000){
		echo "<script>alert('ukuran gambar lebih dari 1MB');</script>";
		return false;
	}

	//generate nama file
	$nama_baru = uniqid();
	$nama_baru .= ".";	
	$nama_baru .= $ekstensiGambar;	

	//melakuka upload
	move_uploaded_file($tmp_name, 'img/profil/perusahaan/'.$nama_baru);

	return $nama_baru;
}

 ?>