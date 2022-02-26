<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-5">
            <?= form_open_multipart('buku/ubahBuku'); ?>

            <input type="hidden" class="form-control" id="id" name="id" value="<?= $buku['id']; ?>">
            <!-- Judul Buku -->
            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= $buku['judul_buku']; ?>">
                <small class="form-text text-danger"><?= form_error('judul_buku'); ?></small>
            </div>

            <!-- Pilih Kategori -->
            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select name="id_kategori" class="form-control form-control-user">
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($kategori as $k) : ?>
                        <?php if ($k['id'] == $buku['id_kategori']) : ?>
                            <option value="<?= $k['id']; ?>" selected>
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?= $k['id']; ?>">
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pengarang -->
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $buku['pengarang']; ?>">
                <small class="form-text text-danger"><?= form_error('pengarang'); ?></small>
            </div>

            <!-- Penerbit -->
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit']; ?>">
                <small class="form-text text-danger"><?= form_error('penerbit'); ?></small>
            </div>

            <!-- Tahun Terbit -->
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select name="tahun" class="form-control form-control-user">
                    <option value="">Pilih Tahun</option>
                    <?php for ($i = date('Y'); $i > 2000; $i--) : ?>
                        <?php if ($i == $buku['tahun_terbit']) : ?>
                            <option value="<?= $i; ?>" selected>
                                <?= $i; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?= $i; ?>">
                                <?= $i; ?>
                            </option>
                        <?php endif; ?>
                    <?php endfor; ?>
                </select>
            </div>

            <!-- ISBN -->
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $buku['isbn']; ?>">
                <small class="form-text text-danger"><?= form_error('isbn'); ?></small>
            </div>

            <!-- Stok -->
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="<?= $buku['stok']; ?>">
                <small class="form-text text-danger"><?= form_error('stok'); ?></small>
            </div>

            <!-- Input Gambar -->
            <div class="form-group">
                <img src="<?= base_url('assets/img/upload/') . $buku['image']; ?>" width="100" /></label>
                <input type="file" class="form-control form-control-user" id="image" name="image">
            </div>


            <a href="<?= base_url('buku') ?>" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Close</a>

            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ubah</button>
        </div>
    </div>
</div>

</div>