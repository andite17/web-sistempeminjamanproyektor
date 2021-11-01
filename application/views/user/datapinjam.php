<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid"></div>
        <div class="row mb-5"></div>
        <div class="col-sm-20">
            <h1 class="m-0 text-dark"><?= $title; ?> </h1>
        </div>

        <div class="row">
            <div class="col-lg">

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover text-dark">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Dosen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pinjam as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $p->nama_peminjam ?></td>
                                    <td><?= $p->name_dosen ?></td>
                                    <td><?php if ($p->is_active == '1') { ?> <span class="badge badge-success">Diterima</span>
                                        <?php } elseif ($p->is_active == '0') { ?> <span class="badge badge-warning">Pending</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Ditolak</span>
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
</div><!-- /.col -->
<!-- Modal Management -->

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