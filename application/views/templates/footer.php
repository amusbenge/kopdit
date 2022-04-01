<!-- Footer -->
<footer class="sticky-footer bg-light rounded-lg">
	<div class="container my-auto">
		<div class="copyright text-center text-dark my-auto">
			<span><b>Copyright &copy; Kopdit Swastisari <?= date('Y'); ?></b></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Apakah anda akan keluar?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
				<a class="btn btn-primary" href="<?= base_url('admin/auth/logout'); ?>">Ya</a>
			</div>
		</div>
	</div>
</div>

<!-- about modal -->
<div class="modal fade" id="aboutModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Kopdit Swastisari</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<P align="justify">KSP Kopdit Swasti Sari adalah salah satu lembaga keuangan non perbankan telah
					32
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
					Pelayanan yang fleksibel dan dinamis sangat menentukan keterlibatan anggota dalam
					membesarkan Kopdit Swasti Sari. <br><br>

					Sebagai lembaga keuangan yang berbadan hukum, kopdit swasti sari secara rutin melakukan
					pelaporan keuangan kepada anggota dalam forum Rapat Anggota Tahunan (RAT), diaudit setiap
					tahun oleh akuntan publik disajikan kepada kantor pelayanan pajak perwakilan Nusa Tenggara
					Timur. Untuk diketahui bahwa Ksp Kopdit Swasti Sari berstatus Primer Nasional yang mendapat
					pengesahan Perubahan Anggaran Dasar (PAD) oleh Deputi Kelembagaan Kementrian Koperasi dan
					UKM Republik Indonesia pada tanggal 5 Desember 2018. Dengan naiknya ke primer provinsi ke
					Primer Nasional maka Ksp Kopdit Swasti Sari telah membuka pelayanan kepada masyarakat yang
					di provinsi Bali.</P>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>




<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<script src="<?= base_url('assets/'); ?>js/backend-ex.js"></script>


<!-- sweat alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	CKEDITOR.replace('isi');
</script>

<script>
	$('.costum-file-input').on('change',
		function() { //artinya cari class costum-file-input ketika di ubah jalankan fungsi
			let fileName = $(this).val().split('\\').pop(); //ambil fileName simpan ke dalam isinya
			$(this).next('.costum-file-label').addClass("selected").html(fileName); //isi kesini file yang diinput
		});
</script>

<script>
	$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
		$("#check-all").click(function() { // Ketika user men-cek checkbox all
			if ($(this).is(":checked")) // Jika checkbox all diceklis
				$(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
			else // Jika checkbox all tidak diceklis
				$(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
		});

		$("#btn-delete").click(function() { // Ketika user mengklik tombol delete
			var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi

			if (confirm) // Jika user mengklik tombol "Ok"
				$("#form-delete").submit(); // Submit form
		});
	});
</script>

</body>

</html>