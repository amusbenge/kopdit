<html>

<head>
	<title>Laporan</title>
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
		<h1>Data Kredit</h1>
	</div>
	<div style="text-align: left">Tanggal Cetak: <?= date('d F Y');?> </div><br>
	<table width="100%" style="font-family: serif; font-size: 12pt;" cellpadding="10">
		<tr>
			<td width="50%" style="border: 0.0mm solid #888888; text-align: left;">
				<h5>No.BA </h5> <label for="">: <?= $kredit['no_buku'];?></label>
				<h5>Nama</h5> <label for="">: <?= $kredit['nm_anggota'];?></label>
				<h5>Pekerjaan</h5> : <?= $kredit['krit_pekerjaan'];?>
				<h5>Penghasilan</h5> : <?= 'Rp.'. number_format($kredit['jumlah_penghasilan'],2,',','.') ?>
				<h5>Besar Pinjaman</h5> : <?= 'Rp.'.number_format($kredit['besar_pinjaman'],2,',','.') ?>
				<h5>Tujuan</h5> : <?= $kredit['krit_tujuan'];?>
				<h5>Simpanan</h5> : <?= 'Rp.'.number_format($kredit['jumlah_simpanan'],2,',','.') ?>
				<h5>Barang Jaminan</h5> : <?= $kredit['krit_barang_jaminan'];?>

			</td>
			<td width="50%" style="border: 0.0mm solid #888888; text-align: left;">
				<h5>Foto Jaminan</h5> : <img src="<?= base_url('assets/img/jaminan/').$kredit['foto_jaminan'];?>"
					width="50" height="50" alt="">
				<h5>Bunga</h5> : <?= $kredit['jenis_bunga'];?>
				<h5>Nilai Akhir</h5> : <?= $kredit['nilai_akhir'];?>
				<h5>Status</h5> : <?= $kredit['status'];?>
				<h5>Tanggal Pengajuan</h5> : <?= $kredit['tgl_pengajuan'];?>
			</td>
		</tr>
	</table>
</body>

</html>
