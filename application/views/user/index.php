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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $countif1->is_active; ?></h3>

                                <p>Proyektor Tersedia</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-download"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $countif->is_active; ?><sup style="font-size: 20px"></sup></h3>

                                <p>Proyektor Terpakai</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= $this->fungsi->count_user('user'); ?></h3>

                                <p>User</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <div class="row">
                    <div class="col-lg">


                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover text-dark">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Kode Proyektor</th>
                                        <th style="width: 40px">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($proyektor as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $p['kode_proyektor']; ?></td>
                                            <td><?php if ($p['is_active'] == '1') { ?> <span class="badge badge-success">Tersedia</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Terpakai</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body pt-0">
    <!--The calendar -->
    <div id="calendar" style="width: 100%"></div>
</div>
<!-- /.card-body -->
<!-- /.content -->
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