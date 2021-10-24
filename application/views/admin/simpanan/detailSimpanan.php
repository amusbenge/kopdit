<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/simpanan');?>">Simpanan</a></li>
			<li class="breadcrumb-item active" aria-current="page">Detail Simpanan</li>
		</ol>
	</nav>

	<div class="card-header py-3 d-flex justify-content-start">
		<div class="col-lg-6">
			<a href="<?= base_url('admin/simpanan/cetak_simp/').$id_anggota;?>" target="_blank"
				class="btn btn-success btn-icon-split ">
				<span class="icon text-white-50">
					<i class="fas fa-fw fa-print"></i>
				</span>
				<span class="text">Cetak</span>
			</a>
		</div>
	</div>

	<!-- <?= var_dump($deposit);?> -->

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
					<?php $angka = $dep['deposit']; ?>
					<?php $rupiah= 'Rp. '. number_format($angka,2,',','.') ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $rupiah ?></td>
						<td><?= $dep['tanggal'] ?></td>
						<?php if(!empty($dep['bukti'])): ?>
						<td id="foto_simpanan">
							<a href="<?= base_url('/assets/img/simpanan/').$dep['bukti']?>">
								<img src="<?= base_url('/assets/img/simpanan/').$dep['bukti']?>"
									title="<?= $dep['bukti'];?>" width="50" height="50" alt="img-thumbnail">
							</a>
						</td>
						<?php else : ?>
						<td>Tidak Ada Bukti</td>
						<?php endif; ?>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
