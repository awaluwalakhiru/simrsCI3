<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
$judul = 'Rekam Medis';
require_once "../templates/header.php";
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Rekam Medis</h1>
        </div>
        <form action="proses.php" method="post" class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Daftar Rekam Medis</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('rekam/data.php'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
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
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user-injured"></i>
                                                    </div>
                                                </div>
                                                <select class="custom-select mr-sm-2" name="nama_pasien" id="nama_pasien" required autofocus>
                                                    <option selected>Pilih nama pasien</option>
                                                    <?php
                                                    $pasien = mysqli_query($conn, "SELECT * FROM tb_pasien");
                                                    ?>
                                                    <?php while ($data = mysqli_fetch_assoc($pasien)) : ?>
                                                        <option value="<?= $data['id_pasien']; ?>"><?= $data['nama_pasien']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon pilih nama pasien!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="nama_dokter">Nama Dokter</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user-md"></i>
                                                    </div>
                                                </div>
                                                <select class="custom-select mr-sm-2" name="nama_dokter" id="nama_dokter" required>
                                                    <option selected>Pilih nama dokter</option>
                                                    <?php
                                                    $dokter = mysqli_query($conn, "SELECT * FROM tb_dokter");
                                                    ?>
                                                    <?php while ($data = mysqli_fetch_assoc($dokter)) : ?>
                                                        <option value="<?= $data['id_dokter']; ?>"><?= $data['nama_dokter']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon pilih nama dokter!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="nama_poliklinik">Nama Poliklinik</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-hospital"></i>
                                                    </div>
                                                </div>
                                                <select class="custom-select mr-sm-2" name="nama_poliklinik" id="nama_poliklinik" required>
                                                    <option selected>Pilih nama poliklinik</option>
                                                    <?php
                                                    $poliklinik = mysqli_query($conn, "SELECT * FROM tb_poliklinik");
                                                    ?>
                                                    <?php while ($data = mysqli_fetch_assoc($poliklinik)) : ?>
                                                        <option value="<?= $data['id_poliklinik']; ?>"><?= $data['nama_poliklinik']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon pilih nama poliklinik!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="keluhan">Keluhan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-file-medical"></i>
                                                    </div>
                                                </div>
                                                <textarea class="form-control" name="keluhan" id="keluhan" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Mohon isi Keterangan keluhan!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="diagnosa">Diagnosa</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-diagnoses"></i>
                                                    </div>
                                                </div>
                                                <textarea class="form-control" name="diagnosa" id="diagnosa" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Mohon isi keterangan Diagnosa!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="nama_obat">Nama Obat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-first-aid"></i>
                                                    </div>
                                                </div>
                                                <select multiple class="custom-select mr-sm-2" name="nama_obat[]" id="nama_obat" required>
                                                    <option selected>Pilih nama obat</option>
                                                    <?php
                                                    $obat = mysqli_query($conn, "SELECT * FROM tb_obat");
                                                    ?>
                                                    <?php while ($data = mysqli_fetch_assoc($obat)) : ?>
                                                        <option value="<?= $data['id_obat']; ?>"><?= $data['nama_obat']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon pilih nama obat!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="tanggal_periksa">Tanggal Periksa</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input type="date" id="tanggal_periksa" name="tanggal_periksa" value="<?= date("Y-m-d"); ?>" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Mohon isi pilih tanggal periksa!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="row">
                                <div class="col-8 mx-auto">
                                    <button class="btn btn-primary float-right" type="submit" name="tambah">Tambah Rekam Medis</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<script>
    CKEDITOR.replace('keluhan');
    CKEDITOR.replace('diagnosa');
</script>
<?php require_once "../templates/footer.php"; ?>