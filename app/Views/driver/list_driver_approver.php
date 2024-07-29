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
                                    <th class="text-uppercase text-dark text-sm font-weight-bolder opacity-10">Nama Driver</th>
                                    <th class="text-uppercase text-dark text-sm font-weight-bolder opacity-10 ps-2">No Handphone</th>
                                    <th class="text-center text-uppercase text-dark text-sm font-weight-bolder opacity-10">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($list_driver as $row) : ?>
                                    <tr>
                                        <td class="align-midle text-center text-sm" scope="row"><?= $i++; ?></td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm text-capitalize"><?= $row['nama_driver']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0" style="color: black;"><?= $row['nohp']; ?></p>
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