<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
			<div class="col-md-6">
				<h5 class="mt-2 font-weight-bold text-gray-800">JAMINAN</h5>
			</div>
			<div class="col-md-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/jaminan/tambah');?>" class="btn btn-primary btn-icon-split mr-1">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-plus"></i>
					</span>
					<span class="text">Jaminan</span>
				</a>
				<a href="#" class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-print"></i>
					</span>
					<span class="text">Cetak</span>
				</a>
			</div>
		</div>

		<!-- Pesan -->
		<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row mt-3 ml-2">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">Data Jaminan
					<strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="bg-info text-light">
							<th>No</th>
							<th>No Anggota</th>
							<th>Nama Lengkap</th>
							<th>Barang Jaminan</th>
							<th>Status</th>
							<th>No Brangkas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($jaminan as $jam) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $jam['no_anggota'] ?></td>
							<td><?= $jam['nm_anggota'] ?></td>
							<td><?= $jam['brg_jaminan'] ?></td>
							<td><?= $jam['status'] ?></td>
							<td><?= $jam['no_brangkas'] ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/jaminan/ubah/') . $jam['id_jaminan'] ?>"
									class="btn btn-success btn-circle mr-2" data-toggle="tooltip" data-placement="top"
									title="Ubah Jaminan">
									<i class="fas fa-fw fa-pencil-alt"></i>
								</a>
								<a href="<?= base_url('admin/jaminan/detail/') . $jam['id_jaminan'] ?>"
									class="btn btn-warning btn-circle mr-2" data-toggle="tooltip" data-placement="top"
									title="Detail Jaminan">
									<i class="fas fa-fw fa-eye"></i>
								</a>
								<a href="<?= base_url('admin/jaminan/hapus/') . $jam['id_jaminan'] ?>"
									class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top"
									title="Hapus Jaminan" onclick="return confirm('Yakin?');">
									<i class="fas fa-fw fa-trash"></i>
								</a>
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
