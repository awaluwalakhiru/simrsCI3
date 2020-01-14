<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?php echo html_escape(ucfirst($user->nama_depan)); ?></h2>
            <p class="section-lead">
                This is your profile biography.
            </p>
            <div class="row" style="padding-left:10px;padding-right:10px;">
                <div class="col">
                    <?php if ($this->session->flashdata('pesan')) : ?>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="alert alert-<?php echo $this->session->userdata('alert'); ?> alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong><?php echo $this->session->flashdata('pesan'); ?></strong>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/<?php echo html_escape($user->foto) ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Created</div>
                                    <div class="profile-widget-item-value"><?php echo html_escape(date('d-m-Y', $user->created)); ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Last Login</div>
                                    <div class="profile-widget-item-value"><?php echo html_escape(date('d-m-Y H:i:s', $user->login)); ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Last Logout</div>
                                    <div class="profile-widget-item-value"><?php echo html_escape(date('d-m-Y H:i:s', $user->logout)); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?php echo html_escape(ucfirst($user->nama_depan) . " " . ucfirst($user->nama_belakang)); ?> <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> <?php echo html_escape($user->job); ?>
                                </div>
                            </div>
                            <p><?php echo $user->biografi; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow <?php echo html_escape(ucfirst($user->nama_depan)); ?> On</div>
                            <a href="http://<?php echo html_escape($user->facebook) ?>" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="http://<?php echo html_escape($user->twitter) ?>" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="http://<?php echo html_escape($user->github) ?>" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="http://<?php echo html_escape($user->instagram) ?>" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>