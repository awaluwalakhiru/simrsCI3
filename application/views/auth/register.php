<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="<?php echo base_url() ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar</h4>
                        </div>

                        <?php if ($this->session->flashdata('pesan')) : ?>
                            <span class="alert mx-3 mb-0 alert-<?php echo $this->session->userdata('alert'); ?> alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong><?php echo $this->session->flashdata('pesan'); ?></strong>
                                </div>
                            </span>
                        <?php endif; ?>

                        <div class="card-body">
                            <?php echo form_open('auth/daftar', [
                                "class" => 'needs-validation',
                                "novalidate" => ''
                            ]) ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="<?php echo html_escape(set_value('nama_depan')) ?>" tabindex="1" required autofocus>
                                    <span class="text-danger"><?php echo form_error('nama_depan') ?></span>
                                    <span class="invalid-feedback">
                                        Harap masukkan nama depan anda
                                    </span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="<?php echo html_escape(set_value('nama_belakang')) ?>" tabindex="2" required autofocus>
                                    <span class="text-danger"><?php echo form_error('nama_belakang') ?></span>
                                    <div class="invalid-feedback">
                                        Harap masukkan nama belakang anda
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username" value="<?php echo html_escape(set_value('username')) ?>" tabindex="3" required autofocus>
                                <span class="text-danger"><?php echo form_error('username') ?></span>
                                <div class="invalid-feedback">
                                    Harap masukkan username anda
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo html_escape(set_value('email')) ?>" tabindex="4" required autofocus>
                                <span class="text-danger"><?php echo form_error('email') ?></span>
                                <div class="invalid-feedback">
                                    Harap masukkan email anda
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" value="<?php echo html_escape(set_value('password')) ?>" tabindex="5" required autofocus>
                                    <span class="text-danger"><?php echo form_error('password') ?></span>
                                    <div class="invalid-feedback">
                                        Harap masukkan password anda
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input id="password2" type="password" class="form-control" name="password2" value="<?php echo html_escape(set_value('password2')) ?>" tabindex="6" required autofocus>
                                    <span class="text-danger"><?php echo form_error('password2') ?></span>
                                    <div class="invalid-feedback">
                                        Harap masukkan konfirmasi password anda
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Daftar
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Sudah punya akun? <?php echo anchor(site_url('auth'), 'Masuk') ?>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Awal Prasetyo 2019
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>