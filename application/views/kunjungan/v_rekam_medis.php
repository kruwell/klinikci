<section class="konten mt-2">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        Biodata Pasien
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <tr>
                                <th>Nama Pasien</th>
                                <td>:</td>
                                <td><?= $d['nama_pasien']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td><?= $d['jenis_kelamin']; ?></td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>:</td>
                                <td><?= $d['umur']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card border-info mt-4">
                    <div class="card-header bg-info text-white">
                        Riwayat Berobat
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tgl. Berobat</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Penatalaksanaan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($riwayat as $r){ ?>
                            
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $r['tgl_berobat']; ?></td>
                                    <td><?= $r['keluhan_pasien']; ?></td>
                                    <td><?= $r['hasil_diagnosa']; ?></td>
                                    <td><?= $r['penatalaksanaan']; ?></td>
                                </tr>
                        
                            <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        Catatan (Rekam Medis)
                        <a href="<?= base_url('kunjungan');?>" class="btn btn-warning btn-sm float-right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url();?>kunjungan/insert_rm">
                            <input type="hidden" name="id" value="<?= $d['id_berobat']; ?>">
                            <div class="form-group">
                                <label for="">Keluhan</label>
                                <textarea name="keluhan" class="form-control" required><?= $d['keluhan_pasien'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Diagnosa</label>
                                <textarea name="diagnosa" class="form-control" required><?= $d['hasil_diagnosa'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Penatalaksanaan</label>
                                <select name="penatalaksanaan" id="" class="form-control" required>
                                    <option value="<?= $d['penatalaksanaan'];?>" selected><?= $d['penatalaksanaan'];?></option>
                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                    <option value="Rujuk">Rujuk</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-danger btn-sm">Simpan Data</button>
                        </form>
                    </div>
                </div>

                <div class="card border-success mt-4">
                    <div class="card-header bg-success text-white">
                        Resep Obat
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('kunjungan/insert_resep'); ?>">
                            <input type="hidden" name="id" value="<?= $d['id_berobat']; ?>">    
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="obat" id="" class="form-control">
                                            <?php foreach($obat as $r){ ?>
                                                <option value="<?= $r['id_obat'];?>"><?= $r['nama_obat'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">+</button>
                                </div>
                            </div>
                            
                        </form>

                        <hr>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Obat</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($resep as $r){ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $r['nama_obat'];?></td>
                                        <td>
                                            <a href="<?= base_url().'kunjungan/hapus_resep/'.$r['id_resep'].'/'.$r['id_berobat']; ?>" class="text-danger">x</a>
                                        </td>
                                    </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>
    </div>
</section>