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
				<li><a href="<?= base_url('beranda')?>"><i class="fas fa-fw fa-home"></i> Beranda</a></li>
				<li><a href="<?= base_url('kontak')?>"></a> Kontak</li>
			</ol>
		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container">

			<div>
				<iframe style="border:0; width: 100%; height: 270px;"
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d981.8367314891464!2d123.62051138427822!3d-10.152429326088065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56833458da4751%3A0x798e9aa8d3b924c2!2sKopdit%20Swastisari!5e0!3m2!1sid!2sid!4v1596032705519!5m2!1sid!2sid"
					frameborder="0" allowfullscreen></iframe>
			</div>

			<div class="row mt-5">

				<div class="col-lg-4" data-aos="fade-right">
					<div class="info">
						<div class="address">
							<i class="icofont-google-map"></i>
							<h4>Lokasi:</h4>
							<p>Jl. Perintis Kemerdekaan, Klp. Lima, Kota Kupang, Nusa Tenggara Tim. 85228</p>
						</div>

						<div class="email">
							<i class="icofont-envelope"></i>
							<h4>Email:</h4>
							<p>kopdit_swastisari@yahoo.com</p>
						</div>

						<div id="rek" class="phone">
							<i class="icofont-phone"></i>
							<h4>Telepon:</h4>
							<p>(0380) 829790</p>
						</div>

						<div class="phone">
							<i class="icofont-phone"></i>
							<h4>No Rekening :</h4>
							<p>BRI <br> 0039-01-087196-20-1</p>
						</div>
					</div>
				</div>

				<div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
					<?= $this->session->flashdata('message'); ?>
					<form action="<?= base_url('kontak/kirimEmail');?>" method="post">
						<div class="form-row">
							<?php if(empty($anggota['anggota'])) : ?>
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Nama" />
							</div>
							<div class="col-md-6 form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" />
							</div>
							<?php else : ?>
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name"
									value="<?= $anggota['anggota']['nm_anggota'];?>" readonly />
							</div>
							<div class="col-md-6 form-group">
								<input type="email" class="form-control" name="email" id="email"
									value="<?= $anggota['anggota']['email'];?>" readonly />
							</div>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" />
							<?= form_error('subject', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" rows="5" placeholder="Pesan"></textarea>
							<?= form_error('message', '<small class="text-danger">', '</small>'); ?>
						</div>
						<button type="submit" class="btn btn-primary btn-md mt-2">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</section><!-- End Contact Section -->
</main><!-- End #main -->
