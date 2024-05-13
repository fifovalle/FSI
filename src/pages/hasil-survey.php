<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/survey.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-hasilsurvey">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row header-hasilsurvey text-center">
                    <div class="col-md-12 mt-md-5 col-sm-12 ">
                        <h1>Hasil Survey</h1>
                        <img src="../assets/img/hasil-survey/survey1.png" class="img-fluid mt-md-5">
                    </div>
                    <div class="col-md-12 mt-md-5 col-sm-12">
                        <img src="../assets/img/hasil-survey/survey2.png" class="img-fluid">
                    </div>
                    <div class="col-md-12 mt-md-5 col-sm-12">
                        <img src="../assets/img/hasil-survey/survey3.png" class="img-fluid">
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