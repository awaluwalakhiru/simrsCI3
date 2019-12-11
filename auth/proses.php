<?php
require_once "../config/config.php";
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = sha1($_POST['password']);
    $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$username' AND password='$password'");

    if (mysqli_num_rows($user) > 0) {
        $_SESSION['user'] = $username;
        $_SESSION['waktu'] = time();
        header("location:" . base_url('dashboard/data.php') . "");
        exit();
    } else {
        $_SESSION['pesan'] = '
            <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                <div class="alert-title">Danger</div>
                Username / password anda tidak sesuai!
                </div>
            </div>
    ';
        header("location:" . base_url() . "");
        exit();
    }
};
