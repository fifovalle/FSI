<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/tenaga-staff.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-tenagastaff">
            <div class="container-fluid p-0">
                <div class="row header-tenagastaff fakultas-animation">
                    <div class="col-md-12 col-sm-12 text-center mt-md-2 mb-md-2">
                        <h2 class="mb-3">Daftar Tenaga Kependidikan Fakultas Sains dan Informatika</h2>
                        <?php
                        $staffModel = new Staff($koneksi);
                        $staffInfo = $staffModel->tampilkanDataStaff();
                        $totalData = count($staffInfo);
                        $limit = 10;
                        $totalPages = ceil($totalData / $limit);
                        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                        $offset = ($page - 1) * $limit;
                        $staffInfoPerPage = array_slice($staffInfo, $offset, $limit);
                        ?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIP/NID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($staffInfoPerPage as $index => $staff) : ?>
                                    <tr>
                                        <td><?= $offset + $index + 1 ?></td>
                                        <td><?= $staff['NIP_NID_Staff'] ?></td>
                                        <td><?= $staff['Nama_Staff'] ?></td>
                                        <td><?= $staff['Jabatan_Staff'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 col-sm-12 mt-md-2 px-auto justify-content-center navigasi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                    <li class="page-item <?= ($page == $i) ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
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