<?php
session_start();

// Periksa apakah pengguna sudah login.
if (!isset($_SESSION["username"])) {
    // Jika belum, arahkan ke halaman login.
    header("Location: login.php");
    exit();
}

// Lanjutkan dengan konten halaman utama.
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/pp.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

    <!-- navbar -->
    <nav
      class="navbar navbar-dark navbar-expand-lg fixed-top"
      style="background-color: #064420"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img src="img/pp.png" alt="logo" width="40px" class="rounded-circle"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            <a class="nav-link" href="#misi">Visi & Misi</a>
            <a class="nav-link" href="#tentang">Tentang</a>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle active"
                aria-current="page"
                href="bio.html"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Bio
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="bio.html#21346003">Rifan</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346005">Arif</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346006">Elsa</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346007">Fajri</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346011">Atun</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346012">Ifdal</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346013">Dhyah</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346015">Razif</a>
                </li>
                <li><a class="dropdown-item" href="bio.html#21346016">?</a></li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346017">Pandu</a>
                </li>
                <li>
                  <a class="dropdown-item" href="bio.html#21346018">Rani</a>
                </li>
              </ul>
            </li>
            <a class="nav-link" href="galeri.html">Galeri</a>
            <a class="nav-link btn btn-danger" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <div class="jumbotron text-center" style="background-color: #e4efe7">
      <div class="container">
        <img
          src="img/pp.png"
          alt=""
          width="200px"
          class="rounded-circle"
          style="border: 5px solid #064420"
        />
        <h1 class="display-4">Teknik Informatika '21</h1>
        <p class="lead">
          Universitas Negeri Padang | Pesisir Selatan | Teknik Elektronika
        </p>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,256L26.7,218.7C53.3,181,107,107,160,80C213.3,53,267,75,320,106.7C373.3,139,427,181,480,202.7C533.3,224,587,224,640,218.7C693.3,213,747,203,800,165.3C853.3,128,907,64,960,69.3C1013.3,75,1067,149,1120,192C1173.3,235,1227,245,1280,256C1333.3,267,1387,277,1413,282.7L1440,288L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"
        ></path>
      </svg>
    </div>
    <!-- akhir jumbortron -->

    <!-- welcome -->
    <section class="welcome" id="welcome">
      <div class="container" style="margin-top: -5px">
        <div class="row text-center">
          <div class="col-sm-12">
            <h2>Selamat Datang di Kelas Teknik Informatika '21</h2>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
            <p>
              Salam sejahtera untuk seluruh mahasiswa dan pengunjung setia
              Universitas Negeri Padang, Kampus Pesisir Selatan. Website ini
              merupakan portal resmi untuk kelas Teknik Informatika BP 21,
              tempat di mana kita dapat terhubung, berbagi informasi, dan tumbuh
              bersama dalam dunia teknologi informasi.
            </p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#e4efe7"
          fill-opacity="1"
          d="M0,192L26.7,176C53.3,160,107,128,160,128C213.3,128,267,160,320,181.3C373.3,203,427,213,480,202.7C533.3,192,587,160,640,165.3C693.3,171,747,213,800,234.7C853.3,256,907,256,960,261.3C1013.3,267,1067,277,1120,234.7C1173.3,192,1227,96,1280,69.3C1333.3,43,1387,85,1413,106.7L1440,128L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- akhir welcome-->

    <!-- misi -->
    <section class="misi" id="misi" style="margin-top: -5px">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-12">
            <h2>Visi & Misi:</h2>
          </div>
        </div>
        <br />
        <div class="row text-center">
          <div class="col-sm-4 offset-sm-2">
            <h5>Visi</h5>
            <hr />
            <p>
              Melalui platform ini, kami bertujuan untuk menciptakan lingkungan
              pembelajaran yang dinamis, inovatif, dan mendukung perkembangan
              potensi setiap mahasiswa. Kami percaya bahwa keterbukaan,
              kolaborasi, dan dedikasi adalah kunci kesuksesan dalam menjalani
              perjalanan akademis di bidang Teknik Informatika.
            </p>
          </div>
          <div class="col-sm-4">
            <h5>Misi</h5>
            <hr />
            <p>
              Menjadi pusat unggulan dalam pendidikan dan inovasi di bidang
              Teknik Informatika, menghasilkan lulusan yang handal dan berdaya
              saing global.
            </p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,224L26.7,208C53.3,192,107,160,160,165.3C213.3,171,267,213,320,218.7C373.3,224,427,192,480,197.3C533.3,203,587,245,640,256C693.3,267,747,245,800,213.3C853.3,181,907,139,960,149.3C1013.3,160,1067,224,1120,250.7C1173.3,277,1227,267,1280,224C1333.3,181,1387,107,1413,69.3L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- akhir misi -->

    <!-- tentang -->
    <section class="tentang" id="tentang" style="margin-top: -5px">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-12">
            <h2>Tentang</h2>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
            <p>
              Kami adalah komunitas Teknik Informatika BP 21 yang berkomitmen
              untuk memberikan pendidikan berkualitas tinggi dan menginspirasi
              mahasiswa untuk mengeksplorasi potensi penuh mereka dalam dunia
              teknologi informasi. Di Teknik Informatika BP 21, kami membangun
              lingkungan belajar yang dinamis dan kolaboratif, di mana mahasiswa
              diberdayakan untuk meraih kesuksesan akademis dan profesional.
            </p>
            <p>
              Tim dosen dan staf kami adalah para ahli yang berdedikasi, siap
              membimbing dan memberikan dukungan yang dibutuhkan untuk membantu
              mahasiswa mencapai tujuan mereka di bidang Teknik Informatika.
            </p>
            <p>
              Melalui kurikulum yang inovatif, kami fokus pada pengembangan
              keterampilan teknis, pemikiran kritis, dan kreativitas untuk
              mempersiapkan mahasiswa menjadi profesional yang kompeten dan
              adaptif di era digital.
            </p>
            <p>
              Bergabunglah dengan kami di perjalanan ini, di mana pengetahuan
              bertemu inovasi, dan kita bersama-sama membentuk masa depan yang
              cerah di dunia Teknik Informatika.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir tentang -->

    <!-- footer -->
    <footer class="text-center">
      <p>&copy;Copyright 2023, Ifdal Lisyukri</p>
    </footer>
    <!-- akhir footer -->

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // sembunyikan loading setelah halaman dimuat
        document.querySelector(".loading-overlay").style.display = "none";
    });
</script>

  </body>
</html>
