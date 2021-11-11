<?php
/*function index(){
	$anggota = getAllAnggota();
	require 'view/anggota/list.php';
}

function detail($id){
	$anggota = getAnggotabyId($id);
	require 'view/anggota/detail.php';
}*/

class Anggota{
	protected $model = '';
	public function __construct($model){
		$this->model = $model;
	}

	public function index(){
		$anggota = $this->model->getAllAnggota();
		require 'view/anggota/list.php';
	}

	public function detail($id){
		$anggota = $this->model->getAnggotabyId($id);
		require 'view/anggota/detail.php';
	}

	public function create(){
		if($_POST){
			$this->model->insert();
			header("location:http://localhost/Olddata/oop/mvc/index.php/anggota");
		}else{
			require'view/anggota/form.php';
		}
	}

	public function delete($id){
		if($id){
			$this->model->delete($id);
			header("location:http://localhost/Olddata/oop/mvc/index.php/anggota");
		}
	}

	public function edit($id){
		if($_POST){
			$this->model->update($id);
			header("location:http://localhost/Olddata/oop/mvc/index.php/anggota");
		}else{
			$anggota = $this->model->getAnggotabyId($id);
			require 'view/anggota/form.php';
		}
	}
}