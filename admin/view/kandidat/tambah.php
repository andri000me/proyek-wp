<?php 
require '../../../controller/koneksi.php';
require '../../controller/kandidat/tambah.php';

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

	<h1>tambah data</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="id">nomor urut : </label>
				<input type="number" name="id" id="id" required>
			</li>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="visi">visi : </label>
				<input type="text" name="visi" id="visi" required>
			</li>
			<li>
				<label for="misi">misi : </label>
				<input type="text" name="misi" id="misi" required>
			</li>
			<li>
				<label for="foto">foto : </label>
				<input type="file" name="foto" id="foto" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
	</form>