<?php
require '../db.php';
require '../layouts/navbar.php';
// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the current data for the given ID
    $sql = "SELECT * FROM jurusan_fakultas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $jurusan = $result->fetch_assoc();
    
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];

        // Update the data in the database
        $sql = "UPDATE jurusan_fakultas SET nama = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nama, $id);
        $stmt->execute();

        // Redirect to the index page
        header("Location: index.php");
        exit;
    }
} else {
    // If no ID is provided, redirect to the index page
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jurusan Fakultas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Edit Jurusan Fakultas</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Jurusan Fakultas:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($jurusan['nama']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
