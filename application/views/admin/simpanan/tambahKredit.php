<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/simpanan');?>">Simpanan</a></li>
			<li class="breadcrumb-item active" aria-current="page">Penarikan tunai</li>
		</ol>
	</nav>

	<div class="card shadow mb-4 col-lg-12">
		<p class="mb-1">
			<div class="card-body">
				<div class="col-md-12">
					<form action="<?= base_url('admin/simpanan/tambahKredit/') . $anggota['id_anggota']; ?>" method="POST">
						<div class="form-group row mt-3">
							<label for="no_agt" class="col-sm-2 col-form-label">
								No Buku :
							</label>
							<div class="col-sm-6">
								<input type="text" name="no_agt" id="no_agt" class="form-control"
									value="<?= $anggota['no_buku'] ?>" readonly>
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="nm_anggota" class="col-sm-2 col-form-label">
								Nama Lengkap :
							</label>
							<div class="col-sm-6">
								<input type="text" name="nm_anggota" id="nm_anggota" class="form-control"
									value="<?= $anggota['nm_anggota'] ?>" readonly>
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="kredit" class="col-sm-2 col-form-label">
								Penarikan Tunai :
							</label>
							<div class="col-sm-6">
								<input type="text" name="kredit" id="kredit" class="form-control"
									placeholder="Masukan Jumlah Uang">
								<button type="submit" class="btn btn-primary btn-lg mt-4 tambahKredit">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>No Buku</th>
						<th>Nama Lengkap</th>
						<th>Jumlah Penarikan</th>
						<th>Tanggal transaksi</th>
						<th>Bukti</th>
					</tr>
				</thead>
				<tbody>
					<!-- perulangan data Menu -->
					<?php $i = 1; ?>
					<?php foreach ($kredit as $krdt) : ?>
					<?php $angka = $krdt['kredit']; ?>
					<?php $rupiah= 'Rp. '. number_format($angka,2,',','.') ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $krdt['no_buku'] ?></td>
						<td><?= $krdt['nm_anggota'] ?></td>
						<td><?= $rupiah ?></td>
						<td><?= $krdt['tanggal'] ?></td>
						<td><?= $krdt['bukti'] ?></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
