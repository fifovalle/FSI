<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/pengabdian-masyarakat.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <?php
    $pengabdianModel = new PengabdianMasyarakat($koneksi);
    $pengabdianMasyarakatInfo = $pengabdianModel->tampilkanDataPengabdianMasyarakat();
    ?>
    <main class="container-fluid p-0">
        <div class="section-pengabdian">
            <div class="container-fluid p-0">
                <div class="row header-pengabdian fakultas-animation">
                    <div class="col-md-12 col-sm-12 text-start mt-md-2 mb-md-2">
                        <h2 class="mb-md-5 text-center">Pengabdian Kepada Masyarakat</h2>
                        <?php if (!empty($pengabdianMasyarakatInfo)) : ?>
                            <?php foreach ($pengabdianMasyarakatInfo as $pengabdian) : ?>
                                <ul>
                                    <li>
                                        <a href="<?php echo $pengabdian['Tautan_Pengabdian']; ?>" target="_blank"><?php echo $pengabdian['Judul_Pengabdian']; ?></a>
                                        <p>
                                            <lead>
                                                Leader: <?php echo $pengabdian['Leader']; ?><br>
                                                <?php echo $pengabdian['Event']; ?><br>
                                                Personils: <?php echo $pengabdian['Personil']; ?><br>
                                                Tahun: <?php echo $pengabdian['Tahun']; ?>
                                            </lead>
                                        </p>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="justify-content-center d-flex">
                                <span class="text-danger fw-bold">Tidak ada data Pengabdian Masyarakat!</span>
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