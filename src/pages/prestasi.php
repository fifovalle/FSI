<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/prestasi.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-prestasi">
            <div class="container-fluid p-0 fakultas-animation">
                <?php
                $prestasiModel = new prestasiMahasiswa($koneksi);
                $pretasiInfo = $prestasiModel->tampilkanDataPrestasiMahasiswa();
                ?>
                <div class="row prestasi">
                    <?php if (!empty($pretasiInfo)) { ?>
                        <?php foreach ($pretasiInfo as $prestasi) { ?>
                            <div class="col-md-3 text-end col-sm-12">
                                <img class="img-fluid" src="../uploads/<?php echo $prestasi['Gambar']; ?>" alt="">
                            </div>
                            <div class="col-md-3 text-start col-sm-12">
                                <div class="teks-prestasi">
                                    <h2><?php echo htmlspecialchars($prestasi['Nama_Mahasiswa']); ?></h2>
                                    <h5>Kegiatan : <?php echo htmlspecialchars($prestasi['Kegiatan']); ?></h5>
                                    <h6>Pencapaian : <?php echo htmlspecialchars($prestasi['Pencapaian']); ?></h6>
                                    <h6>Tahun : <?php echo htmlspecialchars($prestasi['Tahun_Pencapaian']); ?></h6>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12 text-center">
                            <p>Tidak ada data prestasi yang ditemukan.</p>
                        </div>
                    <?php } ?>
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