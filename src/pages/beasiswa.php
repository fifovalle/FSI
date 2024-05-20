<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/beasiswa.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <?php
    $beasiswaMahasiswa = new beasiswaMahasiswa($koneksi);
    $beasiswaMahasiswaInfo = $beasiswaMahasiswa->tampilkanDataBeasiswaMahasiswa();
    ?>
    <main class="container-fluid p-0">
        <div class="section-beasiswa">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row beasiswa">
                    <?php if (!empty($beasiswaMahasiswaInfo)) : ?>
                        <?php $nomor = 1; ?>
                        <?php foreach ($beasiswaMahasiswaInfo as $beasiswaMahasiswa) : ?>
                            <div class="col-md-3 text-end col-sm-12">
                                <img class="img-fluid" src="../uploads/<?php echo $beasiswaMahasiswa['Gambar']; ?>" alt="">
                            </div>
                            <div class="col-md-3 text-start col-sm-12">
                                <div class="teks-beasiswa">
                                    <h2><?php echo $beasiswaMahasiswa['Nama_Penerima']; ?></h2>
                                    <h5><?php echo $beasiswaMahasiswa['Nama_Beasiswa']; ?></h5>
                                    <h6><?php echo $beasiswaMahasiswa['Durasi_Beasiswa'] ?? ''; ?></h6>
                                    <span>
                                        <a href="<?php echo $beasiswaMahasiswa['Link_Instagram']; ?>" target="_blank">
                                            <box-icon name='instagram-alt' type='logo'></box-icon>
                                        </a>
                                        <a href="<?php echo $beasiswaMahasiswa['Link_Website']; ?>" target="_blank">
                                            <box-icon name='globe'></box-icon>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="col-12 text-center">
                            <p>Tidak ada data beasiswa mahasiswa yang ditemukan.</p>
                        </div>
                    <?php endif; ?>
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