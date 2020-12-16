<?php 
require '../../../controller/koneksi.php';

function tambah($data){
	global $conn;
	$username=htmlspecialchars($data["username"]);
	$password=htmlspecialchars($data["password"]);
	$nama=htmlspecialchars($data["nama"]);

	$query = "INSERT INTO tb_user VALUES 
						('', '$username', '$password', '$nama', 'Panitia', '1', 'PAN')
						";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}




 ?>