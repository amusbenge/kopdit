<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="card" style="width: 18rem;">
		<img
			src="https://www.google.com/gmail/about/static/images/logo-gmail.png?cache=1adba63"
			height="100" width="100" class="card-img-top" alt="...">
		<div class="card-body">
			<h4 class="card-title">Ubah atau Reset Password Anda :</h4>
			<p>Silahkan <a href="<?= base_url().'auth/resetPass/'.urlencode($email);?>" class="btn btn-primary">klik
					disini</a> untuk beralih ke halaman reset password anda. </p>
		</div>
	</div>
</body>

</html>
