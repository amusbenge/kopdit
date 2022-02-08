<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- tampilan cardnya -->
	<div class="col-lg-6">
		<?php if ($this->session->flashdata('pesan')) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Berhasil!</strong> Data Berhasil <?= $this->session->flashdata('pesan'); ?>.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
	</div>
	<div class="row">
		<div class="card col-lg-6 mb-2 border-left-primary">
			<div class="card-header">
				<h2 class="mt-2 font-weight-bold text-gray-800 text-center">Administrator</h2>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img mt-2 mb-2">
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="card-body">
						<div class="form-group row">
							<h6 class="col-sm-4">Nama</h6>
							<h6 class="col-sm-8"> :<?= $user['nm_admin']; ?></h6>
							<h6 class="col-sm-4">Email</h6>
							<h6 class="col-sm-8"> :<?= $user['email']; ?></h6>
							<h6 class="col-sm-4">Status</h6>
							<h6 class="col-sm-8"> :<?= $user['status']; ?></h6>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<p class="card-text text-center">
					<small class="text-muted">Terdaftar Sejak
						<?= $user['date_created'] ?>
					</small>
				</p>
			</div>
		</div>
		<div class="col-lg-6 rounded-lg">

		</div>
	</div>
</div>