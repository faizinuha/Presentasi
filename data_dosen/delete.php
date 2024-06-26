<?php
include 'db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM data_dosen WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        alert("Sukses Rmoving");
        window.location.href = "index.php";
    </script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
