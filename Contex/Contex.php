<?php
namespace Contex;
use Obj;
use Model;
Class Contex{
private $connect,$mybase,$rola,$uprawnienia;
public function __construct(Model\interface_connect $Model, Model\PermissionRole $permissionrole, Obj\Rola $rola, Obj\Uprawnienia $uprawnienia){
	$this->mybase = $Model;
	$this->mybase->connect();
	$this->connect = $this->mybase->getConnect();
	$permissionrole->setConnection($this->connect);
}
public function set_connect(Model $model){
	$this->mybase = $model;
}
};
?>