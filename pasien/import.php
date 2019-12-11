<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
$judul = 'Pasien';
require_once "../templates/header.php";
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Import Data Pasien</h1>
        </div>
        <form action="proses.php" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Import Daftar Pasien</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('pasien/data.php'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
                            </div>
                        </div>
                        <div class="row" style="padding-left:20px;padding-right:20px;">
                            <div class="col-12">
                                <?php if (isset($_SESSION['pesan'])) {
                                    echo $_SESSION['pesan'];
                                    unset($_SESSION['pesan']);
                                }; ?>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <section class="mx-auto">
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <input type="file" name="import" id="import" class="form-control" required>
                                            <label for="import"></label>
                                            <div class="invalid-feedback">Mohon pilih file excel anda</div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="row">
                                <div class="col-8 mx-auto pt-2">
                                    <button class="btn btn-primary float-right" type="submit" name="import">Import data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<?php require_once "../templates/footer.php"; ?>