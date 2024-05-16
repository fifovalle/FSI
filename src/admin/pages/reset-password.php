<?php
include '../config/databases.php';
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Masuk</title>
    <link rel="icon" href="../assets/img/favicon/2.png">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/login.css" />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
    <section class="body">
        <div class="container">
            <div class="login-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <img src="../assets/img/favicon/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <br>
                        <h3 class="header-title">Atur Ulang Kata Sandi</h3>
                        <form class="login-form" action="../config/login.php" method="post">
                            <div class="form-group">
                                <input type="password" class="form-control" name="Kata_Sandi" placeholder="Masukan Kata Sandi Baru" autocomplete="off">
                                <span class="toggle-pass">
                                    <i class="bx bx-show" id="togglePassword"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="Kata_Sandi" placeholder="Masukan Ulang Kata Sandi Anda" autocomplete="off">
                                <span class="toggle-pass">
                                    <i class="bx bx-show" id="togglePassword"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" name="Masuk" type="submit">Atur Ulang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/js/toggle-login.js"></script>

    <!-- ALERT -->
    <?php include '../partials/alert.php' ?>
</body>

</html>