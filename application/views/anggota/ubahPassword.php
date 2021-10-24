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
	</section><!-- End Breadcrumbs -->

	<div class="container col-lg-10 mt-2">
		<div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('anggota');?>"><i
									class="fas fa-fw fa-home mr-2"></i>Beranda</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('anggota');?>"><i
									class="fas fa-fw fa-users mr-2"></i>Anggota</a></li>
						<li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
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
					<div class="row justify-content-md-center">
						<div class="col-md-6">
							<?= $this->session->flashdata('message'); ?>
						</div>
					</div>
					<form class="row justify-content-md-center" action="<?= base_url('anggota/ubahPassword');?>"
						method="post">
						<div class="col-md-6">
							<div class="form-group row mt-3">
								<label for="current_pass" class="col-sm-4 col-form-label">
									Password Anda :
								</label>
								<div class="col-sm-8">
									<input type="password" name="current_pass" id="current_pass" class="form-control">
									<?= form_error('current_pass', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3">
								<label for="pass1" class="col-sm-4 col-form-label">
									Password Baru :
								</label>
								<div class="col-sm-8">
									<input type="password" name="pass1" id="pass1" class="form-control">
									<?= form_error('pass1', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row mt-3">
								<label for="pass2" class="col-sm-4 col-form-label">
									Ulangi Password :
								</label>
								<div class="col-sm-8">
									<input type="password" name="pass2" id="pass2" class="form-control">
									<?= form_error('pass2', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group d-flex justify-content-end">
								<button type="submit" class="btn btn-primary">Change Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</section><!-- End Kredit Section -->
</main>
