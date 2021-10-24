<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/artikel');?>">Artikel</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah</li>
		</ol>
	</nav>

	<div class="card shadow mb-4 col-lg-12">
		<div class="card-header">
			<h2 class="h2 mb-1 mt-3 font-weight-bold text-gray-800 text-center"><?= $title ?></h2>
		</div>
		<p class="mb-1">
			<div class="card-body">
				<div class="col-lg-12">
					<?= form_open_multipart('admin/artikel/tambahArtikel'); ?>
					<div class="form-group row">
						<div class="col-md-4">
							<div class="col-sm-12">
								<b>Judul :</b>
								<input type="text" name="judul" id="judul" class="form-control">
								<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="col-sm-12 mt-2">
								<b>Foto :</b>
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="foto" id="foto">
									<label class="custom-file-label" for="image">Pilih File</label>
								</div>
								<?= form_error('foto', '<small class="text-danger">', '</small>'); ?><br>
								<button type="submit" class="btn btn-primary mt-2">Simpan</button>
							</div>
						</div>
						<div class="col-md-8">
							<div class="col-sm-12">
								<b>Deskripsi :</b>
								<textarea type="text" name="isi" id="ckeditor" class="form-control ckeditor"></textarea>
								<?= form_error('isi', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
	</div>
</div>
