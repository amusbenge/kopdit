<!-- Begin Page Content -->
<div class="container-fluid">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/kriteria');?>">Kriteria</a></li>
			<li class="breadcrumb-item active" aria-current="page">Sub Kriteria</li>
		</ol>
	</nav>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered"  width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Kriteria</th>
							<th>Sub Kriteria</th>
							<th>Bobot</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($kriteria as $s_kriteria) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $s_kriteria['kriteria'] ?></td>
							<td><?= $s_kriteria['nm_sub_kriteria'] ?></td>
							<td><?= $s_kriteria['bobot'] ?></td>
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
