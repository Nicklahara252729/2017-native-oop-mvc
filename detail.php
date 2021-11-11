<?php
/*require_once "model/anggota_model.php";
$anggota = getAnggotabyId($_GET['id']);
require 'view/anggota/detail.php';*/

$judul = $anggota['nama']  ?>
<?php
ob_start() ?>
<h1><?= $anggota['nama'] ?></h1>
<dl>
<dt>Nama :</dt>
<dd><?= $anggota['nama'] ?></dd>
<dt>Tanggal Lahir :</dt>
<dd><?= $anggota['tanggal_lahir'] ?></dd>
<dt>Kota lahir :</dt>
<dd><?= $anggota['kota_lahir'] ?></dd>
</dl>
<?php $isi = ob_get_clean() ?>
<?php include 'view/template.php' ?>