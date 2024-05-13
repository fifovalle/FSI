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
        <div class="section-survey">
            <div class="container-fluid p-0 text-center">
                <div class="row header-survey">
                    <div class="col-md-12 col-sm-12">
                        <h1>Survey</h1>
                        <ul class="text-start">
                            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfGGLwuNhXSIig_nPFF4bnljAk04HjVsuzoX3-EziDP7Npa_A/viewform">SURVEY KEPUASAN SUASANA AKADEMIK</a>(Diisi oleh DOSEN)</li>
                            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLScGYVuw-tpa6e7Dic87Q4mkRjYVk23c8M3kXJwDRembpqq4QQ/viewform">SURVEY KEPUASAN MITRA KERJA SAMA</a>(Diisi oleh MITRA)</li>
                            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeG6CThbtT0Ui9_X6ozo7Ei8f1E2MhU_aCplGQNnnS2IfevDw/viewform">SURVEY KEPUASAN TENAGA KEPENDIDIKAN</a> (Diisi oleh TENDIK)</li>
                            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLScjjfUJjBy_C5DAb_zJowJQX60KmqrmrrR3UtujmZ1wUviJ0w/viewform">SURVEY KEPUASAN MASYARAKAT</a>(Diisi oleh MASYARAKAT)</li>
                            <li><a href="https://fsi.ikaunjani.ac.id/pengguna">SURVEY KEPUASAN PENGGUNA LULUSAN</a>(Diisi oleh Pengguna Lulusan)</li>
                        </ul>
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