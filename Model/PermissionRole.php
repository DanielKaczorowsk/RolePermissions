<?php
namespace Model;
use Obj;
use Model;

class PermissionRole
{

Private $stmt,$connection,$Rola,$Uprawnienia;
public function setConnection(Model\interface_connect $Model){
	$this->connection = $Model->getConnect();
}
public function setoption(Obj\Rola $rola,Obj\Uprawnienia $uprawnienia)
{
	$this->Rola = $rola->getRola();
	$this->Uprawnienia = $uprawnienia->getUprawnienia();
}
public function saveRole(){
		$this->stmt = $this->connection->prepare("INSERT INTO role (rola, uprawnienia_id) VALUES (:role,(SELECT id FROM Uprawnienie Where uprawnienia = :uprawnienia))");
		$this->stmt->execute(['role'=>$this->Rola, 'uprawnienia'=>$this->Uprawnienia]);
}
public function loadRole(){
	$this->stmt = $this->connection->prepare("SELECT a.rola, b.uprawnienia from role a 
	INNER JOIN uprawnienie b ON a.uprawnienia_id = b.id Where a.rola = :role");
	$this->stmt->execute(['role'=>$this->Rola]);
	return $this->stmt->fetchAll();
}
public function loadUprawnienia(){
	$this->stmt = $this->connection->prepare("SELECT a.rola, b.uprawnienia from role a 
	INNER JOIN uprawnienie b ON a.uprawnienia_id = b.id Where b.uprawnienia = :uprawnienia");
	$this->stmt->execute(['uprawnienia'=>$this->Uprawnienia]);
	return $this->stmt->fetchAll();
}
}
?>