<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid"></div>
        <div class="row mb-5"></div>
        <div class="col-sm-20">
            <h1 class="m-0 text-dark"><?= $title; ?> </h1>
        </div>
        <!-- /.content-header -->
        <div class="card-body">
            <table class="table table-bordered text-dark">
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $u) : ?>
                        <tr>
                            <td>Nama</td>
                            <td><?= $u['name']; ?></td>
                        </tr>
                        <tr>

                            <td>NIM</td>
                            <td><?= $u['nim']; ?></td>
                        </tr>
                        <tr>
                            <td>Angkatan dan Kelas</td>
                            <td><?= $u['angkatan_kelas']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $u['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td><?= $u['program_studi']; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><?= $u['username']; ?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><?= $u['image']; ?></td>
                        </tr>
                        <tr>
                            <td>Role Id</td>
                            <td><?= $u['role_id']; ?></td>
                        </tr>
                        <tr>
                            <td>Aktifasi</td>
                            <td><?= $u['is_active']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal di aktifkan</td>
                            <td><?= $u['date_created']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>
            <br>
            <a href="<?= base_url(); ?>validasiakun" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body pt-0">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Siap untuk Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" Apabila sudah selesai mengakses web.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->