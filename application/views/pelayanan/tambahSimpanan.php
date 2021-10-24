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

	<div class="container mt-2 mb-2">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a
						href="<?= base_url('pelayanan/simpanan/').$anggota['anggota']['id_anggota'];?>">Simpanan</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Tambah Simpanan</li>
			</ol>
		</nav>
		<div class="card shadow col-lg-12">
			<div class="card-body row">
				<div class="col-md-6">
					<form action="<?= base_url('pelayanan/tambahSimpanan/') . $anggota['anggota']['id_anggota']; ?>"
						method="POST" enctype="multipart/form-data">
						<div class="form-group row mt-3">
							<label for="no_agt" class="col-sm-4 col-form-label">
								No Buku :
							</label>
							<div class="col-sm-8">
								<input type="text" name="no_agt" id="no_agt" class="form-control"
									value="<?= $anggota['anggota']['no_buku'] ?>" readonly>
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="nm_anggota" class="col-sm-4 col-form-label">
								Nama Lengkap :
							</label>
							<div class="col-sm-8">
								<input type="text" name="nm_anggota" id="nm_anggota" class="form-control"
									value="<?= $anggota['anggota']['nm_anggota'] ?>" readonly>
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="deposit" class="col-sm-4 col-form-label">
								Tambah Deposit :
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
								<input type="file" class="form-control-file" name="bukti" id="bukti">
								<?= form_error('bukti', '<small class="text-danger">', '</small>');?><br>
								<button type="submit" class="btn btn-primary btn-md mt-2 tambahDeposit">Bayar</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6 mt-2">
					<label for="">
						Harap Dibaca! <br>
						Silahkan transferkan uang anda pada <a href="<?= base_url('kontak/#rek');?>" target="_blank">Rekening</a> kopdit
						swasti sari<br>
						Dengan Rincian Sebagai Berikut : <br>
						<ol>
							<li>Simpanan Pokok Rp. 100.000,00 </li>
							<li>Simpanan Wajib Sebesar Rp. 30.000,00/Bulan</li>
							<li>Simpanan Sukarela minimal Rp. 20.000,00</li>
						</ol>
					</label>
				</div>
			</div>
		</div>
	</div>
</main>
