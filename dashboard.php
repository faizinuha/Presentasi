<?php include('layouts/navbar.php') ?>
<?php

// Konfigurasi koneksi ke database
require_once __DIR__ . '/db.php'; // Pastikan file ini berisi konfigurasi koneksi database

// Memeriksa koneksi ke database
if (!$conn) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil jumlah data dari masing-masing tabel
$query_data_dosen = "SELECT COUNT(*) as total FROM data_dosen";
$result_data_dosen = mysqli_query($conn, $query_data_dosen);
if ($result_data_dosen) {
  $row_data_dosen = mysqli_fetch_assoc($result_data_dosen);
  $total_data_dosen = $row_data_dosen['total'];
} else {
  $total_data_dosen = 0;
}

$query_info_pribadi = "SELECT COUNT(*) as total FROM info_pribadi";
$result_info_pribadi = mysqli_query($conn, $query_info_pribadi);
if ($result_info_pribadi) {
  $row_info_pribadi = mysqli_fetch_assoc($result_info_pribadi);
  $total_info_pribadi = $row_info_pribadi['total'];
} else {
  $total_info_pribadi = 0;
}

$query_jurusan_fakultas = "SELECT COUNT(*) as total FROM jurusan_fakultas";
$result_jurusan_fakultas = mysqli_query($conn, $query_jurusan_fakultas);
if ($result_jurusan_fakultas) {
  $row_jurusan_fakultas = mysqli_fetch_assoc($result_jurusan_fakultas);
  $total_jurusan_fakultas = $row_jurusan_fakultas['total'];
} else {
  $total_jurusan_fakultas = 0;
}

$query_organisasi = "SELECT COUNT(*) as total FROM organisasi";
$result_organisasi = mysqli_query($conn, $query_organisasi);
if ($result_organisasi) {
  $row_organisasi = mysqli_fetch_assoc($result_organisasi);
  $total_organisasi = $row_organisasi['total'];
} else {
  $total_organisasi = 0;
}

$query_students = "SELECT COUNT(*) as total FROM students";
$result_students = mysqli_query($conn, $query_students);
if ($result_students) {
  $row_students = mysqli_fetch_assoc($result_students);
  $total_students = $row_students['total'];
} else {
  $total_students = 0;
}

// Mengimpor navbar atau header jika diperlukan
require_once __DIR__ . '/layouts/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toin University of Yokohama Central</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!-- data-aos -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <style>
    .main-Y {
      text-align: center;
    }

    .main-title {
      image-resolution: from-image;
      image-resolution: 300dpi;
      image-resolution: from-image 300dpi;
      image-resolution: 300dpi snap;
      width: 900px;
    }

    .card {
      margin: 1rem 0;
    }

    .img-rounded {
      border-radius: 0.25rem;
      margin-top: 1rem;
    }

    .card-img-top {
      border-radius: 20 30px;
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-footer {
      background-color: rgba(255, 255, 255, 0.8);
    }

    .card-body {
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .card-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, rgba(15, 37, 110, 1) 12%, rgba(26, 189, 162, 1) 61%, rgba(7, 21, 179, 1) 84%);
      background-blend-mode: normal;
      border-radius: 10px;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .card-body:hover .card-overlay {
      opacity: 1;
    }

    .card-body:hover .card-title {
      opacity: 1;
    }

    .text {
      position: relative;
      right: -600px;
      transition: 0.2s;
      /* Tambahkan transisi untuk semua properti */
    }

    .text:hover {
      text-decoration: underline;
      border-radius: 30px 20px 50px 23px;
    }
  </style>
</head>

<body>
  <h2 class="text-center main-Y">Toin University of Yokohama Central</h2>
  <p class="text-center">Welcome Daigaku University Toin University of Yokohama </p>
  <!-- <p class="text-center underline"><a href="jumlahsemua.php">See You Count Date</a></p> -->
  <button type="button" class="text btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    all school data
  </button>
  <hr>
  <div class="card mb-3">
    <img src="img/deparment_toin.png" class="rounded mx-auto d-block main-title" alt="Opening">
    <div class="card-body">
      <h5 class="card-title text-center">Toin University of Yokohama Department</h5>
      <p class="card-text text-center">Department of Toin University of Yokohama Central</p>
    </div>
    <!-- Images -->
    <div class="row">
      <div class="col-md-6">
        <img src="img/Opening.png" class="img-fluid img-rounded" alt="Toin University Central" data-aos="fade-right" data-aos-delay="100" data-aos-anchor-placement="top-center">
      </div>
      <div class="col-md-6" data-aos="fade-left" data-aos-delay="200" data-aos-anchor-placement="top-center">
        <img src="img/Yokohama National university.jpg" class="img-fluid img-rounded" alt="Yokohama National University">
      </div>
    </div>
    <div class="container mt-5">
      <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="mb-4">Negara Paling Populer</h3>
      <p>Telah bekerja sama dengan University Toin-Univ-of-Yokohama</p>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <img src="negara/china.jpeg" class="card-img-top" alt="China" data-aos="zoom-in">
            <div class="card-body">
              <h5 class="card-title">China</h5>
              <div class="card-overlay">
                <a href="#" class="btn btn-primary">Baca selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="negara/meksiko.jpg" class="card-img-top" alt="Meksiko" data-aos="zoom-in">
            <div class="card-body">
              <h5 class="card-title">Meksiko</h5>
              <div class="card-overlay">
                <a href="#" class="btn btn-primary">Baca selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="negara/spayol.jpg" class="card-img-top" alt="Spanyol" data-aos="zoom-in">
            <div class="card-body">
              <h5 class="card-title">Spanyol</h5>
              <div class="card-overlay">
                <a href="#" class="btn btn-primary">Baca selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="negara/Prancis.jpg" class="card-img-top" alt="Perancis" data-aos="flip-left">
            <div class="card-body">
              <h5 class="card-title">Perancis</h5>
              <div class="card-overlay">
                <a href="#" class="btn btn-primary">Baca selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="negara/selandia_baru.jpg" class="card-img-top" alt="Selandia Baru" data-aos="flip-right">
            <div class="card-body">
              <h5 class="card-title">Selandia Baru</h5>
              <div class="card-overlay">
                <a href="#" class="btn btn-primary">Baca selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="negara/malaysia.jpeg" class="card-img-top" alt="Malaysia" data-aos="fade-up">
            <div class="card-body">
              <h5 class="card-title">Malaysia</h5>
              <div class="card-overlay">
                <a href="#" class="btn btn-primary">Baca selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </div>


  <!-- modal data -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">All Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container mt-5">
            <h1 class="text-center mb-4">Jumlah Semua Data</h1>
            <div class="row">
              <div class="col-md-4 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Data Dosen</h5>
                    <p class="card-text"><?php echo htmlspecialchars($total_data_dosen); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Info Pribadi</h5>
                    <p class="card-text"><?php echo htmlspecialchars($total_info_pribadi); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Jurusan dan Fakultas</h5>
                    <p class="card-text"><?php echo htmlspecialchars($total_jurusan_fakultas); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Organisasi</h5>
                    <p class="card-text"><?php echo htmlspecialchars($total_organisasi); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text"><?php echo htmlspecialchars($total_students); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php
          // Menutup koneksi database jika sudah selesai digunakan
          mysqli_close($conn);
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <script>
    AOS.init();
  </script>
  <?php require_once __DIR__ . '/footer/footer.php'; ?>
</body>

</html>