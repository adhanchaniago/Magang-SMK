<?php 
session_start();
require("koneksi.php");

if(isset($_SESSION["id"])){
  header("Location: cek.php");
  exit;
}

if(isset($_POST["submit"])){
  if(login($_POST)>0){
    header("Location: cek.php");
    exit;
  }else{
    echo mysqli_error($koneksi);
  }

}


 ?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= $_COOKIE['mode']; ?>">
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
    <link rel="stylesheet" href="css/singin.css">
    <title>Masuk</title>
  </head>
  <body>
    
    <div class="body">
      
      <!-- login -->
      <div class="kotak">
        <h2 class="h2 text-center text-masuk">MASUK</h2>
        <i class="fad fa-users icon"></i>
        <form action="" method="post">
          <input type="text" placeholder="Email" class="input" name="email">
          <input type="password" placeholder="Kata Sandi" class="input" name="password">
          <button class="button btn-primary" name="submit" type="submit">Masuk</button>
          <a href="create.php" class="link buat">Buat Akun</a>
          <a href="forgot.php" class="link lupa">Lupa Sandi ?</a>
        </form>
      </div>
      <!--  akhir login -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>