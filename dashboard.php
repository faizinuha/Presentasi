<?php include('layouts/navbar.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toin University of Yokohama Central</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!-- data-aos -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <style>
    .main-Y {
      text-align: center;
    }

    .main-title {
      image-resolution: from-image;
      image-resolution: 300dpi;
      image-resolution: from-image 300dpi;
      image-resolution: 300dpi snap;
      width: 900px;
    }

    .card {
      margin: 1rem 0;
    }

    .img-rounded {
      border-radius: 0.25rem;
      margin-top: 1rem;
    }




    .card-img-top {
      border-radius: 20 30px;
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
  
    .card-footer {
      background-color: rgba(255, 255, 255, 0.8);
    }
    .card-body {
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .card-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, rgba(15, 37, 110, 1) 12%, rgba(26, 189, 162, 1) 61%, rgba(7, 21, 179, 1) 84%);
      background-blend-mode: normal;
      border-radius: 10px;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .card-body:hover .card-overlay {
      opacity: 1;
    }
    .card-body:hover .card-title {
      opacity: 1;
    }
    
  </style>
</head>

<body>
  <h2 class="text-center main-Y">Toin University of Yokohama Central</h2>
  <p class="text-center" >Welcome Daigaku University Toin University of Yokohama </p>
  <hr>
  <div class="card mb-3">
    <img src="img/deparment_toin.png" class="rounded mx-auto d-block main-title" alt="Opening">
    <div class="card-body">
      <h5 class="card-title text-center">Toin University of Yokohama Department</h5>
      <p class="card-text text-center">Department of Toin University of Yokohama Central</p>
    </div>
    <!-- Images -->
    <div class="row">
      <div class="col-md-6">
        <img src="img/Opening.png" class="img-fluid img-rounded" alt="Toin University Central"  data-aos="fade-right"  data-aos-delay="100"  data-aos-anchor-placement="top-center">
      </div>
      <div class="col-md-6"  data-aos="fade-left"  data-aos-delay="200"  data-aos-anchor-placement="top-center">
        <img src="img/Yokohama National university.jpg" class="img-fluid img-rounded" alt="Yokohama National University">
      </div>
    </div>
    <div class="container mt-5">
    <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="mb-4">Negara Paling Populer</h3>
    <p>Telah bekerja sama dengan University Toin-Univ-of-Yokohama</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card">
          <img src="negara/china.jpeg" class="card-img-top" alt="China">
          <div class="card-body">
            <h5 class="card-title">China</h5>
            <div class="card-overlay">
              <a href="#" class="btn btn-primary">Baca selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="negara/meksiko.jpg" class="card-img-top" alt="Meksiko">
          <div class="card-body">
            <h5 class="card-title">Meksiko</h5>
            <div class="card-overlay">
              <a href="#" class="btn btn-primary">Baca selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="negara/spayol.jpg" class="card-img-top" alt="Spanyol">
          <div class="card-body">
            <h5 class="card-title">Spanyol</h5>
            <div class="card-overlay">
              <a href="#" class="btn btn-primary">Baca selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="negara/Prancis.jpg" class="card-img-top" alt="Perancis">
          <div class="card-body">
            <h5 class="card-title">Perancis</h5>
            <div class="card-overlay">
              <a href="#" class="btn btn-primary">Baca selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="negara/selandia_baru.jpg" class="card-img-top" alt="Selandia Baru">
          <div class="card-body">
            <h5 class="card-title">Selandia Baru</h5>
            <div class="card-overlay">
              <a href="#" class="btn btn-primary">Baca selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="negara/malaysia.jpeg" class="card-img-top" alt="Malaysia">
          <div class="card-body">
            <h5 class="card-title">Malaysia</h5>
            <div class="card-overlay">
              <a href="#" class="btn btn-primary">Baca selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><hr>
  </div>


  <script>
    AOS.init();
  </script>
  <?php require_once __DIR__ . '/footer/footer.php'; ?>
</body>

</html>