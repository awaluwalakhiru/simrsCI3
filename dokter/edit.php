<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
$judul = 'Dokter';
require_once "../templates/header.php";
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Dokter</h1>
        </div>
        <form action="proses.php" method="post" class="needs-validation" novalidate="">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Daftar Dokter</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('dokter/data.php'); ?>" class="btn btn-info float-right"><i class="fas fa-chevron-left"></i> kembali</a>
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
                        <?php
                        $id = $_GET['id_dokter'];
                        $sql = mysqli_query($conn, "SELECT * FROM tb_dokter WHERE id_dokter='$id'") or die(mysqli_error($conn));
                        $data = mysqli_fetch_assoc($sql);
                        ?>
                        <div class="card-body pt-0">
                            <section class="mx-auto">
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="nama_obat">Nama Dokter</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user-md"></i>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_dokter" value="<?= $data['id_dokter']; ?>">
                                                <input type="text" id="nama_dokter" name="nama_dokter" class="form-control" required="" autofocus value="<?= $data['nama_dokter']; ?>">
                                                <div class="invalid-feedback">
                                                    Mohon isi Nama Dokter!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="ket_obat">Spesialis</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-allergies"></i>
                                                    </div>
                                                </div>
                                                <input type="text" id="spesialis" name="spesialis" class="form-control" required="" value="<?= $data['spesialis']; ?>">
                                                <div class="invalid-feedback">
                                                    Mohon isi Keterangan Spesialisasi!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="ket_obat">Alamat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-bookmark"></i>
                                                    </div>
                                                </div>
                                                <input type="text" id="alamat" name="alamat" class="form-control" required="" value="<?= $data['alamat']; ?>">
                                                <div class="invalid-feedback">
                                                    Mohon isi Alamat!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div class="form-group">
                                            <label for="ket_obat">No Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-tty"></i>
                                                    </div>
                                                </div>
                                                <input type="number" id="no_telepon" pattern="[0-9]+" name="no_telepon" class="form-control" required="" value="<?= $data['no_telepon']; ?>">
                                                <div class="invalid-feedback">
                                                    Mohon isi Nomor Telepon!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="row">
                                <div class="col-8 mx-auto">
                                    <button class="btn btn-primary float-right" type="submit" name="edit">Edit Dokter</button>
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