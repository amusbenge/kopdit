<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon mt-2">
			<img src="<?= base_url('assets/img/user/back-up.png')?>" style="width:70px;height:70px">
		</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-3">

	<!-- QUERY MENU-->
	<?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `admin_menu`.`menu_id`, `menu`
                            FROM `admin_menu` JOIN `admin_access_menu`
                            ON `admin_menu`.`menu_id` = `admin_access_menu`.`menu_id`
                            WHERE `admin_access_menu`.`role_id` = $role_id
                            ORDER BY `admin_access_menu`.`menu_id` ASC
                            ";

    $menu = $this->db->query($queryMenu)->result_array();

    ?>

	<!-- LOOPING MENU -->
	<?php foreach ($menu as $m) : ?>
	<div class="sidebar-heading p-2 bg-primary text-white text-center shadow rounded">
		<?= $m['menu']; ?>
	</div>

	<!-- SIAPKAN SUB-MENU SESUAI MENU -->
	<?php
        $menuid = $m['menu_id'];
        $querySubMenu = "SELECT * 
                                    FROM `admin_sub_menu` JOIN `admin_menu`
                                    ON `admin_sub_menu`.`menu_id` = `admin_menu`.`menu_id`
                                    WHERE `admin_sub_menu`.`menu_id` = $menuid
                                    AND `admin_sub_menu`.`is_active` = 1
        ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

	<!-- Nav Item - Dashboard -->
	<?php foreach ($subMenu as $sm) : ?>
	<!-- jika title sama dengan submenu -->
	<?php if ($title == $sm['title']) : ?>
	<!-- maka submenu tersebut aktif -->
	<li class="nav-item active">
		<?php else : ?>
		<!-- submenu tidak aktif -->
	<li class="nav-item">
		<?php endif; ?>
		<!-- url, icon, title di ambil dari database -->
		<a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
			<i class="<?= $sm['icon']; ?>"></i>
			<span>
				<?= $sm['title']; ?>
			</span>
		</a>
	</li>
	<?php endforeach; ?>

	<hr class="sidebar-divider mt-3">

	<?php endforeach; ?>

	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Keluar</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
