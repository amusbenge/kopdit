<!-- Begin Page Content -->
<div class="container-fluid">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/beranda');?>">Beranda</a></li>
			<li class="breadcrumb-item active" aria-current="page">Angsuran</li>
		</ol>
	</nav>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
			<div class="col-lg-6">
				<h5 class="mt-2 font-weight-bold text-gray-800">DATA ANGSURAN</h5>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/kredit/cetakAngsuran/').$id_kredit;?>" target="_blank"
					class="btn btn-success btn-icon-split" data-toggle="tooltip" data-placement="top"
					title="Angsuran">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-print"></i>
					</span>
					<span class="text">Cetak</span>
				</a>
			</div>
		</div>
		<div class="label ml-2 mt-2">Sisa Pinjaman : <b><?= 'Rp.'.number_format($total_angsur,2,',','.'); ?></b></div>

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
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Pokok</th>
							<th>Bunga</th>
							<th>Sukarela + Wajib</th>
							<th>Jumlah Angsuran</th>
							<?php if($kredit['id_bunga'] == 1 || $kredit['id_bunga'] == 3) : ?>
							<th>Jumlah Harus Dibayar</th>
							<?php endif; ?>
							<th>Jumlah Bayar</th>
							<th>Denda</th>
							<th>Status</th>
							<th>Bukti</th>
							<th>Tanggal Bayar</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($angsuran as $gs => $angsur) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= 'Rp.'.number_format($angsur['pokok'],2,',','.')?></td>
							<td><?= 'Rp.'.number_format($angsur['bunga'],2,',','.')?></td>
							<td><?= 'Rp.'.number_format($angsur['sukarela'],2,',','.')?></td>
							<td><?= 'Rp. '. number_format($angsur['jumlah_angsuran'],2,',','.')?></td>
							<?php if($kredit['id_bunga'] == 1 || $kredit['id_bunga'] == 3) : ?>
							<td><?= 'Rp. '. number_format($angsur['jumlah_harus_bayar'],2,',','.')?></td>
							<?php endif; ?>
							<td><?= 'Rp. '. number_format($angsur['jumlah_bayar'],2,',','.')?></td>
							<td><?= 'Rp. '. number_format($angsur['denda'],2,',','.')?></td>
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
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
