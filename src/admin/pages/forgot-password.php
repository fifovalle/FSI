<?php
include '../config/databases.php';
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Lupa kata sandi</title>
    <link rel="icon" href="../assets/img/favicon/2.png">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/login.css" />
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
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
                        <h3 class="header-title">Lupa Kata Sandi?</h3>
                        <form class="login-form" action="../config/forgot-pass.php" method="post">
                            <p>Masukan email anda, untuk mendapatkan akses merubah kata sandi!</p>
                            <p></p>
                            <div class="form-group">
                                <input type="text" class="form-control" name="Email_Forgot" placeholder="Masukan email anda">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" name="Kirim" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <!-- ALERT -->
    <?php include '../partials/alert.php' ?>
</body>

</html>