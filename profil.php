<?php 
session_start();
require("koneksi.php");

//melakukan pengecekan terhadap user yang belum login
if(!isset($_SESSION["id"])){
  header("Location: singin.php");
  exit;
}


$id = $_SESSION["id"];
$perintah = "SELECT * FROM profil_siswa WHERE id='$id'";
$data = tampil($perintah);

$perintah2 = "SELECT * FROM karya_siswa WHERE id='$id' ORDER BY no DESC";
$data_karya = tampil1($perintah2);
$result = mysqli_query($koneksi,$perintah2);


 ?>
<!doctype html>
<html lang="en" data-theme="null">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome -->
    <script src="js/fa.js"></script>
    <!-- orbiton font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <!-- roboto font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- mycss -->
    <link rel="stylesheet" href="css/profil.css">
    <title>Beranda Profil</title>
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
                        <a class='dropdown-item' href='Pengaturan.php'>Pengaturan</a>
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
    <!-- bar foto profil -->
    <div class="background-profil">

    </div>
    <?php $bg = $data["foto"]; ?>
    <div class="foto-profil" style="background-image: url('img/profil/siswa/<?= $bg; ?>');">

    </div>
    <!-- beranda nam -->
    <div class="garis3">

        <div class="garis2">
            <div class="name">
                <h6 class="h6 text-user-name"><?= $data["nama"]; ?></h6>
            </div>
            <div class="kota">
                <h6 class="text-loc"><i class="fas fa-map-marker-alt"></i> <?= $data["kota"]; ?>,Indonesia</h6>
            </div>
        </div>


        <div class="garis">
            <div class="sekolah">
                <h6 class="text-sekolah"><i class="fas fa-school"></i> <?= $data["sekolah"]; ?></h6>
            </div>
            <div class="jurusan">
                <h6 class="text-jurusan"><i class="fas fa-laptop-code"></i> <?= $data["jurusan"];?></h6>
            </div>
        </div>

    </div>
    <br>
    <!-- akhir bar foto profil -->

    <div class="box-edit-profil">
        <a href="update-profil.php?id=<?= $data['id']; ?>" class="text-edit-profil">Edit Profil <i class="fas fa-pencil-alt"></i></a>
    </div>

    <!-- beranda karya -->
    <section class="karya">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="tr"></div>
                </div>
            </div>
            <div class="row">

                <?php if(mysqli_fetch_assoc($result)>=1){?>
                <?php foreach($data_karya as $karya): ?>
                <!-- kotak1 -->
                <div class="col-lg-3">
                    <div class="kotak-karya">
                        <a href="edit-karya.php?no=<?= $karya['no']; ?>" class="edit-btn"><i class="fas fa-ellipsis-h"></i></a>
                        <img src="img/profil/siswa/<?= $karya['foto']; ?>" alt="" class="thumbnail">
                        <h1 class="judul-kotak-karya"><?= $karya["judul"]; ?></h1>
                        <p class="deskripsi"><?= $karya["waktu"]; ?></p>
                        <a href="<?= $karya['link']; ?>" target="blank" class="btn btn-primary lihat">Lihat</a>
                        <!--               <a href="edit-karya.php?no=<?= $karya['no']; ?>"  class="btn btn-success edit">Edit</a>
              <a href="edit-karya.php?no=<?= $karya['no']; ?>"  class="btn btn-danger hapus">Hapus</a> -->
                    </div>
                </div>
                <!-- kotak1 -->
                <?php endforeach; ?>
                <?php }?>


            </div>
    </section>
    <!-- akhir beranda karya -->

    <div></div>

    <!-- tambah -->
    <a href="karya.php">
        <div class="tambah">
            <b>TAMBAH KARYA</b>
        </div>
    </a>
    <!-- tambah karya -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>