<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
			<div class="col-lg-6">
				<h5 class="mt-2 font-weight-bold text-gray-800"><font color="#4E73DF"><i class="fas fa-fw fa-newspaper"></i></font> ARTIKEL</h5>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/artikel/tambahArtikel');?>" class="btn btn-success btn-icon-split mr-1">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-plus"></i>
					</span>
					<span class="text">Tambah Data</span>
				</a>
			</div>
		</div>

		<!-- Pesan -->
		<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row mt-3 ml-2">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">Data Artikel
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
							<th>Judul</th>
							<th>Isi</th>
							<th>Tanggal Terbit</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($artikel as $art) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $art['judul'] ?></td>
							<td><?= implode(' ', array_slice(explode(' ', $art['isi']), 0, 25)) . "\n"; ?>...</td>
							<td><?= date('d F Y', strtotime($art['tanggal_buat'])) ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/artikel/detailArtikel/') . $art['id_artikel'] ?>"
									class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top"
									title="Detail artikel">
									<i class="fas fa-fw fa-eye"></i>
								</a>
								<a href="<?= base_url('admin/artikel/hapusArtikel/') . $art['id_artikel'] ?>"
									class="btn btn-danger btn-circle hapus" data-toggle="tooltip" data-placement="top"
									title="Hapus Anggota">
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
