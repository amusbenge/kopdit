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
									<h1 class="h4 text-dark mt-1 font-weight-bold text-monospace">Ubah Password</h1>
									<h1 class="h6 text-dark small mb-4">Klik <b>Kirim </b>Untuk mendapatkan link reset
										password Anda : </h1>
								</div>
								<form class="user" method="post" action="<?= base_url('auth/lupaPass'); ?>">
									<div class="form-group icon-container">
										<input type="text" class="form-control form-control-user" id="email"
											name="email" placeholder="Email" value='<?= set_value('email') ?>'>
										<span toggle="#email" class="fa fa-fw fa-envelope-square icon-email"></span>
									</div>
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Kirim
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a href="<?= base_url('auth');?>" data-toggle="tooltip" data-placement="bottom"
										title="Kembali ke Login"><i class="fas fa-arrow-circle-left"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
