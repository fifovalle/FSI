<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/buku-pedoman.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-pedoman">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row header-pedoman text-center">
                    <div class="col-md-12 mt-md-5 col-sm-12 ">
                        <h1>Buku Pedoman Akademik</h1>
                        <a href="http://baa.unjani.ac.id/wp-content/uploads/2023/12/PERATURAN-AKADEMIK-UNJANI-Permen-53-2023-PERUBAHAN-1.pdf" target="_blank"><img src="../assets/img/pedoman-buku/1.jpg" class="img-fluid mt-md-5"></a>
                    </div>
                    <div class="col-md-12 mt-md-5 col-sm-12">
                        <a href="http://baa.unjani.ac.id/wp-content/uploads/2023/08/PEDOMAN-KEBEBASAN-AKADEMIK-KEBEBASAN-MIMBAR-AKADEMIK-DAN-OTONOMI-KEILMUAN-UNJANI.pdf" target="_blank"><img src="../assets/img/pedoman-buku/2.jpg" class="img-fluid"></a>
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