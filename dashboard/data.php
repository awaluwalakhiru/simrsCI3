<?php
    require_once "../config/config.php";
    if (!isset($_SESSION['user']))
    {
        header("location:" . base_url() . "");
        exit();
    }
    $judul = 'Dashboard';
    require_once "../templates/header.php";
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Beranda</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pasien</h4>
                        </div>
                        <?php
                            $sql_pasien = mysqli_query($conn, "SELECT * FROM tb_pasien");
                            $num1       = mysqli_num_rows($sql_pasien);
                        ?>
                        <div class="card-body">
                            <?=$num1;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Dokter</h4>
                        </div>
                        <?php
                            $sql_dokter = mysqli_query($conn, "SELECT * FROM tb_dokter");
                            $num2       = mysqli_num_rows($sql_dokter);
                        ?>
                        <div class="card-body">
                            <?=$num2;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Obat</h4>
                        </div>
                        <?php
                            $sql_obat = mysqli_query($conn, "SELECT * FROM tb_obat");
                            $num3     = mysqli_num_rows($sql_obat);
                        ?>
                        <div class="card-body">
                            <?=$num3;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Rekap</h4>
                        </div>
                        <?php
                            $sql_rekap = mysqli_query($conn, "SELECT * FROM tb_rekam_medis");
                            $num4      = mysqli_num_rows($sql_rekap);
                        ?>
                        <div class="card-body">
                            <?=$num4;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar 5 Pasien Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <?php
                            $no  = 1;
                            $sql = mysqli_query($conn, "SELECT * FROM tb_pasien ORDER BY id_pasien DESC LIMIT 5");
                        ?>
                        <?php while ($data = mysqli_fetch_assoc($sql)): ?>
                        <div class="mb-4">
                            <div class="text-small float-right font-weight-bold text-muted">
                                <?=$no++;?>
                            </div>
                            <div class="font-weight-bold mb-1">
                                <?=strtoupper($data['nama_pasien']);?>
                            </div>
                            <div class="progress" data-height="5">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" data-width="100%" aria-valuenow="<?=$no;?>" aria-valuemin="1" aria-valuemax="5"></div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "../templates/footer.php";?>