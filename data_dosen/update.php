<?php
include 'db.php';

// Proses form jika method adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_dosen = $_POST["nama_dosen"];
    $alamat_dosen = $_POST["alamat_dosen"];
    $no_telp = $_POST["no_telp"];

    // Memeriksa apakah ada file foto yang diunggah
    if (!empty($_FILES["foto_dosen"]["name"])) {
        // Upload Foto
        $target_dir = "uploads/";
        $foto_dosen = basename($_FILES["foto_dosen"]["name"]);
        $target_file = $target_dir . $foto_dosen;
        move_uploaded_file($_FILES["foto_dosen"]["tmp_name"], $target_file);

        // Query untuk mengupdate data dosen dengan foto
        $sql = "UPDATE data_dosen SET nama_dosen='$nama_dosen', alamat_dosen='$alamat_dosen', no_telp='$no_telp', foto_dosen='$foto_dosen' WHERE id=$id";
    } else {
        // Query untuk mengupdate data dosen tanpa foto
        $sql = "UPDATE data_dosen SET nama_dosen='$nama_dosen', alamat_dosen='$alamat_dosen', no_telp='$no_telp' WHERE id=$id";
    }

    // Mengeksekusi query dan memeriksa hasilnya
    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location.href = "index.php";</script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Mengambil data dosen berdasarkan ID
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT id, nama_dosen, alamat_dosen, no_telp, foto_dosen FROM data_dosen WHERE id=$id";
    $result = $conn->query($sql);

    // Memeriksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo '<script>window.location.href = "index.php";</script>';
    }
    
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Update Data Dosen</h2>
    <?php if (isset($row)): ?>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_dosen">Nama Dosen:</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?php echo htmlspecialchars($row['nama_dosen']); ?>">
        </div>
        <div class="form-group">
            <label for="alamat_dosen">Alamat Dosen:</label>
            <input type="text" class="form-control" id="alamat_dosen" name="alamat_dosen" value="<?php echo htmlspecialchars($row['alamat_dosen']); ?>">
        </div>
        <div class="form-group">
            <label for="no_telp">No Telp:</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($row['no_telp']); ?>">
        </div>
        <div class="form-group">
            <label for="foto_dosen">Foto Dosen:</label>
            <input type="file" class="form-control" id="foto_dosen" name="foto_dosen">
            <!-- Menampilkan foto yang sudah ada -->
            <?php if (!empty($row['foto_dosen'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($row['foto_dosen']); ?>" alt="Foto Dosen" class="mt-2" width="100">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <?php endif; ?>
</div>
</body>
</html>
