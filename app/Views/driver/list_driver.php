<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-inline align-items-center">
                        <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                        <!-- Tambah Data -->
                        <button type="button" class="btn btn-md bg-gradient-primary float-end" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <i class="fa fa-add"></i>
                            Tambah Data
                        </button>
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
                                    <th class=" text-uppercase text-dark text-sm font-weight-bolder opacity-10">Aksi</th>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= site_url('tambah_driver'); ?>">
                    <?php csrf_field() ?>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_driver" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" placeholder="Username" name="nohp" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="" hidden>-- Pilih Status --</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="tidak tersedia">Tidak Tersedia</option>
                        </select>
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

<?php foreach ($list_driver as $edit) : ?>
    <div class="modal fade" id="modalEdit<?= $edit['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="post" action="<?= site_url('edit_driver/' . $edit['id']); ?>">
                        <?php csrf_field() ?>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_driver" value="<?= $edit['nama_driver']; ?>" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="nohp" value="<?= $edit['nohp']; ?>" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Role</label>
                            <select class="form-select" name="status" required>
                                <option value="" hidden><?= $edit['status']; ?></option>
                                <option value="tersedia">Tersedia</option>
                                <option value="tidak tersedia">tidak tersedia</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn bg-gradient-info">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Edit -->



<?= $this->endSection(); ?>