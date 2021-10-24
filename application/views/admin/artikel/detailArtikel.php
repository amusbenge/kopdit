<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('admin/artikel');?>">Artikel</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail</li>
				</ol>
			</nav>
		</div>
	</div>

	<div class="col-lg-12 row">
		<div class="col-lg-4 col-md-4 mb-2">
			<img src="<?= base_url('assets/img/artikel/').$artikel['foto']?>" class="card-img-top img-thumbnail rounded"
				alt="ATM Kopdit">
		</div>
		<div class="card col-lg-8 col-md-8">
			<div class="card-header text-center">
				<h5><b><?= $artikel['judul'];?></b></h5>
			</div>
			<p class="card-text text-justify"><?= $artikel['isi'];?></p>
		</div>
	</div>
</div>
