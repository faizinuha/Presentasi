<?php
require '../layouts/navbar.php';
require_once __DIR__ . '../db.php';
$query = mysqli_query($conn, "SELECT * FROM info_pribadi ");

if (isset($_GET['submit'])) {
  $submit = $_GET['submit'];
  $query = mysqli_query($conn, "SELECT * FROM info_pribadi WHERE name LIKE '%$submit%' ");

  $submit = mysqli_real_escape_string($conn, $_GET['submit']);
  $query = mysqli_query($conn, "SELECT * FROM info_pribadi WHERE name LIKE '%$submit%' ");  
}

?>

<div class="container">
  <div class="row mt-3">
    <div class="text-center">
      <h2>Daftar Mahasiswa</h2>
    </div>

  </div>
  <style>
    .hover {
      border-radius: 12px;
    }

    .hover:hover {
      border-radius: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgb(255, 255, 255);
      padding: 10px;
      margin: 10px;
      transition: 0.5s ease;
    }
  </style>
  <div class="row mt-4">
    <hr>
    <div class="row">
      <a href="create.php" class="btn btn-primary hover">Tambah Data</a>
    </div>
    <hr class="mt-4">
    <table class="table table-striped" id="datatable">
      <thead class="thead-dark">

        <tr>
          <th>ID</th>
          <th>name</th>
          <th>Nisn</th>
          <th>alamat</th>
          <th>no_telp</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = 1;
        while ($row = mysqli_fetch_array($query)) {
        ?>

          <tr>
            <td>
              <?= $id ?>
            </td>
            <td>
              <?= $row['nama'] ?>
            </td>
            <td>
              <?= $row['nisn'] ?>
            </td>
            <td>
              <?= $row['alamat'] ?>
            </td>
            <td>
              <?= $row['no_telp'] ?>
            </td>
            <td>
              <a href="eye.php?id=<?= $row['id'] ?>" class="btn btn-warning"><i class="bi bi-eye"></i></a>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
              <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger"><i class="bi bi-x-circle"></i></a>
            </td>
          </tr>
        <?php
          $id++;
        }
        ?>
      </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
      new DataTable('#datatable');
    </script>
