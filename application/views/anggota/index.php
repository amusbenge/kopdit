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
						<li class="breadcrumb-item active" aria-current="page">Anggota</li>
					</ol>
				</nav>
			</div>
			<div class="col-lg-3 mb-2">
				<div class="d-flex justify-content-end">
					<a href="<?= base_url('anggota/edit/') . $anggota['anggota']['id_anggota']?>"
						class="btn btn-success btn-icon-split">
						<span class="icon text-white-50">
							<i class="fas fa-fw fa-pencil-alt"></i>
						</span>
						<span class="text">Edit</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- ======= Kredit Section ======= -->
	<section id="kredit" class="portfolio">
		<div class="container d-flex justify-content-center">
			<div class="card shadow col-lg-12">
				<div class="mt-2">
					<?= $this->session->flashdata('message'); ?>
				</div>
				<div class="card-body row">
					<div class="col-md-2 mb-2 border-right">
						<img src="<?= base_url('assets/img/profile/') . $anggota['anggota']['foto']; ?>"
							class="img-thumbnail">
					</div>
					<div class="col-md-9 mt-2">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group row">
									<h6 for="no_buku" class="col-sm-4">
										<b>No Anggota</b>
									</h6>
									<h6 for="no_buku" class="col-sm-7">
										: <?= $anggota['anggota']['no_buku']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>Nama Anggota</b>
									</h6>
									<h6 for="no_agt" class="col-sm-4">
										: <?= $anggota['anggota']['nm_anggota']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>NIK</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['nik']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>Tempat Lahir</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['tmpt_lahir']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>Tanggal Lahir</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= date_format(date_create($anggota['anggota']['tgl_lhr']), 'd F Y') ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>Agama</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['agama']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>No Handphone</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['no_hp']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>Email</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['email']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>Jenis Kelamin</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['jns_kelamin']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-4">
										<b>Alamat</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['alamat']; ?>
									</h6>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>RT/RW</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['rt']; ?> / <?= $anggota['anggota']['rw']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>Kelurahan/Desa</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['kel_des']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>Kecamatan</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['kec']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>Kota/Kabupaten</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['kota_kab']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>Provinsi</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['prov']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>Kode Pos</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['kode_pos']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>Pendidikan Terakhir</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['pendidikan_terakhir']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="no_agt" class="col-sm-5">
										<b>Pekerjaan</b>
									</h6>
									<h6 for="no_agt" class="col-sm-7">
										: <?= $anggota['anggota']['pekerjaan']; ?>
									</h6>
								</div>
								<div class="form-group row">
									<h6 for="tgl_masuk" class="col-sm-5">
										<b>Terdaftar Pada</b>
									</h6>
									<h6 for="tgl_masuk" class="col-sm-7">
										: <?= date_format(date_create($anggota['anggota']['tgl_masuk']), 'd F Y') ?>
									</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section><!-- End Kredit Section -->
</main>
