<?php
namespace Contex;
use Obj;
use Model;
Class Contex{
private $connect,$mybase,$rola,$uprawnienia;
public function __construct(Model\interface_connect $Model, Model\PermissionRole $permissionrole, Obj\Rola $rola, Obj\Uprawnienia $uprawnienia){
	$this->mybase = $Model;
	$this->mybase->connect();
	$permissionrole->setConnection($this->mybase);
	$permissionrole->setoption($rola,$uprawnienia);
}
public function set_connect(Model $model){
	$this->mybase = $model;
}
};
?>