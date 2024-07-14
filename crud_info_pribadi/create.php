<?php
require_once __DIR__ . "/db.php";
include '../layouts/navbar.php';

if (isset($_POST['submit'])) {
    $input = ['name', 'Nim', 'alamat', 'no_telp'];
    $cond = true;

    foreach ($input as $value) {
        if (empty($_POST[$value])) {
            $cond = false;
            echo '<script>alert("' . ucfirst($value) . ' harus diisi");</script>';
        }
    }

    if ($cond) {
        $name = htmlentities($_POST['name']);
        $Nim = htmlentities($_POST['Nim']);
        $alamat = htmlentities($_POST['alamat']);
        $no_telp = htmlentities($_POST['no_telp']);

        // Check if Nim already exists
        $checkStmt = $conn->prepare("SELECT * FROM info_pribadi WHERE Nim = ?");
        $checkStmt->bind_param("s", $Nim);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Nim sudah ada, silakan masukkan Nim yang berbeda.");</script>';
        } else {
            // Prepared Statement for Insertion
            $stmt = $conn->prepare("INSERT INTO info_pribadi (nama, Nim, alamat, no_telp) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $Nim, $alamat, $no_telp);

            if ($stmt->execute()) {
                echo '<script>
                    alert("Berhasil Tambah Postingan");
                    window.location.href = "index.php";
                </script>';
            } else {
                echo '<script>
                    alert("Gagal Tambah Postingan");
                    window.location.href = "create.php";
                </script>';
            }
            $stmt->close();
        }
        $checkStmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Data Mahasiswa</title>
    <style>
        .main-title {
            margin-top: 2rem;
        }
        .underline-danger {
            border-top: 3px solid #dc3545;
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center main-title">Tambah Data Mahasiswa</h1>
    <hr class="underline-danger">
    <form class="row g-3 needs-validation" method="post" novalidate>
        <div class="col-md-4">
            <label for="validationCustomName" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="validationCustomName" name="name" placeholder="Masukkan Nama Mahasiswa" required>
            <div class="invalid-feedback">
                Nama harus diisi.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomNim" class="form-label">Masukkan Nim</label>
            <input type="number" class="form-control" id="validationCustomNim" name="Nim" placeholder="Masukkan Nim (12)" maxlength="20" required>
            <div class="invalid-feedback">
                Nim harus diisi.Minimal 20 
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomAlamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="validationCustomAlamat" name="alamat" placeholder="Masukkan Alamat" required>
            <div class="invalid-feedback">
                Alamat Mohon  di isi.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomNoTelp" class="form-label">No. Telepon</label>
            <input type="number" class="form-control" id="validationCustomNoTelp" name="no_telp" placeholder="Masukkan No. Telepon" maxlength="12" required>
            <div class="invalid-feedback">
                No. Telepon harus diisi.
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="submit">Tambah Postingan</button>
            <a href="index.php" class="btn btn-outline-danger">Kembali</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpeD31t/Q5PaXapZ4N6sd09j60Sa90BA1VieurW/dAiS6JXm" crossorigin="anonymous"></script>
<script>
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>
