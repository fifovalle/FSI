<?php
include '../config/databases.php';

if (!isset($_SESSION['ID_Admin'])) {
    setPesanKesalahan("Silahkan login terlebih dahulu!");
    header("Location: login.php");
    exit();
}

$idSessionAdmin = $_SESSION['ID_Admin'];
$adminModel = new Admin($koneksi);
$dataAdmin = $adminModel->tampilkanAdminDenganSessionId($idSessionAdmin);
if (!empty($dataAdmin)) {
    $admin = $dataAdmin[0];
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Profil Anda</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/1.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- SIDEBAR START -->
            <?php include '../partials/sidebar.php'; ?>
            <!-- SIDEBAR END -->

            <div class="layout-page">
                <!-- NAVBAR START -->
                <?php include '../partials/navbar.php'; ?>
                <!-- NAVBAR END -->

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile Saya /</span> Akun
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Akun</a>
                                    </li>
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profil</h5>
                                    <form method="post" action="../config/edit-profil.php" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img src="../../uploads/<?php echo $admin['Foto_Admin']; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Unggah Foto Baru</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="upload" name="Foto_Admin" class="account-file-input" hidden />
                                                    </label>
                                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ulangi</span>
                                                    </button>
                                                    <p class="text-muted mb-0">Hanya diperbolehkan .png dan .jpg Dengan ukuran maksimal 2 MB</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-0" />
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="profilNamaAdmin" class="form-label">Nama Anda</label>
                                                    <input class="form-control" type="text" id="profilNamaAdmin" name="Nama_Admin" value="<?php echo $admin['Nama_Admin']; ?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="profilEmailAdmin" class="form-label">Email Anda</label>
                                                    <input class="form-control" type="text" id="profilEmailAdmin" name="Email_Admin" value="<?php echo $admin['Email_Admin']; ?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="profilKataSandiAdmin" class="form-label">Kata Sandi Anda</label>
                                                    <input class="form-control" type="text" id="profilKataSandiAdmin" name="Kata_Sandi" value="<?php echo $admin['Konfirmasi_Kata_Sandi']; ?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="profilKonfirmasiKataSandiAdmin" class="form-label">Konfirmasi Kata Sandi Anda</label>
                                                    <input class="form-control" type="text" id="profilKonfirmasiKataSandiAdmin" name="Konfirmasi_Kata_Sandi" value="<?php echo $admin['Konfirmasi_Kata_Sandi']; ?>" autofocus />
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2" name="Simpan">Ubah Perubahan</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <h5 class="card-header">Hapus Akun</h5>
                                <div class="card-body">
                                    <div class="mb-3 col-12 mb-0">
                                        <div class="alert alert-warning">
                                            <h6 class="alert-heading fw-bold mb-1">
                                                Apakah anda yakin ingin menghapus akun ini?
                                            </h6>
                                            <p class="mb-0">
                                                Data yang di hapus tidak dapat dikembalikan
                                            </p>
                                        </div>
                                    </div>
                                    <form id="formAccountDeactivation" onsubmit="return false">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                                            <label class="form-check-label" for="accountActivation">
                                                Saya menyetujui
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-danger deactivate-account">
                                            Hapus Akun
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FOOTER START -->
                    <?php include '../partials/footer.php'; ?>
                    <!-- FOOTER END -->

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CORE JS START -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/dashboards-analytics.js"></script>
    <script src="../assets/js/change-avatar.js"></script>
    <!-- CORE JS END -->
    <!-- ALERT -->
    <?php include '../partials/alert.php' ?>
</body>

</html>