<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}

$id = $_GET['id_rekam_medis'];
$query = mysqli_query($conn, "DELETE FROM tb_rekam_medis WHERE id_rekam_medis='$id'");
// $query = false;

if ($query) {
    $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
    <div class="alert-title">Info</div>
    Data rekam medis berhasil dihapus.
    </div>
</div>';
    header("location:" . base_url('rekam/data.php') . "");
    exit();
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
    <div class="alert-title">Perhatian</div>
    Data rekam medis gagal dihapus.
    </div>
</div>';
    header("location:" . base_url('rekam/data.php') . "");
    exit();
}
