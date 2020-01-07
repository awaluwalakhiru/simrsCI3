<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="<?php echo base_url() ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Reset Password</h4>
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
                            <p class="text-muted">Mohon isi password baru untuk mereset password lama anda</p>
                            <?php echo form_open('auth/balik', ['class' => 'needs-validation', 'novalidate' => '']) ?>
                            <div class="form-group">
                                <input type="hidden" name="email" value="<?php echo htmlspecialchars($this->input->get('email', true)) ?>">
                                <input type="hidden" name="token" value="<?php echo htmlspecialchars($this->input->get('token', true)) ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password baru</label>
                                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="1" required autofocus>
                                <span class="text-danger"><?php echo form_error('password') ?></span>
                                <div class="invalid-feedback">
                                    Mohon isi password anda
                                </div>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password2">Konfirmasi Password</label>
                                <input id="password2" type="password" class="form-control" name="password2" tabindex="2" required autofocus>
                                <span class="text-danger"><?php echo form_error('password2') ?></span>
                                <div class="invalid-feedback">
                                    Mohon isi konfirmasi password
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                    Reset Password
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Tidak punya akun? <?php echo anchor('auth/daftar', 'Daftar') ?>
                    </div>
                    <div class="text-muted text-center">
                        Sudah punya akun? <?php echo anchor('auth', 'Masuk') ?>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Awal Prasetyo 2019
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>