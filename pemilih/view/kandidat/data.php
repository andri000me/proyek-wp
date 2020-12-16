<?php 

$data_id=$_SESSION["ses_id"];
$query="SELECT * FROM tb_user WHERE id_user=$data_id";
$result=$conn->query($query);
while ($data=$result->fetch_assoc()) {
	$status=$data['status'];
}

?>

<?php if($status==1){?>
	<?php 
		$result=$conn->query("SELECT * FROM tb_kandidat");
		while ($data=$result->fetch_assoc()) {?>
			<table>
				<tr>
					<th>Nomor urut</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
				<tr>
					<td><?= $data['id_calon']; ?></td>
					<td><?= $data['foto']; ?></td>
					<td><?= $data['nama']; ?></td>
					<td><a href="?page=detail-bilik&kode=<?= $data['id_calon']; ?>">Detail</a></td>
				</tr>
			</table>
		<?php }
	?>
<?php } elseif($status==0) { ?>
	<h3>Anda sudah menggunakan hak suara dengan baik. Terimakasih</h3>
<?php } ?>