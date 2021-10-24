<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
			<div class="col-lg-6 d-flex justify-content-start">
				<h5 class="mt-2 font-weight-bold text-gray-800">SIMPANAN</h5>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/simpanan/laporan_simp');?>" target="_blank" class="btn btn-success btn-icon-split ">
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
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
		<?php elseif ($this->session->flashdata('gagal')) : ?>
			<div class="row mt-3 ml-2">
			<div class="col-md-6">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Gagal</strong> <?= $this->session->flashdata('gagal'); ?>.
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
							<th>Saldo</th>
							<th>Transaksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($simpanan as $simp) : ?>
						<?php $angka = $simp['saldo']; ?>
						<?php $rupiah= 'Rp. '. number_format($angka,2,',','.') ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $simp['no_buku'] ?></td>
							<td><?= $simp['nm_anggota'] ?></td>
							<td><?= $rupiah ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/simpanan/detailSimpanan/') . $simp['id_anggota'] ?>"
									class="btn btn-warning btn-circle mr-2" data-toggle="tooltip" data-placement="top"
									title="Detail Simpanan">
									<i class="fas fa-fw fa-info"></i></i>
								</a>
								<!-- <a href="<?= base_url('admin/simpanan/tambahDeposit/') . $simp['id_anggota'] ?>"
									class="btn btn-primary btn-circle mr-2" data-toggle="tooltip" data-placement="top"
									title="Tambah Simpanan">
									<i class="fas fa-fw fa-wallet"></i></i>
								</a> -->
								<!-- <a href="<?= base_url('admin/simpanan/tambahKredit/') . $simp['id_anggota'] ?>"
									class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top"
									title="Penarikan">
									<i class="fas fa-money-bill-wave"></i>
								</a> -->
							</td>
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->
