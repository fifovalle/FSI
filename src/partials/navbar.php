<nav class="navbar navbar-expand-sm navbar-light fixed-top" aria-label="fakultas_sains_dan_informatika">
    <div class="container-fluid mx-auto align-items-center nav-section1">
        <div class="collapse navbar-collapse border border-0 " id="navbarNavDarkDropdown">
            <ul class="navbar-nav ms-auto me-5 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#berita-terbaru" id="beranda">Berita dan Pengumuman</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="penelitian">Penelitian dan Pengabdian</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item dropdown ">
                            <a class="dropdown-item p-0 " href="#" data-bs-toggle="dropdown" aria-expanded="false">Penelitian
                                <i class='bx bx-chevron-right'></i>
                            </a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="submenu-item" href="../pages/penelitian-kimia.php">Kimia S-1</a></li>
                                <li><a class="submenu-item" href="../pages/penelitian-kimia2.php">Magister Kimia S-2</a></li>
                                <li><a class="submenu-item" href="../pages/penelitian-informatika.php">Teknik Informatika S-1</a></li>
                                <li><a class="submenu-item" href="../pages/penelitian-sisteminformasi.php">Sistem Informasi S-1</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" id="pengabdian" href="../pages/pengabdian-masyarakat.php">Pengabdian Kepada Masyarakat</a></li>
                        <li><a class="dropdown-item" href="../pages/produk-inovatif.php">Produk Inovatif</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="mahasiswa">Mahasiswa</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://pmb.unjani.ac.id/" target="_blank">Info Penerimaan Mahasiswa Baru</a></li>
                        <li><a class="dropdown-item" href="https://www.unjani.ac.id/organisasi-mahasiswa-dan-ukm/" target="_blank">Organisasi Kemahasiswaan</a></li>
                        <li><a class="dropdown-item" href="../pages/kegiatan-kemahasiswaan.php">Kegiatan Kemahasiswaan</a></li>
                        <li><a class="dropdown-item" href="../pages/prestasi.php">Prestasi</a></li>
                        <li><a class="dropdown-item" href="../pages/beasiswa.php">Beasiswa</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="penjaminan"> <strong>SITERPADU</strong></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://lecturer.unjani.ac.id/" target="_blank">Portal Lecturer</a></li>
                        <li><a class="dropdown-item" href="https://student.unjani.ac.id/" target="_blank">Portal Student</a></li>
                        <li><a class="dropdown-item" href="https://stpd.unjani.ac.id/" target="_blank">Portal Tenaga Pendidik</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="https://pendaftaran.unjani.ac.id/register" target="_blank"><button type="button" class="btn btn-warning"><strong class="text-white" style="letter-spacing: 2px;">PENDAFTARAN</strong></button></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid py-2">
        <a class="navbar-brand p-0 m-0" href="../pages/index.php" style="width: 500px;">
            <img src="../assets/img/LogoFSI.png" class="img-fluid ps-5" alt="...">
        </a>
        <a class="navbar-brand1"> <img src="../assets/imgLogounjani.png" class="img-thumbnail p-0 border border-0 bg-transparent pe-sm-5" alt="..." style="width: 35px; height: 35px;"> FSI UNJANI</a>
        <button class="navbar-toggler border border-0 bg-transparent py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <input type="checkbox" id="checkbox">
            <label for="checkbox" class="toggle border border-0">
                <div class="bars" id="bar1"></div>
                <div class="bars" id="bar2"></div>
                <div class="bars" id="bar3"></div>
            </label>
        </button>
        <div class="collapse navbar-collapse border border-0" id="navbarNavDarkDropdown">
            <ul class="navbar-nav ms-auto me-5 mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../pages/index.php" id="beranda">Beranda</a>
                </li>
                <?php
                $navbarModel = new Navbar($koneksi);
                $navbarInfo = $navbarModel->tampilkanDataNavbar();
                ?>
                <?php if (!empty($navbarInfo)) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="profil">Profil</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($navbarInfo as $navbar) : ?>
                                <li><a class="dropdown-item" href="<?= $navbar['Tautan']; ?>"><?= $navbar['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                            <li class="dropdown-item dropdown ">
                            <a class="dropdown-item p-0 " href="#" data-bs-toggle="dropdown" aria-expanded="false">Survey
                                <i class='bx bx-chevron-right'></i>
                            </a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="submenu-item" href="../pages/survey.php">Survey</a></li>
                                <li><a class="submenu-item" href="../pages/hasil-survey.php">Hasil Survey</a></li>
                            </ul>
                        </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="sdm">SDM</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../pages/tenaga-dosen.php">Tenaga Pendidik/Dosen</a></li>
                        <li><a class="dropdown-item" href="../pages/tenaga-staff.php">Tenaga Kependidikan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="akademik">Akademik</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://kimia.unjani.ac.id/" target="_blank">Kimia</a></li>
                        <li><a class="dropdown-item" href="#https://if.unjani.ac.id/" target="_blank">Informatika</a></li>
                        <li><a class=" dropdown-item" href="https://si.unjani.ac.id/" target="_blank">Sistem Informasi</a></li>
                        <li><a class="dropdown-item" href="https://magister.kimia.unjani.ac.id/" target="_blank">Magister Kimia</a></li>
                        <li class="dropdown-item dropdown ">
                            <a class="dropdown-item p-0 " href="#" data-bs-toggle="dropdown" aria-expanded="false">Dokumen Akademik
                                <i class='bx bx-chevron-right'></i>
                            </a>
                            <ul class="submenu dropdown-menu">
                                <li><a class="submenu-item" href="https://jkk.unjani.ac.id/index.php/jkk" target="_blank">Jurnal Kartika (Kimia)</a></li>
                                <li><a class="submenu-item" href="https://jumanji.unjani.ac.id/index.php/jumanji" target="_blank">Jumanji (Informatika)</a></li>
                                <li><a class="submenu-item" href="../pages/kalender-akademik.php">Kalender Akademik</a></li>
                                <li><a class="submenu-item" href="../pages/buku-pedoman.php">Buku Aturan Akademik</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="fasilitas">Fasilitas</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../pages/ruang-kelas.php">Ruang Kelas</a></li>
                        <li><a class="dropdown-item" href="../pages/laboratorium.php">Laboratorium</a></li>
                        <li><a class="dropdown-item" href="../pages/fasil-umum.php">Fasilitas Umum</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="penjaminan">Penjaminan Mutu</a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <li><a class="dropdown-item" href="../pages/akreditasi-internal.php">Penjamin Mutu Internal</a></li>
                        <li><a class="dropdown-item" href="../pages/akreditasi.php">Penjamin Mutu Eksternal</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>