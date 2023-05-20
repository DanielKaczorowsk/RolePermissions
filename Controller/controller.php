<?php
namespace Controller;
use Model;
use Obj;
use Contex;
include "../"."SPL_autoload_register.php";

class Controller{
	public function __construct(){
		$Rola = new Obj\Rola();
		$Uprawnienia = new Obj\Uprawnienia();
		$MyBase = new Model\MyBasePDO();
		$PermissionRole = new Model\PermissionRole();
		$Contex = new Contex\Contex($MyBase,$PermissionRole,$Rola,$Uprawnienia);
		$Rola->setRola('gosc');
		print_r($PermissionRole->loadRole($Rola));
	}
};
$controler = new controller;
?>