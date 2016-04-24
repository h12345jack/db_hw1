<?php
class db {
	public $username="phpcourse1";
	public $password="phpcourse";
	public $servername="localhost";
	public $dbname="cwgdb";
	public $conn;
	public function __construct() {
		
		if(!$this->conn=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname)){
			echo "error";
		}
	}
	function __destruct(){
		mysqli_close($this->conn);
	}
	function querysql($sql){
		if(!$result=mysqli_query($this->conn,$sql)){
			echo error;
		}
		return $result;
	}
}