<?php
require_once __DIR__. '/db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iK9t9gg+8R6e65mMkOcK5L/D5/F9w/JIcimoI9fUK5tr5+Uq6PVEUaI0N" crossorigin="anonymous">
    <style>

        .container {
        
            padding: 20px;
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #007bff;
            /* Change border color */
            padding: 12px;
            /* Increase padding for better spacing */
            text-align: left;
            /* Align text to the left */
        }

        th {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
        }

        .btn-action {
            margin-right: 5px;
        }

        .text-danger {
            color: #007bff;
            /* Red color for error messages */
            font-weight: bold;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #6c757d;
        }
        .Colors{
          background-color: #007bff;
          margin: 10 20px;
          padding: 10px;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          border-radius: 10px 25px 30px;
          font-size: 100;
          
        }
        .Colors:hover{
          background-color: #dc3545;
          margin: 10 20px;
          padding: 10px;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          border-radius: 10px 25px 30px;
          font-size: 100;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
       

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($koneksi, "SELECT * FROM info_pribadi WHERE id = $id");
          
            if ($query && mysqli_num_rows($query) > 0) {
              $id = 1;
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1>Detail Data Murid</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>
                            <?= $id ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td>
                            <?= $data['nama'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>
                            <?= $data['alamat'] ?>
                        </td>
                    </tr>
                    <tr>
                      <th>no_telp</th>
                      <td>
                        <?= $data['no_telp']?>
                      </td>
                    </tr>
                    <a href="index.php" class="Colors">Kembali</a>
                </table>
            <?php } else { ?>
              $id++;
                <p class="text-danger">Data Mahasiswa tidak ditemukan.</p>
            <?php }
        } else { ?>
            <p class="text-danger">ID Mahasiswa tidak valid.</p>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-eA2JF5Rv/ZOdW4RDNTwSXJCJ9GCkDxiD61U5iFowJAgKwme4f85+tkI2F5xZC3Fsw"
        crossorigin="anonymous"></script>

</body>

</html>