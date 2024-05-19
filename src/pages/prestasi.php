<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/prestasi.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-prestasi">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row prestasi">
                    <div class="col-md-3 text-end col-sm-12">
                        <img class="img-fluid" src="../assets/img/prestasi/p2.jpg" alt="">
                    </div>
                    <div class="col-md-3 text-start col-sm-12">
                        <div class="teks-prestasi">
                            <h2>Rifaz Muhammad Sukma</h2>
                            <h5>Kegiatan : Capstone Project Bangkit 2023</h5>
                            <h6>Pencapaian : Juara 2</h6>
                            <h6>Tahun : 2023</h6>
                        </div>
                    </div>
                    <div class="col-md-3 text-end col-sm-12">
                        <img class="img-fluid" src="../assets/img/prestasi/p.jpg" alt="">
                    </div>
                    <div class="col-md-3 text-start col-sm-12">
                        <div class="teks-prestasi2">
                            <h2>Rifaz Muhammad Sukma Annisa Mufidah Sopia Saepurizal</h2>
                            <h5>Kegiatan : Konferensi Perpustakaan Digital Indonesia Ke-13</h5>
                            <h6>Pencapaian : Juara 1</h6>
                            <h6>Tahun : 2022</h6>
                        </div>
                    </div>
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