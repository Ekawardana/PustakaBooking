<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-5">
            <?= form_open_multipart('kategori/updateKategori'); ?>

            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $kategori['id']; ?>">

                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>">
            </div>
            <a href="<?= base_url('kategori') ?>" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Close</a>

            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ubah</button>
        </div>
    </div>
</div>

</div>