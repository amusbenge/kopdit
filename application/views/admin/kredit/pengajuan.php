<!-- Begin Page Content -->
<div class="container-fluid">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/beranda'); ?>">Beranda</a></li>
			<li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
		</ol>
	</nav>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
			<div class="col-lg-6">
				<h5 class="mt-2 font-weight-bold text-gray-800">
					<font color="#4E73DF"><i class="fas fa-fw fa-table"></i></font> DATA KREDIT
				</h5>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				<a href="<?= base_url('admin/kredit/cetak_kredit'); ?>" target="_blank" class="btn btn-success btn-icon-split class=" btn btn-primary btn-icon-split">
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
					<div class="alert alert-success alert-dismissible fade show" role="alert">Data Kredit
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
					<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Kredit
						<strong>Gagal di Konfirmasi!</strong> <br> <?= $this->session->flashdata('gagal'); ?>.
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
							<th>No buku</th>
							<th>Nama</th>
							<th>Jumlah pinjaman</th>
							<th>Status</th>
							<th>Nilai Akhir</th>
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
								<td><?= 'Rp. ' . number_format($krd['besar_pinjaman'], 2, ',', '.'); ?></td>
								<td><?= $krd['status'] ?></td>
								<td><?= $krd['nilai_akhir']; ?></td>
								<td class="text-center">
									<a href="<?= base_url('admin/kredit/konfirKredit/') . $krd['id_kredit'] ?>" class="btn btn-success btn-circle mr-2" data-toggle="modal" data-target="#modalKonfir<?= $krd['id_kredit']; ?>">
										<i class="fas fa-fw fa-check-circle"></i>
									</a>
									<a href="<?= base_url('admin/kredit/angsuran/') . $krd['id_kredit'] ?>" class="btn btn-primary btn-circle mr-2" data-toggle="tooltip" data-placement="top" title="Angsuran">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
									</a>
									<a href="<?= base_url('admin/kredit/detail/') . $krd['id_kredit'] ?>" class="btn btn-warning btn-circle mr-2">
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

<!-- modal konfirmasi kredit -->
<?php foreach ($kredit as $krd) : ?>
	<div class="modal fade" id="modalKonfir<?= $krd['id_kredit']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Keputusan Kredit Anggota</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-horizontal" method="post" action="<?php echo base_url('admin/kredit/konfirKredit/') . $krd['id_kredit']; ?>">
					<div class="modal-body">
						<input name="id_kredit" value="<?php echo $krd['id_kredit']; ?>" class="d-none" type="text">
						<div class="form-group">
							<label class="control-label col-xs-3">No Buku :</label>
							<div class="col-xs-8">
								<input name="no_buku" value="<?php echo $krd['no_buku']; ?>" class="form-control" type="text" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-3">Nama Anggota :</label>
							<div class="col-xs-8">
								<input name="nm_anggota" value="<?php echo $krd['nm_anggota']; ?>" class="form-control" type="text" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-3">Status Kredit :</label>
							<div class="col-xs-8 ">
								<select class="custom-select" name="status" id="status">
									<option value="Pengajuan" <?= $krd['status'] == 'Pengajuan' ? 'Selected' : '' ?>>
										Pengajuan
									</option>
									<option value="Diterima" <?= $krd['status'] == 'Diterima' ? 'Selected' : '' ?>>
										Diterima
									</option>
									<option value="Ditolak" <?= $krd['status'] == 'Ditolak' ? 'Selected' : '' ?>>
										Ditolak
									</option>
								</select>
								<?= form_error('jns_kelamin', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Konfirmasi</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>