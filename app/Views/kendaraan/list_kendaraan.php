<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-inline align-items-center">
                        <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                        <button type="button" class="btn bg-gradient-primary float-end" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <i class="fas fa-add"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10 ms-2">No</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Kendaraan</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-10 ps-2 ms-2">Tipe dan Konsmsi BBM</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Jadwal Service</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Riwayat</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Status</th>
                                    <th class=" text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($list_kendaraan as $row) : ?>
                                    <tr>
                                        <th class="align-midle text-center text-xs" scope="row"><?= $i++; ?></th>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm text-uppercase"><?= $row['merk_kendaraan']; ?></h6>
                                                    <p class="text-xs texxt-uppercase text-secondary mb-0"><?= $row['plat_nomor']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm text-capitalize font-weight-bold mb-0" style="color: black;"><?= $row['tipe_kendaraan']; ?></p>
                                            <p class="text-sm text-secondary mb-0"><?= $row['konsumsi_bbm']; ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $row['jadwal_service']; ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold" style="max-width: 80px;"><?= $row['riwayat']; ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?php if ($row['status'] == 'tersedia') : ?>
                                                <span class="badge bg-gradient-success"><?= $row['status']; ?></span>
                                            <?php else : ?>
                                                <span class="badge bg-gradient-warning "><?= $row['status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#modalEdit<?= $row['id']; ?>" type="button" class="btn btn-xl bg-gradient-info" data-bs-toggle="modal" title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#modalDelete<?= $row['id']; ?>" type="button" class="btn btn-xl bg-gradient-danger" data-bs-toggle="modal" title="Hapus Data">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- --------------------------------------------------------- Modal Create ---------------------------------------------------------------- -->

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= site_url('tambah_kendaraan'); ?>">
                    <?php csrf_field() ?>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Merk Kendaraan</label>
                        <input type="text" class="form-control" placeholder="Merk Kendaraan" name="merk_kendaraan" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" placeholder="Plat Nomor" name="plat_nomor" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Tipe Kendaraan</label>
                        <select class="form-select" name="tipe_kendaraan" required>
                            <option value="" hidden>-- Pilih Tipe --</option>
                            <option value="kendaraan umum">Kendaraan Umum</option>
                            <option value="pengangkut barang">Pengangkut barang</option>
                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Konsumsi BBM</label>
                        <input type="text" inputmode="numeric" class="form-control" placeholder="Konsumsi BBM" name="konsumsi_bbm" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom05" class="form-label">Jadwal Service</label>
                        <input type="date" class="form-control" name="jadwal_service" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="" hidden>-- Pilih Status --</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="tidak tersedia">Tidak Tersedia</option>
                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="validationCustom05" class="form-label">Riwayat Pemakaian</label>
                        <textarea type="text" placeholder="Riwayat Pemakaian" class="form-control" name="riwayat" required></textarea>
                        <div class="invalid-feedback">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn bg-gradient-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end Modal Create -->

<!-- --------------------------------------------------------- Modal Edit ---------------------------------------------------------------- -->

<?php foreach ($list_kendaraan as $edit) : ?>
    <div class="modal fade" id="modalEdit<?= $edit['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="post" action="<?= site_url('edit_kendaraan/' . $edit['id']); ?>">
                        <?php csrf_field() ?>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Merk Kendaraan</label>
                            <input type="text" class="form-control" placeholder="Merk Kendaraan" name="merk_kendaraan" value="<?= $edit['merk_kendaraan']; ?>" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Plat Nomor</label>
                            <input type="text" class="form-control" placeholder="Plat Nomor" name="plat_nomor" value="<?= $edit['plat_nomor']; ?>" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Tipe Kendaraan</label>
                            <select class="form-select" name="tipe_kendaraan" required>
                                <option value="" hidden><?= $edit['tipe_kendaraan']; ?></option>
                                <option value="kendaraan umum">Kendaraan Umum</option>
                                <option value="pengangkut barang">Pengangkut Barang</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Konsumsi BBM</label>
                            <input type="text" inputmode="numeric" class="form-control" placeholder="Konsumsi BBM" name="konsumsi_bbm" value="<?= $edit['konsumsi_bbm']; ?>" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom05" class="form-label">Jadwal Service</label>
                            <input type="date" class="form-control" name="jadwal_service" value="<?= $edit['jadwal_service']; ?>" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="" hidden><?= $edit['status']; ?></option>
                                <option value="tersedia">Tersedia</option>
                                <option value="tidak tersedia">Tidak Tersedia</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md">
                            <label for="validationCustom05" class="form-label">Riwayat Pemakaian</label>
                            <textarea type="text" placeholder="Riwayat Pemakaian" class="form-control" name="riwayat" required><?= $edit['riwayat']; ?></textarea>
                            <div class="invalid-feedback">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn bg-gradient-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Edit -->


<?= $this->endSection(); ?>