<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid"></div>
        <div class="row mb-5"></div>
        <div class="col-sm-20">
            <h1 class="m-0 text-dark"><?= $title; ?> </h1>
        </div>

        <form method="post" action="<?= site_url('dosen/approval/' . $get_id) ?>">
            <div class="card-body">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover text-dark">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Peminjam</th>
                                <th>Program Studi</th>
                                <th>Angkatan & Kelas</th>
                                <th>Status</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($proyektor as $row) { ?>
                            <input type="hidden" name="proyektor_id[<?= $i ?>]" value="<?= $row->proyektor_id ?>">
                            <tr>
                                <th scope="row"><?= $i; ?></th>

                                <td><?= $row->nama_peminjam ?></td>
                                <td><?= $row->program_studi ?></td>
                                <td><?= $row->angkatan_kelas ?></td>
                                <td>
                                    <?php
                                    if ($row->is_active == 0) {
                                    ?>
                                        <span class="badge badge-warning">Pending</span>
                                    <?php
                                    } else {
                                        echo $row->is_active == 1 ? '<span class="badge badge-success">Diterima</span>' : '<span class="badge badge-danger">Ditolak</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <label>
                                        <input type="radio" name="is_active[<?= $i ?>]" value="1" required> Diterima
                                    </label>
                                    <label>
                                        <input type="radio" name="is_active[<?= $i ?>]" value="2" required> Ditolak
                                    </label>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= site_url('dosen') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Approval</button>
                </div>
        </form>
    </div>
</div>
</div>
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