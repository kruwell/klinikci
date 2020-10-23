<section class="konten mt-2">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <?= $title; ?>

                <a href="<?= base_url('kunjungan'); ?>" class="btn btn-warning btn-sm float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('kunjungan/insert'); ?>">
                    <div class="form-group">
                        <label for="">Tanggal Berobat</label>
                        <input type="date" name="tgl_berobat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pasien</label>
                        <select name="pasien" id="" class="form-control" required>
                            <option value="">- Pilih Pasien -</option>
                            <?php foreach($pasien as $r){ ?>
                            <option value="<?= $r['id_pasien'];?>"><?= $r['nama_pasien'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dokter Tujuan</label>
                        <select name="dokter" id="" class="form-control" required>
                            <option value="">- Pilih Dokter -</option>
                            <?php foreach($dokter as $r){ ?>
                            <option value="<?= $r['id_dokter'];?>"><?= $r['nama_dokter'];?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>