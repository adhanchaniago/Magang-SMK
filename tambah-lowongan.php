<?php 
session_start();
require("koneksi.php");

//cek apakah user sudah login 
//cek apakah user ber type perusahaan

//melakukan penambahan lowongan
$id = $_SESSION["id"];
$waktu = date("j-m-o");
$nama = $_SESSION["nama"];
$foto = $_SESSION["foto"];

if(isset($_POST["submit"])){
  if(tambahLowongan($_POST,$id,$waktu,$nama,$foto)>0){
      echo "<script>alert
      ('Lowongan Berhasil di tambahkan')
      document.location.href='profilIndustri.php';
      </script>";
  }else{
      echo mysqli_error($koneksi);
  }
}




 ?>
<!doctype html>
<html lang="en" data-theme="null">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/tambah-lowongan.css">
    <title>Biodata</title>
  </head>
  <body>
    
      <form action="" method="post" enctype="multipart/form-data">
        <h1 class="display-4 text-biodata">Terbitkan Lowongan</h1>
        <input type="text" placeholder="kriteria pencarian(web developer,desainer)" name="kebutuhan" class="input" required="">
        <input type="text" placeholder="Jumlah Bayaran /bulan" name="gaji" class="input" required="">
        <input type="text" placeholder="Alamat " name="alamat" class="input" required="">
        <input type="text" placeholder="Kota" name="kota" class="input" required="">
        <select name="jurusan" id="" class="input" required="">
          <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
          <option value="Multimedia">Multimedia</option>
          <option value="Desain">Desain</option>
        </select>

        <button class="btn btn-primary" type="submit" name="submit">Menambahkan <Karya></Karya></button>
      </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>