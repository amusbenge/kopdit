<html>

<head>
	<title>Laporan Anggota</title>
	<style>
		body {
			font-family: sans-serif;
			font-size: 10pt;
		}

		p {
			margin: 0pt;
		}

		table.items {
			border: 0.1mm solid #000000;
		}

		td {
			vertical-align: top;
		}

		tr:nth-child(even) {
			background-color: #ddd;
		}

		.items td {
			border-left: 0.1mm solid #000000;
			border-right: 0.1mm solid #000000;
		}

		table thead td {
			background-color: #4F8DF5;
			text-align: center;
			border: 0.1mm solid #000000;
			font-variant: small-caps;
		}

	</style>
</head>

<body>
	<table width="100%" style="font-family: serif;" cellpadding="10">
		<tr>
			<td width="10%" style="border: 0mm solid #888888; ">
				<img src="https://pbs.twimg.com/media/DGRfobjUIAEjtPx.jpg" width="100" height="100" alt="">
			</td>
			<td width="90%" style="border: 0mm solid #888888; text-align: right;">
				<h2>KSP. KOPDIT SWASTISARI CABANG KUPANG KOTA</h2>
				<h3>Badan Hukum Nomor 605/BH/XIV/1990</h3>
				<h3>Jl. Perintis Kemerdekaan Walikota Kupang</h3><br>
				<h4>Email : kspswastisari@gmail.com No.HP : 082145595764</h4>
			</td>
		</tr>
	</table>
	<hr>
	<div class="" style="text-align: center;">
		<h1>Data Anggota</h1>
	</div>
	<div style="text-align: left">Tanggal Cetak: <?= date('d F Y');?> </div><br>
	<table width="100%" style="font-family: serif;" cellpadding="10">
		<tr>
			<td width="10%" style="border: 0mm solid #888888; ">
				<img src="<?= base_url('assets/img/profile/') . $anggota['foto']; ?>" width="100" height="100" alt=""
					class="img-thumbnail rounded">
			</td>
			<td width="45%" style="border: 0mm solid #888888; text-align: left;">
				<h5>No.BA </h5>: <?= $anggota['no_buku'];?></label>
				<h5>Nama </h5><label for="">: <?= $anggota['nm_anggota'];?></label>
				<h5>NIK </h5><label for="">: <?= $anggota['nik'];?></label>
				<h5>Tempat Lahir </h5><label for="">: <?= $anggota['tmpt_lahir'];?></label>
				<h5>Tanggal Lahir </h5><label for="">:
					<?= date_format(date_create($anggota['tgl_lhr']), 'd F Y') ?></label>
				<h5>Agama </h5><label for="">: <?= $anggota['agama'];?></label>
				<h5>No HP </h5><label for="">: <?= $anggota['no_hp'];?></label>
				<h5>Email </h5><label for="">: <?= $anggota['email'];?></label>
				<h5>Jenis Kelamain </h5><label for="">: <?= $anggota['jns_kelamin'];?></label>
			</td>
			<td width="45%" style="border: 0mm solid #888888; text-align: left;">
				<h5>Alamat </h5><label for="">: <?= $anggota['alamat'];?></label>
				<h5>RT/RW </h5><label for="">: <?= $anggota['rt'];?> / <?= $anggota['rw'];?></label>
				<h5>Kelurahan/Desa </h5><label for="">: <?= $anggota['kel_des'];?></label>
				<h5>Kecamatan </h5><label for="">: <?= $anggota['kec'];?></label>
				<h5>Kota </h5><label for="">: <?= $anggota['kota_kab'];?></label>
				<h5>Provinsi </h5><label for="">: <?= $anggota['prov'];?></label>
				<h5>Kode Pos </h5><label for="">: <?= $anggota['kode_pos'];?></label>
				<h5>Pendidikan Terakhir </h5><label for="">: <?= $anggota['pendidikan_terakhir'];?></label>
				<h5>Pekerjaan : </h5><label for=""><?= $anggota['pekerjaan'];?></label>
			</td>
		</tr>
	</table>
	<div style="text-align: center;">
		<h5>Tanggal Menjadi Anggota <?= date_format(date_create($anggota['tgl_masuk']), 'd F Y') ?></h5>
	</div>
</body>

</html>
