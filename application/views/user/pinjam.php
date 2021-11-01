<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid"></div>
        <div class="row mb-5"></div>
        <div class="col-sm-20">
            <h1 class="m-0 text-dark"><?= $title; ?> </h1>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-5">
                    <!-- left column -->
                    <div class="col-md-6 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary mb-5 mt-10">
                            <div class="card-header">
                                <h3 class="card-title">Form Pinjam Proyektor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form action="<?= base_url('pinjam/datapinjam'); ?>" method="post">
                                <form role="form">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputNama1">Nama Peminjam</label>
                                            <input type="text" class="form-control" placeholder="Nama Peminjam" name="nama_peminjam" value="<?= $user['name']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputProdi">Program Studi</label>
                                            <input type="text" class="form-control" name="program_studi" value="<?= $user['program_studi']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAngkatankelas">Angkatan & Kelas</label>
                                            <input type="text" class="form-control" name="angkatan_kelas" value="<?= $user['angkatan_kelas']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Dosen</label>
                                            <select name="name_dosen" class="form-control" value="<?= set_value('name_dosen'); ?>">
                                                <option>--Pilih Dosen--</option>
                                                <?php foreach ($pinjam as $p) : ?>
                                                    <option value="<?= $p['user_id']; ?>"><?= $p['name_dosen']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('name_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Waktu Pinjam</label>
                                            <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Waktu Pinjam" name="waktu_pinjam" value="<?= set_value('waktu_pinjam'); ?>"><?= form_error('waktu_pinjam', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Waktu Kembali</label>
                                            <input type="time" class="form-control" id="exampleInputPassword2" placeholder="Waktu Kembali" name="waktu_kembali" value="<?= set_value('waktu_kembali'); ?>"><?= form_error('waktu_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ajukan</button>
                                    </div>
                                </form>
                        </div>

                    </div>

                </div>
                <!-- /.card -->


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
            </div>
    </div>
</div>
</div>
<!-- /.content-wrapper -->