<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/manager');?>">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah</li>
		</ol>
	</nav>

	<div class="card shadow mb-4 col-lg-10">
		<div class="card-header">
			<h2 class="h2 mb-1 mt-3 font-weight-bold text-gray-800 text-center"><?= $title ?></h2>
		</div>
			<div class="card-body row">
				<div class="col-md-6">
					<form action="<?= base_url('admin/manager/tambahAdmin'); ?>" method="POST">
						<div class="form-group row mt-3">
							<label for="nm_admin" class="col-sm-4 col-form-label">
								Nama Lengkap :
							</label>
							<div class="col-sm-8">
								<input type="text" name="nm_admin" id="nm_admin" class="form-control"
									placeholder="Nama Lengkap" value="<?= set_value('nm_admin'); ?>">
								<?= form_error('nm_admin', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="email" class="col-sm-4 col-form-label">
								Email :
							</label>
							<div class="col-sm-8">
								<input type="text" name="email" id="email" class="form-control"
									placeholder="Email" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>

                        <div class="form-group row mt-3 ">
							<label for="role_id" class="col-sm-4 col-form-label">
								Role :
							</label>
							<div class="col-sm-8">
								<select class="custom-select" name="role_id" id="role_id">
									<option value="">Pilih Role</option>
									<option value="1">1</option>
									<option value="2">2</option>
								<?= form_error('role_id', '<small class="text-danger">', '</small>'); ?>
								</select>
							</div>
						</div>

						<div class="form-group row mt-3 ">
							<label for="status" class="col-sm-4 col-form-label">
								Status :
							</label>
							<div class="col-sm-8">
								<select class="custom-select" name="status" id="status">
									<option>Pilih Status</option>
									<option value="Admin">Admin</option>
									<option value="Manager">Manager</option>
								<?= form_error('status', '<small class="text-danger">', '</small>'); ?>
								</select>
							</div>
						</div>

						<div class="form-group row mt-3">
							<label for="password" class="col-sm-4 col-form-label">
								Password :
							</label>
							<div class="col-sm-8">
								<input type="password" name="password" id="password" class="form-control"
									placeholder="Password">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								<button type="submit" class="btn btn-primary btn-lg mt-4">
									<span class="icon text-white-50"><i class="fas fa-save"></i></span>
									<span class="text ml-4">Simpan</span>
								</button>
							</div>
						</div>
					</form>
				</div>
                <div class="col-md-6 mt-3">
                    <label>Keterangan :</label><br>
                    <p>Role 1 Untuk <b>Admin</b> dan 2 Untuk <b>Manager</b></p>
                </div>
			</div>
	</div>
</div>
