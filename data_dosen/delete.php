<?php
include '../db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // 1. Ambil nama file gambar dari database
    $stmt = $conn->prepare("SELECT foto_dosen FROM data_dosen WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imageFile);
    $stmt->fetch();
    $stmt->close();

    if ($imageFile) {
        // 2. Hapus gambar dari folder
        $imagePath = 'uploads/' . $imageFile; // Sesuaikan path dengan folder tempat gambar disimpan

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // 3. Hapus entri dari database
    $stmt = $conn->prepare("DELETE FROM data_dosen WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo '<script>
            alert("Sukses Menghapus Data dan Gambar");
            window.location.href = "index.php";
        </script>';
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
