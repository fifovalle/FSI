<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/produk-inovatif.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <?php
    $produkInovatifModel = new ProdukInovatif($koneksi);
    $produkInovatifInfo = $produkInovatifModel->tampilkanDataProdukInovatif();
    ?>
    <main class="container-fluid p-0">
        <div class="section-inovatif">
            <div class="container-fluid p-0">
                <div class="row header-inovatif fakultas-animation">
                    <div class="col-md-12 col-sm-12 text-start mt-md-2 mb-md-2">
                        <h2 class="text-center mb-md-5">Produk Inovatif</h2>
                        <?php if (!empty($produkInovatifInfo)) : ?>
                            <?php foreach ($produkInovatifInfo as $produkInovatif) : ?>
                                <ul>
                                    <li>
                                        <header><a href="<?php echo $produkInovatif['Tautan_Inovasi']; ?>" target="_blank"><?php echo $produkInovatif['Judul_Inovasi']; ?></a></header>
                                        <p>
                                            <lead>
                                                Leader: <?php echo $produkInovatif['Leader']; ?><br>
                                                <?php echo $produkInovatif['Event']; ?><br>
                                                Personils: <?php echo $produkInovatif['Personil']; ?><br>
                                                Tahun: <?php echo $produkInovatif['Tahun']; ?>
                                            </lead>
                                        </p>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="justify-content-center d-flex">
                                <span class="text-danger fw-bold">Tidak ada data Produk Inovatif!</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/js/tentang-fakultas.js"></script>
    <script src="../assets/js/tenaga-dosen.js"></script>
    <!-- MAIN END -->

    <!-- FOOTER START -->
    <?php
    include('../partials/footer.php');
    ?>
    <!-- FOOTER END -->
</body>

</html>