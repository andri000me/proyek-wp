<?php 
require '../../../controller/koneksi.php';

function tambah($data){
	global $conn;
	$username=htmlspecialchars($data["username"]);
	$nama=htmlspecialchars($data["nama"]);

	//password acak
	$pass_acak=mt_rand(1000, 9999);

	$query = "INSERT INTO tb_user VALUES 
						('', '$username', '$pass_acak', '$nama', 'Pemilih', '1', 'PST')
						";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}




 ?>