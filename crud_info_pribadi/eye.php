<?php
require_once __DIR__ . '/db.php';
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
                <table class="w-full border-collapse mt-4">
                    <tr>
                        <th class="border border-blue-500 p-3 bg-blue-500 text-white font-bold">ID</th>
                        <td class="border border-blue-500 p-3"><?= htmlspecialchars($data['id']) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-blue-500 p-3 bg-green-500 text-white font-bold">Nama Mahasiswa</th>
                        <td class="border border-blue-500 p-3"><?= htmlspecialchars($data['nama']) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-blue-500 p-3 bg-yellow-500 text-white font-bold">NISN</th>
                        <td class="border border-blue-500 p-3"><?= htmlspecialchars($data['nisn']) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-blue-500 p-3 bg-gray-500 text-white font-bold">Alamat</th>
                        <td class="border border-blue-500 p-3"><?= htmlspecialchars($data['alamat']) ?></td>
                    </tr>
                    <tr>
                        <th class="border border-blue-500 p-3 bg-red-500 text-white font-bold">No. Telepon</th>
                        <td class="border border-blue-500 p-3"><?= htmlspecialchars($data['no_telp']) ?></td>
                    </tr>
                </table>
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
