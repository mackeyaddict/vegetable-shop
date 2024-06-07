<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css'; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <title>Selamat Datang</title>
</head>

<body>

</body>
<section class="vh-100" style="background-color: #33691E;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="<?php echo base_url('assets/image/sayur-2.jpg'); ?>" alt="login form"
                                class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form action="<?php echo base_url() . 'welcome/login' ?>" method="post">

                                    <div
                                        class="d-flex align-items-center mb-3 pb-1 animate__animated animate__fadeInDown animate__delay-500ms">
                                        <img src="<?php echo base_url('assets/image/logo2.png'); ?>" alt="Logo"
                                            style="max-width:50%;" class="img-fluid">
                                    </div>
                                    <br>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                                        Silahkan Masuk ke Akun Anda
                                    </h5>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="username" class="form-control form-control-lg"
                                            required />
                                        <?php echo form_error('username') ?>
                                        <label class="form-label" for="username">Username</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            required />
                                        <?php echo form_error('password') ?>
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <input type="submit" value="Masuk" class="btn btn-dark btn-lg btn-block">
                                    </div>
                                </form>
                                <br>
                                <?php
                                if (isset($_GET['pesan'])) {
                                    if ($_GET['pesan'] = "gagal") {
                                        echo "<div class='alert alert-danger'>Login Gagal! Username atau Password Anda Salah</div>";
                                    } else if ($_GET['pesan'] = "logout") {
                                        echo "<div class='alert alert-danger'>Anda telah melakukan logout</div>";
                                    } else if ($_GET['pesan'] = "belumlogin") {
                                        echo "<div class='alert alert-success'>Silahkan lakukan login terlebih dahulu</div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>