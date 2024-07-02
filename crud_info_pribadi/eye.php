<?php
require_once __DIR__ . '/db.php';
include '../layouts/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6 mt-10 bg-white rounded-lg shadow-md">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($conn, "SELECT * FROM info_pribadi WHERE id = $id");
            // Mengambil Data dari Database
            if ($query && mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1 class="text-2xl font-bold text-blue-500 mb-4 text-center">Detail Data Mahasiswa</h1>
                <div class="grid grid-cols-1 gap-4">
                    <!-- <div class="p-4 bg-blue-100 rounded-lg">
                        <h2 class="text-blue-500 font-bold">ID</h2>
                        <p class="text-gray-700"><?= htmlspecialchars($data['id']) ?></p>
                    </div> -->
                    <div class="p-4 bg-green-100 rounded-lg">
                        <h2 class="text-green-500 font-bold">Nama Mahasiswa</h2>
                        <p class="text-gray-700"><?= htmlspecialchars($data['nama']) ?></p>
                    </div>
                    <div class="p-4 bg-yellow-100 rounded-lg">
                        <h2 class="text-yellow-500 font-bold">Nim</h2>
                        <p class="text-gray-700"><?= htmlspecialchars($data['Nim']) ?></p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded-lg">
                        <h2 class="text-gray-500 font-bold">Alamat</h2>
                        <p class="text-gray-700"><?= htmlspecialchars($data['alamat']) ?></p>
                    </div>
                    <div class="p-4 bg-red-100 rounded-lg">
                        <h2 class="text-red-500 font-bold">No. Telepon</h2>
                        <p class="text-gray-700"><?= htmlspecialchars($data['no_telp']) ?></p>
                    </div>
                </div>
                <a href="index.php" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-red-500 transition-colors">Kembali</a>
            <?php } else { ?>
                <p class="text-red-500 font-bold">Data Mahasiswa tidak ditemukan.</p>
            <?php }
        } else { ?>
            <p class="text-red-500 font-bold">ID Mahasiswa tidak valid.</p>
        <?php } ?>
    </div>

</body>

</html>
