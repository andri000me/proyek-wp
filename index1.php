<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
} else{
	$data_id=$_SESSION["ses_id"];
	$data_username=$_SESSION["ses_username"];
	$data_nama=$_SESSION["ses_nama"];
	$data_level=$_SESSION["ses_level"];
	$data_status=$_SESSION["ses_status"];
	$data_jenis=$_SESSION["ses_jenis"]; 
}

include 'controller/koneksi.php';

if (isset($_GET["page"])) {
	$_SESSION["ses_dump"]=$_GET['page'];
} else{
	$_SESSION["ses_dump"]="";
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<aside>
		<h5>Ngevote</h5>
		Halo, <?= $data_nama; ?>
		<br>
		<?= $data_level; ?>
		<hr>
		<br>
		<?php if ($data_level=="Admin"){ ?>
			<li>
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="?page=data-panitia">Data Panitia</a>
			</li>
			<li>
				<a href="?page=data-suara">Quick Count</a>
			</li>
		<?php
		} elseif ($data_level=="Panitia") { ?>
			<li>
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="?page=data-kandidat">Data Kandidat</a>
			</li>
			<li>
				<a href="?page=data-pemilih">Data Pemilih</a>
			</li>
			<li>
				<a href="?page=data-panitia">Data Panitia</a>
			</li>
			<li>
				<a href="?page=data-box">Vote Box</a>
			</li>
			<li>
				<a href="?page=data-suara">Quick Count</a>
			</li>
		<?php 
		}
		 ?>
	</aside>
	<main>
		<?php 
		if (isset($_GET['page'])) {
			$hal=$_GET['page'];
			switch ($hal) {
				// homepage user
				case 'Admin':
					include "admin/view/home/admin.php";
					break;
				case 'Panitia':
					include "admin/view/home/panitia.php";
					break;
				case 'Pemilih':
					include "pemilih/view/home/pemilih.php";
					break;

				// manage data panitia
				case 'data-panitia':
					include "admin/view/panitia/data.php";
					break;
				case 'add-panitia':
					include "admin/view/panitia/tambah.php";
					break;
				case 'edit-panitia':
					include "admin/view/panitia/edit.php";
					break;
				case 'del-panitia':
					include "admin/controller/panitia/hapus.php";
					break;

				// manage data kandidat
				case 'data-kandidat':
					include "admin/view/kandidat/data.php";
					break;
				case 'add-kandidat':
					include "admin/view/kandidat/tambah.php";
					break;
				case 'edit-kandidat':
					include "admin/view/kandidat/edit.php";
					break;
				case 'del-kandidat':
					include "admin/controller/kandidat/hapus.php";
					break;

				// manage data pemilih
				case 'data-pemilih':
					include "admin/view/pemilih/data.php";
					break;
				case 'add-pemilih':
					include "admin/view/pemilih/tambah.php";
					break;
				case 'edit-pemilih':
					include "admin/view/pemilih/edit.php";
					break;
				case 'del-pemilih':
					include "admin/controller/pemilih/hapus.php";
					break;

				// bilik suara
				case 'data-bilik':
					include "pemilih/view/kandidat/data.php";
					break;
				case 'detail-bilik':
					include "pemilih/view/kandidat/detail.php";
					break;
				case 'coblos-bilik':
					include "pemilih/controller/kandidat/coblos.php";
					break;

				// vote box
				case 'data-box':
					include "admin/view/votebox/data.php";
					break;

				// quick count
				case 'data-suara':
					include "admin/view/quickcount/data.php";
					break;

				// default
				default:
					echo "<center><h1>ERROR!</h1></center>";
					break;
			}
		} else {
			// auto homepage user
			if ($data_level=="Admin") {
				include "admin/view/home/admin.php";
			} elseif ($data_level=="Panitia") {
				include "admin/view/home/panitia.php";
			} elseif ($data_level=="Pemilih") {
				include "pemilih/view/home/pemilih.php";
			}
		} ?>
		
	</main>	
</body>
</html>