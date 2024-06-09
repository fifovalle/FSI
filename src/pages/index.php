<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/index1.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <?php
        $carouselModel = new Carousel($koneksi);
        $carouselInfo = $carouselModel->tampilkanDataCarousel();
        ?>
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade carousel-main" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < count($carouselInfo); $i++) { ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" <?php echo ($i === 0) ? 'class="active"' : ''; ?> aria-label="Slide <?php echo ($i + 1); ?>"></button>
                <?php } ?>
            </div>
            <div class="carousel-inner animate-down">
                <?php foreach ($carouselInfo as $index => $item) { ?>
                    <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                        <img src="../uploads/<?php echo $item['Gambar']; ?>" class="d-block w-100 h-100" alt="...">
                        <div class="carousel-caption d-sm-block d-md-block">
                            <h5 class="text-right"><?php echo $item['Judul']; ?></h5>
                            <h6 class="text-up"><?php echo $item['Deskripsi']; ?></>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <button id="cprevButton" class="carousel-control-prev animate-right" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button id="cnextButton" class="carousel-control-next animate-left" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="section-jurusan jurusan-animation">
            <div class="container-fluid p-0 ">
                <div class="row justify-content-between text-center">
                    <div class="header-jurusan">
                        <lead>PROGRAM STUDI</lead>
                        <h1>FAKULTAS SAINS DAN INFORMATIKA</h1>
                        <hr>
                    </div>
                    <?php
                    $programStudiModel = new ProgramStudi($koneksi);
                    $programStudiInfo = $programStudiModel->tampilkanDataProgramStudi();
                    ?>
                    <?php if (!empty($programStudiInfo)) : ?>
                        <?php foreach ($programStudiInfo as $programStudi) : ?>
                            <div class="col-md-3 col-sm-12 text-center">
                                <a href="<?php echo $programStudi['Tautan_Prodi']; ?>" style="text-decoration: none;" target="_blank">
                                    <div class="card card-jurusan mx-auto border border-0" style="width: 18rem;">
                                        <img src="../uploads/<?php echo $programStudi['Gambar_Prodi']; ?>" class="card-img-top" alt="..." id="icon-jurusan">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $programStudi['Nama_Prodi']; ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="section-beritaterbaru beritaterbaru-animation" id="berita-terbaru">
            <div class="container-fluid p-0 ">
                <div class="row justify-content-center text-center">
                    <div class="col-md-12 mb-xl-5">
                        <div class="header-beritaterbaru">
                            <h1>Berita Terbaru</h1>
                        </div>
                    </div>
                    <div class="row opsi-button justify-content-center text-center">
                        <div class="col-md-3 col-sm-12 agenda active" id="bg-agenda">
                            <button type="button" class="btn btn-lg btn-primary border border-0 bg-transparent" id="AgendaButton">Agenda</button>
                        </div>
                        <div class="col-md-3 col-sm-12 berita" id="bg-berita">
                            <button type="button" class="btn btn-lg btn-primary border border-0 bg-transparent" id="BeritaButton">Berita</button>
                        </div>
                        <div class="col-md-3 col-sm-12 pengumuman" id="bg-pengumuman">
                            <button type="button" class="btn btn-lg btn-primary border border-0 bg-transparent" id="PengumumanButton">Pengumuman</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-2" id="content-agenda">
                <div class="row mt-5 justify-content-center">
                    <?php
                    $agendaModel = new Agenda($koneksi);
                    $agendaInfo = $agendaModel->tampilkanDataAgenda();
                    ?>
                    <?php if (!empty($agendaInfo)) : ?>
                        <?php foreach ($agendaInfo as $agenda) : ?>
                            <div class="col-md-3 col-sm-12 my-4">
                                <div class="card card-agenda mx-auto">
                                    <img class="card-img-top" src="../uploads/<?php echo $agenda['Gambar_Agenda']; ?>" alt="gambar card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title title-agenda"><?php echo $agenda['Judul_Agenda']; ?></h5>
                                        <hr>
                                        <a class="btn btn-outline-primary buttonModalAgenda" data-bs-toggle="modal" data-id="<?php echo $agenda['ID_Agenda']; ?>">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center text-uppercase fs-1 fw-bold"> <strong>Tidak ada agenda!</strong></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container-fluid px-2" id="content-berita" style="display:none">
                <div class="row mt-5 justify-content-center">
                    <?php
                    $beritaModel = new Berita($koneksi);
                    $beritaInfo = $beritaModel->tampilkanDataBerita();
                    ?>
                    <?php if (!empty($beritaInfo)) : ?>
                        <?php foreach ($beritaInfo as $berita) : ?>
                            <div class="col-md-3 col-sm-12 my-4">
                                <div class="card card-agenda mx-auto">
                                    <img class="card-img-top" src="../uploads/<?php echo $berita['Gambar']; ?>" alt="gambar card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title title-agenda"><?php echo $berita['Judul']; ?></h5>
                                        <hr>
                                        <a class="btn btn-outline-primary buttonModalBerita" data-bs-toggle="modal" data-id="<?php echo $berita['ID_Berita']; ?>">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center text-uppercase fs-1 fw-bold"> <strong>Tidak ada berita!</strong></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container-fluid px-2" id="content-pengumuman" style="display:none">
                <div class="row mt-5 justify-content-center">
                    <?php
                    $pengumumanModel = new Pengumuman($koneksi);
                    $pengumumanInfo = $pengumumanModel->tampilkanDataPengumuman();
                    ?>
                    <?php if (!empty($pengumumanInfo)) : ?>
                        <?php foreach ($pengumumanInfo as $pengumuman) : ?>
                            <div class="col-md-3 col-sm-12 my-4">
                                <div class="card card-pengumuman mx-auto">
                                    <img class="card-img-top" src="../uploads/<?php echo $pengumuman['Foto_Pengumuman']; ?>" alt="gambar card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title title-pengumuman"><?php echo $pengumuman['Judul_Pengumuman']; ?></h5>
                                        <hr>
                                        <a class="btn btn-outline-primary buttonModalPengumuman" data-bs-toggle="modal" data-id="<?php echo $pengumuman['ID_Pengumuman']; ?>">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center text-uppercase fs-1 fw-bold"> <strong>Tidak ada pengumuman!</strong></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="section-visimisi visimisi-animation">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-12 text-start">
                        <div class="header-visi text-center align-items-center">
                            <h1>Visi</h1>
                            <h3>Menjadi fakultas yang <strong>unggul, bertaraf internasional, berjiwa kebangsaan, dan berwawasan lingkungan dalam pendidikan</strong>, penelitian bidang sains dan informatika yang berkontribusi pada pengembangan masyarakat serta inovasi global di tahun 2024.</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-end">
                        <div class="header-misi text-start">
                            <h1 class="text-center">Misi</h1>
                            <h3>Dalam mencapai visi Fakultas Sains dan Informatika, maka disusun misi sebagai berikut:</h3>
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
        <div class="section-pimpinan dekan-animation">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-3 foto-dekan text-center">
                        <img src="../assets/img/Pimpinan/Dekan.png" class="img-fluid bg-transparent p-0" alt="...">
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3" id="selayang-pandang">
                        <div class="row text-start align-items-center">
                            <div class="col-md-12 content-pengantar">
                                <h1>Selayang Pandang</h1>
                                <hr class="hr1">
                                <p style="text-align: justify;">"Selamat datang di Fakultas Sains dan Informatika Universitas Jenderal Achmad Yani, sebuah fakultas yang memiliki sejarah panjang dan prestisius dalam bidang pendidikan teknologi. Fakultas ini memiliki program studi-program studi unggulan yang tertua di UNJANI, yaitu S1 Informatika, S1 Kimia, S1 Sistem Informasi, dan S2 Magister Kimia."
                                </p>
                                <hr class="hr2">
                                <h4 class="text-end">Dr. Anceu Murniati, S.Si., M.Si.</h4>
                                <h5 class="text-end">Dekan Fakultas Sains dan Informatika Unjani</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-fakultas mt-xl-5">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row fakultas" id="TentangFakultas">
                    <div class="col-md-12 col-sm-12 p-0 text-center">
                        <h1>Video Profil </h1>
                    </div>
                    <div class="col-md-12 col-sm-12 p-0 text-center">
                        <video width="650" height="650" class="video-profil w-100" controls>
                            <source src="../assets/img/profilvideo/profilvidio.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $testimoniModel = new Testimoni($koneksi);
        $testimoniInfo = $testimoniModel->tampilkanDataTestimoni();
        ?>
        <section class="section-testimoni">
            <h1 class="text-center mb-4">TESTIMONI</h1>
            <div id="cCarousel">
                <div class="arrow" id="prev"><box-icon name='chevrons-left' color='rgba(255,255,255,0.9)'></box-icon></div>
                <div class="arrow" id="next"><box-icon name='chevrons-right' color='rgba(255,255,255,0.9)'></box-icon></div>
                <div id="carousel-vp">
                    <div id="cCarousel-inner">
                        <?php if (!empty($testimoniInfo)) : ?>
                            <?php foreach ($testimoniInfo as $testimoni) : ?>
                                <article class="cCarousel-item">
                                    <img src="../uploads/<?php echo $testimoni['Foto_Mahasiswa']; ?>" alt="Foto Mahasiswa">
                                    <div class="infos">
                                        <h6 class="m-0"><?php echo $testimoni['Kesan_Mahasiswa']; ?></h6><br>
                                        <lead><?php echo $testimoni['Nama_Mahasiswa']; ?></lead>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="fw-bold text-danger d-flex justify-content-center" style="width: 50vw;">
                                <p>Tidak ada testimoni saat ini!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="../assets/js/index.js"></script>
    <script src="../assets/js/navbar1.js"></script>
    <!-- MAIN END -->

    <!-- FOOTER START -->
    <?php
    include('../partials/footer.php');
    ?>
    <!-- FOOTER END -->

    <div class="modal fade" id="agendaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <img id="fotoAgenda">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulAgenda"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalIsiAgenda">
                    <p id="isiAgenda"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="beritaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <img id="fotoBerita">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulBerita"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="isiBerita">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pengumumanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <img id="fotoPengumuman">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulPengumuman"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="isiPengumuman">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <script src="../../src/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../src/admin/assets/js/modal-agenda.js"></script>
    <script src="../../src/admin/assets/js/modal-berita.js"></script>
    <script src="../../src/admin/assets/js/modal-pengumuman.js"></script>
</body>

</html>