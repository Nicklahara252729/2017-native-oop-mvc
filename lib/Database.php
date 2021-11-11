<?php
class Database{
	protected $host = 'localhost';
	protected $user = 'root';
	protected $pass = 'satusampe250599';
	protected $db 	= '2017_web_native_oop_mvc';

	public function openDbConnection(){
		$link = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
		return $link;
	}

	public function closeDbConnection($link){
		$link = null;
	}
}