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
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-dark text-sm font-weight-bolder opacity-10 ms-2">No</th>
                                    <th class="text-uppercase text-dark text-sm font-weight-bolder opacity-10">Kendaraan</th>
                                    <th class="text-uppercase text-dark text-sm font-weight-bolder opacity-10 ps-2 ms-2">Tipe dan Konsumsi BBM</th>
                                    <th class="text-center text-uppercase text-dark text-sm font-weight-bolder opacity-10">Jadwal Service</th>
                                    <th class="text-center text-uppercase text-dark text-sm font-weight-bolder opacity-10">Riwayat</th>
                                    <th class="text-center text-uppercase text-dark text-sm font-weight-bolder opacity-10">Status</th>
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
                                                    <p class="text-xs text-uppercase text-secondary mb-0"><?= $row['plat_nomor']; ?></p>
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

<?= $this->endSection(); ?>