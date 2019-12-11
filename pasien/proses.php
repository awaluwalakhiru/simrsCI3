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
    $nomor_identitas = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nomor_identitas']))));
    $nama_pasien = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_pasien']))));
    $jenis_kelamin = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['jenis_kelamin']))));
    $alamat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['alamat']))));
    $no_telepon = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['no_telepon']))));
    $pasien_db = mysqli_query($conn, "SELECT nama_pasien FROM tb_pasien WHERE nama_pasien='$nama_pasien' OR nomor_identitas='$nomor_identitas'");

    if (mysqli_num_rows($pasien_db) > 0) {
        $_SESSION['pesan'] = '<div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data pasien sudah ada harap masukkan lainnya!.
            </div>
        </div>';
        header('location:' . base_url("pasien/tambah.php") . '');
        exit();
    } else {
        $query_tambah = "INSERT INTO tb_pasien VALUES ('$uuid','$nomor_identitas','$nama_pasien','$jenis_kelamin','$alamat','$no_telepon')";
        $query = mysqli_query($conn, $query_tambah);
        // $query = false;

        if ($query) {
            $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Info</div>
            Data pasien berhasil ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('pasien/data.php') . "");
            exit();
        } else {
            $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Perhatian</div>
            Data pasien gagal ditambahkan.
            </div>
        </div>';
            header("location:" . base_url('pasien/tambah.php') . "");
            exit();
        }
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id_pasien'];
    $nomor_identitas = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nomor_identitas']))));
    $nama_pasien = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['nama_pasien']))));
    $jenis_kelamin = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['jenis_kelamin']))));
    $alamat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['alamat']))));
    $no_telepon = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $_POST['no_telepon']))));
    $query_edit = "UPDATE tb_pasien SET nomor_identitas='$nomor_identitas', nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telepon='$no_telepon' WHERE id_pasien='$id'";
    $query = mysqli_query($conn, $query_edit);
    // $query = false;

    if ($query) {
        $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Info</div>
        Data pasien berhasil diedit.
        </div>
    </div>';
        header("location:" . base_url('pasien/data.php') . "");
        exit();
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Perhatian</div>
        Data pasien gagal diedit.
        </div>
    </div>';
        header("location:" . base_url('pasien/edit.php') . "");
        exit();
    }
} elseif (isset($_POST['import'])) {
    $nama = $_FILES['import']['name'];
    $pecah = explode(".", $nama);
    $ekstensi = end($pecah);
    $jadi = "file-" . round(microtime(true)) . "." . $ekstensi;
    $sumber = $_FILES['import']['tmp_name'];
    $tujuan = "../upload/" . $jadi;
    $upload = move_uploaded_file($sumber, $tujuan);

    $obj = PHPExcel_IOFactory::load($tujuan);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    for ($i = 3; $i <= count($all_data); $i++) {
        $uuid = Uuid::uuid4()->toString();
        $nomor_identitas = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $all_data[$i]['A']))));
        $nama_pasien = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $all_data[$i]['B']))));
        $jenis_kelamin = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $all_data[$i]['C']))));
        $alamat = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $all_data[$i]['D']))));
        $no_telepon = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($conn, $all_data[$i]['E']))));
        $sql = "INSERT INTO tb_pasien VALUES ";
        $sql .= " ('$uuid','$nomor_identitas','$nama_pasien','$jenis_kelamin','$alamat','$no_telepon')";
        $kueri = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    if ($kueri) {
        $_SESSION['pesan'] = '<div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Perhatian</div>
        Data pasien berhasil diimport.
        </div>
    </div>';
        unlink($tujuan);
        header("location:" . base_url('pasien/data.php'));
        exit();
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
        <div class="alert-title">Perhatian</div>
        Data pasien gagal diimport.
        </div>
    </div>';
        unlink($tujuan);
        header("location:" . base_url('pasien/import.php'));
        exit();
    }
}
