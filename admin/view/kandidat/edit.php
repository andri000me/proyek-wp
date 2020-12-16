<?php 
require '../../../controller/koneksi.php';
require '../../controller/kandidat/edit.php';


if (isset($_GET['kode'])) {
	$sql_cek="SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
	$query_cek=mysqli_query($conn, $sql_cek);
	$data_cek=mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( edit($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = '../../../index1.php?page=data-kandidat';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index1.php?page=data-kandidat';
			</script>
		";
	}

 ?>

<h3>Ubah Data Kandidat</h3>

<form action="" method="POST" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="id">nomor urut : </label>
				<input type="number" name="id" id="id" value="<?=$data_cek['id_calon']; ?>">
				<input type="hidden" name="fotoLama" value="<?= $data_cek['foto']; ?>">
			</li>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama" id="nama" value="<?=$data_cek['nama']; ?>">
			</li>
			<li>
				<label for="visi">visi : </label>
				<input type="text" name="visi" id="visi" value="<?=$data_cek['visi']; ?>">
			</li>
			<li>
				<label for="misi">misi : </label>
				<input type="text" name="misi" id="misi" value="<?=$data_cek['misi']; ?>">
			</li>
			<li>
				<label for="foto">foto : </label>
				<img src="../../../assets/img/<?= $data_cek['gambar']; ?>" width="40">
				<input type="file" name="foto" id="foto">
			</li>
			<li>
				<input type="submit" name="edit" value="Simpan">
				<a href="?page=data-kandidat">Batal</a>
			</li>
	</form>