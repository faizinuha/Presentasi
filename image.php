<?php
$title = "profile-uni";
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/layouts/navbar.php';
?>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- bosstraps -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<style>
  .de {
    margin-top: 100px;
  }

  .biography {
    margin-top: 40px;
    padding-left: 15px;
  }

  .image {
    position: relative;
    margin-top: 5%;
    right: -80px;
    width: 200px;
    border-radius: 30px;
  }

  .staff-container {
    margin-top: 40px;
  }

  .staff-member {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 20px;
  }

  .staff-member img {
    width: 100px;
    height: auto;
    margin-right: 20px;
  }

  .staff-details {
    max-width: 600px;
  }

  .staff-details p {
    margin: 5px 0;
  }

  .staff-email {
    color: gray;
  }
</style>
<div class="container de">
  <div class="card mb-3 mx-auto">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="img/ketua-university.jpeg" class="img-fluid rounded-pill " alt="Profile Image" data-aos="fade-up-right" >
      </div>
      <img src="img/Toin-Univ-of-Yokohama-Central.jpg" alt="" class="image" data-aos="fade-up-left">
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Tsutomu Miyasaka</h5>
          <p>Professor, Doctor of Engineering</p>
          <p class="card-text">Tsutomu Miyasaka is a key figure at [Toin-Univ-of-Yokohama-Central] as he is the university president.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
  <div class="biography card">
    <h1>Biography: Prof. Dr. Tsutomu Miyasaka</h1>
    <p>Prof. Dr. Tsutomu Miyasaka received his Doctor <br> of Engineering from The University of <br> Tokyo in 1981. He began his career at Fuji Photo Film Co., where he conducted R&D on high-sensitivity photographic materials, lithium-ion secondary batteries, and artificial photoreceptor design, all related to electrochemistry and photochemistry.</p>
    <p>In 2001, he joined Toin University of Yokohama <br> (TUY) Graduate School of Engineering to <br> continue his work in photoelectrochemistry. From 2006 to 2009, he served as the dean of the Graduate School, and from 2005 to 2010, he was a guest professor at The University of Tokyo. His main research focus has been on the development of solution-printable and lightweight flexible photovoltaic (PV) cells.</p>
    <p>Since discovering the organic-inorganic perovskite as <br> a PV material in 2006, his research has <br> concentrated on lead halide perovskite PV cells. In 2004, he founded Peccell Technologies, a TUY-based company, where he serves as CEO. In 2009, he received a Ministry of Science & Education prize for his achievements in green sustainable solar cell technology. He currently directs R&D teams for national research programs NEDO and JST, focusing on dye-sensitized and perovskite solar cells.</p>
  </div>
</div>


<div class="container staff-container">
  <h2>Staff</h2>
  <div class="staff-member">
    <img src="img/staf/ikegami_m.jpg" alt="Masashi Ikegami" data-aos="fade-left">
    <div class="staff-details">
      <p><strong>Faculty of Biomedical Engineering, Graduate School of Engineering</strong></p>
      <p>Professor</p>
      <p><strong>Masashi Ikegami</strong></p>
      <p>Doctor (Science)</p>
      <p>Specialty: Organic photochemistry, Dye-sensitised solar cell</p>
      <p>TEL: 045-974-5055</p>
      <p class="staff-email">Email: ikegami_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
  <div class="staff-member">
    <img src="img/staf/shibayama.jpg" alt="Naoyuki Shibayama" data-aos="fade-right">
    <div class="staff-details">
      <p><strong>Faculty of Biomedical Engineering, Graduate School of Engineering</strong></p>
      <p>Assistant Professor</p>
      <p><strong>Naoyuki Shibayama</strong></p>
      <p>Doctor (engineering)</p>
      <p>A specialty: Materials engineering, organic photoelectric conversion</p>
      <p>TEL: 045-974-5127</p>
      <p class="staff-email">Email: shibayama_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
  <div class="staff-member">
    <img src="img/staf/numata.jpg" alt="Yohei Numata" data-aos="fade-left">
    <div class="staff-details">
      <p><strong>The University of Tokyo, Research Center for Advanced Science and Technology</strong></p>
      <p>Designated Lecturer</p>
      <p><strong>Yohei Numata</strong></p>
      <p>Doctor(Science)</p>
      <p>Specialty： Organic chemistry, Organic photoelectric cell</p>
      <p>TEL：（Tokyo University branch office）03-5452-5045</p>
      <p class="staff-email">Email： y_numata_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
  <div class="staff-member">
    <img src="img/staf/Cojocaru 1.png" alt="Yohei Cojocaru" data-aos="fade-right">
    <div class="staff-details">
      <p><strong>Faculty of Biomedical Engineering, Graduate School of Engineering</strong></p>
      <p>Assistant Professor</p>
      <p><strong>Naoyuki Shibayama</strong></p>
      <p>Doctor (engineering)</p>
      <p>A specialty: Materials engineering, organic photoelectric conversion</p>
      <p>TEL: 045-974-5127</p>
      <p class="staff-email">Email: shibayama_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
  <div class="staff-member">
    <img src="img/staf/Ajay20200820.jpeg" alt="Ajay Kumar" data-aos="fade-left">
    <div class="staff-details">
      <p><strong>Faculty of Biomedical Engineering, Graduate School of Engineering</strong></p>
      <p>Assistant Professor</p>
      <p><strong>Naoyuki Shibayama</strong></p>
      <p>Doctor (engineering)</p>
      <p>A specialty: Materials engineering, organic photoelectric conversion</p>
      <p>TEL: 045-974-5127</p>
      <p class="staff-email">Email: shibayama_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
  <h2>Secretary</h2>
  <div class="staff-member">
    <img src="img/staf/ohde.jpg" alt="mayumi Ohde" data-aos="fade-right">
    <div class="staff-details">
      <p><strong>Faculty of Biomedical Engineering, Graduate School of Engineering</strong></p>
      <p>Assistant Professor</p>
      <p><strong>Mayumi Ohde</strong></p>
      <p>Doctor (engineering)</p>
      <p>A specialty: Materials engineering, organic photoelectric conversion</p>
      <p>TEL: 045-974-5127</p>
      <p class="staff-email">Email: shibayama_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
  <h3>Project Manager</h3>
  <div class="staff-member">
    <img src="img/staf/Guo Zhanglin.jpg" alt="Guo Zhangli" data-aos="fade-right">
    <div class="staff-details">
      <p><strong>Faculty of Biomedical Engineering, Graduate School of Engineering</strong></p>
      <p>Assistant Professor</p>
      <p><strong>Mayumi Ohde</strong></p>
      <p>Doctor (engineering)</p>
      <p>A specialty: Materials engineering, organic photoelectric conversion</p>
      <p>TEL: 045-974-5127</p>
      <p class="staff-email">Email: shibayama_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
  <div class="staff-member">
    <img src="img/staf/Trupti.jpg" alt="trupri behera" data-aos="fade-right">
    <div class="staff-details">
      <p><strong>Faculty of Biomedical Engineering, Graduate School of Engineering</strong></p>
      <p>Assistant Professor</p>
      <p><strong>Mayumi Ohde</strong></p>
      <p>Doctor (engineering)</p>
      <p>A specialty: Materials engineering, organic photoelectric conversion</p>
      <p>TEL: 045-974-5127</p>
      <p class="staff-email">Email: shibayama_at_toin.ac.jp (Please change _at_ to @)</p>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
   AOS.init();
</script>