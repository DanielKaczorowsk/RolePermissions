<?php
namespace Model;
use Obj;
use Model;

class PermissionRole
{

Private $stmt,$connection,$Rola,$Uprawnienia,$query, $loadRole, $loadUprawnienia,$userRole;
public function setConnection(Model\interface_connect $Model){
	$this->connection = $Model->getConnect();
	$this->query = $Model;
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
public function findUserRoleId(int $user){
		$this->userRole = $this->query
		->Select(['a.rola','b.permission','u.name'])
		->From('role a')
		->INNERJOIN(['permission b','users u'],['a.uprawnienia_id = b.id','a.users_id = u.id'])
		->Where(["u.id='".$user."'"])
		->getSql();
		return $this->userRole;
}
public function loadRole(){
	$this->loadRole= $this->query
		->Select(['a.rola','b.uprawnienia'])
		->From('role a')
		->INNERJOIN(['uprawnienie b'],['a.uprawnienia_id = b.id'])
		->Where(["a.rola='".$this->Rola."'"])
		->getSql();
	return $this->loadRole;
}
public function loadUprawnienia(){
	$this->loadUprawnienia = $this->query
	->Select(['a.rola, b.uprawnienia'])
	->From('role a')
	->INNERJOIN(['uprawnienie b'],['a.uprawnienia_id = b.id'])
	->Where(["b.uprawnienia ='".$this->Uprawnienia."'"])
	->getSql();
	return $this->loadUprawnienia;
}
}
?>