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
				<li class="breadcrumb-item"><a href="<?= base_url('pelayanan');?>"><i class="fas fa-fw fa-home"></i>
						Pelayanan</a></li>
				<li class="breadcrumb-item active" aria-current="page">Angsuran</li>
			</ol>
		</nav>
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex justify-content-end">
				<a href="<?= base_url('pelayanan/cetakAngsuran/').$kredit['id_kredit'];?>" target="_blank"
					class="btn btn-success btn-icon-split" data-toggle="tooltip" title="Angsuran" data-placement="top">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-print"></i>
					</span>
					<span class="text">Cetak</span>
				</a>
			</div>

			<!-- Pesan -->


			<div class="card-body">
				<div class="col-md-6">
					<?= $this->session->flashdata('message'); ?>
				</div>
				<?php if($total_angsur < 1000) : ?>
				<div class="label mb-2">Sisa Pinjaman : <b>Rp. 0,00</b>
				</div>
				<?php else : ?>
				<div class="label mb-2">Sisa Pinjaman : <b><?= 'Rp.'.number_format($total_angsur,2,',','.'); ?></b>
				</div>
				<?php endif; ?>
				<div class="label mb-3">Bunga : <b><?= $jenis_bunga;?></b></div>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Bulan</th>
								<th>Transaksi</th>
								<th>Pokok</th>
								<th>Bunga</th>
								<th>Sukarela + Wajib</th>
								<th>Denda</th>
								<th>Total</th>
								<?php if($kredit['id_bunga'] == 1 || $kredit['id_bunga'] == 3) : ?>
								<th>Jumlah Harus Dibayar</th>
								<?php endif; ?>
								<th>Jumlah Bayar</th>
								<th>Status</th>
								<th>Bukti</th>
								<th>Tanggal Bayar</th>
								<th>Tanggal Jatuh Tempo</th>
							</tr>
						</thead>
						<tbody>
							<!-- perulangan data Menu -->
							<?php $i = 1; ?>
							<?php foreach ($angsuran as $gs => $angsur) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td class="text-center">
									<?php if($angsur['status'] == 'Belum Dibayar') : ?>
									<a href="<?= base_url('pelayanan/bayarAngsuran/') . $angsur['id_angsuran'] ?>"
										class="btn btn-primary btn-circle mr-2" data-toggle="tooltip"
										data-placement="top" title="Bayar angsuran">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
									</a>
									<?php endif; ?>
								</td>
								<td><?= 'Rp.'.number_format($angsur['pokok'],2,',','.')?></td>
								<td><?= 'Rp.'.number_format($angsur['bunga'],2,',','.')?></td>
								<td><?= 'Rp.'.number_format($angsur['sukarela'],2,',','.')?></td>
								<td><?= 'Rp. '. number_format($angsur['denda'], 2,',','.');?></td>
								<td><?= 'Rp. '. number_format($angsur['jumlah_angsuran'],2,',','.')?></td>
								<?php if($kredit['id_bunga'] == 1 || $kredit['id_bunga'] == 3) : ?>
								<td><?= 'Rp. '. number_format($angsur['jumlah_harus_bayar'],2,',','.')?></td>
								<?php endif; ?>
								<td><?= 'Rp. '. number_format($angsur['jumlah_bayar'],2,',','.')?></td>
								<?php if($angsur['status'] == 'Dibayar') : ?>
								<td class="text-success"><?= $angsur['status'] ?></td>
								<?php else :  ?>
								<td class="text-danger"><?= $angsur['status'] ?></td>
								<?php endif; ?>
								<?php if(!empty($angsur['bukti'])) : ?>
								<td id="foto_angsur">
									<a href="<?= base_url('/assets/img/angsuran/').$angsur['bukti']?>">
										<img src="<?= base_url('/assets/img/angsuran/').$angsur['bukti']?>"
											title="<?= $angsur['bukti'];?>" width="50" height="50" alt="img-thumbnail">
									</a>
								</td>
								<?php else : ?>
								<td>Belum Ada Bukti</td>
								<?php endif; ?>
								<td><?= $angsur['tanggal_bayar'] ?></td>
								<td><?= $angsur['jatuh_tempo'];?></td>
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
