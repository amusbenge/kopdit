<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-6 col-md-6">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin/jaminan');?>">Jaminan</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-6 col-md-6 d-flex justify-content-end">
			<div class="card-header">
				<a href="#" class="btn btn-secondary btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-print"></i>
					</span>
					<span class="text">Cetak</span>
				</a>
				<a href="<?= base_url('admin/jaminan/ubah/') . $jaminan['id_jaminan'] ?>"
					class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-fw fa-pencil-alt"></i>
					</span>
					<span class="text">Edit</span>
				</a>
			</div>
		</div>
	</div>
	<!-- tampilan cardnya -->
	<div class="card mb-3 col-lg-12">
		<div class="row no-gutters mt-2">
			<div class="col-md-3">
				<img src="<?= base_url('assets/img/jaminan/') . $jaminan['foto']; ?>" class="card-img">
			</div>
			<div class="col-md-9">
				<div class="card-body ml-2">
					<div class="form-group row">
						<h5 for="no_anggota" class="col-sm-3">
							No Anggota
						</h5>
						<h5 for="no_anggota" class="col-sm-7">
							: <?= $jaminan['no_anggota']; ?>
						</h5>
					</div>
					<div class="form-group row">
						<h5 for="nm_anggota" class="col-sm-3">
							Nama Anggota
						</h5>
						<h5 for="nm_anggota" class="col-sm-7">
							: <?= $jaminan['nm_anggota']; ?>
						</h5>
					</div>
					<div class="form-group row">
						<h5 for="brg_jaminan" class="col-sm-3">
							Barang Jaminan
						</h5>
						<h5 for="brg_jaminan" class="col-sm-7">
							: <?= $jaminan['brg_jaminan']; ?>
						</h5>
					</div>
					<div class="form-group row">
						<h5 for="tgl_terima" class="col-sm-3">
							Tanggal Terima
						</h5>
						<h5 for="tgl_terima" class="col-sm-7">
							: <?= date_format(date_create($jaminan['tgl_terima']), 'd F Y') ?>
						</h5>
					</div>
					<div class="form-group row">
						<h5 for="tgl_ambil" class="col-sm-3">
							Tanggal Ambil
						</h5>
						<h5 for="tgl_ambil" class="col-sm-7">
							: <?= date_format(date_create($jaminan['tgl_ambil']), 'd F Y') ?>
						</h5>
					</div>
					<div class="form-group row">
						<h5 for="status" class="col-sm-3">
							Status
						</h5>
						<h5 for="status" class="col-sm-7">
							: <?= $jaminan['status']; ?>
						</h5>
					</div>
					<div class="form-group row">
						<h5 for="no_brangkas" class="col-sm-3">
							No Brangkas
						</h5>
						<h5 for="no_brangkas" class="col-sm-7">
							: <?= $jaminan['no_brangkas']; ?>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
