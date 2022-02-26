<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- row ux-->
    <div class="row">

        <!-- Data Anggota -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">Jumlah Anggota</div>
                            <div class="h1 mb-0 font-weight-bold text-danger"><?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-danger"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Anggota -->

        <!-- Data Buku -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Stok Buku Terdaftar</div>
                            <div class="h1 mb-0 font-weight-bold text-primary">
                                <?php $where = ['stok != 0'];
                                $totalstok = $this->ModelBuku->total('stok', $where);
                                echo $totalstok;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('buku'); ?>">
                                <i class="fas fa-book fa-3x text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Buku -->

        <!-- Data Peminjaman -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">Buku yang dipinjam</div>
                            <div class="h1 mb-0 font-weight-bold text-success">
                                <?php $where = ['dipinjam != 0'];
                                $totaldipinjam = $this->ModelBuku->total('dipinjam', $where);
                                echo $totaldipinjam;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('pinjam'); ?>"><i class="fas fa-shopping-cart fa-3x text-success"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Peminjaman -->

        <!-- Data Booking -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Buku yang dibooking</div>
                            <div class="h1 mb-0 font-weight-bold text-warning">
                                <?php
                                $where = ['dibooking != 0'];
                                $totaldibooking = $this->ModelBuku->total('dibooking', $where);
                                echo $totaldibooking;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('pinjam/daftarBooking'); ?>"><i class="fas fa-shopping-bag fa-3x text-warning"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Booking -->
    </div>
    <!-- End Row ux -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- row table-->
    <div class="row">
        <!-- Buku -->
        <div class="table-responsive table-bordered col-lg mx-auto mt-4">
            <div class="page-header">
                <span class="fas fa-book text-primary mt-2 mr-2"> Data
                    Buku</span>
                <a href="<?= base_url('buku'); ?>">
                    <i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($buku as $b) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $b['judul_buku']; ?></td>
                                <td><?= $b['pengarang']; ?></td>
                                <td><?= $b['penerbit']; ?></td>
                                <td><?= $b['tahun_terbit']; ?></td>
                                <td><?= $b['isbn']; ?></td>
                                <td><?= $b['stok']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of row table-->

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->