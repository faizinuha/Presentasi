<?php
// Mengimpor file 'db.php' yang berisi koneksi ke database
require '../db.php';
require '../layouts/navbar.php';
// // Mengimpor file 'navbar.php' untuk menampilkan navigasi
// require 'layouts/navbar.php';

// Mengecek apakah parameter 'id' telah diterima melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Jika tidak ada atau kosong, redirect ke halaman index
    header("Location: /index.php");
    exit;
}

// Mengambil nilai 'id' dari parameter URL dan menghindari SQL injection
$id = $conn->real_escape_string($_GET['id']);

// Query SQL untuk mengambil data organisasi berdasarkan id
$sql = "SELECT id, nama FROM organisasi WHERE id = $id";

// Eksekusi query dan simpan hasilnya ke dalam variabel $result
$result = $conn->query($sql);

// Mengecek apakah data ditemukan berdasarkan id
if ($result->num_rows > 0) {
    $organisasi = $result->fetch_assoc();
} else {
    // Jika tidak ditemukan, redirect ke halaman index
    header("Location: /index.php");
    exit;
}

// Inisialisasi variabel untuk menyimpan pesan hasil operasi edit
$message = '';

// Memproses form jika ada permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil nilai yang dikirimkan dari form
    $nama = $_POST['nama'];

    // Query SQL untuk melakukan update data organisasi berdasarkan id
    $sqlUpdate = "UPDATE organisasi SET nama = ? WHERE id = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("si", $nama, $id);

    // Mengeksekusi statement
    if ($stmt->execute()) {
        // Jika update berhasil, redirect ke halaman index
        header("Location: organisasi.php");
        exit;
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        $message = "Error updating record: " . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organisasi</title>
    <!-- Mengimpor CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/dist/boxicons.css">
    <style>
        body {
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="my-4">Edit Organisasi</h2>
        <!-- Form untuk mengedit data organisasi -->
        <div class="form-container">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Organisasi:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($organisasi['nama']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <p class="text-danger"><?= $message ?></p>
            </form>
        </div>
    </div>

    <!-- Mengimpor JavaScript Bootstrap 5 dan dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.min.js"></script>
</body>

</html>
