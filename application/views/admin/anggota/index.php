<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header d-flex justify-content-between">
			<div class="col-lg-6">
				<h5 class="font-weight-bold text-gray-800 mt-2">
					DATA ANGGOTA
				</h5>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/anggota/laporan_anggota'); ?>" target="_blank" class="btn btn-success btn-icon-split btn-sm">
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
					<div class="alert alert-success alert-dismissible fade show" role="alert">Data Anggota
						<strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php elseif ($this->session->flashdata('error')) : ?>
			<div class="row mt-3 ml-2">
				<div class="col-md-6">
					<div class="alert alert-warning alert-dismissible fade show" role="alert">Data Anggota
						<strong>Gagal</strong> <?= $this->session->flashdata('error'); ?>.
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
							<th>No Buku</th>
							<th>Nama Lengkap</th>
							<th>No Handphone</th>
							<th>Email</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($anggota as $agt) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $agt['no_buku'] ?></td>
								<td><?= $agt['nm_anggota'] ?></td>
								<td><?= $agt['no_hp'] ?></td>
								<td><?= $agt['email'] ?></td>
								<?php if ($agt['aktif'] == 0) : ?>
									<td>Tidak Aktif</td>
								<?php elseif ($agt['aktif'] == 1) : ?>
									<td>Aktif</td>
								<?php endif; ?>
								<td class="text-center">
									<?php if ($user['role_id'] == 1) : ?>
										<?php if ($agt['aktif'] == 0) : ?>
											<a href="<?= base_url('admin/anggota/konfirmasiAnggota/') . $agt['id_anggota'] ?>" class="btn btn-success btn-circle mr-2" data-toggle="tooltip" data-placement="top" title="Verifikasi">
												<i class="fas fa-fw fa-check-circle"></i>
											</a>
										<?php else : ?>
											<a href="<?= base_url('admin/anggota/ubah/') . $agt['id_anggota'] ?>" class="btn btn-success btn-circle mr-2" data-toggle="tooltip" data-placement="top" title="Ubah Anggota">
												<i class="fas fa-fw fa-pencil-alt"></i>
											</a>
										<?php endif; ?>
									<?php endif; ?>
									<a href="<?= base_url('admin/anggota/detail/') . $agt['id_anggota'] ?>" class="btn btn-warning btn-circle mr-2" data-toggle="tooltip" data-placement="top" title="Detail Anggota">
										<i class="fas fa-fw fa-eye"></i>
									</a>
									<?php if ($user['role_id'] == 1) : ?>
										<a href="<?= base_url('admin/anggota/hapus/') . $agt['id_anggota'] ?>" class="btn btn-danger btn-circle hapus" data-toggle="tooltip" data-placement="top" title="Hapus Anggota">
											<i class="fas fa-fw fa-trash"></i>
										</a>
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