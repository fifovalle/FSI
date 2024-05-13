<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/laboratorium.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-lab">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row header-lab text-center">
                    <div class="title-lab">
                        <h1>Laboratorium</h1>
                        <p>Laboratorium adalah ruang khusus yang digunakan untuk melakukan eksperimen, penelitian, pengujian, dan kegiatan praktis dalam berbagai disiplin ilmu pengetahuan. Fasilitas ini dilengkapi dengan peralatan dan sarana yang dirancang untuk menghasilkan data empiris yang berguna dalam menguji, memahami, dan mengembangkan pengetahuan ilmiah. Pengelolaan dan penggunaan laboratorium beserta sarana yang ada diatur oleh masing-masing departemen dan program studi. Penggunaan laboratorium untuk praktikum matakuliah fakultas dikordinasikan antara dosen pengampu matakuliah dengan pengelola laboratorium terkait di bawah koordinator program studi yang bersangkutan.</p>
                    </div>
                    <div class="row labkom justify-content-between p-0">
                        <div class="col-md-5 mt-md-5 col-sm-12">
                            <div class="row lab-img">
                                <div class="col-md-12 text-end col-sm-12  p-0">
                                    <img src="../assets/img/laboratorium/labkom.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-md-5 col-sm-12 ">
                            <div class="keterangan1">
                                <h1>Laboratorium Komputer</h1>
                                <p>Laboratorium ini dilengkapi dengan komputer dan perangkat lunak yang relevan untuk pemrograman, analisis data, dan pengembangan perangkat lunak. Ada juga perangkat keras tambahan Fasilitas jaringan komputer memungkinkan akses ke internet mendukung eksperimen dalam lingkungan jaringan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row labkim justify-content-between">
                        <div class="col-md-6 mt-md-5 col-sm-12 ">
                            <div class="keterangan2">
                                <h1>Laboratorium Kimia</h1>
                                <p>Laboratorium kimia adalah sarana penting dalam penelitian dan eksperimen kimia. Di dalamnya terdapat meja kerja, alat, dan bahan kimia. Keselamatan dijamin dengan peralatan keselamatan, ventilasi, dan pemadam kebakaran. Laboratorium ini mendukung pengembangan ilmu kimia dan mematuhi pedoman keselamatan yang ketat.</p>
                            </div>
                        </div>
                        <div class="col-md-5 mt-md-5 col-sm-12 ">
                            <div class="row lab-img">
                                <div class="col-md-12 text-end col-sm-12 ">
                                    <img src="../assets/img/laboratorium/labkim.png" class="img-fluid" alt="">
                                </div>
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