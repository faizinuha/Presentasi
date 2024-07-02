<?php
// Mengimpor file 'db.php' yang berisi koneksi ke database
require '../db.php';
include '../layouts/navbar.php';

// Inisialisasi variabel untuk menyimpan pesan hasil operasi tambah
$message = '';

// Memproses form jika ada permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil nilai yang dikirimkan dari form
    $nama = $_POST['nama'];

    // Query SQL untuk menambahkan data baru ke dalam tabel organisasi
    $sql = "INSERT INTO organisasi (nama) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama);

    // Mengeksekusi statement
    if ($stmt->execute()) {
        // Jika tambah data berhasil, redirect ke halaman index
        header("Location: organisasi.php");
        exit;
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        $message = "Error: " . $conn->error;
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
    <title>Tambah Organisasi</title>
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
        <h2 class="my-4">Tambah Organisasi</h2>
        <!-- Form untuk menambahkan data organisasi baru -->
        <div class="form-container">
            <form method="POST">
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Organisasi:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="organisasi.php" class="btn btn-secondary">Kembali</a>
                <p class="text-danger mt-3"><?= htmlspecialchars($message) ?></p>
            </form>
        </div>
    </div>

    <!-- Mengimpor JavaScript Bootstrap 5 dan dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
