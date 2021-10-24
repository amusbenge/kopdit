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

		tr:nth-child(even){
			background-color:#ddd;
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
			<td width="90%" style="border: 0mm solid #888888; text-align: right; ">
				<h2>KSP. KOPDIT SWASTISARI CABANG KUPANG KOTA</h2>
				<h3>Badan Hukum Nomor 605/BH/XIV/1990</h3>
				<h3>Jl. Perintis Kemerdekaan Walikota Kupang</h3><br>
				<h4>Email : kspswastisari@gmail.com No.HP : 082145595764</h4>
			</td>
		</tr>
	</table>
	<hr>
	<div class="" style="text-align: center; font-family: serif;">
	<h1>Laporan Anggota</h1>
	</div>
	<div style="text-align: left; font-family: serif;">Tanggal Cetak: <?= date('d F Y');?> </div><br>
	<table class="items" width="100%" style="font-size: 9pt; font-family: serif; border-collapse: collapse; " cellpadding="8">
		<thead>
			<tr>
				<td width="10%">No</td>
				<td width="10%">BA</td>
				<td width="25%">Nama</td>
				<td width="10%">Tempat Lahir</td>
				<td width="10%">Tanggal Lahir</td>
				<td width="8%">Agama</td>
				<td width="10%">No HP</td>
				<td width="15%">Email</td>
				<td width="10%">Jenis Kelamin</td>
				<td width="10%">Alamat</td>
				<td width="5%">RT</td>
				<td width="5%">RW</td>
				<td width="10%">Kel.</td>
				<td width="10%">Kec.</td>
				<td width="10%">Kota</td>
				<td width="10%">Prov.</td>
				<td width="10%">Pekerjaan</td>
				<td width="10%">Tanggal Masuk</td>
				<td width="10%">Status</td>
			</tr>
		</thead>
		<tbody>
			<!-- ITEMS HERE -->
			<?php $i = 1; ?>
			<?php foreach ($anggota as $agt) : ?>
			<tr>
				<th scope="row"><?= $i; ?></th>
				<td><?= $agt['no_buku'] ?></td>
				<td><?= $agt['nm_anggota'] ?></td>
				<td><?= date_format(date_create($agt['tgl_lhr']), 'd F Y') ?></td>
				<td><?= $agt['tgl_lhr'] ?></td>
				<td><?= $agt['agama'] ?></td>
				<td><?= $agt['no_hp'] ?></td>
				<td><?= $agt['email'] ?></td>
				<td><?= $agt['jns_kelamin'] ?></td>
				<td><?= $agt['alamat'] ?></td>
				<td><?= $agt['rt'] ?></td>
				<td><?= $agt['rw'] ?></td>
				<td><?= $agt['kel_des'] ?></td>
				<td><?= $agt['kec'] ?></td>
				<td><?= $agt['kota_kab'] ?></td>
				<td><?= $agt['prov'] ?></td>
				<td><?= $agt['pekerjaan'] ?></td>
				<td><?= date_format(date_create($agt['tgl_masuk']), 'd F Y') ?></td>
				<?php if($agt['aktif'] == 0) : ?>
				<td>Tidak Aktif</td>
				<?php elseif($agt['aktif'] == 1) : ?>
				<td>Aktif</td>
				<?php endif; ?>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>

</html>
