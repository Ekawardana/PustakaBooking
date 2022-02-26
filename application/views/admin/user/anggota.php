<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="row">
        <div class="col-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Tanggal Dibuat</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($anggota as $a) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $a['name']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td>
                                <?php if ($a['role_id'] == 2) : ?>
                                    <div class="text-warning">
                                        <?= $a['role_id'] = "Pelanggan"; ?>
                                    </div>
                                <?php else : ?>
                                    <div class="text-primary">
                                        <?= $a['role_id'] = "Admin"; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?= $a['is_active']; ?></td>
                            <td><?= date('d F Y', $a['date_created']); ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/profile/') . $a['image']; ?>" class="img-fluid img-thumbnail" width="80">
                                </picture>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End Content -->