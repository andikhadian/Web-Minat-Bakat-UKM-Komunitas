<!DOCTYPE html>
<html lang="en">

<head>
    <title>layanan Minat & Bakat FTI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>asset_home/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url() ?>asset_home/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/aos.css">

    <link rel="stylesheet" href="<?= base_url() ?>asset_home/css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif') ?>"></div>
                    <div class="site-logo mr-auto w-25"><a href="<?= base_url('') ?>">Layanan Minat & Bakat FTI</a></div>
                    <div class="mx-auto text-center">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="#courses-section" class="nav-link">Kegiatan</a></li>
                                <li><a href="#teachers-section" class="nav-link">Struktur</a></li>
                                <li><a href="#contact-section" class="nav-link">Kontak</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="ml-auto w-25">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                                <?php if ($user) : ?>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">
                                            <div class="d-sm-none d-lg-inline-block">
                                                <?= $user['nama_user']; ?>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?= base_url('Auth/logout') ?>" class="btnLogout dropdown-item text-danger">
                                                Logout
                                            </a>
                                        </div>
                                    </li>
                                <?php else : ?>
                                    <li><a href="<?= base_url('Auth/registrasi') ?>" class="nav-link"><span>Register</span></a></li>
                                    <li class="cta"><a href="<?= base_url('Auth') ?>" class="nav-link"><span>Login</span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>
        </header>