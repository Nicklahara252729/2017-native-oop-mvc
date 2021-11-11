<?php $judul = ' Daftar Anggota' ?>
<?php ob_start() ?>
<h1>Daftar Anggota</h1>
<table class="table">
	<tr>
		<th>ID</th>
		<th>Nama</th>
		<th>Tanggal Lahir</th>
		<th>Kota Lahir</th>
		<th>Detail</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($anggota as $row ) : ?>	
	<tr>
		<td><?= $row['id'] ?></td>
		<td><?= $row['nama'] ?></td>
		<td><?= $row['tanggal_lahir'] ?></td>
		<td><?= $row['kota_lahir'] ?></td>
		<td><a href="http://localhost/Olddata/oop/mvc/index.php/anggota/detail?id=<?= $row['id'] ?>" class="btn btn-success">Detail</a></td>
		<td><a href="http://localhost/Olddata/oop/mvc/index.php/anggota/edit?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a></td>
		<td><a href="http://localhost/Olddata/oop/mvc/index.php/anggota/delete?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data')">Delete</a></td>
	</tr>
	<?php endforeach ?>
</table>


<a href="http://localhost/Olddata/oop/mvc/index.php/anggota/create" class="btn btn-primary">Tambah Data</a>
<?php $isi = ob_get_clean() ?>
<?php include'view/template.php' ?>