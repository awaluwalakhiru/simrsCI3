<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}

$pilih = $_POST['pilih'];
foreach ($pilih as $id) {
    $sql = mysqli_query($conn, "DELETE FROM tb_dokter WHERE id_dokter='$id'");
}

if ($sql) {
    $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Info</div>
            ' . count($_POST['pilih']) . ' Data dokter berhasil dihapus.
            </div>
        </div>';
    header("location:" . base_url('dokter/data.php') . "");
    exit();
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data dokter gagal dihapus.
            </div>
        </div>';
    header("location:" . base_url('dokter/data.php') . "");
    exit();
}
