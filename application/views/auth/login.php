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
                            <h4>Masuk</h4>
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
                            <?php echo form_open('auth/masuk', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username" value='<?php echo html_escape(set_value('username')); ?>' tabindex="1" required autofocus>
                                <span class="text-danger"><?php echo form_error('username') ?></span>
                                <div class="invalid-feedback">
                                    Mohon isi username anda
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        <?php echo anchor('auth/lupa_v', 'Lupa password?', 'class="text-small"') ?>
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" value="<?php echo html_escape(set_value('password')); ?>" tabindex="2" required autofocus>
                                <span class="text-danger"><?php echo form_error('password') ?></span>
                                <div class="invalid-feedback">
                                    Mohon isi password anda
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="captcha_user">Captcha</label>
                                <div class="mb-3 px-auto mx-auto">
                                    <?php echo $captcha['image'] ?>
                                </div>
                                <input type="hidden" name="captcha" value='<?php echo $captcha['word'] ?>'>
                                <input id="captcha_user" type="text" class="form-control" name="captcha_user" value='<?php echo html_escape(set_value('captcha_user')); ?>' tabindex="3" required autofocus>
                                <span class="text-danger"><?php echo form_error('captcha_user') ?></span>
                                <div class="invalid-feedback">
                                    Mohon isi captcha
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Masuk
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Tidak punya akun? <?php echo anchor('auth/daftar_v', 'Daftar') ?>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Awal Prasetyo 2019
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>