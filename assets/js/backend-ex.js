//js untuk halaman login
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

//js untuk halaman change password

$(".toggle-pass1").click(function () {
	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	if (input.attr("type") == "password") {
		input.attr("type", "text");
	} else {
		input.attr("type", "password");
	}
});

$(".toggle-pass2").click(function () {
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

//tombol hapus
$('.hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	swal({
			title: "Anda Yakin?",
			text: "Data Akan Dihapus Permanen",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				document.location.href = href;
			} else {
				swal("Data Gagal di hapus!");
			}
		});
});
