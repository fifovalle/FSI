<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/penelitian-kimia2.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <?php
    $magisterKimiaModel = new magisterKimia($koneksi);
    $kimiaS2Info = $magisterKimiaModel->tampilkanDataMagisterKimia();
    ?>
    <main class="container-fluid p-0">
        <div class="section-penelitiankimia">
            <div class="container-fluid p-0">
                <div class="row header-penelitiankimia fakultas-animation">
                    <div class="col-md-12 col-sm-12 text-start mt-md-2 mb-md-2">
                        <h2 class="text-center mb-md-5">Penelitian Magister Kimia S-2</h2>
                        <?php if (!empty($kimiaS2Info)) : ?>
                            <?php foreach ($kimiaS2Info as $kimia) : ?>
                                <ul>
                                    <li>
                                        <header class="title-penelitian"><a href="<?php echo $kimia['Tautan_Penelitian']; ?>" target="_blank"><?php echo $kimia['Judul_Penelitian']; ?></a></header>
                                        <p>
                                            <lead class="q-journal"><?php echo $kimia['Tingkatan']; ?></lead><br>
                                            <lead class="header-scopus"><a href="<?php echo $kimia['Tautan_Journal']; ?>"><?php echo $kimia['Judul_Journal']; ?></a></lead><br>
                                            <lead>Creator: <?php echo $kimia['Pencipta']; ?></lead><br>
                                            <lead>Tahun : <?php echo $kimia['Tahun']; ?></lead>
                                        </p>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="justify-content-center d-flex">
                                <span class="text-danger fw-bold">Tidak ada data Magister Kimia!</span>
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