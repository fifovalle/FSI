<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/pimpinan.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-pimpinan">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row pimpinan">
                    <div class="col-md-6 text-end col-sm-12">
                        <img class="img-fluid" src="../assets/img/Pimpinan/dekan1.png" alt="">
                    </div>
                    <div class="col-md-6 text-start col-sm-12">
                        <div class="teks-pimpinan">
                            <h2>DEKAN</h2>
                            <h5>Dr. Anceu Murniati, S.Si., M.Si.</h5>
                            <h6>NIP/NID : 412126369</h6>
                        </div>
                    </div>
                </div>
                <div class="row wadek text-center align-items-center justify-content-center">
                    <div class="col-md-12 col-sm-12">
                        <div class="container-fluid">
                            <div class="header-wadek">
                                <h2>WAKIL DEKAN FAKULTAS</h2>
                                <lead>Drag to Look</lead>
                            </div>
                            <div class="card-carousel">
                                <div class="card" id="1">
                                    <div class="image-container"></div>
                                    <div class="title-wadek">
                                        <h4>WAKIL DEKAN III</h4>
                                        <h6>Agus Komarudin, S.Kom., M.T</h6>
                                    </div>
                                </div>
                                <div class="card" id="2">
                                    <div class="image-container"></div>
                                    <div class="title-wadek">
                                        <h4>WAKIL DEKAN I</h4>
                                        <h6>Dr. Arie Hardian, S.Si., M.Si</h6>
                                    </div>
                                </div>
                                <div class="card" id="3">
                                    <div class="image-container"></div>
                                    <div class="title-wadek">
                                        <h4>WAKIL DEKAN II</h4>
                                        <h6>Wina Witanti, S.T., M.T.</h6>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="visuallyhidden card-controller">Carousel controller</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/js/pimpinan.js"></script>
    <script src="../assets/js/tentang-fakultas.js"></script>
    <!-- MAIN END -->

    <!-- FOOTER START -->
    <?php
    include('../partials/footer.php');
    ?>
    <!-- FOOTER END -->
</body>

</html>