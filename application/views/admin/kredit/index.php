<!-- Begin Page Content -->
<div class="container-fluid">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/beranda'); ?>">Beranda</a></li>
			<li class="breadcrumb-item active" aria-current="page">Diterima</li>
		</ol>
	</nav>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
			<div class="col-lg-6">
				<h5 class="font-weight-bold text-gray-800">
					<font color="#1CC88A"><i class="fas fa-fw fa-user-check"></i></font> DATA KREDIT
				</h5>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/kredit/cetak_kredit_diterima'); ?>" target="_blank" class="btn btn-success btn-icon-split">
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
					<div class="alert alert-success alert-dismissible fade show" role="alert">Data
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
				<!-- <?php var_dump($kredit) ?> -->
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="bg-info text-light">
							<th>No</th>
							<th>No Buku</th>
							<th>Nama</th>
							<th>Sisa Pinjaman</th>
							<th>Nilai Akhir</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($kredit as $krd) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $krd['no_buku'] ?></td>
								<td><?= $krd['nm_anggota'] ?></td>
								<td><?= 'Rp. ' . number_format($krd['total_angsur'], 2, ',', '.') ?></td>
								<td><?= $krd['nilai_akhir'] ?></td>
								<td><?= $krd['status'] ?></td>
								<td class="text-center">
									<a href="<?= base_url('admin/kredit/angsuran/') . $krd['id_kredit'] ?>" class="btn btn-primary btn-circle mr-2 ml-2" data-toggle="tooltip" data-placement="top" title="Angsuran">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
									</a>
									<a href="<?= base_url('admin/kredit/detail/') . $krd['id_kredit'] ?>" class="btn btn-warning btn-circle mr-2" data-toggle="tooltip" data-placement="top" title="Detail Kredit">
										<i class="fas fa-fw fa-eye"></i>
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