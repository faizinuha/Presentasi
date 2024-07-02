<?php

// Konfigurasi koneksi ke database
require_once __DIR__ . '/db.php'; // Meastikan FIle sudah benar atau belum akan memunculkan error atau berhasil

// Memeriksa koneksi ke database
if (!$conn) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk mendapatkan total data dari tabel
function getTotalData($conn, $query)
{
  $result = mysqli_query($conn, $query);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
  } else {
    return 0;
  }
}
// Query untuk mengambil jumlah data dari masing-masing tabel
// fungsinya adalah mengambil data dari inputan dan menjadikan menjadi ninal data
// Fungsi untuk mendapatkan total data dari tabel
// Mengambil jumlah data dari masing-masing tabel
$total_data_dosen = getTotalData($conn, "SELECT COUNT(*) as total FROM data_dosen");
$total_info_pribadi = getTotalData($conn, "SELECT COUNT(*) as total FROM info_pribadi");
$total_jurusan_fakultas = getTotalData($conn, "SELECT COUNT(*) as total FROM jurusan_fakultas");
$total_organisasi = getTotalData($conn, "SELECT COUNT(*) as total FROM organisasi");
$total_students = getTotalData($conn, "SELECT COUNT(*) as total FROM students");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toin University of Yokohama Central</title>
  <!-- Memuat CSS Bootstrap dan ikon Bootstrap -->
  <link rel="icon" href="../negara/download.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Memuat JavaScript Bootstrap -->
  <!-- bosstras -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!-- Memuat AOS untuk animasi scrolling -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <!-- Memuat SweetAlert untuk popup alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .main-Y {
      text-align: center;
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

    .text {
      position: relative;
      right: -500px;
      transition: 0.2s;
    }

    .text:hover {
      text-decoration: underline;
      border-radius: 30px 20px 50px 23px;
    }
  </style>
</head>

<body>
  <!-- Menyertakan navbar -->
  <?php include('layouts/navbar.php') ?>

  <div class="container">
    <h2 class="text-center main-Y"  >Toin University of Yokohama Central</h2><br>
    <!-- <marquee behavior="scrool" class="text-center"  direction="up">
      Toin University of Yokohama Central
    </marquee> -->
    <p class="text-center">Welcome Daigaku University    Toin University of Yokohama</p>
    <button type="button" class="btn btn-primary text" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      See All Data
    </button>
    <hr>
    <div class="mb-3">
      <img src="img/deparment_toin.png" class="rounded mx-auto d-block main-title" alt="Opening">
      <div class="card-body">
        <h5 class="card-title text-center">Toin University of Yokohama Department</h5>
        <p class="card-text text-center">Department of Toin University of Yokohama Central</p>
      </div>
      <!-- Menampilkan gambar dengan animasi AOS -->
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
          <!-- Kartu negara dengan animasi AOS dan SweetAlert -->
          <div class="col">
            <div class="card">
              <img src="negara/china.jpeg" class="card-img-top" alt="China" data-aos="zoom-in">
              <div class="card-body">
                <h5 class="card-title">China</h5>
                <div class="card-overlay">
                  <a href="#" class="btn btn-primary" onclick="showAlert('China')">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <!-- image 1 -->
          <div class="col">
            <div class="card">
              <img src="negara/meksiko.jpg" class="card-img-top" alt="Meksiko" data-aos="zoom-in">
              <div class="card-body">
                <h5 class="card-title">Meksiko</h5>
                <div class="card-overlay">
                  <a href="#" class="btn btn-primary" onclick="showAlert('Meksiko')">Baca selengkapnya</a>
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
                  <a href="#" class="btn btn-primary" onclick="showAlert('Spanyol')">Baca selengkapnya</a>
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
                  <a href="#" class="btn btn-primary" onclick="showAlert('Perancis')">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="negara/selandia_baru.jpg" class="card-img-top" alt="selandia_baru" data-aos="flip-left">
              <div class="card-body">
                <h5 class="card-title">selandia_baru</h5>
                <div class="card-overlay">
                  <a href="#" class="btn btn-primary" onclick="showAlert('selandia_baru')">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="negara/Jepang.jpeg" class="card-img-top" alt="Jepang" data-aos="flip-left">
              <div class="card-body">
                <h5 class="card-title">Jepang</h5>
                <div class="card-overlay">
                  <a href="#" class="btn btn-primary" onclick="showAlert('Jepang')">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="negara/korea.webp" class="card-img-top" alt="korea" data-aos="flip-left">
              <div class="card-body">
                <h5 class="card-title">Korea</h5>
                <div class="card-overlay">
                  <a href="#" class="btn btn-primary" onclick="showAlert('korea')">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="negara/india.avif" class="card-img-top" alt="India" data-aos="flip-left">
              <div class="card-body">
                <h5 class="card-title">India</h5>
                <div class="card-overlay">
                  <a href="#" class="btn btn-primary" onclick="showAlert('India')">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="negara/palestina.jpeg" class="card-img-top" alt="palestina" data-aos="flip-left">
              <div class="card-body">
                <h5 class="card-title">Pelestina</h5>
                <div class="card-overlay">
                  <a href="#" class="btn btn-primary" onclick="showAlert('palestina')">Baca selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- modal data -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">All data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container mt-5">
                <h1 class="text-center mb-4">Jumlah Semua Data</h1>
                <div class="row">
                  <div class="col-md-4 mb-4">
                    <div class="card bg bg-primary">
                      <div class="card-body">
                        <h5 class="card-title ">Data Dosen</h5>
                        <p class="card-text">
                          <?php echo htmlspecialchars($total_data_dosen); ?>
                          <i class='bx <?php echo $total_data_dosen > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card">
                      <div class="card-body bg bg-success">
                        <h5 class="card-title">Info Pribadi</h5>
                        <p class="card-text">
                          <?php echo htmlspecialchars($total_info_pribadi); ?>
                          <i class='bx <?php echo $total_info_pribadi > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card   bg bg-warning">
                      <div class="card-body">
                        <h5 class="card-title ">Jurusan dan Fakultas</h5>
                        <p class="card-text">
                          <?php echo htmlspecialchars($total_jurusan_fakultas); ?>
                          <i class='bx <?php echo $total_jurusan_fakultas > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card">
                      <div class="card-body bg bg-info-subtle">
                        <h5 class="card-title">Organisasi</h5>
                        <p class="card-text">
                          <?php echo htmlspecialchars($total_organisasi); ?>
                          <i class='bx <?php echo $total_organisasi > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-4">
                    <div class="card bg bg-info">
                      <div class="card-body">
                        <h5 class="card-title bg ">Students</h5>
                        <p class="card-text">
                          <?php echo htmlspecialchars($total_students); ?>
                          <i class='bx <?php echo $total_students > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        AOS.init();

        function showAlert(country) {
          Swal.fire({
            title: 'Informasi Negara',
            text: `Informasi tentang ${country} belum Ada Akan Ada beberapa Bulan`,
            icon: 'info',
            confirmButtonText: 'Tutup'
          });
        }
       
      </script>
</body>

</html>