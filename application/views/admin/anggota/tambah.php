<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/anggota'); ?>">Anggota</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah</li>
		</ol>
	</nav>

	<div class="card shadow mb-4 col-lg-12">
		<div class="card-header">
			<h2 class="h2 mb-1 mt-3 font-weight-bold text-gray-800 text-center"><?= $title ?></h2>
		</div>
		<p class="mb-1">
		<div class="card-body">
			<div class="col-md-12">
				<form action="<?= base_url('admin/anggota/tambah/'); ?>" method="POST">
					<div class="form-group row mt-3">
						<label for="nm_anggota" class="col-sm-2 col-form-label">
							Nama Lengkap :
						</label>
						<div class="col-sm-6">
							<input type="text" name="nm_anggota" id="nm_anggota" class="form-control" placeholder="Nama Anggota" value="<?= set_value('nm_anggota'); ?>">
							<?= form_error('nm_anggota', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="no_hp" class="col-sm-2 col-form-label">
							No. Handphone :
						</label>
						<div class="col-sm-6">
							<input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No Handphone" value="<?= set_value('no_hp'); ?>">
							<?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="email" class="col-sm-2 col-form-label">
							Email :
						</label>
						<div class="col-sm-6">
							<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
							<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="tgl_lhr" class="col-sm-2 col-form-label">
							Tanggal Lahir :
						</label>
						<div class="col-sm-6">
							<input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control">
							<?= form_error('tgl_lhr', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="pekerjaan" class="col-sm-2 col-form-label">
							Pekerjaan :
						</label>
						<div class="col-sm-6">
							<select class="custom-select" name="pekerjaan" id="pekerjaan">
								<option value="" disable selected>Pilih Pekerjaan : </option>
								<option value="Wiraswasta">Wiraswasta</option>
								<option value="Swasta">Swasta</option>
								<option value="TNI/Polisi">TNI/Polisi</option>
								<option value="ASN/PNS">ASN/PNS</option>
								<option value="Lain-lain">Lain-lain</option>
							</select>
						</div>
						<?= form_error('pekerjaan', '<small class="text-danger ml-2">', '</small>'); ?>
					</div>

					<div class="form-group row mt-3 ">
						<label for="jns_kelamin" class="col-sm-2 col-form-label">
							Jenis Kelamin :
						</label>
						<div class="col-sm-6">
							<select class="custom-select" name="jns_kelamin" id="jns_kelamin">
								<option value="">Pilih jenis kelamin</option>
								<option value="Lelaki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
							<?= form_error('jns_kelamin', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="password" class="col-sm-2 col-form-label">
							Password :
						</label>
						<div class="col-sm-6">
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
							<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							<button type="submit" class="btn btn-primary btn-sm mt-4">
								<span class="icon text-white-50"><i class="fas fa-save"></i></span>
								<span class="text ml-2">Simpan</span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>