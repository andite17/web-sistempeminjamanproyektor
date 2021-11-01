<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid"></div>
        <div class="row mb-5"></div>
        <div class="col-sm-20">
            <h1 class="m-0 text-dark"><?= $title; ?> </h1>
        </div>
        <div class="card-body">

            <section class="content text-dark">
                <?php foreach ($subMenu as $sm) : ?>
                    <form action="<?php echo base_url() . 'menu/update'; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $sm['id']; ?>">
                        <div class="form-group">
                            <label>Menu Akses</label>
                            <input type="text" name="menu_id" class="form-control" value="<?= $sm['menu_id']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" value="<?= $sm['title']; ?>">
                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="url" class="form-control" value="<?= $sm['url']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Icon</label>
                            <input type="text" name="icon" class="form-control" value="<?= $sm['icon']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Aktivasi</label>
                            <input type="text" name="is_active" class="form-control" value="<?= $sm['is_active']; ?>">
                            <?php if ($sm['is_active'] == '1') { ?> Status: <span style="color: green;">Aktif</span>
                            <?php } else { ?>
                                Status: <span style="color: orange;"> Tidak Aktif</span>
                            <?php } ?>

                        </div>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>

                    </form>
            </section>
        </div>
    </div>
<?php endforeach; ?>
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