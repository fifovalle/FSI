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
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade carousel-main" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/carousel-main/3.jpeg" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-sm-block d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/carousel-main/4.png" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-sm-block d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/carousel-main/5.png" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-sm-block d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/carousel-main/1.jpg" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-sm-block d-md-block">
                        <h5>Tentang Fakultas</h5>
                        <a href="#TentangFakultas"><button type="button" class="btn btn-primary" style="box-shadow: 0 8px 32px 0 rgba(255, 255, 255, 0.37);">Selengkapnya</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/carousel-main/2.jpg" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-sm-block d-md-block">
                        <h5>Penerimaan Mahasiswa Baru Tahun Akademik 2024/2025</h5>
                        <a href="https://pendaftaran.unjani.ac.id/loginnew"><button type="button" class="btn btn-primary" style="box-shadow: 0 8px 32px 0 rgba(255, 255, 255, 0.5);">Daftar Sekarang</button></a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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
                    <div class="col-md-3 col-sm-12 text-center">
                        <a href="https://kimia.unjani.ac.id/" style="text-decoration: none;">
                            <div class="card card-jurusan mx-auto border border-0" style="width: 18rem;">
                                <img src="../assets/img/Kimia.png" class="card-img-top" alt="..." id="icon-jurusan">
                                <div class="card-body">
                                    <h5 class="card-title">S-1 KIMIA</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <a href="https://if.unjani.ac.id/" style="text-decoration: none;">
                            <div class="card card-jurusan mx-auto border border-0" style="width: 18rem;">
                                <img src="../assets/img/Infromatika.png" class="card-img-top" alt="..." id="icon-jurusan">
                                <div class="card-body">
                                    <h5 class="card-title">S-1 INFORMATIKA</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <a href="https://si.unjani.ac.id/" style="text-decoration: none;">
                            <div class="card card-jurusan mx-auto border border-0" style="width: 18rem;">
                                <img src="../assets/img/SistemInformasi.png" class="card-img-top" alt="..." id="icon-jurusan">
                                <div class="card-body">
                                    <h5 class="card-title">S-1 SISTEM INFORMASI</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-12 text-center">
                        <a href="https://magister.kimia.unjani.ac.id/" style="text-decoration: none;">
                            <div class="card card-jurusan mx-auto border border-0" style="width: 18rem;">
                                <img src="../assets/img/MagisterKimia.png" class="card-img-top" alt="..." id="icon-jurusan">
                                <div class="card-body">
                                    <h5 class="card-title">S-2 MAGISTER KIMIA</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-beritaterbaru beritaterbaru-animation">
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
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-agenda mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/1.jpg" alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-agenda">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-agenda mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/2.jpg" alt=" gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-agenda">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-agenda mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/3.jpg" alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-agenda">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-agenda mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/4.jpg" alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-agenda">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-2" id="content-berita" style="display:none">
                <div class="row mt-5 justify-content-center">
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-berita mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/1.jpg" alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-berita">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-berita mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/2.jpg" alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-berita">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-berita mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/3.jpg" alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-berita">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-berita mx-auto">
                            <img class="card-img-top" src="../assets/img/agenda/4.jpg" alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-berita">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-2" id="content-pengumuman" style="display:none">
                <div class="row mt-5 justify-content-center">
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-pengumuman mx-auto">
                            <img class="card-img-top" src="..." alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-pengumuman">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-pengumuman mx-auto">
                            <img class="card-img-top" src="..." alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-pengumuman">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-pengumuman mx-auto">
                            <img class="card-img-top" src="..." alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-pengumuman">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 my-4">
                        <div class="card card-pengumuman mx-auto">
                            <img class="card-img-top" src="..." alt="gambar card">
                            <div class="card-body text-center">
                                <h5 class="card-title title-pengumuman">Judul</h5>
                                <hr>
                                <a href="#" class="btn btn-outline-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
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
                        <video width="650" height="450" class="video-profil" autoplay loop controls>
                            <source src="../assets/img/profilvideo/vidioprofil.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-testimoni">
            <div class="containercss">
                <input type="radio" name="nav" id="first" checked />
                <input type="radio" name="nav" id="second" />
                <input type="radio" name="nav" id="third" />

                <label for="first" class="first"></label>
                <label for="second" class="second"></label>
                <label for="third" class="third"></label>

                <div class="one slidecss">
                    <blockquote>
                        <span class="leftq quotes">&ldquo;</span>
                        <p class="description-quotes">Lorem ipsum dolor sit amet.</p> <span class="rightq quotes">&bdquo; </span>
                    </blockquote>
                    <img class="imgSliderTestimoni" src="../assets/img/people.svg" width="130" height="130" />
                    <h2 class="h2Slidder">Naufal</h2>
                    <h6 class="deskripsiSlider">Mahasiswa</h6>
                </div>

                <div class="two slidecss">
                    <blockquote>
                        <span class="leftq quotes">&ldquo;</span>
                        <p class="description-quotes">Lorem ipsum dolor sit amet.</p><span class="rightq quotes">&bdquo; </span>
                    </blockquote>
                    <img class="imgSliderTestimoni" src="../assets/img/people.svg" width="130" height="130" />
                    <h2 class="h2Slidder">Rezki</h2>
                    <h6 class="deskripsiSlider">Mahasiswa</h6>
                </div>

                <div class="three slidecss">
                    <blockquote>
                        <span class="quotes leftq"> &ldquo;</span>
                        <p class="description-quotes">Lorem ipsum dolor sit amet.</p><span class="rightq quotes">&bdquo; </span>
                    </blockquote>
                    <img class="imgSliderTestimoni" src="../assets/img/people.svg" width="130" height="130" />
                    <h2 class="h2Slidder">Ahsan</h2>
                    <h6 class="deskripsiSlider">Mahasiswa</h6>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/js/index.js"></script>
    <!-- MAIN END -->

    <!-- FOOTER START -->
    <?php
    include('../partials/footer.php');
    ?>
    <!-- FOOTER END -->
</body>

</html>