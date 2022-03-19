<?= $this->session->flashdata('message'); ?>
<div class="container">
    <div class="row justify-content-center">
        <!-- looping products -->
        <?php foreach ($buku as $buku) { ?>
            <div class="card shadow mb-3 mr-3 col-lg-5">
                <div class="card-block">
                    <center class="mt-3">
                        <img src="<?= base_url(); ?>assets/img/upload/<?= $buku->image; ?>" style="max-width:100%; max-height: 100%; height: 200px; width: 180px">
                        <h4 class="card-title text-dark mt-4"><?= $buku->judul_buku; ?></h4>
                    </center>
                </div>
                <hr class="mt-0">
                <table class="table table-bordered" id="dataTable" width="90%">
                    <thead>
                        <tr>
                            <th>Pengarang</th>
                            <th><?= $buku->pengarang ?></th>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <th><?= $buku->penerbit ?></th>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <th><?= substr($buku->tahun_terbit, 0, 4) ?></th>
                        </tr>
                    </thead>
                </table>
                <div class="btn mb-3">
                    <?php
                    if ($buku->stok < 1) {
                        echo "<i class='btn btn-outline-primary fas fw fa-shopping-cart'> Booking&nbsp;&nbsp 0</i>";
                    } else {
                        echo "<a class='btn btn-outline-primary fas fw fa-shopping-cart' href='" . base_url('booking/tambahBooking/' . $buku->id) . "'> Booking</a>";
                    }
                    ?>
                    <a class="btn btn-outline-warning fas fw fa-search" href="<?= base_url('home/detailBuku/' . $buku->id); ?>"> Detail</a>
                </div>
            </div>
        <?php } ?>
        <!-- end looping -->
    </div>
</div>
</div>