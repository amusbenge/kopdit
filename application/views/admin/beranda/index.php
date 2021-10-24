<div class="container-fluid">

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anggota
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah;?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kredit
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKredit;?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-credit-card fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pinjaman
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp. '. number_format($totalPinjaman,2,',','.');?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Simpanan
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= 'Rp. '. number_format($totalSimpanan,2,',','.');?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-wallet fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header bg-info py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-light">TENTANG KOPDIT SWASTISARI</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<P align="justify">KSP Kopdit Swasti Sari adalah salah satu lembaga keuangan non perbankan telah 32
						tahun hadir
						dan memberikan pelayanan kepada masyarakat di Negara Kesatuan Republik Indonesia khususnya
						di Provinsi Nusa Tenggara Timur. Tepat tanggal 1 Februari 1988 KSP Kopdit Swasti Sari
						berdiri. Pelayanan swasti sari berikan kepada anggota terbagi dalam dua macam yakni
						pelayanan finansial (keuangan) dan non finansial. <br><br>

						Pelayanan dalam bentuk keuangan dengan tujuan agar merubah taraf atau derajat hidup
						masyarakat dari keuangan ekonomi rumah tangga yang pelik menjadi ekonomi rumah tangga
						anggota yang kuat dan mandiri. Dilain sisi Pelayanan non keuangan merupakan pelayanan
						pendidikan kepada anggota yang dilakukan secara rutin baik itu perminggu, per tri wulan dan
						setahun sakali. Selain pendidikan, anggota juga didampingi dalam mengelolah keuangannya agar
						terarah dan tepat sasaran. <br><br>

						Pelayanan non keuangan semata - mata agar pola pikir masyarakat berubah dari konsumtif ke
						produktif. KSP Kopdit Swasti Sari menyadari bahwa perubahan pola pikir atau cara pandang,
						maka akan, tindakan, tercermin dalam perubahan kebiasaan, kebiasaan yang baik akan membentuk
                        karakter yang baik maka pada akhirnya nasib anggotapun berubah ke arah yang lebih baik. 
                        <a href="" data-toggle="modal" data-target="#aboutModal"> Selengkapnya</a>
				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<div class="col-lg-6">
			<!-- Illustrations -->
			<div class="card shadow mb-4">
				<div class="card-header bg-success py-3">
					<h6 class="m-0 font-weight-bold text-light">VISI DAN MISI</h6>
				</div>
				<div class="card-body">
					<div align="justify">
						<ul>
							<li><i class="icofont-check"></i> <Strong>Visi</Strong> Menjadi Koperasi Kredit Terdepan dan
								Pilihan Masyarakat
								Indonesia</li>
						</ul>
						<ul>
							<li><i class="icofont-check"></i><strong>Misi</strong> Menyediakan Pelayanan Keuangan secara
								profesional dan
								berkelanjuan untuk meningkatkan Kesejahteraan Anggota</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- Approach -->
			<div class="card shadow mb-4">
				<div class="card-header py-3 bg-warning">
					<h6 class="m-0 font-weight-bold text-light">NILAI-NILAI INTI</h6>
				</div>
				<div class="card-body">
					<ul class="text-dark">
						<li><i class="icofont-check"></i><strong>S - Service - </strong>KepuasanMU Kebanggaan Kami
						</li>
						<li><i class="icofont-check"></i><strong>E - Evolve - </strong>SuksesMu Kebahagiaan Kami
						</li>
						<li><i class="icofont-check"></i><strong>J - Justice - </strong>Berdiri Sama Tinggi, Duduk
							Sama Rendah</li>
						<li><i class="icofont-check"></i><strong>A - Advance - </strong>Terdepan Dalam Kualitas dan
							Kecepatan</li>
						<li><i class="icofont-check"></i><strong>H - Honesty - </strong>Melakukan apa yang di
							katakan, dan apa yang di lakukan</li>
						<li><i class="icofont-check"></i><strong>T - Togetherness - </strong>Berat sama dipikul,
							ringan sama di jinjing</li>
						<li><i class="icofont-check"></i><strong>E - Earmark - </strong>7S "Senyum, Salam, Sapa,
							Sopan, Santun, Segera, Sukses"</li>
						<li><i class="icofont-check"></i><strong>R - Respect - </strong>Saling menghormati sesama
						</li>
						<li><i class="icofont-check"></i><strong>A - Accountable - </strong>Berani Bertanggung Jawab
							Atas Ucapan Dan Tindakan</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
