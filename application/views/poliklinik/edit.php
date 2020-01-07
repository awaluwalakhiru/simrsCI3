<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Gedung</h1>
        </div>
        <?php echo form_open('poliklinik/edit', ['class' => 'needs-validation', 'novalidate' => '']); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Daftar Gedung</h4>
                        <div class="card-header-action">
                            <a href="<?php echo site_url('poliklinik'); ?>" class="btn btn-info float-right ml-2"><i class="fas fa-chevron-left"></i> kembali</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <section class="justify-content-center">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th class="pl-0">Name Poliklinik</th>
                                        <th>Gedung</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($poliklinik as $data) :
                                        ?>
                                        <tr class="justify-content-center">
                                            <td><?php echo $no++; ?></td>
                                            <td class="pl-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="hidden" name="id_poliklinik[]" value="<?php echo html_escape($this->encryption->encrypt($data->id_poliklinik)); ?>">
                                                        <input type="text" name="nama_poliklinik[]" value="<?php echo html_escape($data->nama_poliklinik); ?>" class="form-control" autofocus>
                                                        <div class="invalid-feedback">
                                                            Mohon isi Nama Poliklinik!
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="text" name="gedung[]" value="<?php echo html_escape($data->gedung); ?>" class="form-control">
                                                        <div class="invalid-feedback">
                                                            Mohon isi Nama Gedung!
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </table>
                            </div>
                        </section>
                        <div class="row float-right">
                            <div class="col">
                                <button class="btn btn-primary" type="submit" name="edit">Edit Gedung</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>