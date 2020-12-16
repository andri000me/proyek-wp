<?php 
require '../../../controller/koneksi.php';
require '../../controller/pemilih/tambah.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '../../../index1.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = '../../../index1.php';
			</script>
		";
		// echo mysqli_error($conn);
	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>tambah data</title>
</head>
<body>
	<h1>tambah data</h1>
	<form action="" method="POST">
		<ul>
			<li>
				<label for="username">username : </label>
				<input type="text" name="username" id="username" required>
			</li>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
	</form>
</body>
</html>