<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <!-- DataTales -->
    <div class="card shadow col-lg-4 mb-4">
        <div class="card-block">
            <center class="mt-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle" width="150" />
                <h4 class="card-title text-dark"><?= $user['name']; ?></h4>
            </center>
        </div>
        <hr>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Dibuat</th>
                    <th><?= date('d F Y', $user['date_created']); ?></th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th><?= $user['email']; ?></th>
                </tr>
                <tr>
                    <th>Role</th>
                    <th>
                        <div class="badge badge-primary">
                            <?= $user['role_id'] = "Admin"; ?>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>

        <div class="btn mb-3">
            <a href="<?= base_url('admin') ?>" class="btn btn-danger">
                <i class="fas fa-fw fa-undo mr-1"></i>Kembali
            </a>

            <a href="<?= base_url('user/edit') ?>" class="btn btn-primary">
                <i class="fas fa-user-edit"></i> Ubah Profil
            </a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->