<?php
$navbarModel = new Navbar($koneksi);
?>
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
                        <?php
                        $navbarPenelitianDanPengabdianInfo = $navbarModel->tampilkanDataNavbarKategoriPenelitianDanPengabdian();
                        ?>
                        <?php if (!empty($navbarPenelitianDanPengabdianInfo)) : ?>
                            <?php foreach ($navbarPenelitianDanPengabdianInfo as $penelitianDanPengabdian) : ?>
                                <li><a class="dropdown-item" href="<?= $penelitianDanPengabdian['Tautan']; ?>"><?= $penelitianDanPengabdian['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                            <li class="dropdown-item dropdown">
                                <a class="dropdown-item p-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">Penelitian
                                    <i class='bx bx-chevron-right'></i>
                                </a>
                                <ul class="submenu dropdown-menu">
                                    <?php
                                    $navbarPenelitianDanPengabdianPenelitianInfo = $navbarModel->tampilkanDataNavbarKategoriPenelitian();
                                    ?>
                                    <?php if (!empty($navbarPenelitianDanPengabdianPenelitianInfo)) : ?>
                                        <?php foreach ($navbarPenelitianDanPengabdianPenelitianInfo as $penelitianDanPengabdianPenelitian) : ?>
                                            <li><a class="submenu-item" href="<?= $penelitianDanPengabdianPenelitian['Tautan']; ?>"><?= $penelitianDanPengabdianPenelitian['Daftar_Nama']; ?></a></li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="mahasiswa">Mahasiswa</a>
                    <ul class="dropdown-menu">
                        <?php
                        $navbarMahasiswaInfo = $navbarModel->tampilkanDataNavbarKategoriMahasiswa();
                        ?>
                        <?php if (!empty($navbarMahasiswaInfo)) : ?>
                            <?php foreach ($navbarMahasiswaInfo as $mahasiswa) : ?>
                                <li><a class="dropdown-item" href="<?= $mahasiswa['Tautan']; ?>"><?= $mahasiswa['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="penjaminan"> <strong>SITERPADU</strong></a>
                    <ul class="dropdown-menu">
                        <?php
                        $navbarSiterpaduInfo = $navbarModel->tampilkanDataNavbarKategoriSiterpadu();
                        ?>
                        <?php if (!empty($navbarSiterpaduInfo)) : ?>
                            <?php foreach ($navbarSiterpaduInfo as $siterpadu) : ?>
                                <li><a class="dropdown-item" href="<?= $siterpadu['Tautan']; ?>"><?= $siterpadu['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="https://pendaftaran.unjani.ac.id/register" target="_blank"><button type="button" class="btn btn-warning"><strong class="text-white" style="letter-spacing: 2px;">PENDAFTARAN</strong></button></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid py-2">
        <a class="navbar-brand p-0 m-0" href="<?php echo $akar_tautan; ?>" style="width: 500px;">
            <img src="<?php echo $akar_tautan; ?>src/assets/img/LogoFSI.png" class="img-fluid ps-5" alt="...">
        </a>
        <a class="navbar-brand1"> <img src="<?php echo $akar_tautan; ?>src/assets/img/Logounjani.png" class="img-thumbnail p-0 border border-0 bg-transparent pe-sm-5" alt="..." style="width: 35px; height: 35px;"> FSI UNJANI</a>
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
                    <a class="nav-link nav-active" aria-current="page" href="<?php echo $akar_tautan; ?>" id="beranda">Beranda</a>
                </li>
                <?php
                $navbarProfilInfo = $navbarModel->tampilkanDataNavbarKategoriProfil();
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="profil">Profil</a>
                    <ul class="dropdown-menu">
                        <?php if (!empty($navbarProfilInfo)) : ?>
                            <?php foreach ($navbarProfilInfo as $profil) : ?>
                                <li><a class="dropdown-item" href="<?= $profil['Tautan']; ?>"><?= $profil['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                            <li class="dropdown-item dropdown ">
                                <a class="dropdown-item p-0 " href="#" data-bs-toggle="dropdown" aria-expanded="false">Survey
                                    <i class='bx bx-chevron-right'></i>
                                </a>
                                <ul class="submenu dropdown-menu">
                                    <?php
                                    $navbarProfilSurveyInfo = $navbarModel->tampilkanDataNavbarKategoriProfilSubSurvey();
                                    ?>
                                    <?php if (!empty($navbarProfilSurveyInfo)) : ?>
                                        <?php foreach ($navbarProfilSurveyInfo as $profilSurvey) : ?>
                                            <li><a class="submenu-item" href="<?= $profilSurvey['Tautan']; ?>"><?= $profilSurvey['Daftar_Nama']; ?></a></li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="sdm">SDM</a>
                    <ul class="dropdown-menu">
                        <?php
                        $navbarSdmInfo = $navbarModel->tampilkanDataNavbarKategoriSDM();
                        ?>
                        <?php if (!empty($navbarSdmInfo)) : ?>
                            <?php foreach ($navbarSdmInfo as $sdm) : ?>
                                <li><a class="dropdown-item" href="<?= $sdm['Tautan']; ?>"><?= $sdm['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="akademik">Akademik</a>
                    <ul class="dropdown-menu">
                        <?php
                        $navbarAkademikInfo = $navbarModel->tampilkanDataNavbarKategoriAkademik();
                        ?>
                        <?php if (!empty($navbarAkademikInfo)) : ?>
                            <?php foreach ($navbarAkademikInfo as $akademik) : ?>
                                <li><a class="dropdown-item" href="<?= $akademik['Tautan']; ?>" target="_blank"><?= $akademik['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                        <li class="dropdown-item dropdown ">
                            <a class="dropdown-item p-0 " href="#" data-bs-toggle="dropdown" aria-expanded="false">Dokumen Akademik
                                <i class='bx bx-chevron-right'></i>
                            </a>
                            <ul class="submenu dropdown-menu">
                                <?php
                                $navbarAkademikDokumenInfo = $navbarModel->tampilkanDataNavbarKategoriAkademikSubDokumen();
                                ?>
                                <?php if (!empty($navbarAkademikDokumenInfo)) : ?>
                                    <?php foreach ($navbarAkademikDokumenInfo as $akademikDokumen) : ?>
                                        <li><a class="submenu-item" href="<?= $akademikDokumen['Tautan']; ?>" target="_blank"><?= $akademikDokumen['Daftar_Nama']; ?></a></li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="fasilitas">Fasilitas</a>
                    <ul class="dropdown-menu">
                        <?php
                        $navbarFasilitasInfo = $navbarModel->tampilkanDataNavbarKategoriFasilitas();
                        ?>
                        <?php if (!empty($navbarFasilitasInfo)) : ?>
                            <?php foreach ($navbarFasilitasInfo as $fasilitas) : ?>
                                <li><a class="dropdown-item" href="<?= $fasilitas['Tautan']; ?>"><?= $fasilitas['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" id="penjaminan">Penjaminan Mutu</a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <?php
                        $navbarPenjaminanInfo = $navbarModel->tampilkanDataNavbarKategoriPenjaminan();
                        ?>
                        <?php if (!empty($navbarPenjaminanInfo)) : ?>
                            <?php foreach ($navbarPenjaminanInfo as $penjaminan) : ?>
                                <li><a class="dropdown-item" href="<?= $penjaminan['Tautan']; ?>"><?= $penjaminan['Daftar_Nama']; ?></a></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center fw-bold text-danger">Tidak Ada Data!</p>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>