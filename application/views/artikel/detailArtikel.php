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
				<li><a href="<?= base_url('artikel')?>"></i> Artikel</a></li>
				<li><a href="#"></a> Artikel</li>
			</ol>
		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Blog Section ======= -->
	<section id="blog" class="blog">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 entries">

					<article class="entry entry-single">

						<div class="entry-img">
							<img src="<?= base_url('assets/img/artikel/').$artikel['foto'];?>" alt="" class="img-fluid">
						</div>

						<h2 class="entry-title">
							<a href="#"><?= $artikel['judul'];?></a>
						</h2>

						<div class="entry-meta">
							<ul>
								<li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">Admin</a>
								</li>
								<li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
										href="#"><time
											datetime="<?= $artikel['tanggal_buat'];?>"><?= $artikel['tanggal_buat'];?></time></a>
								</li>
							</ul>
						</div>

						<div class="entry-content">
							<p>
								<?= $artikel['isi'];?>
							</p>
						</div>

						<div class="entry-footer clearfix">
							<div class="float-left">
								<i class="icofont-folder"></i>
								<ul class="cats">
									<li><a href="#">Bisnis</a></li>
								</ul>

								<i class="icofont-tags"></i>
								<ul class="tags">
									<li><a href="#">Kreatif</a></li>
									<li><a href="#">Tips</a></li>
									<li><a href="#">Penjualan</a></li>
								</ul>
							</div>

							<div class="float-right share">
								<a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
								<a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
								<a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
							</div>

						</div>

					</article><!-- End blog entry -->


				</div><!-- End blog entries list -->

				<div class="col-lg-4">

					<div class="sidebar">

						<h3 class="sidebar-title">Postingan Terbaru</h3>
						<?php foreach($postingan as $p => $art) :?>
						<?php if($p <= 4 ) : ?>
						<div class="sidebar-item recent-posts">
							<div class="post-item clearfix">
								<img src="<?= base_url('assets/img/artikel/').$art['foto'];?>" alt="">
								<h4><a
										href="<?= base_url('artikel/detailArtikel/'). $art['id_artikel'];?>"><?= $art['judul'];?></a>
								</h4>
								<time><?= date('d F Y', strtotime($art['tanggal_buat']));?></time>
							</div>
						</div><!-- End sidebar recent posts-->
						<?php endif; ?>
						<?php endforeach; ?>
					</div><!-- End sidebar -->

				</div><!-- End blog sidebar -->

			</div>

		</div>
	</section><!-- End Blog Section -->

</main><!-- End #main -->
