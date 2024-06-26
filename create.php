<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $organisasi_id = $_POST['organisasi_id'];
    $jurusan_fakultas_id = $_POST['jurusan_fakultas_id'];

    $sql = "INSERT INTO students (nama, organisasi_id, jurusan_fakultas_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $nama, $organisasi_id, $jurusan_fakultas_id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$organisasi_result = $conn->query("SELECT * FROM organisasi");
$jurusan_fakultas_result = $conn->query("SELECT * FROM jurusan_fakultas");

$organisasi = $organisasi_result->fetch_all(MYSQLI_ASSOC);
$jurusan_fakultas = $jurusan_fakultas_result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Create Student</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="organisasi_id">Organisasi:</label>
                <select class="form-control" id="organisasi_id" name="organisasi_id">
                    <?php foreach ($organisasi as $org): ?>
                        <option value="<?= $org['id'] ?>"><?= htmlspecialchars($org['nama']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jurusan_fakultas_id">Jurusan Fakultas:</label>
                <select class="form-control" id="jurusan_fakultas_id" name="jurusan_fakultas_id">
                    <?php foreach ($jurusan_fakultas as $jur): ?>
                        <option value="<?= $jur['id'] ?>"><?= htmlspecialchars($jur['nama']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
