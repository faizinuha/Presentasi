<?php
require_once __DIR__ . "/db.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
 $query = mysqli_query($conn,"DELETE FROM info_pribadi WHERE id='$id'");
 
 echo '<script>alert ("Berhasil Hapus Postingan")</script>';
    echo '<script>window.location.href="index.php"</script>';
}
    