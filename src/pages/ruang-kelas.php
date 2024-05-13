<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/ruang-kelas.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-kelas">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row header-kelas text-center">
                    <div class="title-kelas">
                        <h1>Ruang Kelas</h1>
                        <p>Tempat di mana dosen memberikan pelajaran kepada mahasiswa dan mahasiswi berinteraksi dengan dosen serta sesama mahasiswa. Ruang kelas sering menjadi pusat pendidikan di mana transfer pengetahuan, keterampilan, dan nilai-nilai pendidikan terjadi. Oleh karena itu, pengelolaan ruang kelas yang baik dan lingkungan yang mendukung pembelajaran adalah faktor penting dalam pembelajaran.</p>
                    </div>
                    <div class="col-md-6 mt-md-5 col-sm-12 ">
                        <div class="row kelas-img">
                            <div class="col-md-12 text-end col-sm-12 ">
                                <img src="../assets/img/kelas.png" class="img-fluid border border-0" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-5 col-sm-12">
                        <p class="keterangan-kelas">Untuk mendukung pembelajaran yang lebih dalam dan pemikiran kritis yang menunjang kegiatan akademik. FSI Unjani telah dfasilitasi dengan ruang kelas/perkuliahan dengan fasilitas yang lengkap. Setiap ruang kelas/kuliah dilengkapi dengan jaringan internet dan in focus projector</p>
                    </div>
                </div>
            </div>
    </main>
    <script src="../assets/js/tentang-fakultas.js"></script>
    <!-- MAIN END -->

    <!-- FOOTER START -->
    <?php
    include('../partials/footer.php');
    ?>
    <!-- FOOTER END -->
</body>

</html>