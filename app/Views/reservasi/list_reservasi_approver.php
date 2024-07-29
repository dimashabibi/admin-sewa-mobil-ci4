<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-inline align-items-center">
                        <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                        <a href="<?= site_url('/create_reservasi') ?>" type="button" class="btn bg-gradient-primary float-end">
                            <i class="fas fa-add"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table datatable align-items-center text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Peminjaman</th>
                                    <th>Nama Peminjam</th>
                                    <th>No Handphone</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Tanggal Peminjaman</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($list_reservasi as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td class="text-uppercase"><?= $row['no_peminjaman'] ?></td>
                                        <td class="text-capitalize"><?= $row['nama_peminjam'] ?></td>
                                        <td class="text-capitalize">+62<?= $row['nohp'] ?></td>
                                        <td><?= $row['tgl_peminjaman'] ?></td>
                                        <td>
                                            <?php if ($row['status'] == 'selesai') : ?>
                                                <span class="badge badge-xs bg-primary">selesai</span>
                                            <?php elseif ($row['status'] == 'disetujui') : ?>
                                                <span class="badge badge-sm bg-info">disetujui</span>
                                            <?php elseif ($row['status'] == 'diterima') : ?>
                                                <span class="badge badge-sm bg-success">diterima</span>
                                            <?php elseif ($row['status'] == 'ditolak') : ?>
                                                <span class="badge badge-sm bg-danger">ditolak</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-warning">menunggu</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 'menunggu') { ?>
                                                <a href="#modalDetail<?= $row['id']; ?>" class="btn bg-gradient-primary" type="button" data-bs-toggle="modal" title="Detail Data">
                                                    <i class="fa fa-eye"></i></a>
                                                <a href="#modalTerima<?= $row['id']; ?>" type="button" class="btn btn-xl bg-gradient-info" data-bs-toggle="modal" title="Setuju">
                                                    <i class="fa fa-thumbs-up"></i></a>
                                                <a href="#modalTolak<?= $row['id']; ?>" type="button" class="btn btn-xl bg-gradient-danger" data-bs-toggle="modal" title="Tolak">
                                                    <i class="fa fa-thumbs-down"></i></a>
                                            <?php } else { ?>
                                                <a href="#modalDetail<?= $row['id']; ?>" class="btn bg-gradient-primary" type="button" data-bs-toggle="modal" title="Detail Data">
                                                    <i class="fa fa-eye"></i></a>
                                            <?php } ?>
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


<!-- --------------------------------------------------------- Modal Detail ---------------------------------------------------------------- -->

<?php foreach ($list_reservasi as $detail) : ?>
    <div class="modal fade" id="modalDetail<?= $detail['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="noPeminjaman" class="text-lg">No Peminjaman</label>
                            <p class="border border-2 rounded-3 p-2 text-uppercase" id="noPeminjaman"><?= $detail['no_peminjaman']; ?></p>
                        </div>
                        <div class="col-md-8">
                            <label for="namaPeminjam" class="text-lg">Nama Peminjam</label>
                            <p class="border border-2 rounded-3 p-2 text-capitalize" id="namaPeminjam"><?= $detail['nama_peminjam']; ?></p>
                        </div>
                        <div class="col-md-12">
                            <label for="noHp" class="text-lg">Nomor Handphone</label>
                            <p class="border border-2 rounded-3 p-2 text-capitalize" id="noHp"><?= $detail['nohp']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="namaDriver" class="text-lg">Nama Driver</label>
                            <p class="border border-2 rounded-3 p-2 text-capitalize" id="namaDriver"><?= $detail['nama_driver']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="merkMobil" class="text-lg">Merk Mobil</label>
                            <p class="border border-2 rounded-3 p-2 text-capitalize" id="merkMobil"><?= $detail['merk_kendaraan']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggalPeminjaman" class="text-lg">Tanggal Peminjaman</label>
                            <p class="border border-2 rounded-3 p-2 text-capitalize" id="tanggalPeminjaman"><?= $detail['tgl_peminjaman']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggalSelesai" class="text-lg">Tanggal selesai</label>
                            <p class="border border-2 rounded-3 p-2 text-capitalize" id="tanggalSelesai"><?= $detail['tgl_selesai']; ?></p>
                        </div>
                        <div class="col-md-12">
                            <label for="tujuan" class="text-lg">Tujuan</label>
                            <p class="border border-2 rounded-3 p-2 text-capitalize" id="tujuan"><?= $detail['tujuan']; ?></p>
                        </div>
                        <div class="col-md-2">
                            <label for="status" class="text-lg ">Status</label>
                            <?php if ($detail['status'] == 'selesai') : ?>
                                <h5 id="status" class="border border-0 rounded-3 p-2 bg-info text-center text-white"><?= $detail['status']; ?></h5>
                            <?php elseif ($detail['status'] == 'diterima') : ?>
                                <h5 id="status" class="border border-0 rounded-3 p-2 bg-success text-center text-white"><?= $detail['status']; ?></h5>
                            <?php elseif ($detail['status'] == 'ditolak') : ?>
                                <h5 id="status" class="border border-0 rounded-3 p-2 bg-danger text-center text-white"><?= $detail['status']; ?></h5>
                            <?php else : ?>
                                <h5 id="status" class="border border-0 rounded-3 p-2 bg-warning text-center text-white"><?= $detail['status']; ?></h5>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn bg-gradient-primary"><i class="fa fa-download"></i> export</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal detail -->

<!-- --------------------------------------------------------- Modal Terima ---------------------------------------------------------------- -->

<?php foreach ($list_reservasi as $terima) : ?>
    <div class="modal fade" id="modalTerima<?= $terima['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Terima Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('terima_reservasi_approver/' . $terima['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Apakah anda yakin ingin menyetujui reservasi ini?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn bg-gradient-info"><i class="fa fa-thumbs-up"></i> Setuju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Terima -->

<!-- --------------------------------------------------------- Modal Tolak ---------------------------------------------------------------- -->

<?php foreach ($list_reservasi as $tolak) : ?>
    <div class="modal fade" id="modalTolak<?= $tolak['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tolak Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('tolak_reservasi_approver/' . $tolak['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Apakah anda yakin ingin menolak reservasi ini?</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn bg-gradient-danger"><i class="fa fa-thumbs-down"></i>Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Tolak -->

<?= $this->endSection(); ?>