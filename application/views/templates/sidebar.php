<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy sidebar-no-expand">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="brand-image img-circle"><i class="fa fa-tags"></i></span>
        <span class="brand-text font-weight-dark">Sistem Peminjaman
            <br> Proyektor </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pt-3 pb-3 mb-3">
            <div class="image">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class=" img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['name']; ?></a>
            </div>
        </div>

        <!-- Query Menu -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
            FROM `user_menu` JOIN `user_access_menu` 
              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
           WHERE `user_access_menu`.`role_id` = $role_id
        ORDER BY `user_access_menu`.`menu_id` ASC
           ";

        $menu = $this->db->query($queryMenu)->result_array();



        ?>

        <!-- Sidebar Menu -->
        <!-- Looping Menu -->
        <?php foreach ($menu as $m) : ?>
            <div class="header text-secondary">
                <?= $m['menu']; ?>
            </div>
            <!-- Siapkan Sub-Menu sesuai menu -->
            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
                FROM `user_sub_menu` JOIN `user_menu` 
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
               WHERE `user_sub_menu`.`menu_id` = $menuId
                AND `user_sub_menu`.`is_active` = 1
               ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            // print_r($subMenu);
            $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
            $cek_access_camera = $this->db->query("SELECT `menu_pinjam` FROM `user` WHERE `id` = '$userid'")->result_array()[0]['menu_pinjam'];
            print_r($cek_access_camera);
            ?>

            <?php foreach ($subMenu as $sm) : ?>


                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <?php if ($title == $sm['title']) : ?>
                                <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                                <?php else : ?>
                                    <?php
                                    $link = $sm['url'];
                                    if ($cek_access_camera == 0) {
                                        if ($link == "pinjam/kode") {
                                            echo '<a href="' . base_url($link) . '" class="nav-link disabled">';
                                        } else {
                                            echo '<a href="' . base_url($link) . '"class="nav-link">';
                                        }
                                    } else {
                                        echo '<a href="' . base_url($link) . '"class="nav-link">';
                                    }
                                    // echo '<a href="' . base_url($link) . '" class="nav-link ">';
                                    ?>


                                <?php endif; ?>
                                <i class="<?= $sm['icon']; ?>"></i>
                                <p>
                                    <?= $sm['title']; ?>

                                </p>
                                </a>
                        </li>
                    <?php endforeach; ?>


                <?php endforeach; ?>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>