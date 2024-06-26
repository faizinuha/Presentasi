<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Data Dosen</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Dosen</th>
            <th>Alamat Dosen</th>
            <th>No Telp</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT id, nama_dosen, alamat_dosen, no_telp FROM data_dosen";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama_dosen"]. "</td><td>" . $row["alamat_dosen"]. "</td><td>" . $row["no_telp"]. "</td>";
                echo "<td><a href='update.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a> <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No results</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
