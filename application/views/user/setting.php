<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>
        <h2 class="section-title">Hi, <?php echo html_escape(ucfirst($user->nama_depan)); ?></h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>
        <div class="row">
            <div class="col">
                <div class="card">
                    <?php echo form_open_multipart('user/edit', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nama depan</label>
                                <input type="hidden" name="id" value="<?php echo html_escape($this->encryption->encrypt($user->id)); ?>">
                                <input type="text" class="form-control" name="nama_depan" value="<?php echo html_escape($user->nama_depan); ?>" required="" autofocus autocomplete="">
                                <div class="invalid-feedback">
                                    Mohon isi nama depan
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama belakang</label>
                                <input type="text" class="form-control" name="nama_belakang" value="<?php echo html_escape($user->nama_belakang); ?>" required="" autofocus autocomplete="">
                                <div class="invalid-feedback">
                                    Mohon isi nama belakang
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo html_escape($user->username); ?>" required="" autofocus autocomplete="">
                                <div class="invalid-feedback">
                                    Mohon isi username
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo html_escape($user->email); ?>" readonly>
                                <div class="invalid-feedback">
                                    Mohon isi email
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="<?php echo html_escape($user->password); ?>" required="" autofocus autocomplete="" readonly>
                                <div class="invalid-feedback">
                                    Mohon isi password
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Foto</label>
                                <input type="file" class="form-control-file" name="foto">
                                <div class="invalid-feedback">
                                    Mohon isi foto
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="<?php echo html_escape($user->facebook); ?>" required="" autofocus autocomplete="">
                                <div class="invalid-feedback">
                                    Mohon isi facebook
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="<?php echo html_escape($user->twitter); ?>">
                                <div class="invalid-feedback">
                                    Mohon isi twitter
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Github</label>
                                <input type="text" class="form-control" name="github" value="<?php echo html_escape($user->github); ?>" required="" autofocus autocomplete="">
                                <div class="invalid-feedback">
                                    Mohon isi github
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="<?php echo html_escape($user->instagram); ?>">
                                <div class="invalid-feedback">
                                    Mohon isi instagram
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Jobs</label>
                                <input type="text" class="form-control" name="job" value="<?php echo html_escape($user->job); ?>" required="" autofocus autocomplete="">
                                <div class="invalid-feedback">
                                    Mohon isi job
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Bio</label>
                                <textarea class="form-control summernote-simple" id="bio" name="biografi"><?php echo $user->biografi; ?></textarea>
                                <div class="invalid-feedback">
                                    Mohon isi biografi
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    CKEDITOR.replace('bio');
</script>