<?php 
require '../../../controller/koneksi.php';


function tambah($data){
	global $conn;
	$id=htmlspecialchars($data["id"]);
	$nama=htmlspecialchars($data["nama"]);
	$visi=htmlspecialchars($data["visi"]);
	$misi=htmlspecialchars($data["misi"]);

	// upload foto
	$foto= upload();
	if (!$foto) {
		return false;
	}

	$query = "INSERT INTO tb_calon VALUES 
						('$id', '$nama', '$visi', '$misi', '$foto')
						";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function upload() {

	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// cek apakah tidak ada foto yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih foto terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah foto
	$ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));
	if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
		echo "<script>
				alert('yang anda upload bukan foto!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran foto terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, foto siap diupload
	// generate nama foto baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFoto;

	move_uploaded_file($tmpName, '../../../assets/img/' . $namaFileBaru);

	return $namaFileBaru;
}








 ?>