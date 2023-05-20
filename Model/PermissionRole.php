<?php
namespace Model;
use Obj;

class PermissionRole
{

Private $stmt,$connection,$Rola,$Uprawnienia;
public function setConnection($connect){
	$this->connection = $connect;
}
public function saveRole(Obj\Rola $rola,Obj\Uprawnienia $uprawnienia){
		$this->Uprawnienia = $uprawnienia->getUprawnienia;
		$this->Rola = $rola->getRola();
		$this->stmt = $this->connection->prepare("INSERT INTO role (rola, uprawnienia_id) VALUES (:role,(SELECT id FROM Uprawnienie Where uprawnienia = :uprawnienia))");
		$this->stmt->execute(['role'=>$this->Rola, 'uprawnienia'=>$this->Uprawnienia]);
}
public function loadRole(Obj\Rola $rola){
	$this->Rola = $rola->getRola();
	$this->stmt = $this->connection->prepare("SELECT a.rola, b.uprawnienia from role a 
	INNER JOIN uprawnienie b ON a.uprawnienia_id = b.id Where a.rola = :role");
	$this->stmt->execute(['role'=>$this->Rola]);
	return $this->stmt->fetchAll();
}
public function loadUprawnienia(Obj\Uprawnienia $uprawnienia){
	$this->Uprawnienia = $uprawnienia->getUprawnienia;
	$this->stmt = $this->connection->prepare("SELECT a.rola, b.uprawnienia from role a 
	INNER JOIN uprawnienie b ON a.uprawnienia_id = b.id Where b.uprawnienia = :uprawnienia");
	$this->stmt->execute(['uprawnienia'=>$this->Uprawnienia]);
	return $this->stmt->fetchAll();
}
}
?>