<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-6">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin/anggota'); ?>">Anggota</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-6 mb-2">
			<div class="d-flex justify-content-end">
				<!-- <?php if ($user['role_id'] == 1) : ?>
				<a href="<?= base_url('admin/anggota/ubah/') . $anggota['id_anggota'] ?>"
					class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-pencil-alt"></i>
					</span>
					<span class="text">Edit</span>
				</a>
				<?php endif; ?> -->
				<a href="<?= base_url('admin/anggota/cetak_anggota/') . $anggota['id_anggota']; ?>" target="_blank" class="btn btn-secondary btn-icon-split ml-2">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-print"></i>
					</span>
					<span class="text">Cetak</span>
				</a>
			</div>
		</div>
	</div>

	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1> -->

	<div class="card shadow mb-3 border-left-primary">
		<!-- tampilan cardnya -->
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-3 col-sm-3 mt-4">
					<img src="<?= base_url('assets/img/profile/') . $anggota['foto']; ?>" class="img-thumbnail rounded">
				</div>
				<div class="card-body row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>No Anggota</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['no_buku']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Nama Anggota</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['nm_anggota']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>NIK</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['nik']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Tempat Lahir</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['tmpt_lahir']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Tanggal Lahir</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= date_format(date_create($anggota['tgl_lhr']), 'd F Y') ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Agama</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['agama']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>No Handphone</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['no_hp']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Email</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['email']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Jenis Kelamin</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['jns_kelamin']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Alamat</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['alamat']; ?>
							</h6>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>RT/RW</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['rt']; ?> / <?= $anggota['rw']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Kelurahan/Desa</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['kel_des']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Kecamatan</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['kec']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Kota/Kabupaten</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['kota_kab']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Provinsi</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['prov']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Kode Pos</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['kode_pos']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 class="col-sm-5">
								<b>Pendidikan Terakhir</b>
							</h6>
							<h6 class="col-sm-7">
								: <?= $anggota['pendidikan_terakhir']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 for="pekerjaan" class="col-sm-5">
								<b>Pekerjaan</b>
							</h6>
							<h6 for="pekerjaan" class="col-sm-7">
								: <?= $anggota['pekerjaan']; ?>
							</h6>
						</div>
						<div class="form-group row">
							<h6 for="tgl_masuk" class="col-sm-5">
								<b>Terdaftar Pada</b>
							</h6>
							<h6 for="tgl_masuk" class="col-sm-7">
								: <?= date_format(date_create($anggota['tgl_masuk']), 'd F Y') ?>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->