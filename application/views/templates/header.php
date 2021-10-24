<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="icon" type="image/png" href="<?= base_url('assets/img/icon/icon.png')?>">
	<title><?= $title; ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href=" <?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- lightbox -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.lightbox-0.5.js"></script>
	<link href="<?= base_url()?>assets/css/jquery.lightbox-0.5.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href=" <?= base_url('assets/'); ?>css/backend-style.css" rel="stylesheet">
	<link href=" <?= base_url('assets/'); ?>css/sweetalert2.min.css" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

	<script type="text/javascript">
		$(function () {
			$('#foto_angsur a').lightBox();
		});
		$(function () {
			$('#foto_simpanan a').lightBox();
		});

	</script>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">
