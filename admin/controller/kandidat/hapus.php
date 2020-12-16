<?php 

if (isset($GET['kode'])) {
	$sql_cek="SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
	$query_cek = mysqli_query($conn, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

 ?>

<?php 

$foto= $data_cek['foto'];
  if (file_exists("../../../assets/img/$foto")){
  	unlink("../../../assets/img/$foto");
  }

  $sql_hapus = "DELETE FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
  $query_hapus = mysqli_query($conn, $sql_hapus);

  if ($query_hapus) {
  	echo "
  		<script>
				alert('data berhasil dihapus!');
				document.location.href = '../../../index1.php?page=data-kandidat';
			</script>
  	";
  } else{
  	echo "
  		<script>
				alert('data gagal dihapus!');
				document.location.href = '../../../index1.php?page=data-kandidat';
			</script>
  	";
  }



 ?>