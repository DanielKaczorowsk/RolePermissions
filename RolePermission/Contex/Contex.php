<?php
namespace RolePermission\Contex;
use RolePermission\Obj as Obj;
use RolePermission\Model as Model;
use DataBase\Model as Data;
Class Contex{
private $connect,$mybase,$rola,$uprawnienia;
public function __construct(Data\interface_connect $Model, Model\PermissionRole $permissionrole, Obj\Rola $rola, Obj\Uprawnienia $uprawnienia){
	$this->mybase = $Model;
	$this->mybase->connect();
	$permissionrole->setConnection($this->mybase);
	$permissionrole->setoption($rola,$uprawnienia);
}
public function set_connect(Data $model){
	$this->mybase = $model;
}
};
?>