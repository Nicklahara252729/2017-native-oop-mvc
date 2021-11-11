<?php

/*
----- memanggil controller dan model -----------
require_once'model/anggota_model.php';
require_once'controller/anggota.php';

---- routing ---------
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
if('/Olddata/oop/mvc/index.php' === $uri){
	index();
}elseif('/Olddata/oop/mvc/index.php/detail' === $uri && isset($_GET['id'])){
	detail($_GET['id']);
}else{
	header('HTTP/1.1 404 not found');
	echo '<html><body><h1>page not found</h1></body></html>';
}
*/

// penerapan oop pada mvc
if(isset($_SERVER['PATH_INFO'])){
	$getServer = $_SERVER['PATH_INFO'];
}else{
	$getServer = "";
}
$request = preg_replace("|/*(.+?)/*$|", "\\1", $getServer);
$uri = explode('/',$request);

// cek apakah controller dan method ada pada segment uri
// untuk mengarahkan ke controller dan method yang benar
$uri0= isset($uri[0]);
$uri1= isset($uri[1]);
//$id = isset($_GET['id']);

// memanggil resource yg diperlukan
require_once "lib/Database.php";
require_once "controller/Anggota.php";
require_once "model/AnggotaModel.php";
$db = new Database();
$model = new AnggotaModel($db);
$controller = new Anggota($model);

// routing dan menjalankan method yg sesuai dgn url
if($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'detail'){ // detail
	$id = $_GET['id'];
	$controller->detail($id);
}
elseif($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'edit'){ // edit
	$id = $_GET['id'];
	$controller->edit($id);
}
elseif($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'delete'){ // edit
	$id = $_GET['id'];
	$controller->delete($id);
}
elseif($uri0 && $uri1 && $uri[0] === 'anggota' && $uri[1] === 'create'){ // create
	$controller->create();
}
elseif($uri0 == 'anggota'){ // index
	$controller->index();
}
else{
	header('HTTP/1.1 404 not found');
	echo '<html><body><h1>page not found</h1></body></html>';
}
