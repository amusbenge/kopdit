<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header mb-2 d-flex justify-content-start">
			<h5 class="mt-2 font-weight-bold text-gray-800"><font color="#4F74E0"><i class="fas fa-fw fa-list-ol"></i></font> KRITERIA</h5>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered"  width="100%" cellspacing="0">
					<thead>
						<tr class="bg-info text-light">
							<th>No</th>
							<th>Kriteria</th>
							<th>Jenis</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- perulangan data Menu -->
						<?php $i = 1; ?>
						<?php foreach ($kriteria as $krit) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $krit['kriteria'] ?></td>
							<td class="font-italic text-center"><?= $krit['jenis'] ?></td>
							<td class="text-center">
								<a href="<?= base_url('admin/kriteria/detail/') . $krit['id_kriteria'] ?>"
									class="btn btn-warning btn-circle mr-2" data-toggle="tooltip" data-placement="top"
									title="Sub Kriteria">
									<i class="fas fa-fw fa-eye"></i>
								</a>
							</td>
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
