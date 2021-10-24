<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
			<div class="col-lg-6">
				<h5 class="mt-2 font-weight-bold text-gray-800"><i class="fas fa-fw fa-user-shield" style="color : #4E73DF"></i> ADMIN</h5>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/manager/tambahAdmin');?>" class="btn btn-primary btn-icon-split mr-1">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-plus"></i>
					</span>
					<span class="text">Tambah Data</span>
				</a>
			</div>
		</div>
		<div class="mt-2 ml-3 mr-2">
			<?= $this->session->flashdata('message'); ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Admin</th>
							<th>Email</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($admin as $usr) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $usr['nm_admin'] ?></td>
							<td><?= $usr['email'] ?></td>
							<td><?= $usr['status'] ?></td>
							<td>
								<?php if ($usr['role_id'] == 1) : ?>
								<a class="btn btn-sm btn-danger"
									href="<?= base_url('admin/manager/hapusAdmin/') . $usr['id_admin'] ?>">
									<i class="fas fa-fw fa-trash"></i></a>
								<?php endif; ?>
							</td>
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
