<?php
// Konfigurasi koneksi ke database
require_once __DIR__ . '/db.php'; // Pastikan file ini berisi konfigurasi koneksi database

// Memeriksa koneksi ke database
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk mendapatkan total data dari tabel
function getTotalData($conn, $query) {
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        return 0;
    }
}

$total_data_dosen = getTotalData($conn, "SELECT COUNT(*) as total FROM data_dosen");
$total_info_pribadi = getTotalData($conn, "SELECT COUNT(*) as total FROM info_pribadi");
$total_jurusan_fakultas = getTotalData($conn, "SELECT COUNT(*) as total FROM jurusan_fakultas");
$total_organisasi = getTotalData($conn, "SELECT COUNT(*) as total FROM organisasi");
$total_students = getTotalData($conn, "SELECT COUNT(*) as total FROM students");

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
  <!-- Mengimpor Boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Jumlah Semua Data</h1>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Dosen</h5>
            <p class="card-text">
              <?php echo htmlspecialchars($total_data_dosen); ?>
              <i class='bx <?php echo $total_data_dosen > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Info Pribadi</h5>
            <p class="card-text">
              <?php echo htmlspecialchars($total_info_pribadi); ?>
              <i class='bx <?php echo $total_info_pribadi > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jurusan dan Fakultas</h5>
            <p class="card-text">
              <?php echo htmlspecialchars($total_jurusan_fakultas); ?>
              <i class='bx <?php echo $total_jurusan_fakultas > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Organisasi</h5>
            <p class="card-text">
              <?php echo htmlspecialchars($total_organisasi); ?>
              <i class='bx <?php echo $total_organisasi > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Students</h5>
            <p class="card-text">
              <?php echo htmlspecialchars($total_students); ?>
              <i class='bx <?php echo $total_students > 0 ? "bx-check-circle" : "bx-x-circle"; ?>'></i>
            </p>
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
