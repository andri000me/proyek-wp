<?php 

if (isset($_GET['kode'])) {
	$sql_cek="SELECT * FROM tb_kandidat WHERE id_calon='".$_GET['kode']."'";
	$query_cek=mysqli_query($conn, $sql_cek);
	$data_cek=mysqli_fetch_array($query_cek, MYSQLI_BOTH);
	$kode=$_GET['kode'];
}

?>

<a href="?page=data-bilik">Kembali</a>
<br>
<table>
	<tr>
		<th>Detail Kandidat</th>
	</tr>
	<?php 
		$sql=$conn->query("SELECT * FROM tb_kandidat WHERE id_calon=$kode");
		while($data=$sql->fetch_assoc()) {
	?>
	<tr>
		<td>
			<h1>
				<?= $data['id_calon']; ?>
			</h1>
			<br>
			<img src="../../../assets/img/<?= $data['foto']; ?>" width="300px"/>
			<h2>
				<?= $data['nama']; ?>
			</h2>
			<br>
			<form method="GET" action="../../controller/kandidat/coblos.php">
				<a href="?page=coblos-bilik&kode=<?= $data['id_kandidat'] ?>">Coblos</a>
			</form>
		</td>
	</tr>
	<?php } ?>
</table>