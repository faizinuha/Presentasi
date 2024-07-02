<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_dosen = $_POST["nama_dosen"];
    $alamat_dosen = $_POST["alamat_dosen"];
    $no_telp = $_POST["no_telp"];

    // Upload Foto
    $target_dir = "uploads/";
    $foto_dosen = basename($_FILES["foto_dosen"]["name"]);
    $target_file = $target_dir . $foto_dosen;
    move_uploaded_file($_FILES["foto_dosen"]["tmp_name"], $target_file);

    $sql = "INSERT INTO data_dosen (nama_dosen, alamat_dosen, no_telp, foto_dosen)
            VALUES ('$nama_dosen', '$alamat_dosen', '$no_telp', '$foto_dosen')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
                alert("Berhasil Tambah Postingan");
                window.location.href = "index.php";
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Tambah Data Dosen</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_dosen">Nama Dosen:</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
        </div>
        <div class="form-group">
            <label for="alamat_dosen">Alamat Dosen:</label>
            <input type="text" class="form-control" id="alamat_dosen" name="alamat_dosen">
        </div>
        <div class="form-group">
            <label for="no_telp">No Telp:</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp">
        </div>
        <div class="form-group">
            <label for="foto_dosen">Foto Dosen:</label>
            <input type="file" class="form-control" id="foto_dosen"  name="foto_dosen" onchange="previewImage(this)" required >
            <img id="imagePreview" class="img-fluid mt-2" src="#" alt="Preview Image" style="display: none;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
     function previewImage(input) {
            var preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]); // Convert to base64 string
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
</script>
</body>
</html>
