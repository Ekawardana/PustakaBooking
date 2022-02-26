<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card shadow mb-3 col-lg-4">
        <div class="card-block">
            <center class="mt-4">
                <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="rounded-circle" width="150" />
                <h4 class="card-title text-dark"><?= $user; ?></h4>
            </center>
        </div>
        <hr>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Dibuat</th>
                    <th><?= date('d F Y', $date_created); ?></th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th><?= $email; ?></th>
                </tr>
                <tr>
                    <th>Role</th>
                    <th>
                        <div class="badge badge-info">
                            <?= $role = "Member"; ?>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>

        <div class="btn mb-3">
            <a href="<?= base_url('member/ubahprofil'); ?>" class="btn btn-primary">
                <i class="fas fa-user-edit"></i> Ubah Profil
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->