    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
    	<div class="container d-flex">

    		<div class="icon mr-2 mt-1">
    			<img src="<?= base_url('assets/img/icon/android-icon-36x36.png') ?>" alt="">
    		</div>
    		<div class="logo mr-auto">
    			<h1 class="text-gray-100">SWASTISARI</h1>
    			<p class="text-gray-100 mb-2">
    				<?php
					$t = mktime(date("m"), date("d"), date("Y"));
					echo "Tanggal : <b>" . date("d M Y", $t) . "</b> ";
					date_default_timezone_set('Asia/Jakarta');
					$jam = date("H:i:s");
					echo "| Jam : <b>" . $jam . " " . "</b>";
					?>
    			</p>
    		</div>

    		<nav class="nav-menu d-none d-lg-block">
    			<ul>
    				<li class="active"><a href="<?= base_url('anggota/beranda') ?>">Beranda</a></li>
    				<li class="drop-down"><a href="<?= base_url('tentang') ?>">Tentang</a>
    					<ul>
    						<li><a href="<?= base_url('tentang/') ?>#sejarah">Sejarah</a></li>
    						<li><a href="<?= base_url('tentang/') ?>#sejarah">Visi dan Misi</a></li>
    						<li><a href="<?= base_url('tentang/') ?>#sejarah">Profil</a></li>
    						<li><a href="<?= base_url('tentang/') ?>#nilai">Nilai-nilai Inti</a></li>
    						<li><a href="<?= base_url('tentang/') ?>#struktur">Struktur organisasi</a></li>
    						<li><a href="<?= base_url('tentang/detailManajemen') ?>">Pengelola</a></li>
    					</ul>
    				</li>
    				<?php if (isset($anggota['anggota'])) : ?>
    					<li><a href="<?= base_url('pelayanan/') ?>">Pelayanan</a></li>
    				<?php endif; ?>
    				<li><a href="<?= base_url('anggota/artikel') ?>">Berita</a></li>
    				<li><a href="<?= base_url('anggota/kontak') ?>">Kontak</a></li>
    				<?php if (empty($anggota['anggota'])) : ?>
    					<li class="get-started"><a href="<?= base_url('auth') ?>">Login</a></li>
    					<li class="get-started-outline"><a href="<?= base_url('auth/register') ?>">Daftar</a></li>
    				<?php else : ?>
    					<li class="drop-down">
    						<img class="img-profile img-profile-user rounded-box mt-1" style="width:2rem;height:2rem;" src="<?= base_url('assets/img/profile/user.png') ?>" alt="img-responsive">
    						</a>
    						<ul>
    							<li class="dropdown-item">
    								<a href="<?= base_url('anggota'); ?>"><i class="fas fa-user fa-fw fa-sm mr-2 text-gray-400"></i>
    									Profil
    								</a>
    							</li>
    							<hr>
    							<li class="dropdown-item">
    								<a href="<?= base_url('anggota/ubahPassword'); ?>"><i class="fas fa-key fa-fw fa-sm mr-2 text-gray-400"></i>
    									Ubah Password
    								</a>
    							</li>
    							<hr>
    							<li class="dropdown-item">
    								<a href="<?= base_url('auth/logout') ?>">
    									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    									Keluar
    								</a>
    							</li>
    						</ul>
    					</li>
    				<?php endif; ?>
    				</li>
    			</ul>
    		</nav><!-- .nav-menu -->
    	</div>
    </header><!-- End Header -->