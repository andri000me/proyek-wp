<h3>Data Kandidat</h3>
<br>
<a href="?page=add-kandidat">Tambah data</a>
<br>
<table>
	<tr>
		<th>No. Urut</th>
		<th>Nama</th>
		<th>Visi</th>
		<th>Misi</th>
		<th>Foto</th>
		<th>Aksi</th>
	</tr>

	<?php 
	$sql=$conn->query("SELECT * FROM tb_calon");
	while($data=$sql->fetch_assoc()){
	 ?>

	<tr>
		<td>
			<?=$data['id_calon']; ?>
		</td>
		<td>
			<?=$data['nama']; ?>
		</td>
		<td>
			<img src="../../../assets/img/<?= $data['foto']; ?>" width="150px"/>
		</td>
		<td>
			<?=$data['visi']; ?>
		</td>
		<td>
			<?=$data['misi']; ?>
		</td>
		<td>
			<a href="?page=edit-kandidat&kode<?= $data['id_kandidat']; ?>">Ubah</a>
			<a href="?page=del-kandidat&kode<?= $data['id_kandidat']; ?>" onclick="return confirm('Apakah Anda yakin hapus data ini?')">Hapus</a>
		</td>
	</tr>
	<?php 
	} ?>
</table>