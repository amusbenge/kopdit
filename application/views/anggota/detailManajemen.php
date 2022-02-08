<main id="main">
	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="breadcrumb-hero">
			<div class="container">
				<div class="breadcrumb-hero">
					<h2><b><?= $title; ?></b></h2>
				</div>
			</div>
		</div>
		<div class="container">
			<ol>
				<li><a href="<?= base_url('anggota/beranda')?>"><i class="fas fa-fw fa-home"></i> Beranda</a></li>
				<li>Manajemen</li>
			</ol>
		</div>
	</section><!-- End Breadcrumbs -->

	<section id="team" class="team">
		<div class="container">
			<div class="row mt-5">
				<?php foreach ($manajemen as $manaj): ?>
				<div class="col-lg-2 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up">
						<div class="member-img">
							<img src="<?= base_url('assets/frontend/assets/img/team/') . $manaj['foto'];?>"
								class="img-fluid" alt="">
							<div class="social">
								<a href="#"><i class="icofont-twitter"></i></a>
								<a href="#"><i class="icofont-facebook"></i></a>
								<a href="#"><i class="icofont-instagram"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4><?= $manaj['nama']; ?></h4>
							<span><?= $manaj['jabatan']; ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section><!-- End Our Clients Section -->
</main>
