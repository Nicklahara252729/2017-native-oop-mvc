<?php
if(isset($_SERVER['PATH_INFO'])){
	$getServer = $_SERVER['PATH_INFO'];
}else{
	$getServer = "";
}
$request = preg_replace("|/*(.+?)/*$|", "\\1", $getServer);
$uri = explode('/',$request);

// set form action
if($uri[1] === 'edit'){
	$judul = 'Edit Anggota';
	$form_action = "http://localhost/Olddata/oop/mvc/index.php/anggota/edit?id=".$_GET['id'];
}else{
	$judul = 'tambah data';
	$form_action = "http://localhost/Olddata/oop/mvc/index.php/anggota/create";
}

// set form value
$valNama = isset($anggota['nama']) ? $anggota['nama'] : '';
$valTanggalLahir = isset($anggota['tanggal_lahir']) ?$anggota['tanggal_lahir'] : '';
$valKoteLahir = isset($anggota['kota_lahir']) ? $anggota['kota_lahir'] : '';
$valid = isset($anggota['id']) ? $anggota['id'] : '';
?>

<?php ob_start() ?>
<h1><?= $judul ?></h1>
<form action="<?= $form_action ?>" method="post">
<?php if($valid) : ?>
	<input type="hidden"  name="id" value="<?= $valid?>" >
<?php endif ?>

<div class="form-group">
<label for="nama"> Nama </label>
<input name="nama" type="text" value="<?= $valNama ?>" class="form-control" id="nama" placeholder="Nama"> </div>
<div class="form-group">
<label for="tanggal_lahir">Tanggal Lahir</label>
<input name="tanggal_lahir" type="text" value="<?= $valTanggalLahir ?>" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir"></div>
<div class="form-group">
<label for="kota_lahir">Kota Lahir</label>
<input name="kota_lahir" type="text" value="<?= $valKoteLahir ?>" class="form-control" id="kota_lahir" placeholder="Kota Lahir"></div>
<button class="btn btn-primary" type="submit"> Simpan </button>
</form>
<?php $isi = ob_get_clean() ?>
<?php include'view/template.php' ?>