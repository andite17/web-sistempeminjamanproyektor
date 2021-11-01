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
                <?php foreach ($user as $u) : ?>
                    <form action="<?php echo base_url() . 'validasiakun/update'; ?>" method="post">
                        <input type="hidden" name="id" value="<?= $u['id']; ?>">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" name="name" class="form-control" value="<?= $u['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" value="<?= $u['nim']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Angkatan & Kelas</label>
                            <input type="text" name="angkatan_kelas" class="form-control" value="<?= $u['angkatan_kelas']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?= $u['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>-- Pilih Kategori Prodi --</label>
                            <select class="form-control" name="program_studi" value="<?= $u['program_studi']; ?>">
                                <option>Broadband Multimedia</option>
                                <option>Telekomunikasi</option>
                                <option>Teknik Otomasi Listrik Industri</option>
                                <option>Teknik Listrik</option>
                                <option>Instrumentasi Kontrol Industri</option>
                                <option>Elektronika Industri</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $u['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Menu Pinjam</label>
                            <input type="text" name="menu_pinjam" class="form-control" value="<?= $u['menu_pinjam']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Kode Loker</label>
                            <input type="text" name="kode_loker" class="form-control" value="<?= $u['kode_loker']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name="role_id" class="form-control" value="<?= $u['role_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Aktivasi</label>
                            <input type="text" name="is_active" class="form-control" value="<?= $u['is_active']; ?>">
                            <?php if ($u['is_active'] == '1') { ?> Status: <span style="color: green;">Aktif</span>
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