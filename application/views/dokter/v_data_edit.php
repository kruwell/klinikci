<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url('dokter'); ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('dokter/update'); ?>">
                    <input type="hidden" name="id" value="<?= $r['id_dokter']; ?>">
                    <div class="form-group">
                        <label for="">Nama Dokter</label>
                        <input type="text" name="nama_dokter" value="<?= $r['nama_dokter']; ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>