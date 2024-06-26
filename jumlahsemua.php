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
  <title>Jumlah Semua Data</title>
  <!-- Mengimpor Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

  <!-- Mengimpor Bootstrap JS dan dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Menutup koneksi database jika sudah selesai digunakan
mysqli_close($conn);
?>
