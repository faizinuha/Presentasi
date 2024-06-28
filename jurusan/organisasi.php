<?php
// Mengimpor file 'db.php' yang berisi koneksi ke database
require 'db.php';

// Mengimpor file 'navbar.php' untuk menampilkan navigasi
require '../layouts/navbar.php';

// Query untuk mengambil data ID dan Nama Organisasi dari tabel organisasi
$sql = "SELECT id, nama FROM organisasi";

// Eksekusi query dan simpan hasilnya ke dalam variabel $result
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisasi</title>
    <!-- Mengimpor CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Mengimpor Boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
            /* body {
                padding: 20px;
            } */

        .table-container {
            margin-top: 20px;
        }

        .btn-custom {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="my-4">Organisasi</h2>
        <!-- Tombol untuk membuat data baru -->
        <a href="create_orga.php" class="btn btn-primary btn-custom"><i class='bx bx-plus'></i> Tambah Organisasi</a>
        <div class="table-container">
            <!-- Tabel untuk menampilkan data organisasi -->
            <table class="table table-bordered table-hover" id="data">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama Organisasi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop untuk mengambil setiap baris data dari hasil query
                    while ($organisasi = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <!-- Menampilkan ID -->
                            <td><?= $organisasi['id'] ?></td>
                            <!-- Menampilkan nama organisasi dengan htmlspecialchars untuk keamanan -->
                            <td><?= htmlspecialchars($organisasi['nama']) ?></td>
                            <td>
                                <!-- Tombol Edit dan Delete -->
                                <a href="orga.edit.php?id=<?= $organisasi['id'] ?>" class="btn btn-warning btn-sm"><i class='bx bx-pencil'></i></a>
                            </td    >
                        </tr>
                    <?php
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <!-- Mengimpor DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
</body>

</html>

<?php
// Menutup koneksi database
$conn->close();
?>
