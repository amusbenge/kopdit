<!-- Begin Page Content -->
<div class="container-fluid">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/admin')?>">Profil</a></li>
			<li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
		</ol>
	</nav>

	<div class="card mb-3 col-lg-12">
		<div class="row justify-content-md-center">
			<div class="col-md-5 mt-3">
				<!-- tampilkan pesan -->
				<?= $this->session->flashdata('message'); ?>

				<form action="<?= base_url('admin/admin/changepassword') ?>" method="POST">
					<div class="form-group">
						<label for="current_password">Password Sekarang</label>
						<input type="password" class="form-control" id="current_password" name="current_password">
						<?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="new_password1">Passoword Baru</label>
						<input type="password" class="form-control" id="new_password1" name="new_password1">
						<span toggle="#new_password1" class="fa fa-fw fa-eye pass1 toggle-pass1"></span>
						<?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="new_password2">Ulangi Password</label>
						<input type="password" class="form-control" id="new_password2" name="new_password2">
						<span toggle="#new_password2" class="fa fa-fw fa-eye pass2 toggle-pass2"></span>
						<?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">Change Password</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
