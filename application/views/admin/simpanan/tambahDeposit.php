<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/simpanan');?>">Simpanan</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah Simpanan</li>
		</ol>
	</nav>

	<div class="card shadow col-lg-12">
		<div class="card-body row">
			<div class="col-md-6">
				<form action="<?= base_url('admin/simpanan/tambahDeposit/') . $anggota['id_anggota']; ?>" method="POST"
					enctype="multipart/form-data">
					<div class="form-group row mt-3">
						<label for="no_agt" class="col-sm-4 col-form-label">
							No Buku :
						</label>
						<div class="col-sm-8">
							<input type="text" name="no_agt" id="no_agt" class="form-control"
								value="<?= $anggota['no_buku'] ?>" readonly>
						</div>
					</div>

					<div class="form-group row mt-4">
						<label for="nm_anggota" class="col-sm-4 col-form-label">
							Nama Lengkap :
						</label>
						<div class="col-sm-8">
							<input type="text" name="nm_anggota" id="nm_anggota" class="form-control"
								value="<?= $anggota['nm_anggota'] ?>" readonly>
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="deposit" class="col-sm-4 col-form-label">
							Tambah Simpanan :
						</label>
						<div class="col-sm-8">
							<input type="text" name="deposit" id="deposit" class="form-control"
								placeholder="Masukan Jumlah Uang">
							<?= form_error('deposit', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label for="bukti" class="col-sm-4 col-form-label">
							Bukti Transfer :
						</label>
						<div class="col-sm-8">
							<input type="file" name="bukti" id="bukti" class="form-control-file">
							<?= form_error('bukti', '<small class="text-danger">', '</small>'); ?><br>
							<button type="submit" class="btn btn-primary mt-2 btn-md tambahDeposit">Bayar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-6 mt-2">
				<label for="">
					Harap Dibaca!
					<ol>
						<li>Simpanan Wajib Sebesar Rp. 30.000,00/Bulan</li>
						<li>Simpanan Sukarela Besarnya tidak ditentukan tetapi bergantung dari kemampuan anggota</li>
					</ol>
				</label>
			</div>
		</div>
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
					<?php $angka = $dep['deposit']; ?>
					<?php $rupiah= 'Rp. '. number_format($angka,2,',','.') ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $rupiah ?></td>
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
