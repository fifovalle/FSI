<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/penelitian-informatika.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <?php
    $informatikaModel = new Informatika($koneksi);
    $informatikaInfo = $informatikaModel->tampilkanDataTeknikInformatika();
    ?>
    <main class="container-fluid p-0">
        <div class="section-penelitianinformatika">
            <div class="container-fluid p-0">
                <div class="row header-penelitianinformatika fakultas-animation">
                    <div class="col-md-12 col-sm-12 text-start mt-md-2 mb-md-2">
                        <h2 class="text-center mb-md-5">Penelitian Informatika S-1</h2>
                        <?php if (!empty($informatikaInfo)) : ?>
                            <?php foreach ($informatikaInfo as $informatika) : ?>
                                <ul>
                                    <li>
                                        <header class="title-penelitian"><a href="<?php echo $informatika['Link_Penelitian']; ?>" target="_blank"><?php echo $informatika['Judul_Penelitian']; ?></a></header>
                                        <p>
                                            <lead class="q-journal"><?php echo $informatika['Tingkatan']; ?></lead><br>
                                            <lead class="header-scopus"><a href="<?php echo $informatika['Link_Jurnal']; ?>"><?php echo $informatika['Judul_Jurnal']; ?></a></lead><br>
                                            <lead>Creator: <?php echo $informatika['Pencipta']; ?></lead><br>
                                            <lead>Tahun : <?php echo $informatika['Tahun']; ?></lead>
                                        </p>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="justify-content-center d-flex">
                                <span class="text-danger fw-bold">Tidak ada data Informatika!</span>
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