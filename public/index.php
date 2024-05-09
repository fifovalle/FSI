<?php
include '../src/admin/config/databases.php';

if (!isset($_SESSION['ID_Admin'])) {
  setPesanKesalahan("Silahkan login terlebih dahulu!");
  header("Location: ../src/admin/pages/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../src/admin/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Beranda Admin</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="../src/admin/assets/img/favicon/1.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../src/admin/assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../src/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../src/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../src/admin/assets/css/demo.css" />
  <link rel="stylesheet" href="../src/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../src/admin/assets/vendor/libs/apex-charts/apex-charts.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- SIDEBAR START -->
      <?php include '../src/admin/partials/sidebar.php'; ?>
      <!-- SIDEBAR END -->

      <div class="layout-page">
        <!-- NAVBAR START -->
        <?php include '../src/admin/partials/navbar.php'; ?>
        <!-- NAVBAR END -->

        <div class="content-wrapper">
          <!-- CONTENT START -->
          <div class="container-xxl flex-grow-1 container-p-y">

          </div>
          <!-- CONTENT END -->

          <!-- FOOTER START -->
          <?php include '../src/admin/partials/footer.php'; ?>
          <!-- FOOTER START -->
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <!-- CORE JS START -->
  <script src="../src/admin/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../src/admin/assets/vendor/libs/popper/popper.js"></script>
  <script src="../src/admin/assets/vendor/js/bootstrap.js"></script>
  <script src="../src/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../src/admin/assets/vendor/js/menu.js"></script>
  <script src="../src/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="../src/admin/assets/js/main.js"></script>
  <script src="../src/admin/assets/js/dashboards-analytics.js"></script>
  <!-- CORE JS END -->

  <!-- ALERT -->
  <?php include '../src/admin/partials/alert.php' ?>
</body>

</html>