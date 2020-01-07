<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Beranda</h1>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>List Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_list_user">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Foto</th>
                                    <th>Online</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Github</th>
                                    <th>Instagram</th>
                                    <th>Job</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $row) : ?>
                                    <tr>
                                        <td><?php echo html_escape($no++); ?></td>
                                        <td><?php echo html_escape($row->username); ?></td>
                                        <td><?php echo html_escape($row->email); ?></td>
                                        <td><?php echo html_escape($row->level); ?></td>
                                        <td><?php echo html_escape($row->foto); ?></td>
                                        <td>
                                            <div class="badge badge-<?php echo html_escape(($row->online == 1) ? "success" : "danger"); ?>"><?php echo html_escape(($row->online == 1) ? "online" : "offline"); ?></div>
                                        </td>
                                        <td><?php echo html_escape($row->facebook); ?></td>
                                        <td><?php echo html_escape($row->twitter); ?></td>
                                        <td><?php echo html_escape($row->github); ?></td>
                                        <td><?php echo html_escape($row->instagram); ?></td>
                                        <td><?php echo html_escape($row->job); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>