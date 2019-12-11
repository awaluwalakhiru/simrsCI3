<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        <?= $judul; ?>
    </title>
    <!-- meta icon -->
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <!-- icon -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url() ?>/assets/icon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>/assets/icon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>/assets/icon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>/assets/icon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url() ?>/assets/icon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url() ?>/assets/icon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url() ?>/assets/icon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url() ?>/assets/icon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/icon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/icon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/icon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/icon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/icon/favicon-128.png" sizes="128x128" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/fontawesome/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/datatables.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">
    <!-- khusus jquery -->
    <script src="<?= base_url(); ?>/assets/modules/jquery.min.js"></script>
    <!-- khusus sweet alert -->
    <script src="<?= base_url(); ?>/assets/modules/sweetalert/sweetalert.min.js"></script>
    <!-- khusus ckeditor -->
    <script src="<?= base_url(); ?>/assets/libs/vendor/ckeditor/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                    <div class="search-element">
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url(); ?>/assets/img/icon.jpg" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi,
                                <?= strtoupper($_SESSION['user']); ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged at
                                <?= date("d-M-Y", $_SESSION['waktu']); ?>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout.php'); ?>" class="dropdown-item has-icon text-danger logout">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url(); ?>">SIMRS</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url(); ?>">APP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <?php if ($judul == 'Dashboard') : ?>
                        <li class="klik active">
                            <a href="<?= base_url(); ?>" class="nav-link"><i class="fas fa-th"></i><span>Beranda</span></a>
                        </li>
                        <?php else : ?>
                        <li class="klik">
                            <a href="<?= base_url(); ?>" class="nav-link"><i class="fas fa-th"></i><span>Beranda</span></a>
                        </li>
                        <?php endif; ?>
                        <li class="menu-header">Pasien</li>
                        <?php if ($judul == 'Pasien') : ?>
                        <li class="klik active">
                            <a href="<?= base_url('pasien/data.php'); ?>" class="nav-link"><i class="fas fa-user-plus"></i><span>Data Pasien</span></a>
                        </li>
                        <?php else : ?>
                        <li class="klik">
                            <a href="<?= base_url('pasien/data.php'); ?>" class="nav-link"><i class="fas fa-user-plus"></i><span>Data Pasien</span></a>
                        </li>
                        <?php endif; ?>
                        <li class="menu-header">Dokter</li>
                        <?php if ($judul == 'Dokter') : ?>
                        <li class="klik active">
                            <a href="<?= base_url('dokter/data.php'); ?>" class="nav-link"><i class="fas fa-user-md"></i><span>Data Dokter</span></a>
                        </li>
                        <?php else : ?>
                        <li class="klik">
                            <a href="<?= base_url('dokter/data.php'); ?>" class="nav-link"><i class="fas fa-user-md"></i><span>Data Dokter</span></a>
                        </li>
                        <?php endif; ?>
                        <li class="menu-header">Poliklinik</li>
                        <?php if ($judul == 'Poliklinik') : ?>
                        <li class="klik active">
                            <a href="<?= base_url('poliklinik/data.php'); ?>" class="nav-link"><i class="fas fa-hospital"></i><span>Data Poliklinik</span></a>
                        </li>
                        <?php else : ?>
                        <li class="klik">
                            <a href="<?= base_url('poliklinik/data.php'); ?>" class="nav-link"><i class="fas fa-hospital"></i><span>Data Poliklinik</span></a>
                        </li>
                        <?php endif; ?>
                        <li class="menu-header">Obat</li>
                        <?php if ($judul == 'Obat') : ?>
                        <li class="klik active">
                            <a href="<?= base_url('obat/data.php'); ?>" class="nav-link"><i class="fas fa-briefcase-medical"></i><span>Data Obat</span></a>
                        </li>
                        <?php else : ?>
                        <li class="klik">
                            <a href="<?= base_url('obat/data.php'); ?>" class="nav-link"><i class="fas fa-briefcase-medical"></i><span>Data Obat</span></a>
                        </li>
                        <?php endif; ?>
                        <li class="menu-header">Rekam Medis</li>
                        <?php if ($judul == 'Rekam Medis') : ?>
                        <li class="klik active">
                            <a href="<?= base_url('rekam/data.php'); ?>" class="nav-link"><i class="fas fa-file-medical-alt"></i><span>Rekam Medis</span></a>
                        </li>
                        <?php else : ?>
                        <li class="klik">
                            <a href="<?= base_url('rekam/data.php'); ?>" class="nav-link"><i class="fas fa-file-medical-alt"></i><span>Rekam Medis</span></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="<?= base_url('auth/logout.php'); ?>" class="btn btn-danger btn-lg btn-block btn-icon-split logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </aside>
            </div>