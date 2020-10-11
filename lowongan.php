<?php 
session_start();
require("koneksi.php");

$perintah ="SELECT * FROM lowongan  ORDER BY no DESC";
$data = tampil1($perintah);

?>
<!doctype html>
<html lang="en" data-theme="null">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- my css -->
    <link rel="stylesheet" href="css/lowongan.css">
    <!-- font awesome -->
    <script src="js/fa.js"></script>
    <!-- google -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <title>Beranda Lowongan</title>
  </head>
  <body>
    
  <!--  navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Magang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link garis-bawah active" href="index.php">beranda <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link garis-bawah active" href="lowongan.php">lowongan</a>
            <?php 

            

              if(!isset($_SESSION["id"])){
                echo "<a class='nav-item nav-link garis-bawah active' href='singin.php'>Masuk</a>";
              }else{
                  $nama = explode(" ",$_SESSION["nama"]);
                echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                if($_SESSION["tipe"]=="siswa"){
                  echo "HI,".$nama[0];
                }else{
                  echo "Lainnya";
                }
                echo "</a>
                      <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='cek.php'>Profil</a>
                        <a class='dropdown-item' href=''>Pesan</a>
                        <a class='dropdown-item' href='pengaturan.php'>Pengaturan</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='logout.php'>Keluar</a>
                      </div>
                    </li>";
              }

             ?>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->
    <!-- container -->
    <div class="container">
      <!-- judul loker -->
      <div class="row ">
        <div class="col">
          <h1 class="display-4 text-daftar-lowongan">Daftar Lowongan</h1>
          <div class="tr"></div>
        </div>
      </div>
      <!-- akhir judul loker -->
      <!-- loker -->
      <div class="row ">
        <?php foreach($data as $nilai): ?>
        <!-- kotak1 -->
        <div class="col-lg-4 my-3 box">
          <div class="card" >
            <div class="card-body">
              <h5 class="card-title company"><?= $nilai["nama_perusahaan"]; ?></h5>
              <h5 class="card-title job"><i class="fas fa-briefcase"></i><?= $nilai["kebutuhan"]; ?></h5>
              <h5 class="card-title job"><i class="fas fa-map-marker-alt"></i><?= $nilai["kota"]; ?> - Indonesia</h5>
              <h5 class="card-title job"><i class="fas fa-calendar-day"></i><?= $nilai["waktu"]; ?></h5>
              <a href="detail-lowongan.php?no=<?= $nilai['no']; ?>" class="btn btn-primary  btn-lihat">Lihat Detail</a>
            </div>
          </div>
        </div>
        <!-- kotak1 -->
       <?php endforeach; ?>

      </div>
    </div>
  </div>
  <!-- akhir loker -->
</div>
<!-- akhir loker -->
</div>
<!-- akhir container -->
<!-- pagnantaion -->
<nav aria-label="Page navigation example" class="pagnantaion-place">
<ul class="pagination ">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
</nav>
<!-- akhir pagnantaion -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- my script -->
<script src="js/main.js"></script>
</body>
</html>