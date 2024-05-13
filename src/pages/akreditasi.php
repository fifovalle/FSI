<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/akreditasi.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid p-0">
        <div class="section-akreditasi">
            <div class="container-fluid p-0 fakultas-animation">
                <div class="row header-akreditasi text-center">
                    <div class="col-md-12 mt-md-5 col-sm-12 ">
                        <div class="title-akreditasi">
                            <h1>Akreditasi</h1>
                            <div class="row akreditasi-img">
                                <div class="col-md-6 text-end col-sm-12 ">
                                    <img src="../assets/img/akreditasi/1.png" class="img-thumbnail border border-0" alt="">
                                </div>
                                <div class="col-md-6 text-start col-sm-12 ">
                                    <img src="../assets/img/akreditasi/2.png" class="img-thumbnail border border-0" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-md-5 col-sm-12 ">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Program Studi</th>
                                    <th scope="col">Strata</th>
                                    <th scope="col">No.SK</th>
                                    <th scope="col">Tahun SK</th>
                                    <th scope="col">Peringkat</th>
                                    <th scope="col">Tanggal Kedaluwarsa</th>
                                    <th scope="col">Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kimia</td>
                                    <td>S1</td>
                                    <td>5132/SK/BAN-PT/Akred/S/IX/2020</td>
                                    <td>2020</td>
                                    <td>B</td>
                                    <td>2025-09-01</td>
                                    <td><a href="http://baa.unjani.ac.id/wp-content/uploads/2020/11/FSI-Sertifikat-KIMIA-2020.pdf">View/Download</a></td>
                                </tr>
                                <tr>
                                    <td>Teknik Informatika</td>
                                    <td>S1</td>
                                    <td>8304/SK/BAN-PT/Ak-PPJ/S/XII/2020</td>
                                    <td>2020</td>
                                    <td>B</td>
                                    <td>2025-12-13</td>
                                    <td><a href="http://baa.unjani.ac.id/wp-content/uploads/2021/01/Sertifikat-Akre-Informatika.pdf">View/Download</a></td>
                                </tr>
                                <tr>
                                    <td>Sistem Informasi</td>
                                    <td>S1</td>
                                    <td>12483/SK/BAN-PT/PB-PS/S/XI/2021</td>
                                    <td>2021</td>
                                    <td>Baik</td>
                                    <td>2026-03-10</td>
                                    <td><a href="https://sg.docworkspace.com/d/sIK6iwL5lz4aMqgY">View/Download</a></td>
                                </tr>
                                <tr>
                                    <td>Magister Kimia</td>
                                    <td>S2</td>
                                    <td>12481/SK/BAN-PT/PB-PS/M/XI/2021</td>
                                    <td>2021</td>
                                    <td>Baik</td>
                                    <td>2026-04-26</td>
                                    <td><a href="https://sg.docs.wps.com/view/l/sILOiwL5luYWMqgY">View/Download</a></td>
                                </tr>
                            </tbody>
                        </table>
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