<?php
    require_once "../config/config.php";
    if (isset($_SESSION['user']))
    {
        header("location:" . base_url() . "");
        exit();
        // echo "<script>window.location.href='" . base_url() . "'</script>";
    }
    $judul = 'Login Aplikasi Rumah Sakit';
    require_once "../templates/header_login.php";
?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="<?=base_url('assets/img/stisla-fill.svg');?>" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="row" style="padding-left:20px;padding-right:20px;">
                            <div class="col-12">
                                <?php if (isset($_SESSION['pesan']))
                                    {
                                        echo $_SESSION['pesan'];
                                        unset($_SESSION['pesan']);
                                    }
                                ;?>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="proses.php" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus autocomplete="off">
                                    <div class="invalid-feedback">
                                        Mohon isi username anda!
                                    </div>
                                    <h6><small>Username isi <b class="text-info"><strong>admin</strong></b> untuk mencoba....</small></h6>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required autocomplete="off">
                                    <div class="invalid-feedback">
                                        Mohon isi password anda!
                                    </div>
                                    <h6><small>Password isi <b class="text-info"><strong>admin</strong></b> untuk mencoba....</small></h6>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Awal Prasetyo 2019
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "../templates/footer_login.php";?>