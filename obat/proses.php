<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url() . "");
    exit();
}
require '../assets/libs/vendor/autoload.php';
use Ramsey\Uuid\Uuid;

if (isset($_POST['tambah'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama_obat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_obat']))));
    $ket_obat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['ket_obat']))));
    $obat_db = mysqli_query($conn, "SELECT nama_obat FROM tb_obat WHERE nama_obat='$nama_obat'");

    if (mysqli_num_rows($obat_db) > 0) {
        $_SESSION['pesan'] = '<div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data obat sudah ada harap masukkan lainnya!.
            </div>
        </div>';
        header('location:' . base_url("obat/tambah.php") . '');
        exit();
    } else {
        $query_tambah = "INSERT INTO tb_obat VALUES ('$uuid','$nama_obat','$ket_obat')";
        $query = mysqli_query($conn, $query_tambah);
        // $query = false;

        if ($query) {
            $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Info</div>
            Data obat berhasil ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('obat/data.php') . "");
            exit();
        } else {
            $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data obat gagal ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('obat/tambah.php') . "");
            exit();
        }
    }
} else if (isset($_POST['edit'])) {
    $id_obat = $_POST['id_obat'];
    $nama_obat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_obat']))));
    $ket_obat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['ket_obat']))));
    $query_edit = "UPDATE tb_obat SET nama_obat='$nama_obat', ket_obat='$ket_obat' WHERE id_obat='$id_obat'";
    $query = mysqli_query($conn, $query_edit);
    // $query = false;

    if ($query) {
        $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Info</div>
        Data obat berhasil diedit.
        </div>
    </div>';
        header("location:" . base_url('obat/data.php') . "");
        exit();
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Perhatian</div>
        Data obat gagal diedit.
        </div>
    </div>';
        header("location:" . base_url('obat/edit.php') . "");
        exit();
    }
}
