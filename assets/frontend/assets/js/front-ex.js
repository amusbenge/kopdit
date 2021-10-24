//js untuk halaman login anggota
$(".toggle-pass").click(function () {
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	if (input.attr("type") == "password") {
		input.attr("type", "text");
	} else {
		input.attr("type", "password");
	}
});

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});

$('.costum-file-input').on('change', function () { //artinya cari class costum-file-input ketika di ubah jalankan fungsi
	let fileName = $(this).val().split('\\').pop(); //ambil fileName simpan ke dalam isinya
	$(this).next('.costum-file-label').addClass("selected").html(fileName); //isi kesini file yang diinput
});
