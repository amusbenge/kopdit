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
	<!-- <?php var_dump($kredit) ?> -->
	<div class="container mt-2">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a
						href="<?= base_url('pelayanan/angsuran/').$angsuran['id_kredit'];?>">Angsuran</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Bayar Angsuran</li>
			</ol>
		</nav>
		<div class="card shadow mb-4 col-lg-12">
			<p class="mb-1">
				<div class="card-body row">
					<div class="col-md-6">
						<form action="<?= base_url('pelayanan/bayarAngsuran/') . $angsuran['id_angsuran']; ?>"
							method="POST" enctype="multipart/form-data">
							<?php $total = $angsuran['jumlah_harus_bayar'] + $denda; ?>
							<input type="text" name="denda" value="<?= $denda;?>" class="d-none">
							<div class="form-group row mt-3">
								<label for="jumlah_harus_bayar" class="col-sm-4 col-form-label">
									Total Bayar
								</label>
								<div class="col-sm-8">
								<?= 'Rp. '. number_format($total,2,',','.') ?>
								</div>
							</div>

							<div class="form-group row mt-3">
								<label for="jumlah_bayar" class="col-sm-4 col-form-label">
									Jumlah Bayar
								</label>
								<div class="col-sm-8">
									<input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control"
										placeholder="Masukan Jumlah Uang" value="<?= set_value('jumlah_bayar');?>">
									<?= form_error('jumlah_bayar', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3">
								<label for="bukti" class="col-sm-4 col-form-label">Bukti Pembayaran :</label>
								<div class="col-sm-8">
									<input type="file" class="form-control-file" id="bukti" name="bukti">
									<?= form_error('bukti', '<small class="text-danger">', '</small>'); ?><br>
									<button type="submit"
										class="btn btn-primary btn-md mt-2 tambahDeposit">Bayar</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<label for="">Keterangan :
							<ol>
								<li>Total Bayar adalah jumlah angsuran bulan ini + denda</li>
								<li>Jumlah angsuran bulan ini sebesar <?= 'Rp.'.number_format($angsuran['jumlah_harus_bayar'],2,',','.');?></li>
								<li>Denda bulan ini adalah <?= 'Rp. '.number_format($denda,2,',','.');?></li>
								<li>Mohon untuk membayar angsuran bulan ini sesuai total bayar</li>
							</ol>
						</label>
					</div>
				</div>
		</div>
	</div>
</main>
