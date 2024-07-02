<?php
// Mengimpor file 'db.php' yang berisi koneksi ke database
include '../db.php';

// Mengimpor file 'navbar.php' untuk menampilkan navigasi
require '../layouts/navbar.php';

// Query untuk mengambil data dari tabel jurusan_fakultas
$sql = "SELECT * FROM jurusan_fakultas";

// Eksekusi query dan simpan hasilnya ke dalam variabel $result
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurusan Fakultas</title>
  <!-- Mengimpor CSS Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- boxicons -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
 
  </style>
</head>

<body>
  <div class="container">
    <h2 class="row mt-5">Jurusan Fakultas</h2>
    <!-- Tombol untuk membuat data baru -->
    <a href="create_jurusan_fakultas.php" class="btn btn-primary btn-custom mb-4 ">Create New Jurusan Fakultas</a>
    
    <div class="table-container">
      <!-- Tabel untuk menampilkan data jurusan_fakultas -->
      <table class="table table-bordered" id="datatable">
        <thead class="table-primary">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Loop untuk mengambil setiap baris data dari hasil query
          $id = 1;
          while ($jurusan = $result->fetch_assoc()) {
            ?>
            <tr>
              <!-- Menampilkan ID -->
              <td><?= $id ?></td>
              <td><?= htmlspecialchars($jurusan['nama']) ?></td>
              <td>
                <a href="edit.jurusan.php?id=<?= $jurusan['id'] ?>" class="btn btn-warning btn-sm"><i class='bx bx-pencil'></i></a>
                <!-- <a href="delete_jurusan_fakultas.php?id=<?= $jurusan['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this jurusan?')"><i class='bx bx-trash'></i></a> -->
              </td>
            </tr>
            <?php
            $id++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
    <!-- bosstras -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!-- Mengimpor JavaScript Bootstrap dan dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
     new DataTable('#datatable');
  </script>
    <!-- // Jika menggunakan DataTables, pastikan plugin suda -->
