<?php
require 'db.php';

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id = $id")->fetch_assoc();
$organisasi = $conn->query("SELECT * FROM organisasi")->fetch_all(MYSQLI_ASSOC);
$jurusan_fakultas = $conn->query("SELECT * FROM jurusan_fakultas")->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $organisasi_id = $_POST['organisasi_id'];
    $jurusan_fakultas_id = $_POST['jurusan_fakultas_id'];

    $sql = "UPDATE students SET nama = ?, organisasi_id = ?, jurusan_fakultas_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('siii', $nama, $organisasi_id, $jurusan_fakultas_id, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
// Mengambil Data dari Database
// $student = $conn->query("SELECT * FROM students WHERE id = $id")->fetch_assoc();
// $organisasi = $conn->query("SELECT * FROM organisasi")->fetch_all(MYSQLI_ASSOC);
// $jurusan_fakultas = $conn->query("SELECT * FROM jurusan_fakultas")->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Edit Student</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $student['nama'] ?>" required>
            </div>

            <div class="form-group">
                <label for="organisasi_id">Organisasi:</label>
                <select class="form-control" id="organisasi_id" name="organisasi_id">
                    <?php foreach ($organisasi as $org): ?>
                        <option value="<?= $org['id'] ?>" <?= $org['id'] == $student['organisasi_id'] ? 'selected' : '' ?>><?= $org['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jurusan_fakultas_id">Jurusan Fakultas:</label>
                <select class="form-control" id="jurusan_fakultas_id" name="jurusan_fakultas_id">
                    <?php foreach ($jurusan_fakultas as $jur): ?>
                        <option value="<?= $jur['id'] ?>" <?= $jur['id'] == $student['jurusan_fakultas_id'] ? 'selected' : '' ?>><?= $jur['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
