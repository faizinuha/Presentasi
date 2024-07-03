<?php

include '../db.php';
include '../layouts/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-custom {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-container">
            <h2 class="mb-4">Data Dosen</h2>
            <a href="create.php" class="btn btn-success btn-custom"><i class='bx bx-plus'></i> Tambah Data Dosen</a>
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto Dosen</th>
                        <th>Nama Dosen</th>
                        <th>Alamat Dosen</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, nama_dosen, alamat_dosen, no_telp, foto_dosen FROM data_dosen";
                    $result = $conn->query($sql);
                    $id = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $id ?></td>
                                <td><img src="uploads/<?= htmlspecialchars($row['foto_dosen']) ?>" alt="Foto Dosen" width="100"></td>
                                <td><?= htmlspecialchars($row['nama_dosen']) ?></td>
                                <td><?= htmlspecialchars($row['alamat_dosen']) ?></td>
                                <td><?= htmlspecialchars($row['no_telp']) ?></td>
                                <td>
                                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm"><i class='bx bx-pencil'></i></a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                    <?php
                            $id++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>No results</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- bosstras[pas] -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>

<?php
$conn->close();
?>