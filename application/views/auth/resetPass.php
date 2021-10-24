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
									<img src="<?= base_url('assets/img/user/forgot-pass.png') ?>"
										style="width:100px;height:100px;">
									<h1 class="h4 text-dark mt-1 mb-3 font-weight-bold text-monospace">Reset Pass</h1>
                                    <h1 class="h6 small text-dark mt-1 mb-4 font-weight-bold text-monospace">Klik <b>Reset</b> Untuk Mengubah Password Anda!</h1>
								</div>
								<form class="user" method="post" action="<?= base_url('auth/resetPass/'.urlencode($email)); ?>">
								<input type="text" name="email" value="<?= $email;?>" class="d-none">
									<div class="form-group icon-cont">
										<input type="password" class="form-control form-control-user" id="pass1"
											name="pass1" placeholder="Password Baru">
										<span toggle="#password" class="fa fa-fw fa-key icon-pass"></span>
									</div>
									<?= form_error('pass1', '<small class="text-danger">', '</small>'); ?>
                                    <div class="form-group icon-cont">
										<input type="password" class="form-control form-control-user" id="pass2"
											name="pass2" placeholder="Konfirmasi Password">
										<span toggle="#password" class="fa fa-fw fa-key icon-pass"></span>
									</div>
									<?= form_error('pass2', '<small class="text-danger">', '</small>'); ?>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Reset
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
