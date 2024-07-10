<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="overflow-y: scroll; direction: rtl;">
    <div class="app-brand demo" style="direction:ltr">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img class="w-px-40 h-auto rounded-circle" src="<?php echo $akar_tautan; ?>src/admin/assets/img/favicon/1.png" alt="Logo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">FSI</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <?php
    $halaman_sekarang = basename($_SERVER['PHP_SELF']);
    function is_active($nama_halaman, $halaman_sekarang)
    {
        if ($nama_halaman === $halaman_sekarang) {
            return 'active';
        } else {
            return '';
        }
    }
    ?>
    <div class="menu-container">
        <ul class="menu-inner py-1" style="direction: ltr;">
            <li class="menu-item <?php echo is_active('index.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>public/index.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Beranda</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data</span>
            </li>
            <li class="menu-item <?php echo is_active('admin.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/admin.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    <div data-i18n="Tables">Admin</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('carousel.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/carousel.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-images"></i>
                    <div data-i18n="Tables">Carousel</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('bar-navigasi.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/bar-navigasi.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-navigation"></i>
                    <div data-i18n="Tables">Bar Navigasi</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('berita.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/berita.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-news"></i>
                    <div data-i18n="Tables">Berita</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('agenda.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/agenda.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div data-i18n="Tables">Agenda</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('announcement.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/announcement.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div data-i18n="Tables">Pengumuman</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('program-studi.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/program-studi.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-briefcase"></i>
                    <div data-i18n="Tables">Program Studi</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('testimoni.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/testimoni.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-star"></i>
                    <div data-i18n="Tables">Testimoni</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('struktur-organisasi.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/struktur-organisasi.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-network-chart"></i>
                    <div data-i18n="Tables">Struktur Organisasi</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('dosen.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/dosen.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-graduation"></i>
                    <div data-i18n="Tables">Tenaga Dosen</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('staff.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/staff.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Tables">Tenaga Staf</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('penelitian-kimia.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/penelitian-kimia.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-atom"></i>
                    <div data-i18n="Tables">Penelitian Kimia</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('penelitian-magisterkimia.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/penelitian-magisterkimia.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-test-tube"></i>
                    <div data-i18n="Tables">Penelitian Magister Kimia</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('penelitian-teknikinformatika.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/penelitian-teknikinformatika.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-code-alt"></i>
                    <div data-i18n="Tables">Penelitian Teknik Informatika</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('penelitian-sisteminformasi.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/penelitian-sisteminformasi.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-server"></i>
                    <div data-i18n="Tables">Penelitian Sistem Informasi</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('prestasi-mahasiswa.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/prestasi-mahasiswa.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-award"></i>
                    <div data-i18n="Tables">Pretasi Mahasiswa</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('beasiswa-mahasiswa.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/beasiswa-mahasiswa.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-graduation"></i>
                    <div data-i18n="Tables">Beasiswa Mahasiswa</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('pengabdian-masyarakat.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/pengabdian-masyarakat.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-medal"></i>
                    <div data-i18n="Tables">Pengabdian Kepada Masyarakat</div>
                </a>
            </li>
            <li class="menu-item <?php echo is_active('produk-inovatif.php', $halaman_sekarang); ?>">
                <a href="<?php echo $akar_tautan; ?>src/admin/pages/produk-inovatif.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-bulb"></i>
                    <div data-i18n="Tables">Produk Inovatif</div>
                </a>
            </li>
        </ul>
    </div>
</aside>