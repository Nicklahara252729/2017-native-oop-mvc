<?php

class AnggotaModel{

protected $db;
public function __construct($database){
	$this->db = $database;
}

function getAllanggota(){
	$link = $this->db->openDbConnection();
	$result = $link->query('select * from anggota order by id');
	$anggota = array();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$anggota[] = $row;
	}

	$this->db->closeDbConnection($link);
	return $anggota;
}

function getAnggotabyId($id){
	$link = $this->db->openDbConnection();
	$query = 'select * from anggota where id=:id';
	$statement = $link->prepare($query);
	$statement->bindValue(':id',$id,PDO::PARAM_INT);
	$statement->execute();

	$row = $statement->fetch(PDO::FETCH_ASSOC);
	$this->db->closeDbConnection($link);
	return $row;
}

public function insert(){
	$link = $this->db->openDbConnection();
	$query = 'insert into anggota set nama=:nama, tanggal_lahir=:tanggal_lahir, kota_lahir=:kota_lahir';
	$statement = $link->prepare($query);
	$statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
	$statement->bindValue(':tanggal_lahir', $_POST['tanggal_lahir'], PDO::PARAM_STR);
	$statement->bindValue(':kota_lahir', $_POST['kota_lahir'], PDO::PARAM_STR);
	$statement->execute();
	$this->db->closeDbConnection($link);
}

public function delete($id){
	$link = $this->db->openDbConnection();
	$query = 'delete from anggota where id =:id';
	$statement = $link->prepare($query);
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
	$this->db->closeDbConnection($link);
}

public function update($id){
	$link = $this->db->openDbConnection();
	$query = "update anggota set nama =:nama, tanggal_lahir =:tanggal_lahir, kota_lahir =:kota_lahir where id =:id";
	$statement = $link->prepare($query);
	$statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
	$statement->bindValue(':tanggal_lahir', $_POST['tanggal_lahir'], PDO::PARAM_STR);
	$statement->bindValue(':kota_lahir', $_POST['kota_lahir'], PDO::PARAM_STR);
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
	$this->db->closeDbConnection($link);
}
}