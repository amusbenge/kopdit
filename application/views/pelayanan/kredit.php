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
		<div class="container">
			<ol>
				<li><a href="<?= base_url('beranda')?>"><i class="fas fa-fw fa-home"></i> Beranda</a></li>
				<li>Kredit</li>
			</ol>
		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Kredit Section ======= -->
	<section id="kredit" class="portfolio">
		<div class="container d-flex justify-content-center">
			<div class="card shadow mb-4 col-lg-12">
				<div class="card-header">
					<h2 class="h2 mb-1 mt-3 font-weight-bold text-gray-800 text-center">Tambah Data Pengajuan
						<?= $title ?></h2 </div> <div class="card-body">
					<div class="row">
						<div class="col-md">
							<form action="<?= base_url('pelayanan/kredit/') . $anggota['anggota']['id_anggota']?>"
								method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="no_buku">No Buku : </label>
									<input type="text" class="form-control" name="no_buku" id="no_buku" readonly
										value="<?= $anggota['anggota']['no_buku'];?>">
								</div>
								<div class="form-group">
									<label for="nm_anggota">Nama Lengkap :</label>
									<input type="text" name="nm_anggota" id="nm_anggota" class="form-control"
										value="<?= $anggota['anggota']['nm_anggota']?>" readonly>
								</div>
								<div class="form-group">
									<label for="pekerjaan">Pekerjaan :</label>
									<input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
										value="<?= $anggota['anggota']['pekerjaan']?>" readonly>
								</div>
								<div class="form-group">
									<label for="penghasilan">Penghasilan :</label>
									<input type="text" name="penghasilan" class="form-control"
										placeholder="Masukan Penghasilan">
									<?= form_error('penghasilan', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="pinjaman">Pinjaman :</label>
									<input type="text" name="pinjaman" class="form-control"
										placeholder="Masukan Pinjaman">
									<?= form_error('pinjaman', '<small class="text-danger">', '</small>'); ?>
								</div>

						</div>
						<div class="col-md">
							<div class="form-group">
								<label for="tujuan">Tujuan :</label>
								<select class="custom-select" name="tujuan" id="tujuan">
									<option value="">Tujuan Pinjaman : </option>
									<?php foreach( $tujuan as $tuj ) : ?>
									<option value="<?= $tuj['id_sub']; ?>">
										<?= $tuj['nm_sub_kriteria']; ?>
									</option>
									<?php endforeach; ?>
								</select>
								<?= form_error('tujuan', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="jaminan">Barang Jaminan :</label>
								<select class="custom-select" name="jaminan" id="jaminan">
									<option value="">Barang Jaminan :</option>
									<?php foreach( $barang as $brg ) : ?>
									<option value="<?= $brg['id_sub']; ?>">
										<?= $brg['nm_sub_kriteria']; ?>
									</option>
									<?php endforeach; ?>
								</select>
								<?= form_error('jaminan', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="foto_jaminan">Foto Jaminan</label>
								<input type="file" class="form-control-file" name="foto_jaminan" id="foto_jaminan">
							</div>
							<div class="form-group">
								<label for="simpanan">Simpanan :</label>
								<input type="text" name="simpanan" id="simpanan" class="form-control"
									value="<?= $t_simpanan['saldo'] ?>" readonly>
							</div>
							<div class="form-group">
								<label for="bunga">Bunga :</label>
								<select class="custom-select" name="bunga" id="bunga">
									<option value="">Jenis Bunga : </option>
									<?php foreach( $bunga as $bng ) : ?>
									<option value="<?= $bng['id_bunga']; ?>">
										<?= $bng['jenis_bunga']; ?>
									</option>
									<?php endforeach; ?>
								</select>
								<?= form_error('bunga', '<small class="text-danger">', '</small>'); ?>
							</div>
							<button type="submit" class="btn btn-primary btn-lg">
								Ajukan
							</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Kredit Section -->
</main>
