<main id="main">
	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="breadcrumb-hero">
			<div class="container">
				<div class="breadcrumb-hero">
					<h2><b><?= $title; ?></b></h2>
				</div>
			</div>
		</div>
		</div>
	</section><!-- End Breadcrumbs -->

	<div class="container mt-2">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('beranda');?>"><i class="fas fa-fw fa-home"></i>
						Beranda</a></li>
				<li class="breadcrumb-item active" aria-current="page">Simpanan</li>
			</ol>
		</nav>
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
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
			<?php elseif($this->session->flashdata('gagal')) : ?>
			<div class="row mt-3 ml-2">
				<div class="col-md-6">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Gagal!</strong> <?= $this->session->flashdata('gagal'); ?>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="card-header">
					<a href="<?= base_url('pelayanan/tambahSimpanan/').$id_anggota ?>"
						class="btn btn-primary btn-icon-split " data-toggle="tooltip"
						title="Simpanan">
						<span class="icon text-white-50">
							<i class="fas fa-fw fa-wallet"></i>
						</span>
						<span class="text">Tambah</span>
					</a>
					<a href="<?= base_url('pelayanan/cetak_simp/').$id_anggota ?>"
						class="btn btn-success btn-icon-split " target="_blank" data-toggle="tooltip"
						title="Riwayat Simpanan">
						<span class="icon text-white-50">
							<i class="fas fa-fw fa-print"></i>
						</span>
						<span class="text">Cetak</span>
					</a>
				</div>
			<div class="card-body">
				<?php foreach($simpanan as $sim) : ?>
				<di class="row">
					<label for="" class="col-md-2">No Buku</label>
					<label for="" class="col-md-10">: <b><?= $sim['no_buku'];?></b></label>
					<label for="" class="col-md-2">Nama </label>
					<label for="" class="col-md-10">: <b><?= $sim['nm_anggota'];?></b></label>
					<label for="" class="col-md-2">Saldo</label>
					<label for="" class="col-md-10">: <b><?= 'Rp.'.number_format($sim['saldo'],2,'.',','); ?></b></label>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Jumlah Setoran</th>
							<th>Tanggal transaksi</th>
							<th>Bukti</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($deposit as $dep) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= 'Rp.'.number_format($dep['deposit'],2,'.',','); ?></td>
							<td><?= $dep['tanggal'] ?></td>
							<?php if(empty($dep['bukti'])): ?>
							<td>Tidak Ada Bukti</td>
							<?php else: ?>
							<td>
								<a href="<?= base_url('assets/img/simpanan/').$dep['bukti'];?>">
									<img src="<?= base_url('assets/img/simpanan/').$dep['bukti'];?>" alt="img-thumbnail"
										width="50" height="50">
								</a>
							</td>
							<?php endif; ?>
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>

</main>
