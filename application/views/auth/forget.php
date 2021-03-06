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
                            <h4>Lupa Password</h4>
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
                            <p class="text-muted">Kami akan kirim link untuk reset password anda</p>
                            <?php echo form_open('auth/lupa') ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email" tabindex="1" value="<?php echo html_escape(set_value('email')) ?>" autofocus>
                                <span class="text-danger"><?php echo form_error('email') ?></span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="2">
                                    Lupa Password
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <div class="col">
                            Sudah punya akun? <?php echo anchor('auth', 'Masuk') ?>
                        </div>
                        <div class="col">
                            Tidak punya akun? <?php echo anchor('auth/daftar_v', 'Daftar') ?>
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