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
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-10">User</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-10 ps-2">Phone</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Password</th>
                                    <th class=" text-uppercase text-secondary text-sm font-weight-bolder opacity-10">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($list_user as $row) : ?>
                                    <tr>
                                        <th class="align-midle text-center text-xs" scope="row"><?= $i++; ?></th>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $row['nama_user']; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $row['username']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0" style="color: black;"><?= $row['email']; ?></p>
                                            <p class="text-sm text-secondary mb-0"><?= $row['nohp']; ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?php if ($row['role'] == 'admin') : ?>
                                                <span class="badge bg-gradient-info"><?= $row['role']; ?></span>
                                            <?php else : ?>
                                                <span class="badge bg-gradient-dark "><?= $row['role']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xxs font-weight-bold" style="max-width: 80px;"><?= $row['password']; ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#modalEdit<?= $row['id']; ?>" type="button" class="btn btn-xl bg-gradient-primary" data-bs-toggle="modal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#modalDelete<?= $row['id']; ?>" type="button" class="btn btn-xl bg-gradient-danger" data-bs-toggle="modal">
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="post" action="<?= site_url('tambah_data'); ?>">
                    <?php csrf_field() ?>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">No Handphone</label>
                        <input type="text" inputmode="numeric" placeholder="No handphone" class="form-control" name="nohp" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="" hidden>-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="approver">Approver</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
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

<?php foreach ($list_user as $user) : ?>
    <div class="modal fade" id="modalEdit<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="post" action="<?= site_url('edit_user/' . $user['id']); ?>">
                        <?php csrf_field() ?>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user" value="<?= $user['nama_user']; ?>" required>
                            <div class="valid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $user['username']; ?>" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $user['email']; ?>" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">No Handphone</label>
                            <input type="text" inputmode="numeric" placeholder="No handphone" class="form-control" name="nohp" value="<?= $user['nohp']; ?>" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Role</label>
                            <select class="form-select" name="role" required>
                                <option value="" hidden><?= $user['role']; ?></option>
                                <option value="admin">Admin</option>
                                <option value="approver">Approver</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
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


<!-- --------------------------------------------------------- Modal Delete ---------------------------------------------------------------- -->

<?php foreach ($list_user as $delete) : ?>
    <div class="modal fade" id="modalDelete<?= $delete['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="get" action="<?= site_url('delete_user/' . $delete['id']); ?>">
                        <?php csrf_field() ?>
                        <div class="form-group">
                            <h5>Apakah anda ingin menghapus data ini </h5>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn bg-gradient-danger">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?= $this->endSection(); ?>