<?php include '../admin/config/databases.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../partials/header.php');
    ?>
    <link rel="stylesheet" href="../assets/css/organisasi.css">
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include('../partials/navbar.php');
    ?>
    <!-- NAVBAR END -->

    <!-- MAIN START -->
    <main class="container-fluid section-organisasi p-0" style="margin-top:180px;">
        <?php
        $strukturOrganisasiModel = new StrukturOrganisasi($koneksi);
        $strukturOrganisasiInfo = $strukturOrganisasiModel->tampilkanDataStrukturOrganisasi();
        ?>
        <div class="tree">
            <ul class="first">
                <li class="first techops p-0">
                    <span class="box">
                        <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[0]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><br><strong>DEKAN</strong><br><br>
                        <?php echo $strukturOrganisasiInfo[0]['Nama_Dosen_Organisasi']; ?>
                    </span>
                    <ul>
                        <li>
                            <span class="box">
                                <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[1]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><br><strong>WAKIL DEKAN I</strong><br><br>
                                <?php echo $strukturOrganisasiInfo[1]['Nama_Dosen_Organisasi']; ?>
                            </span>
                            <ul style="display: none;">
                                <li>
                                </li>
                        </li>
                    </ul>
                </li>
                <li><span class="box">
                        <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[2]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>WAKIL DEKAN II</strong><br><br>
                        <?php echo $strukturOrganisasiInfo[2]['Nama_Dosen_Organisasi']; ?>
                    </span>
                    <ul>
                        <li>
                            <span class="box " style="padding: 0;">
                                <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[4]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>KABAG TU</strong><br><br>
                                <?php echo $strukturOrganisasiInfo[4]['Nama_Dosen_Organisasi']; ?>
                            </span>
                            <ul>
                                <li><span class="box">
                                        <strong>KASUBAG AKADEMIK</strong>
                                    </span>
                                    <ul>
                                        <li><span class="box">
                                                <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[5]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>KAUR ADM PERPUSTAKAAN</strong><br><br>
                                                <?php echo $strukturOrganisasiInfo[5]['Nama_Dosen_Organisasi']; ?>
                                            </span></li>
                                        <li><span class="box">
                                                <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[6]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>KAUR ADM AKADEMIK</strong><br><br>
                                                <?php echo $strukturOrganisasiInfo[6]['Nama_Dosen_Organisasi']; ?>
                                            </span>
                                            <ul>
                                                <li><span class="box">
                                                        <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[7]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>Anggota Akademik FSI</strong><br><br>
                                                        <?php echo $strukturOrganisasiInfo[7]['Nama_Dosen_Organisasi']; ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><span class="box" id="kasubag-umum">
                                        <strong>KASUBAG UMUM</strong>
                                    </span>
                                    <ul>
                                        <li><span class="box">
                                                <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[8]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>KAUR ADM PERSONEL</strong><br><br>
                                                <?php echo $strukturOrganisasiInfo[8]['Nama_Dosen_Organisasi']; ?>
                                            </span>
                                            <ul>
                                                <li><span class="box">
                                                        <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[9]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>Anggota Akademik FSI</strong><br><br>
                                                        <?php echo $strukturOrganisasiInfo[9]['Nama_Dosen_Organisasi']; ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span class="box">
                                                <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[10]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>KAUR ADM UMUM</strong><br><br>
                                                <?php echo $strukturOrganisasiInfo[10]['Nama_Dosen_Organisasi']; ?>
                                            </span>
                                            <ul>
                                                <li><span class="box">
                                                        <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[11]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>Anggota Akademik FSI</strong><br><br>
                                                        <?php echo $strukturOrganisasiInfo[11]['Nama_Dosen_Organisasi']; ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span class="box">
                                                <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[12]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>KAUR ADM KEUANGAN</strong><br><br>
                                                <?php echo $strukturOrganisasiInfo[12]['Nama_Dosen_Organisasi']; ?>
                                            </span>
                                            <ul>
                                                <li><span class="box">
                                                        <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[13]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>Anggota Urdal FSI</strong><br><br>
                                                        <?php echo $strukturOrganisasiInfo[13]['Nama_Dosen_Organisasi']; ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><span class="box">
                        <div class="avatar"><img src="../uploads/<?php echo $strukturOrganisasiInfo[3]['Foto_Dosen_Organisasi'] ?>" alt="Avatar"></div><strong>WAKIL DEKAN III</strong><br><br>
                        <?php echo $strukturOrganisasiInfo[3]['Nama_Dosen_Organisasi']; ?>
                    </span>
                </li>
            </ul>
        </div>
    </main>
    <!-- MAIN END -->

    <!-- FOOTER START -->
    <?php
    include('../partials/footer.php');
    ?>
    <!-- FOOTER END -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>

</html>