<div class="container-fluid">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/jaminan');?>">Jaminan</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
		</ol>
	</nav>

	<div class="card shadow mb-2 mt-2">
		<h2 class="h2 mt-2 font-weight-bold text-gray-800 text-center">Tabel <?= $title ?></h2>
		<p class="mb-2">
	</div>

	<div class="card shadow mb-4 col-lg-12">
		<p class="mb-1">
			<div class="card-body">
				<div class="col-md-12">
					<form action="<?= base_url('admin/jaminan/tambah'); ?>" method="POST">
						<div class="form-group row mt-3">
							<label for="no_anggota" class="col-sm-2 col-form-label">
								No Buku :
							</label>
							<div class="col-sm-6">
								<input type="text" name="no_anggota" id="no_anggota" class="form-control"
									placeholder="No Anggota">
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="nm_anggota" class="col-sm-2 col-form-label">
								Nama Lengkap :
							</label>
							<div class="col-sm-6">
								<input type="text" name="nm_anggota" id="nm_anggota" class="form-control"
									placeholder="Nama Anggota">
							</div>
						</div>

						<div class="form-group row mt-3 ">
							<label for="brg_jaminan" class="col-sm-2 col-form-label">
								Barang jaminan :
							</label>
							<div class="col-sm-6">
								<select class="custom-select" name="brg_jaminan" id="brg_jaminan">
									<option selected>Pilih Barang Jaminan</option>
									<option value="BPKB Mobil">BPKB Mobil</option>
									<option value="BPKB Motor">BPKB Motor</option>
									<option value="Sertifikat Tanah">Sertifikat Tanah</option>
									<option value="SK">SK</option>
								</select>
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="no_brangkas" class="col-sm-2 col-form-label">
								No Brangkas :
							</label>
							<div class="col-sm-6">
								<input type="text" name="no_brangkas" id="no_brangkas" class="form-control"
									placeholder="No Brangkas">
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
					</form>
				</div>
			</div>
	</div>
</div>
