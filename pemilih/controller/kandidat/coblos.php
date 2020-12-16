<?php 

$data_id=$_SESSION["ses_id"];
$tgl=date("Y-m-d H:i:s");

if (isset($_GET['kode'])) {
	$sql_simpan="INSERT INTO tb_suara (id_suara, id_calon, id_user, waktu) VALUES (
			'',
			'".$_GET['kode']."',
			'".$data_id."',
			'".$_tgl."'
	);";
	$sql_simpan.="UPDATE tb_user SET status='0' WHERE id_user='".$data_id."'";
	$query_simpan=mysqli_multi_query($conn, $sql_simpan);

	if ($query_simpan) {
		header("Location: index.php?page=data-bilik");
	} else{
		echo mysqli_error($conn);
	}
}

?>