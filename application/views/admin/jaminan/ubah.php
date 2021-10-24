    <!-- Begin Page Content -->
    <div class="container-fluid">

    	<nav aria-label="breadcrumb">
    		<ol class="breadcrumb">
    			<li class="breadcrumb-item"><a href="<?= base_url('admin/jaminan');?>">Jaminan</a></li>
    			<li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
    		</ol>
    	</nav>

    	<!-- Form Ubah -->
    	<div class="card shadow mb-4 col-20">
    		<p class="mb-1">
    			<div class="card-body">
    				<div class="col-md-12">
    					<form action="<?= base_url('admin/jaminan/ubah/') . $jaminan['id_jaminan'];?>" method="POST">
    						<div class="form-group row mt-3">
    							<label for="no_anggota" class="col-sm-2 col-form-label">
    								No Anggota 
    							</label>
    							<div class="col-sm-5">
    								<input type="text" name="no_anggota" id="no_anggota" class="form-control"
    									value="<?= $jaminan['no_anggota']; ?>" readonly>
    							</div>
    						</div>
    						<div class="form-group row mt-3 ">
    							<label for="nm_anggota" class="col-sm-2 col-form-label">
    								Nama Anggota
    							</label>
    							<div class="col-sm-5 ">
    								<input type="text" name="nm_anggota" id="nm_anggota" class="form-control"
    									value="<?= $jaminan['nm_anggota']; ?>" readonly>
    							</div>
    						</div>
    						<div class="form-group row mt-3 ">
    							<label for="brg_jaminan" class="col-sm-2 col-form-label">
    								Barang Jaminan
    							</label>
    							<div class="col-sm-5">
    								<input type="text" name="brg_jaminan" id="brg_jaminan" class="form-control"
    									value="<?= $jaminan['brg_jaminan']; ?>">
    							</div>
    						</div>
    						<div class="form-group row mt-3 ">
    							<label for="tgl_terima" class="col-sm-2 col-form-label">
    								Tanggal Terima
    							</label>
    							<div class="col-sm-5 ">
    								<input type="date" name="tgl_terima" id="tgl_terima" class="form-control"
    									value="<?= $jaminan['tgl_terima']; ?>">
    							</div>
    						</div>
    						<div class="form-group row mt-3 ">
    							<label for="tgl_ambil" class="col-sm-2 col-form-label">
    								Tanggal Ambil
    							</label>
    							<div class="col-sm-5 ">
    								<input type="date" name="tgl_ambil" id="tgl_ambil" class="form-control"
    									value="<?= $jaminan['tgl_ambil']; ?>">
    							</div>
    						</div>
    						<div class="form-group row mt-3 ">
    							<label for="status" class="col-sm-2 col-form-label">
    								Status
    							</label>
    							<div class="col-sm-5 ">
    								<select class="custom-select" name="status">
    									<option value="Belum lunas"
    										<?= $jaminan['status'] == 'Belum lunas' ? 'Selected' : '' ?>>Belum lunas
    									</option>
    									<option value="Lunas" <?= $jaminan['status'] == 'Lunas' ? 'Selected' : '' ?>>
    										Lunas</option>
    								</select>
    							</div>
    						</div>
    						<div class="form-group row mt-3 ">
    							<label for="no_brangkas" class="col-sm-2 col-form-label">
    								No Brangkas
    							</label>
    							<div class="col-sm-5 ">
    								<input type="text" name="no_brangkas" id="no_brangkas" class="form-control"
    									value="<?= $jaminan['no_brangkas']; ?>">
    							</div>
    						</div>
    						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
    					</form>
    				</div>
    			</div>
    	</div>
    	<!-- /.container-fluid -->
