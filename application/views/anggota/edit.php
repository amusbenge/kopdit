<main id="main">
	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="breadcrumb-hero">
			<div class="container">
				<div class="breadcrumb-hero">
					<h2><b><?= $title; ?> Anggota</b></h2>
				</div>
			</div>
		</div>
	</section><!-- End Breadcrumbs -->

	<div class="container col-lg-10 mt-2">
		<div class="row">
			<div class="col-lg-9">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('beranda');?>"><i
									class="fas fa-fw fa-home mr-2"></i>Beranda</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('anggota');?>"><i
									class="fas fa-fw fa-users mr-2"></i>Anggota</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<!-- ======= Kredit Section ======= -->
	<section id="kredit" class="portfolio">
		<div class="container d-flex justify-content-center">
			<div class="card shadow col-lg-12">
				<div class="card-body">
					<form class="row" action="<?= base_url('anggota/edit');?>" method="post"
						enctype="multipart/form-data">
						<div class="col-md-6">
							<div class="form-group row mt-3">
								<label for="no_buku" class="col-sm-4 col-form-label">
									No Anggota :
								</label>
								<div class="col-sm-8">
									<input type="text" name="no_buku" id="no_buku" class="form-control"
										value="<?= $anggota['anggota']['no_buku']; ?>" readonly>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="nm_anggota" class="col-sm-4 col-form-label">
									Nama Lengkap :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="nm_anggota" id="nm_anggota" class="form-control"
										value="<?= $anggota['anggota']['nm_anggota']; ?>">
									<?= form_error('nm_anggota', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="nik" class="col-sm-4 col-form-label">
									NIK :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="nik" id="nik" class="form-control"
										value="<?= $anggota['anggota']['nik']; ?>">
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="tmpt_lahir" class="col-sm-4 col-form-label">
									Tempat Lahir :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="tmpt_lahir" id="tmpt_lahir" class="form-control"
										value="<?= $anggota['anggota']['tmpt_lahir']; ?>">
									<?= form_error('tmpt_lahir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="tgl_lhr" class="col-sm-4 col-form-label">
									Tanggal Lahir :
								</label>
								<div class="col-sm-8 ">
									<input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control"
										value="<?= $anggota['anggota']['tgl_lhr']; ?>">
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="agama" class="col-sm-4 col-form-label">
									Agama :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="agama" id="agama" class="form-control"
										value="<?= $anggota['anggota']['agama']; ?>">
									<?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="no_hp" class="col-sm-4 col-form-label">
									No. Handphone :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="no_hp" id="no_hp" class="form-control"
										value="<?= $anggota['anggota']['no_hp']; ?>">
									<?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="email" class="col-sm-4 col-form-label">
									Email :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="email" id="email" class="form-control"
										value="<?= $anggota['anggota']['email']; ?>" readonly>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="jns_kelamin" class="col-sm-4 col-form-label">
									Jenis Kelamin :
								</label>
								<div class="col-sm-8 ">
									<select class="custom-select" name="jns_kelamin" id="jns_kelamin">
										<option value="Lelaki"
											<?= $anggota['anggota']['jns_kelamin'] == 'Lelaki' ? 'Selected' : '' ?>>
											Laki-laki
										</option>
										<option value="Perempuan"
											<?= $anggota['anggota']['jns_kelamin'] == 'Perempuan' ? 'Selected' : '' ?>>
											Perempuan
										</option>
									</select>
									<?= form_error('jns_kelamin', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="alamat" class="col-sm-4 col-form-label">
									Alamat :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="alamat" id="alamat" class="form-control"
										value="<?= $anggota['anggota']['alamat']; ?>">
									<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="rt" class="col-sm-4 col-form-label">
									RT/RW :
								</label>
								<div class="col-sm-3 ">
									<input type="text" name="rt" id="rt" class="form-control"
										value="<?= $anggota['anggota']['rt']; ?>">
									<?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
								</div>
								<label for="rw" class="col-sm-0 col-form-label">
									/
								</label>
								<div class="col-sm-3 ">
									<input type="text" name="rw" id="rw" class="form-control"
										value="<?= $anggota['anggota']['rw']; ?>">
									<?= form_error('rw', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row mt-3 ">
								<label for="kel_des" class="col-sm-4 col-form-label">
									Kelurahan/Desa :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="kel_des" id="kel_des" class="form-control"
										value="<?= $anggota['anggota']['kel_des']; ?>">
									<?= form_error('kel_des', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="kec" class="col-sm-4 col-form-label">
									Kecamatan :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="kec" id="kec" class="form-control"
										value="<?= $anggota['anggota']['kec']; ?>">
									<?= form_error('kec', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="kota_kab" class="col-sm-4 col-form-label">
									Kota/Kabupaten :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="kota_kab" id="kota_kab" class="form-control"
										value="<?= $anggota['anggota']['kota_kab']; ?>">
									<?= form_error('kota_kab', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3">
								<label for="prov" class="col-sm-4 col-form-label">
									Provinsi :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="prov" id="prov" class="form-control"
										value="<?= $anggota['anggota']['prov']; ?>">
									<?= form_error('prov', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="kode_pos" class="col-sm-4 col-form-label">
									Kode Pos :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="kode_pos" id="kode_pos" class="form-control"
										value="<?= $anggota['anggota']['kode_pos']; ?>">
									<?= form_error('kode_pos', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="pendidikan_terakhir" class="col-sm-4 col-form-label">
									Pendidikan Terakhir :
								</label>
								<div class="col-sm-8">
									<select class="custom-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
										<option value="">Pendidikan Terakhir Anda</option>
										<option value="Sarjana"
											<?= $anggota['anggota']['pendidikan_terakhir'] == 'Sarjana' ? 'Selected' : '' ?>>
											Sarjana</option>
										<option value="SMA/SMK"
											<?= $anggota['anggota']['pendidikan_terakhir'] == 'SMA/SMK' ? 'Selected' : '' ?>>
											SMA/SMK</option>
										<option value="SMP"
											<?= $anggota['anggota']['pendidikan_terakhir'] == 'SMP' ? 'Selected' : '' ?>>
											SMP
										</option>
										<option value="SD"
											<?= $anggota['anggota']['pendidikan_terakhir'] == 'SD' ? 'Selected' : '' ?>>
											SD</option>
										<option value="Tidak bersekolah"
											<?= $anggota['anggota']['pendidikan_terakhir'] == 'Tidak bersekolah' ? 'Selected' : '' ?>>
											Tidak bersekolah</option>
									</select>
									<?= form_error('pendidikan_terakhir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="pekerjaan" class="col-sm-4 col-form-label">
									Pekerjaan :
								</label>
								<div class="col-sm-8 ">
									<input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
										value="<?= $anggota['anggota']['pekerjaan']; ?>" readonly>
									<?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="tgl_masuk" class="col-sm-4 col-form-label">
									Tanggal Masuk :
								</label>
								<div class="col-sm-8 ">
									<input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control"
										value="<?= $anggota['anggota']['tgl_masuk']; ?>" readonly>
								</div>
							</div>
							<div class="form-group row mt-3 ">
								<label for="foto" class="col-sm-4 col-form-label">
									Foto :
								</label>
								<div class="col-sm-3">
									<img src="<?= base_url('assets/img/profile/') . $anggota['anggota']['foto']; ?>"
										class="img-thumbnail">
								</div>
								<div class="col-sm-5">
									<div class="custom-file mt-2">
										<input type="file" class="custom-file-input" name="foto" id="foto">
										<label class="custom-file-label" for="foto">Pilih File</label>
									</div>
									<button type="submit" class="btn btn-primary btn-lg mt-3">Simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</section><!-- End Kredit Section -->
</main>
