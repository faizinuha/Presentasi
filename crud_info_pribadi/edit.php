<?php
require_once __DIR__ . "/db.php";
// require_once __DIR__ . "/navbar.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Ambil data siswa berdasarkan ID
  $query = mysqli_query($koneksi, "SELECT * FROM info_pribadi WHERE id='$id'");
  $row = mysqli_fetch_array($query);
}

if (isset($_POST['submit'])) {
  $input = ['name', 'alamat', 'no_telp'];
  $cond = true;

  foreach ($input as $value) {
    if (empty($_POST[$value])) {
      echo '<script>alert("' . $value . ' harus diisi")</script>';
      $cond = false; // Mengubah 'break' menjadi 'false' agar kondisi tidak selalu benar jika ada yang kosong
      break;
    }
  }

  // Mengambil data dari input form
  $nama = htmlentities($_POST['nama']);
  $alamat = htmlentities($_POST['alamat']);
  $no_telp = htmlspecialchars($_POST['no_telp']);

  if ($cond) {
    // Query update data siswa
    $query = mysqli_query($koneksi, "UPDATE info_pribadi SET 
      nama='$nama', 
      alamat='$alamat',  
      no_telp='$no_telp' 
      WHERE id='$id'");

    if ($query) {
      echo '<script>alert("Berhasil Update Data")</script>';
      echo '<script>window.location.href="index.php"</script>';
    } else {
      echo '<script>alert("Update Gagal")</script>';
      echo '<script>window.location.href="edit.php?id=' . $id . '"</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1 class="mt-5">Edit Data</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?= $row['nama'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?= $row['alamat'] ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Nomor Telepon</label>
          <input type="text" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telepon" value="<?= $row['no_telp'] ?>">
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-success" type="submit" name="submit">
          Edit Data
        </button>
        <a href="index.php" class="btn btn-danger">Back</a>
      </div>
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
