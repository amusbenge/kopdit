<div class="container">

	<div class="row d-flex justify-content-center">
		<div class="col-lg-7">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0 mx-4">
					<div class="row d-flex justify-content-center mb-3 mt-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/user/user_registration.png') ?>"
								style="width:100px;height:100px;">
							<h1 class="h4 text-dark mt-1 mb-2 font-weight-bold text-monospace">Pendaftaran Anggota
							</h1>
							<h2 class="small text-dark mb-3">Silahkan isi Data diri anda!</h2>
						</div>
					</div>
					<div class="col-md-12 d-flex justify-content-center">
						<form class="user row d-flex justify-content-center" action="<?= base_url('auth/register') ?>"
							method="post" enctype="multipart/form-data">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="nm_anggota"
										id="nm_anggota" placeholder="Nama Lengkap"
										value="<?= set_value('nm_anggota') ?>">
									<?= form_error('nm_anggota', '<small class="text-danger ml-2">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="email" id="email"
										placeholder="Masukan Email yang aktif" value="<?= set_value('email') ?>">
									<?= form_error('email', '<small class="text-danger ml-2">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="no_hp" id="no_hp"
										placeholder="No Handphone" value="<?= set_value('no_hp')?>">
									<?= form_error('no_hp', '<small class="text-danger ml-2">', '</small>'); ?>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" name="password1"
											id="password1" placeholder="Password">
										<?= form_error('password1', '<small class="text-danger ml-2">', '</small>'); ?>
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" name="password2"
											id="password2" placeholder="Ulangi Password">
										<?= form_error('password2', '<small class="text-danger ml-2">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="date" class="form-control form-control-user" id="tgl_lhr"
										name="tgl_lhr" value="<?= set_value('tgl_lhr')?>">
									<?= form_error('tgl_lhr', '<small class="text-danger ml-2">', '</small>'); ?>
								</div>
								<div class="form-group">
									<select class="form-control" name="jns_kelamin" id="jns_kelamin">
										<option value="" disable selected>Pilih Jenis Kelamin : </option>
										<option value="Lelaki">Lelaki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									<?= form_error('jns_kelamin', '<small class="text-danger ml-2">', '</small>'); ?>
								</div>
								<div class="form-group">
									<select class="form-control" name="pekerjaan" id="pekerjaan">
										<option value="" disable selected>Pilih Pekerjaan : </option>
										<option value="Wiraswasta">Wiraswasta</option>
										<option value="Swasta">Swasta</option>
										<option value="TNI/Polisi">TNI/Polisi</option>
										<option value="ASN/PNS">ASN/PNS</option>
										<option value="Lain-lain">Lain-lain</option>
									</select>
									<?= form_error('pekerjaan', '<small class="text-danger ml-2">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="keterangan">
										Silahkan transfer biaya pendaftaran sebesar Rp. 350.000,00 pada <a
											href="<?= base_url('kontak');?>" target="_blank"> Rekening</a> kopdit swasti sari dan lampirkan Bukti Transfer :
									</label>
								</div>
								<div class="form-group">
									<input type="file" class="form-control-file" id="bukti" name="bukti">
									<?= form_error('bukti', '<small class="text-danger ml-2">', '</small>'); ?>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-lg col-sm-3 mb-2">Daftar</button>
						</form>
					</div>
					<div class="text-center mb-3 mt-2">
						<a class="small" href="<?= base_url('auth')?>">Sudah Punya Akun?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
