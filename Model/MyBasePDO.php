<?php
namespace Model;
use Obj;
use pdo;
require_once "interface_connect.php";

class MyBasePDO implements interface_connect{
Private $connection,$Rola,$Uprawnienia, $stmt;
public function Connect(){
	$user='daniel';
	$pass='samsung1234';
try {
$this->connection = new PDO("mysql:host=localhost;dbname=ur",$user,$pass,
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
$this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
 echo $e->getMessage();
}
}
public function getConnect(){
	return $this->connection;
}
};
?>