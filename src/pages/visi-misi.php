<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/visi-misi.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-visimisi">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row">
                    <div class="col-md-12 col-sm-12 header-imgVisiMisi">
                        <img src="../assets/img/gedung-fsi2.png" class="img-fluid">
                    </div>
                    <div class="row teks-fakultas">
                        <div class="col-md-6 col-sm-12 teks-visi text-center">
                            <h1>Visi</h1>
                            <p>Menjadi fakultas yang <strong>unggul, bertaraf internasional, berjiwa kebangsaan, dan berwawasan lingkungan dalam pendidikan</strong>, penelitian bidang sains dan informatika yang berkontribusi pada pengembangan masyarakat serta inovasi global di tahun 2024.</p>
                        </div>
                        <div class="col-md-6 col-sm-12 teks-misi text-center">
                            <h1>Misi</h1>
                            <p>Dalam mencapai visi Fakultas Sains dan Informatika, maka disusun misi sebagai berikut:</p>
                            <ol>
                                <li>Memberikan pendidikan berkualitas tinggi untuk peningkatan keterampilan dan kemampuan mahasiswa dalam bidang sains dan informatika disertai pengalaman praktis yang berorientasi pada aplikasi industri dan inovasi global.</li>
                                <li>Mendorong pengembangan pengetahuan melalui penelitian dan pengembangan yang inovatif dan berkelanjutan dalam bidang sains dan informatika serta dengan menjalin kemitraan strategis dengan industri dan organisasi terkait untuk memfasilitasi transfer teknologi, riset terapan, dan peluang kerja bagi lulusan.</li>
                                <li>Memberikan kontribusi pada masyarakat melalui program dan layanan yang berfokus pada pemanfaatan sains dan informatika untuk memecahkan masalah sosial dan lingkungan.</li>
                                <li>Meningkatkan kualitas manajemen fakultas dan meningkatkan daya saing melalui inovasi dalam pengelolaan, sistem informasi, pengembangan sumber daya manusia, dan layanan akademik.</li>
                            </ol>

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