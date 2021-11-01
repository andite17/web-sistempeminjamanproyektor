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
                                <h3 class="card-title">Pilih Proyektor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <!-- <form role="form"> -->
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pilih Kode Proyektor</label>
                                        <select name="kode_proyektor" class="form-control" value="<?= set_value('kode_proyektor'); ?>">
                                            <option>--Pilih Kode Proyektor--</option>
                                            <option value="A12345">A12345</option>
                                            <option value="B12345">B12345</option>
                                            <option value="C12345">C12345</option>
                                            <option value="D12345">D12345</option>
                                        </select>
                                        <?= form_error('kode_proyektor', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Pinjam</button>
                                </div>
                            </form>
                            <!-- </form> -->
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
<!-- /.content-wrapper -->