<?php 
session_start();
require("koneksi.php");

if(isset($_POST["submit"])){
  //cek apakah penambahan email berhasil dilakukan
  if(regristasi($_POST)>0){
      if($_POST["tipe"]=="siswa"){
        echo "<script>
              alert('Akun Berhasil Dibuat');
              document.location.href='biodata-siswa.php';
              </script>";
        exit;
      }else{
        echo "<script>
              alert('Akun Berhasil Dibuat');
              document.location.href='biodata-perusahaan.php';
              </script>";
        exit;
      }
  }else{
      echo mysqli_error($koneksi);
  }
}

if(isset($_SESSION["id"])){
  header("Location: profil.php");
  exit;
}


 ?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <!-- fa -->
    <script src="js/fa.js"></script>
    <!-- my css -->
    <link rel="stylesheet" href="css/create.css">
    <title>Daftar Akun</title>
  </head>
  <body>
    
    <div class="body">
      
      <!-- login -->
      <div class="kotak">
        <h2 class="h2 text-center">Daftar</h2>
        <i class="fad fa-user-plus icon icon-1"></i>
        <form action="" method="post">
          <input type="text" placeholder="Email" class="input" name="email" required="">
          <input type="password" placeholder="Kata Sandi" class="input" id="password" name="password" required="">
          <input type="password" placeholder="konfirmasi Kata Sandi" class="input" id="password1" name="password1" required=""><br>
          <input type="radio" name="tipe" value="siswa" class="tipe">
          <label>siswa</label>
          <input type="radio" name="tipe" value="perusahan" class="tipe2">
          <label for="">perusahan</label>
          <button class="button" type="submit" name="submit" id="daftar">Daftar</button>
          <a href="singin.php" class="link buat">Masuk</a>
          <a href="forgot.php" class="link lupa none">Lupa Sandi ?</a>
        </form>
      </div>
      <!--  akhir login -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
  </body>
</html>