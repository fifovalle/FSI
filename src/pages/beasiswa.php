<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/beasiswa.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-beasiswa">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row beasiswa">
                    <div class="col-md-3 text-end col-sm-12">
                        <img class="img-fluid" src="../assets/img/beasiswa/b.jpg" alt="">
                    </div>
                    <div class="col-md-3 text-start col-sm-12">
                        <div class="teks-beasiswa">
                            <h2>Yolanda Charmenia Nadine Yusrin</h2>
                            <h5>Beasiswa Jabar Future Leaders Scholarship (JFLS)</h5>
                            <h6>Beasiswa Percepatan Akses Pendidikan Tinggi (1 Tahun)</h6>
                            <span>
                                <a href="https://www.instagram.com/p/Cw3xOpQPcHy/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA%3D%3D" target="_blank">
                                    <box-icon name='instagram-alt' type='logo'></box-icon>
                                </a>
                                <a href="https://beasiswa-jfl.jabarprov.go.id/" target="_blank">
                                    <box-icon name='globe'></box-icon>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 text-end col-sm-12">
                        <img class="img-fluid" src="../assets/img/beasiswa/b2.jpg" alt="">
                    </div>
                    <div class="col-md-3 text-start col-sm-12">
                        <div class="teks-beasiswa">
                            <h2>Dara Santika Putri Banaranto</h2>
                            <h5>Beasiswa Djarum Plus</h5>
                            <span>
                                <a href="https://www.instagram.com/p/CwxZdOhvGgz/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA%3D%3D" target="_blank">
                                    <box-icon name='instagram-alt' type='logo'></box-icon>
                                </a>
                                <a href="https://djarumbeasiswaplus.org/" target="_blank">
                                    <box-icon name='globe'></box-icon>
                                </a>
                            </span>
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