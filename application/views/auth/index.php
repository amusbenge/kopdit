<div class="container">

	<!-- Outer Row -->
	<div class="row d-flex justify-content-center">
		<div class="col-lg-5">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0 bg-card">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<img src="<?= base_url('assets/img/user/admin2.png') ?>" style="width:100px;height:100px;">
									<h1 class="h4 text-dark mt-1 mb-3 font-weight-bold text-monospace">Anggota</h1>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="post" action="<?= base_url('auth'); ?>">
									<div class="form-group icon-container">
										<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value='<?= set_value('email') ?>'>
										<span toggle="#email" class="fa fa-fw fa-envelope-square icon-email"></span>
									</div>
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
									<div class="form-group icon-cont">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
										<span toggle="#password" class="fa fa-fw fa-key icon-pass"></span>
										<span toggle="#password" class="fa fa-fw fa-eye pass toggle-pass" data-toggle="tooltip" data-placement="top" title="Lihat Password"></span>
									</div>
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Masuk
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small text-dark" href="<?= base_url('auth/register'); ?>">Daftar</a><br>
									<a class="small text-dark" href="<?= base_url('auth/lupaPass'); ?>">Lupa Password Anda?</a><br>
									<a href="<?= base_url('anggota/beranda'); ?>" data-toggle="tooltip" data-placement="bottom" title="Kembali ke Beranda"><i class="fas fa-arrow-circle-left"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>