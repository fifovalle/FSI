<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/kalender-akademik.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-kalender">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row header-kalender text-center">
                    <div class="col-md-12 mt-md-5 col-sm-12 ">
                        <h1>Kalender Akademik Tahun Anggaran 2023/2024</h1>
                        <img src="../assets/img/kalender-akademik/1.jpg" class="img-fluid">
                        <img src="../assets/img/kalender-akademik/2.jpg" class="img-fluid">
                        <a href="http://baa.unjani.ac.id/wp-content/uploads/2023/05/SKEP-154-UNJANI-2023-TENTANG-KALENDER-AKADMEIK-2023-2024.pdf" target="_blank" class="mt-md-5"> Download disini</a>
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