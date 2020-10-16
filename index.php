<?php 
session_start();

?>
<!doctype html>
<html lang="en" data-theme="null">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- link google font -->
    <!-- orbiton font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome to My Profil</title>
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
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Temukan industri <span>impian</span> <br> untuk <span>karir</span> dimasa depan</h1>
            <a href="" class="btn tombol text-white">Bergabunglah dengan kami</a>
        </div>
    </div>
    <!-- akhir jumbotron -->
    <!-- Container -->
    <div class="container">
        <!-- info panel -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <!-- info panel 1 -->
                    <div class="col-lg">
                        <img src="img/information (2).png" alt="employee" class="float-left image-info-panel">
                        <h4>Mulai Bergabung</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, laudantium.</p>
                    </div>
                    <!-- info panel 2 -->
                    <div class="col-lg">
                        <img src="img/information (1).png" alt="hires" class="float-left image-info-panel">
                        <h4>Lengkapi Profil</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, id.</p>
                    </div>
                    <!-- info panel 3 -->
                    <div class="col-lg">
                        <img src="img/information (3).png" alt="security" class="float-left image-info-panel">
                        <h4>Perbanyak karya</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, excepturi!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir info panel -->
        <!-- working space -->
        <div class="row working-space justify-content-center">
            <div class="col-lg-6">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/sld1 (1).jpg" class="d-block img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/sld1 (2).jpg" class="d-block img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/sld1 (3).jpg" class="d-block  img-fluid" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <h3>You <span>Work</span> like at <span>home</span></h3>
                <p>Bekerja dengan suasan hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
                <a href="" class="tombol btn btn-primary">Gallery</a>
            </div>
        </div>
        <!-- akhir working space -->
        <!-- testimonial -->
        <section class="testimonial">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h5>"Bekerja dengan suasan hati yang lebih asik dan
                        mempelajari hal baru setiap harinya."</h5>
                </div>
            </div>
        </section>
        <!-- akhir testimonial -->

        <!-- footer -->
        <div class="row text-center footer">
            <div class="col">
                <p>2020 All Rights Reserve by Magang Siswa</p>
            </div>
        </div>
        <!-- akhir footer -->

    </div>
    <!-- akhir container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- my script -->
    <script src="js/main.js"></script>
</body>

</html>