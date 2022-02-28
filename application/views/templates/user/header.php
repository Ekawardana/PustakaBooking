<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Pustaka Booking | <?= $judul; ?></title>

    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/'); ?>books.png">

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
    <link href='<?= base_url('assets/img/books.png') ?>' rel='shortcut icon'>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Pustaka BO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?= base_url(); ?>">
                        <i class="fas fa-fw fa-home"></i>
                        Beranda <span class="sr-only">(current)</span>
                    </a>
                    <!-- Cek jika sudah login -->
                    <?php if (!empty($this->session->userdata('email'))) : ?>
                        <a class="nav-item nav-link" href="<?= base_url('booking'); ?>">
                            <i class="fas fa-fw fa-book"></i>Booking
                            <b><?= $this->ModelBooking->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?>
                            </b>Buku
                        </a>

                        <a class="nav-item nav-link" href="<?= base_url('member/myprofil'); ?>">
                            <i class="fas fa-fw fa-user"></i>Profile Saya
                        </a>

                        <a class="nav-item nav-link" href="<?= base_url('member/logout'); ?>">
                            <i class="fas fa-fw fa-sign-out-alt"></i> Log out
                        </a>
                    <?php else : ?>
                        <!-- Jika belum login -->
                        <!-- Tombol Daftar -->
                        <a class="nav-item nav-link" data-toggle="modal" data-target="#daftarModal" href="#">
                            <i class="fas fa-fw fa-user-plus"></i> Daftar
                        </a>

                        <!-- Tombol Login -->
                        <a class="nav-item nav-link" data-toggle="modal" data-target="#loginModal" href="#">
                            <i class="fas fa-fw fa-sign-in-alt"></i> Log in
                        </a>
                    <?php endif; ?>
                    <span class="nav-item nav-link nav-right" style="display:block; margin-left:5px;">
                        Selamat Datang<b> <?= $user; ?></b>
                    </span>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">