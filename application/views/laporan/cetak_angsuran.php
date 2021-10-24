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
	<div class="" style="text-align: center; font-family: serif;">
		<h2>Angsuran</h2>
	</div>
	<div style="text-align: left; font-family: serif;">Tanggal Cetak: <?= date('d F Y');?> </div><br>
	<div style="text-align: left; font-family: serif;">No Buku :  <?= $data['anggota']['no_buku'];?></div>
	<div style="text-align: left; font-family: serif;">Nama Anggota :  <?= $data['anggota']['nm_anggota'];?></div><br>
	<table class="items" width="100%" style="font-size: 9pt; font-family: serif; border-collapse: collapse; " cellpadding="8">
		<thead>
			<tr>
				<td width="5%">No</td>
				<td width="10%">Pokok</td>
				<td width="10%">Bunga</td>
				<td width="10%">Sukarela</td>
				<td width="10%">Total Angsur</td>
				<td width="10%">Jumlah Harus Bayar</td>
				<td width="10%">Jumlah Bayar</td>
				<td width="10%">Denda</td>
				<td width="10%">Status</td>
				<td width="10%">Tanggal Bayar</td>
				<td width="10%">Jatuh Tempo</td>
				<td width="10%">Bukti</td>
			</tr>
		</thead>
		<tbody>
			<!-- ITEMS HERE -->
			<?php $i = 1; ?>
			<?php foreach ($data['angsuran'] as $agsr) : ?>
			<tr>
				<th scope="row"><?= $i; ?></th>
                <td><?= 'Rp.'. number_format($agsr['pokok'],2,'.',',') ?></td>
                <td><?= 'Rp.'. number_format($agsr['bunga'],2,'.',',') ?></td>
                <td><?= 'Rp.'. number_format($agsr['sukarela'],2,'.',',') ?></td>
                <td><?= 'Rp.'. number_format($agsr['jumlah_angsuran'],2,'.',',') ?></td>
                <td><?= 'Rp.'. number_format($agsr['jumlah_harus_bayar'],2,'.',',') ?></td>
                <td><?= 'Rp.'. number_format($agsr['jumlah_bayar'],2,'.',',') ?></td>
                <td><?= 'Rp.'. number_format($agsr['denda'],2,'.',',') ?></td>
                <td><?= $agsr['status']; ?></td>
                <td><?= $agsr['tanggal_bayar']; ?></td>
                <td><?= $agsr['jatuh_tempo']; ?></td>
				<?php if(!empty($agsr['bukti'])) : ?>
                    <td><img src="<?= base_url('assets/img/angsuran/').$agsr['bukti'];?>" width="50" height="50" alt=""></td>
                <?php else : ?>
                    <td>Belum ada bukti</td>
                <?php endif; ?>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>

</html>
