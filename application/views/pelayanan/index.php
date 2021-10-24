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
				<li><a href="<?= base_url('beranda') ?>"><i class="fas fa-fw fa-home"></i> Beranda</a></li>
				<li>Pelayanan</li>
			</ol>
		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Services Section ======= -->
	<section id="services" class="services ">
		<div class="container">

			<div class="col-md-6">
				<div data-aos="fade-up">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="icon-box" data-aos="fade-up">
						<div class="icon"><i class="las la-credit-card" style="color: #219ADB;"></i></div>
						<!-- jika umur diatas 17 tahun -->
						<?php if ($cekUmur <= 17) : ?>
							<h4 class="title"><a href="#" onclick="swal('Peringatan', 'Maaf! Umur Anda Dibawah 17 Tahun dan tidak bisa mengajukan Kredit', 'warning')">Kredit</a>
							</h4>
						<?php else : ?>
							<!-- cek Bulan masuk Anggota -->
							<?php if ($cekBulanMasuk <= 3) : ?>
								<h4 class="title"><a href="#" onclick="swal('Peringatan', 'Maaf! Anda harus menjadi Anggota lebih dari 3 Bulan sejak pertama mendaftar', 'warning')">Kredit</a>
								</h4>
							<?php else : ?>
								<!-- jika sudah ada pinjaman -->

								<?php if ($cekKredit) : ?>
									<h4 class="title"><a href="#" onclick="swal('Peringatan', 'Jika anda tidak beralih ke halaman kredit mungkin anda masih mempunyai kredit yang belum selesai!', 'warning')">Kredit</a>
									</h4>
									<!-- jika belum ada pinjaman -->
								<?php else : ?>
									<h4 class="title"><a href="<?= base_url('pelayanan/kredit/') . $anggota['anggota']['id_anggota']; ?> ">Kredit</a>
									</h4>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>

						<p class="description">Merupakan suatu fasilitas keuangan yang memungkinkan anggota untuk
							meminjam uang dengan jangka waktu pembayaran
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-box" data-aos="fade-up">
						<div class="icon"><i class="las la-coins" style="color: #219ADB;"></i></div>
						<h4 class="title"><a href="<?= base_url('pelayanan/simpanan/') . $anggota['anggota']['id_anggota']; ?> ">Simpanan</a>
						</h4>
						<p class="description">Merupakan yang dimiliki oleh anggota yang tidak dap-at ditarik
							sewaktu-waktu merupakan modal sendiri pada koperasi, yang nantinya akan mendapat (SHU) pada
							akhir tahun buku <br>
					</div>
				</div>
				<!-- Cek Angsuran kalau ada -->
				<?php if ($cekAngsuran) : ?>
					<div class="col-md-12 d-flex justify-content-center">
						<div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
							<div class="icon-box">
								<div class="icon"><i class="fas fa-fw fa-hand-holding-usd" style="color: #219ADB;"></i>
								</div>
								<h4 class="title"><a href="<?= base_url('pelayanan/angsuran/') . $kredit['id_kredit'] ?>">Angsuran</a>
								</h4>
								<p class="description">Uang tunai sebagai pembayaran
									angsuran yang besarnya telah ditentukan tergantung pada lamanya jangka waktu angsuran
								</p>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<!-- <?php var_dump($cekAngsuran) ?> -->
		</div>
	</section><!-- End Services Section -->

</main><!-- End #main -->