<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/penelitian-sisteminformasi.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <?php
    $sistemInformasiModel = new SistemInformasi($koneksi);
    $sistemInformasiInfo = $sistemInformasiModel->tampilkanDataSistemInformasi();
    ?>
    <main class="container-fluid p-0">
        <div class="section-penelitianinformasi">
            <div class="container-fluid p-0">
                <div class="row header-penelitianinformasi fakultas-animation">
                    <div class="col-md-12 col-sm-12 text-start mt-md-2 mb-md-2">
                        <h2 class="text-center mb-md-5">Penelitian Sistem Informasi S-1</h2>
                        <?php if (!empty($sistemInformasiInfo)) : ?>
                            <?php foreach ($sistemInformasiInfo as $sistemInformasi) : ?>
                                <ul>
                                    <li>
                                        <header class="title-penelitian"><a href="<?php echo $sistemInformasi['Tautan_Penelitian']; ?>" target="_blank"><?php echo $sistemInformasi['Judul_Penelitian']; ?></a></header>
                                        <p>
                                            <lead class="q-journal"><?php echo $sistemInformasi['Tingkatan']; ?></lead><br>
                                            <lead class="header-scopus"><a href="<?php echo $sistemInformasi['Tautan_Jurnal']; ?>"><?php echo $sistemInformasi['Judul_Jurnal']; ?></a></lead><br>
                                            <lead>Creator: <?php echo $sistemInformasi['Pencipta']; ?></lead><br>
                                            <lead>Tahun : <?php echo $sistemInformasi['Tahun']; ?></lead>
                                        </p>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="justify-content-center d-flex">
                                <span class="text-danger fw-bold">Tidak ada data Penelitian Sistem Informasi!</span>
                            </div>
                        <?php endif; ?>
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