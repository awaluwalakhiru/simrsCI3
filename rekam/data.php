<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
}
$judul = 'Rekam Medis';
require_once "../templates/header.php"; ?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Rekam Medis</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Rekam Medis</h4>
                    </div>
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <div class="col-12">
                            <?php if (isset($_SESSION['pesan'])) {
                                echo $_SESSION['pesan'];
                                unset($_SESSION['pesan']);
                            }; ?>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row float-right pr-2">
                            <div class="col-3">
                                <a class="btn btn-success btn-action" data-toggle="tooltip" title="Tambah" href="<?= base_url('rekam/tambah.php'); ?>"><i class="fas fa-plus"></i> tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6><small>Data Rekam Medis</small></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md" id="tb_rekam_medis">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Nama Poliklinik</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Obat</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM tb_rekam_medis JOIN tb_pasien ON tb_rekam_medis.id_pasien=tb_pasien.id_pasien JOIN tb_dokter ON tb_rekam_medis.id_dokter=tb_dokter.id_dokter JOIN tb_poliklinik ON tb_rekam_medis.id_poliklinik=tb_poliklinik.id_poliklinik");
                                    $no = 1;
                                    ?>
                                    <?php while ($data = mysqli_fetch_assoc($sql)) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_pasien']; ?></td>
                                            <td><?= $data['nama_dokter']; ?></td>
                                            <td><?= $data['nama_poliklinik']; ?></td>
                                            <td><?= $data['keluhan']; ?></td>
                                            <td><?= $data['diagnosa']; ?></td>
                                            <td><?= date("d-M-Y", strtotime($data['tanggal_periksa'])); ?></td>
                                            <td>
                                                <?php
                                                $obat = mysqli_query($conn, "SELECT * FROM tb_rekam_medis_obat JOIN tb_obat ON tb_rekam_medis_obat.id_obat=tb_obat.id_obat WHERE id_rekam_medis='$data[id_rekam_medis]'");
                                                while ($row = mysqli_fetch_assoc($obat)) {
                                                    echo $row['nama_obat'] . "<br>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="<?= base_url('rekam/edit.php'); ?>?id_rekam_medis=<?= $data['id_rekam_medis']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action hapus" data-toggle="tooltip" title="Hapus" href="<?= base_url('rekam/delete.php'); ?>?id_rekam_medis=<?= $data['id_rekam_medis']; ?>"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        $("#tb_rekam_medis").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [0, 4, 5, 7]
            }]
        });
    });
</script>
<?php require_once "../templates/footer.php"; ?>