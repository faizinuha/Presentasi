<?php
// Mengimpor file 'db.php' yang berisi koneksi ke database
require 'db.php';

// Mengimpor file 'navbar.php' untuk menampilkan navigasi
require 'layouts/navbar.php';

// Query untuk mengambil data dari tabel students, organisasi, dan jurusan_fakultas
$sql = "SELECT students.id, students.nama, organisasi.nama as organisasi, jurusan_fakultas.nama as jurusan 
        FROM students 
        JOIN organisasi ON students.organisasi_id = organisasi.id 
        JOIN jurusan_fakultas ON students.jurusan_fakultas_id = jurusan_fakultas.id";

// Eksekusi query dan simpan hasilnya ke dalam variabel $result
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <!-- Mengimpor CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Mengimpor Boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
   

    <style>
        /* body {
            padding: 20px;
        } */

        /* .table-container {
            margin-top: 20px;
        } */

        .btn-custom {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="my-4">Students</h2>
        <!-- Tombol untuk membuat data baru -->
        <a href="create.php" class="btn btn-primary btn-custom"><i class='bx bx-plus'></i> Create New Student</a>
        <div class="table-container">
            <!-- Tabel untuk menampilkan data students -->
            <table class="table table-bordered table-hover" id="data">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Organisasi</th>
                        <th>Jurusan Fakultas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Inisialisasi ID untuk nomor urut
                    $id = 1;

                    // Loop untuk mengambil setiap baris data dari hasil query
                    while ($student = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <!-- Menampilkan ID -->
                            <td><?= $id ?></td>
                            <!-- Menampilkan nama dengan htmlspecialchars untuk keamanan -->
                            <td><?= htmlspecialchars($student['nama']) ?></td>
                            <!-- Menampilkan organisasi dengan htmlspecialchars untuk keamanan -->
                            <td><?= htmlspecialchars($student['organisasi']) ?></td>
                            <!-- Menampilkan jurusan dengan htmlspecialchars untuk keamanan -->
                            <td><?= htmlspecialchars($student['jurusan']) ?></td>
                            <td>
                                <!-- Tombol Edit dan Delete -->
                                <a href="update.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm"><i class='bx bx-pencil'></i></a>
                                <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')"><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>
                    <?php
                        // Increment ID untuk baris berikutnya
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