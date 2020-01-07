<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title ?></title>

    <!-- meta icon -->
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

    <!-- icon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo base_url() ?>assets/icon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/icon/favicon-128.png" sizes="128x128" />


    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <?php echo $css ?>


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

</head>

<body>
    <div class="loading">
        <img src="<?php echo base_url('assets/img/gears.gif') ?>" class="loadimage">
    </div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <figure class="avatar mr-2 avatar-sm">
                                <img src="<?php echo base_url() ?>assets/img/avatar/<?php echo $foto; ?>" class="rounded-circle mr-1">
                                <i class="avatar-presence online"></i>
                            </figure>
                            <div class="d-sm-none d-lg-inline-block">Halo, <?php echo ucfirst($username) ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Masuk <?php echo $login ?> lalu</div>
                            <a href="<?php echo base_url('user/bio'); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="<?php echo base_url('user/atur'); ?>" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo site_url('auth/keluar') ?>" class="dropdown-item has-icon text-danger logout">
                                <i class="fas fa-sign-out-alt"></i>Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?php echo site_url() ?>">SIMRS</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?php echo site_url() ?>">APP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?php if ($this->session->userdata('level') === 'admin') : ?>
                            <li class="menu-header">Dashboard</li>
                            <li class="dropdown <?php echo ($title == 'Dashboard') ? 'active' : ''; ?>">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Beranda</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="<?php echo site_url('beranda') ?>">Ringkasan</a></li>
                                    <li><a class="nav-link" href="<?php echo site_url('beranda/daftar') ?>">Users</a></li>
                            </li>
                    </ul>
                <?php endif; ?>
                <li class="menu-header">Dokter</li>
                <li class="dropdown <?php echo ($title == 'Dokter') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-md"></i>
                        <span>Data Dokter</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url('dokter') ?>">Daftar Dokter</a></li>
                    </ul>
                </li>
                <li class="menu-header">Pasien</li>
                <li class="dropdown <?php echo ($title == 'Pasien') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-plus"></i> <span>Data Pasien</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url('pasien') ?>">Daftar Pasien</a></li>
                    </ul>
                </li>
                <li class="menu-header">Poliklinik</li>
                <li class="dropdown <?php echo ($title == 'Poliklinik') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-hospital"></i> <span>Data Poliklinik</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('poliklinik') ?>">Daftar Poliklinik</a></li>
                    </ul>
                </li>
                <li class="menu-header">Obat</li>
                <li class="dropdown <?php echo ($title == 'Obat') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase-medical"></i> <span>Data Obat</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url('obat'); ?>">Daftar Obat</a></li>
                    </ul>
                </li>
                <li class="menu-header">Rekam Medis</li>
                <li class="dropdown <?php echo ($title == 'Rekam Medis') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-medical-alt"></i> <span>Data Rekam Medis</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url('rekam'); ?>">Daftar Rekam Medis</a></li>
                    </ul>
                </li>
                <li class="menu-header">User</li>
                <li class="dropdown <?php echo ($title == 'User') ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-universal-access"></i> <span>Data User</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url('user/bio'); ?>">Profile</a></li>
                        <li><a class="nav-link" href="<?php echo site_url('user/atur'); ?>">Settings</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="<?php echo site_url('kredit'); ?>"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a>
                </li>
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="<?php echo site_url('auth/keluar') ?>" class="logout btn btn-primary btn-lg btn-block btn-icon-split">
                        <i class="fas fa-sign-out-alt"></i>Keluar
                    </a>
                </div>
                </aside>
            </div>