<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-inline align-items-center">
                        <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('/save_reservasi'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="inputNP">No Peminjaman</label>
                                <input type="text" class="form-control" id="inputNP" name="no_peminjaman" placeholder="No Peminjaman" value="<?= $no_peminjaman; ?>" readonly>
                            </div>
                            <div class="col-md-8">
                                <label for="inputNama">Nama Peminjam</label>
                                <input type="text" class="form-control" id="inputNama" name="nama_peminjam" placeholder="Nama Peminjam">
                            </div>
                            <div class="col-md-12">
                                <label for="inputNohp">Nomor Handphone</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">+62</span>
                                    <input type="text" inputmode="numeric" class="form-control" placeholder="No Handphone" aria-describedby="addon-wrapping" name="nohp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="driver">Pilih Driver</label>
                                <select class="form-select mb-3" aria-label="select example" name="id_driver" id="driver" required>
                                    <option value="" hidden>-- Pilih Driver --</option>
                                    <?php foreach ($driver as $driver) : ?>
                                        <?php if ($driver['status'] == 'tersedia') : ?>
                                            <option value="<?= $driver['id'] ?>"><?= $driver['nama_driver'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kendaraan">Pilih Mobil</label>
                                <select class="form-select mb-3" aria-label="select example" name="id_kendaraan" id="kendaraan" required>
                                    <option value="" hidden>-- Pilih Mobil --</option>
                                    <?php foreach ($kendaraan as $kendaraan) : ?>
                                        <?php if ($kendaraan['status'] == 'tersedia') : ?>
                                            <option value="<?= $kendaraan['id'] ?>"><?= $kendaraan['merk_kendaraan'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tglPeminjaman">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="tglPeminjaman" name="tgl_peminjaman">
                            </div>
                            <div class="col-md-6">
                                <label for="tglSelesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tglSelesai" name="tgl_selesai">
                            </div>
                            <div class="col-md-12">
                                <label for="tujuan">Tujuan Peminjaman</label>
                                <textarea name="tujuan" id="tujun" class="form-control"></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <a href="<?= site_url('/list_reservasi') ?>" class="btn bg-gradient-secondary" type="button">Cancel</a>
                                <button class="btn bg-gradient-primary" type="submit" name="submit">Buat Reservasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>