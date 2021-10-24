    <!-- Begin Page Content -->

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-lg-6">
    			<nav aria-label="breadcrumb">
    				<ol class="breadcrumb">
    					<li class="breadcrumb-item"><a href="<?= base_url('admin/beranda');?>">Beranda</a></li>
    					<li class="breadcrumb-item active" aria-current="page">Detail</li>
    				</ol>
    			</nav>
    		</div>
    		<div class="col-lg-6">
    			<div class="d-flex justify-content-end">
    				<!-- <?php if ($kredit['status'] !== 'Selesai') : ?>
    				<a href="<?= base_url('admin/kredit/ubah/'). $kredit['id_kredit'] ?>"
    					class="btn btn-success btn-icon-split mr-1">
    					<span class="icon text-white-50">
    						<i class="fas fa-fw fa-pencil-alt"></i>
    					</span>
    					<span class="text">Ubah</span>
    				</a>
    				<?php endif; ?> -->
    				<a href="<?= base_url('admin/kredit/cetakKreditById/').$kredit['id_kredit'];?>" target="_blank"
    					class="btn btn-secondary btn-icon-split">
    					<span class="icon text-white-50">
    						<i class="fas fa-fw fa-print"></i>
    					</span>
    					<span class="text">Cetak</span>
    				</a>
    			</div>
    		</div>
    	</div>

    	<!-- Form Ubah -->
    	<div class="card shadow mb-2 border-left-primary">
    		<div class="card-header">
    			<div class="col-lg-12">
    				<h3 class="text-center"><b>DATA KREDIT</b></h3>
    			</div>
    		</div>
    		<div class="card-body">
    			<div class="col-lg-12">
    				<div class="form-group row">
    					<div class="col-md-6 row">
    						<div class="col-sm-4">
    							<label><b>No Buku</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['no_buku']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Nama Anggota</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['nm_anggota']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Bunga</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['jenis_bunga']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Jumlah Pinjaman</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['besar_pinjaman']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Status</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['status']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Tanggal Pengajuan</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['tgl_pengajuan']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Tanggal Terima</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['tgl_terima']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Nilai Akhir</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['nilai_akhir']; ?> </label>
    						</div>
    					</div>
    					<div class="col-md-6 row">
    						<div class="col-sm-4">
    							<label><b>Pekerjaan</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['krit_pekerjaan']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Penghasilan</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= 'Rp.'.number_format($kredit	['jumlah_penghasilan'],2,',','.'); ?>
    							</label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Besar Pinjaman</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= 'Rp.'.number_format($kredit	['besar_pinjaman'],2,',','.'); ?>
    							</label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Tujuan</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['krit_tujuan']; ?> </label>
    						</div>
    						<div class="col-sm-4">
    							<label><b>Jaminan</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= $kredit['krit_barang_jaminan']; ?> </label>
    						</div>
    						<div class="col-sm-4 mb-2">
    							<label for=""><b>Foto jaminan </b></label>
    						</div>
    						<?php if(empty($kredit['foto_jaminan'])) : ?>
    						<div class="col-sm-8">
    							: Tidak Ada Jaminan
    						</div>
    						<?php else : ?>
    						<div class="col-sm-8">
    							: <a href="<?= base_url('assets/img/jaminan/').$kredit['foto_jaminan'];?>"
    								target="_blank">
    								<img src="<?= base_url('assets/img/jaminan/').$kredit['foto_jaminan'];?>"
    									alt="img-thumbnail" title="<?= $kredit['foto_jaminan'];?>" width="50"
    									height="50">
    							</a>
    						</div>
    						<?php endif; ?>
    						<div class="col-sm-4">
    							<label><b>Simpanan</b></label>
    						</div>
    						<div class="col-sm-8">
    							<label> : <?= 'Rp.'.number_format($kredit['jumlah_simpanan'],2,',','.'); ?>
    							</label>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- /.container-fluid -->
