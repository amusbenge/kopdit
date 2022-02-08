    <!-- Begin Page Content -->

    <div class="container-fluid">
    	<nav aria-label="breadcrumb">
    		<ol class="breadcrumb">
    			<li class="breadcrumb-item"><a href="<?= base_url('admin/anggota'); ?>">Anggota</a></li>
    			<li class="breadcrumb-item active" aria-current="page">Ubah</li>
    		</ol>
    	</nav>

    	<!-- Form Ubah -->
    	<div class="card shadow mb-2 col-lg-12">
    		<div class="card-body">
    			<form class="row" action="<?= base_url('admin/anggota/ubah/') . $anggota['id_anggota']; ?>" method="POST">
    				<div class="col-md-6">
    					<div class="form-group row mt-3">
    						<label for="no_buku" class="col-sm-3 col-form-label">
    							No Anggota
    						</label>
    						<div class="col-sm-9">
    							<input type="text" name="no_buku" id="no_buku" class="form-control" value="<?= $anggota['no_buku']; ?>" readonly>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="nm_anggota" class="col-sm-3 col-form-label">
    							Nama Lengkap
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="nm_anggota" id="nm_anggota" class="form-control" value="<?= $anggota['nm_anggota']; ?>">
    							<?= form_error('nm_anggota', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="nik" class="col-sm-3 col-form-label">
    							NIK
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="nik" id="nik" class="form-control" value="<?= $anggota['nik']; ?>">
    							<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="tmpt_lahir" class="col-sm-3 col-form-label">
    							Tempat Lahir
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="tmpt_lahir" id="tmpt_lahir" class="form-control" value="<?= $anggota['tmpt_lahir']; ?>">
    							<?= form_error('tmpt_lahir', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="tgl_lhr" class="col-sm-3 col-form-label">
    							Tanggal Lahir
    						</label>
    						<div class="col-sm-9 ">
    							<input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control" value="<?= $anggota['tgl_lhr']; ?>">
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="agama" class="col-sm-3 col-form-label">
    							Agama
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="agama" id="agama" class="form-control" value="<?= $anggota['agama']; ?>">
    							<?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="no_hp" class="col-sm-3 col-form-label">
    							No. Handphone
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= $anggota['no_hp']; ?>">
    							<?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="email" class="col-sm-3 col-form-label">
    							Email
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="email" id="email" class="form-control" value="<?= $anggota['email']; ?>" readonly>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="jk" class="col-sm-3 col-form-label">
    							Jenis Kelamin
    						</label>
    						<div class="col-sm-9 ">
    							<select class="custom-select" name="jns_kelamin">
    								<option value="Lelaki" <?= $anggota['jns_kelamin'] == 'Lelaki' ? 'Selected' : '' ?>>
    									Laki-laki
    								</option>
    								<option value="Perempuan" <?= $anggota['jns_kelamin'] == 'Perempuan' ? 'Selected' : '' ?>>Perempuan
    								</option>
    							</select>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="alamat" class="col-sm-3 col-form-label">
    							Alamat
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="alamat" id="alamat" class="form-control" value="<?= $anggota['alamat']; ?>">
    							<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="rt" class="col-sm-3 col-form-label">
    							RT/RW
    						</label>
    						<div class="col-sm-3 ">
    							<input type="text" name="rt" id="rt" class="form-control" value="<?= $anggota['rt']; ?>">
    							<?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
    						</div>
    						<label for="rw" class="col-sm-0 col-form-label">
    							/
    						</label>
    						<div class="col-sm-3 ">
    							<input type="text" name="rw" id="rw" class="form-control" value="<?= $anggota['rw']; ?>">
    							<?= form_error('rw', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-6">
    					<div class="form-group row mt-3 ">
    						<label for="kel_des" class="col-sm-3 col-form-label">
    							Kelurahan/Desa
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="kel_des" id="kel_des" class="form-control" value="<?= $anggota['kel_des']; ?>">
    							<?= form_error('kel_des', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="kec" class="col-sm-3 col-form-label">
    							Kecamatan
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="kec" id="kec" class="form-control" value="<?= $anggota['kec']; ?>">
    							<?= form_error('kec', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="kota_kab" class="col-sm-3 col-form-label">
    							Kota/Kabupaten
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="kota_kab" id="kota_kab" class="form-control" value="<?= $anggota['kota_kab']; ?>">
    							<?= form_error('kota_kab', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3">
    						<label for="prov" class="col-sm-3 col-form-label">
    							Provinsi
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="prov" id="prov" class="form-control" value="<?= $anggota['prov']; ?>">
    							<?= form_error('prov', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="kode_pos" class="col-sm-3 col-form-label">
    							Kode Pos
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="kode_pos" id="kode_pos" class="form-control" value="<?= $anggota['kode_pos']; ?>">
    							<?= form_error('kode_pos', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="pendidikan_terakhir" class="col-sm-3 col-form-label">
    							Pendidikan Terakhir
    						</label>
    						<div class="col-sm-9">
    							<select class="custom-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
    								<option selected>Pendidikan Terakhir Anda</option>
    								<option value="Sarjana" <?= $anggota['pendidikan_terakhir'] == 'Sarjana' ? 'Selected' : '' ?>>
    									Sarjana</option>
    								<option value="SMA/SMK" <?= $anggota['pendidikan_terakhir'] == 'SMA/SMK' ? 'Selected' : '' ?>>
    									SMA/SMK</option>
    								<option value="SMP" <?= $anggota['pendidikan_terakhir'] == 'SMP' ? 'Selected' : '' ?>>SMP
    								</option>
    								<option value="SD" <?= $anggota['pendidikan_terakhir'] == 'SD' ? 'Selected' : '' ?>>
    									SD</option>
    								<option value="Tidak bersekolah" <?= $anggota['pendidikan_terakhir'] == 'Tidak bersekolah' ? 'Selected' : '' ?>>
    									Tidak bersekolah</option>
    							</select>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="pekerjaan" class="col-sm-3 col-form-label">
    							Pekerjaan
    						</label>
    						<div class="col-sm-9">
    							<select class="custom-select" name="pekerjaan" id="pekerjaan">
    								<option value="">Pilih Pekerjaan Anda : </option>
    								<?php foreach ($pekerjaan as $pek) : ?>
    									<option value="<?= $pek['nm_sub_kriteria'] ?>" <?= $pek['nm_sub_kriteria'] == $anggota['pekerjaan'] ? 'Selected' : '' ?>>
    										<?= $pek['nm_sub_kriteria'] ?></option>
    								<?php endforeach; ?>
    							</select>
    							<?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="tgl_masuk" class="col-sm-3 col-form-label">
    							Tanggal Masuk
    						</label>
    						<div class="col-sm-9 ">
    							<input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" value="<?= $anggota['tgl_masuk']; ?>" readonly>
    						</div>
    					</div>
    					<div class="form-group row mt-3 ">
    						<label for="aktif" class="col-sm-3 col-form-label">
    							Aktif
    						</label>
    						<div class="col-sm-9 ">
    							<input type="text" name="aktif" id="aktif" class="form-control" value="<?= $anggota['aktif']; ?>">
    							<?= form_error('aktif', '<small class="text-danger">', '</small>'); ?>
    							<button type="submit" class="btn btn-primary btn-lg mt-3">Simpan</button>
    						</div>
    					</div>
    				</div>
    			</form>
    		</div>
    	</div>
    	<!-- /.container-fluid -->