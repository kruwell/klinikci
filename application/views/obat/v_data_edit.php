<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url('obat'); ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('obat/update'); ?>">
                    <input type="hidden" name="id" value="<?= $r['id_obat']; ?>">
                    <div class="form-group">
                        <label for="">Nama Obat</label>
                        <input type="text" name="nama_obat" value="<?= $r['nama_obat']; ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>