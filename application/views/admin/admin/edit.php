<!-- Begin Page Content -->
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/admin') ?>">Profil</a></li>
			<li class="breadcrumb-item active" aria-current="page">Ubah Profil</li>
		</ol>
	</nav>

	<!-- Page Heading -->
	<div class="card shadow mb-2 mt-2">
		<h2 class="h2 mt-2 font-weight-bold text-gray-800 text-center"><?= $title ?></h2>
	</div>

	<div class="card mb-3 col-lg-12">
		<div class="col-lg-10 mt-2">
			<?= form_open_multipart('admin/admin/edit'); ?>
			<!-- field untuk email -->
			<input type="hidden" name="id_admin" value="<?= $user['id_admin']; ?>">
			<div class="form-group row mt-2">
				<label for="email" class="col-sm-2 col-form-label">
					Email
				</label>
				<div class="col-sm-10">
					<input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
				</div>
			</div>
			<!-- field untuk full name -->
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">
					Nama Lengkap
				</label>
				<div class="col-sm-10">
					<input value="<?= $user['nm_admin']; ?>" type="text" name="name" id="name" class="form-control">
					<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
				</div>
			</div>
			<!-- field untuk picture -->
			<div class="form-group row">
				<div class="col-sm-2">Foto</div>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<!-- untuk img nya ambil dari folder profile dan ambil nama foto yang ada di database -->
							<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
						</div>
						<div class="col-md-9 col-sm-9 mt-2">
							<!-- untuk file inputnya dan kita akan tambahkan jquery di footer agar nama filenya juga muncul di field -->
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="image" id="image">
								<label class="custom-file-label" for="image">Pilih File</label>
							</div>
							<button type="submit" class="btn btn-primary mt-2">
								Simpan
							</button>
						</div>
					</div>
				</div>
			</div>

			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->