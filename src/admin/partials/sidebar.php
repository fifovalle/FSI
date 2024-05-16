<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
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
    <ul class="menu-inner py-1">
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
    </ul>
</aside>