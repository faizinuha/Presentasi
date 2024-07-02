<?php
require '../layouts/navbar.php';
require_once __DIR__ . '/../db.php';

// Inisialisasi variabel untuk menyimpan hasil query
$query = mysqli_query($conn, "SELECT * FROM info_pribadi");

// Mengecek apakah ada permintaan pencarian
if (isset($_GET['submit'])) {
  $submit = mysqli_real_escape_string($conn, $_GET['submit']);
  $query = mysqli_query($conn, "SELECT * FROM info_pribadi WHERE name LIKE '%$submit%'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
  <!-- Mengimpor CSS Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7HP17N1zUsF/0sVRE5Q5rKNk5mvj5TFP5XV" crossorigin="anonymous">
  <!-- boxicons -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/dist/boxicons.css">
  <style>
    .hover {
      border-radius: 12px;
    }

    .hover:hover {
      border-radius: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgb(255, 255, 255);  
      transition: 0.5s ease;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row mt-3">
      <div class="text-center">
        <h2>Daftar Mahasiswa</h2>
      </div>
    </div>

    <div class="row mt-4">
      <hr>
      <div class="col">
        <a href="create.php" class="btn btn-primary hover">Tambah Data</a>
      </div>
      <hr class="mt-4">
      <table class="table table-striped" id="datatable">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $id = 1;
          while ($row = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td><?= htmlspecialchars($row['Nim']) ?></td>
              <td><?= htmlspecialchars($row['alamat']) ?></td>
              <td><?= htmlspecialchars($row['no_telp']) ?></td>
              <td>
                <a href="eye.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                <a href="edit.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                <a href="delete.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-danger"><i class="bi bi-x-circle"></i></a>
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

  <!-- Mengimpor JavaScript Bootstrap 5 dan dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
