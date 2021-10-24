<!-- ======= Hero Section ======= -->
<section id="hero">
	<div class="hero-container" data-aos="fade-up">
		<h1>Kopdit Swastisari</h1>
		<h2><i>"Terdepan dan Terpercaya"</i></h2>
		<a href="#about" class="btn-get-started scrollto"><i class="las la-angle-double-down"></i></a>
	</div>
</section><!-- End Hero -->

<main id="main">

	<!-- ======= About Section ======= -->
	<section id="about" class="about">
		<div class="container" data-aos="fade-up">
			<div class="row justify-content-end">
				<div class="col-lg-11">
					<div class="row justify-content-end">
						<div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
							<div class="count-box py-5">
								<i class="icofont-users-social"></i>
								<span data-toggle="counter-up"><?= $jumlah; ?></span>
								<p>Total Anggota</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
							<div class="count-box py-5">
								<i class="icofont-credit-card"></i>
								<span data-toggle="counter-up"><?= $totalKredit; ?></span>
								<p>Total Kredit</p>
							</div>
						</div>
						<?php $rupiah = 'Rp. ' . number_format($totalPinjaman, 2, ',', '.') ?>
						<div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
							<div class="count-box pb-5 pt-0 pt-lg-5">
								<i class="icofont-money"></i>
								<span><?= $rupiah; ?></span>
								<p>Total Pinjaman</p>
							</div>
						</div>
						<?php $rupiah2 = 'Rp. ' . number_format($totalSimpanan, 2, ',', '.') ?>
						<div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
							<div class="count-box pb-5 pt-0 pt-lg-5">
								<i class="fas fa-fw fa-wallet"></i>
								<span><?= $rupiah2; ?></span>
								<p>Total Simpanan</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-6 video-box align-self-baseline">
					<img src="<?= base_url('assets/frontend/') ?>assets/img/kantor_kopdit.jpg" class="img-fluid" alt="">
					<a href="https://www.youtube.com/watch?v=GM89Ux2rfT4" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
				</div>

				<div class="col-lg-6 pt-3 pt-lg-0 content">
					<h3 class="text-center mb-2">Profil Kopdit Swastisari</h3>
					<p class="text-justify"><strong>KSP Kopdit Swasti Sari</strong> adalah salah satu lembaga
						keuangan non perbankan telah 32 tahun hadir dan memberikan pelayanan kepada masyarakat di
						Negara Kesatuan Republik Indonesia khususnya di Provinsi Nusa Tenggara Timur. Tepat tanggal
						1 Februari 1988 KSP Kopdit Swasti Sari berdiri. Pelayanan swasti sari berikan kepada anggota
						terbagi dalam dua macam yakni pelayanan finansial (keuangan) dan non finansial. </p>
					<p class="text-justify">
						Pelayanan dalam bentuk keuangan dengan tujuan agar merubah taraf atau derajat hidup masyarakat
						dari keuangan ekonomi rumah tangga yang pelik menjadi ekonomi rumah tangga anggota yang kuat dan
						mandiri. Dilain sisi Pelayanan non keuangan merupakan pelayanan pendidikan kepada anggota yang
						dilakukan secara rutin baik itu perminggu, per tri wulan dan setahun sakali. Selain pendidikan,
						anggota juga didampingi dalam mengelolah keuangannya agar terarah dan tepat sasaran.
					</p>
					<a href="<?= base_url('tentang/detailProfil') ?>"><i class="icofont-arrow-right"></i>
						Selengkapnya</a>
					</p>
				</div>

			</div>
		</div>
	</section><!-- End About Section -->

	<!-- ======= Features Section ======= -->
	<section id="features" class="features">
		<div class="container">

			<div class="section-title" data-aos="fade-up">
				<h2>Pelayanan</h2>
			</div>

			<div class="row">
				<div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
					<div class="card" style="background-image: url(<?= base_url() ?>assets/frontend/assets/img/work-process-1.png);">
						<div class="card-body">
							<h5 class="card-title"><a href="<?= base_url('pelayanan/syaratKredit'); ?>"><b>KREDIT</b></a>
							</h5>
							<p class="card-text text-justify">Merupakan suatu fasilitas keuangan yang memungkinkan
								anggota untuk
								meminjam uang untuk membeli produk dan membayarnya kembali dalam
								jangka waktu yang ditentukan </p>
							<div class="read-more"><a href="<?= base_url('pelayanan/syaratKredit') ?>"><i class="icofont-arrow-right"></i> Selengkapnya</a></div>
						</div>
					</div>
				</div>
				<div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up">
					<div class="card" style="background-image: url(<?= base_url() ?>assets/frontend/assets/img/work-process-4.png);">
						<div class="card-body">
							<h5 class="card-title"><a href="<?= base_url('pelayanan/infoSimpanan'); ?>"><b>SIMPANAN</b></a></h5>
							<p class="card-text text-justify">Merupakan yang dimiliki oleh anggota yang tidak dap-at
								ditarik
								sewaktu-waktu merupakan modal sendiri pada koperasi, yang nantinya akan mendapat (SHU)
								pada
								akhir tahun buku</p>
							<div class="read-more"><a href="<?= base_url('pelayanan/infoSimpanan') ?>"><i class="icofont-arrow-right"></i> Selengkapnya</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Features Section -->

	<!-- ======= Our Skills Section ======= -->
	<section id="skills" class="skills section-bg">
		<div class="container">

			<div class="section-title" data-aos="fade-up">
				<h2>Manfaat dan keuntungan</h2>
			</div>

			<div class="row">
				<div class="col-lg-6" data-aos="fade-right">
					<img src="<?= base_url('assets/frontend/assets/img/kantor_kopdit.jpg'); ?>" class="img-fluid" alt="">
				</div>
				<div class="col-lg-6 pt-2 pt-lg-0 content" data-aos="fade-left">
					<ol class="text-justify">
						<li>Mendapatkan bunga simpanan yang tinggi diatas harga pasar</li>
						<li>Simpanan saham dilingungi DAPERMA(Dana Perlindungan Bersama) jadi anggota tidak perlu takut
							kehilangan simpanannya</li>
						<li>Khusus simpanan saham dan pinjaman, akan diberi bunga simpanan dan balas jasa pinjaman di
							akhir
							tahun dalam bentuk SHU</li>
						<li>Pinjaman dilindungi DAPERMA(Dana Perlindungan Bersama), saldo pinjaman yang masih ada tidak
							di
							bebankan kepada ahli waris untuk meneruskan pembayaran apabila anggota yang bersangkutan
							mengalami musihah tetap (meninggal dunia) <br>
							sementara simpanan anggota akan dikembalikan dua kali lipat dari saldo simpanan kepada ahli
							waris, apabila anggota yang bersangkutan mengalami musibah tetap (meninggal dunia), yaitu
							100% <a href="<?= base_url('pelayanan/infoManfaat'); ?>">...Selengkapnya</a>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</section><!-- End Our Skills Section -->

	<!-- ======= Blog Section ======= -->
	<section id="blog" class="blog">
		<div class="container">
			<div class="section-title" data-aos="fade-up">
				<h2>Berita Terbaru</h2>
			</div>
			<div class="row">
				<?php foreach ($artikel as $a => $art) : ?>
					<?php if ($a < 3) : ?>
						<div class="col-lg-4 col-md-6" data-aos="fade-up">
							<article class="entry">
								<h2 class="entry-title">
									<a href="<?= base_url('artikel/detailArtikel/') . $art['id_artikel']; ?>"><?= $art['judul']; ?></a>
								</h2>
								<div class="entry-meta">
									<ul>
										<li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">Administrator</a></li>
										<li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time><?= date('d F Y', strtotime($art['tanggal_buat'])); ?></time></a>
										</li>
									</ul>
								</div>
								<div class="entry-content">
									<p class="text-justify">
										<?= implode(' ', array_slice(explode(' ', $art['isi']), 0, 15)) . "\n"; ?>...
									</p>
								</div>
							</article><!-- End blog entry -->
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>

		</div>
	</section><!-- End Blog Section -->

</main><!-- End #main -->