<?php
namespace RolePermission\Model;
use RolePermission\Model as Model;
use RolePermission\Obj as Obj;
use RolePermission\Contex as Contex;
use DataBase\Model as Data;

class UserControl{
	public $arr;
	private $Rola, $Uprawnienia, $PermissionRole,$MyBase,$id,$Auth;
	public function __construct(Data\interface_connect $Model)
	{
		$this->Rola = new Obj\Rola();
		$this->Uprawnienia = new Obj\Uprawnienia();
		$this->MyBase = $Model;
		$this->PermissionRole = new Model\PermissionRole();
	}
	public function reset():void
	{
	$this->Auth = new \stdClass();
	}
	public function Auth()
	{
		if($_SESSION['login']==true){
			$this->reset();
			$this->Auth->id=$_SESSION['userid'];
			return $this;
		}else{
			return 'No Auth';
		}
	}
	public function Roles()
	{
		$Contex = new Contex\Contex($this->MyBase,$this->PermissionRole,$this->Rola,$this->Uprawnienia);
		$this->Auth->Role = $this->PermissionRole->findUserRoleId($this->Auth->id);
		return $this->Auth->Role;
	}
	public function loadRole($rola)
	{
		$this->Rola->setRola($rola);
		$Contex = new Contex\Contex($this->MyBase,$this->PermissionRole,$this->Rola,$this->Uprawnienia);
		return $table1 = $this->PermissionRole->loadRole();
	}
	public function findUserRoleId(int $user)
	{
		$Contex = new Contex\Contex($this->MyBase,$this->PermissionRole,$this->Rola,$this->Uprawnienia);
		return $table1 = $this->PermissionRole->findUserRoleId($user);
	}
	public function loadUprawnienia($uprawnienia)
	{
		$this->Uprawnienia->setUprawnienia($uprawnienia);
		$Contex = new Contex\Contex($this->MyBase,$this->PermissionRole,$this->Rola,$this->Uprawnienia);
		return $table1 = $this->PermissionRole->loadUprawnienia();
	}
	public function saveRole($rola,$uprawnienia)
	{
		$this->Uprawnienia->setUprawnienia($uprawnienia);
		$this->Rola->setUprawnienia($rola);
		$Contex = new Contex\Contex($this->MyBase,$this->PermissionRole,$this->Rola,$this->Uprawnienia);
		$table1 = $this->PermissionRole->loadUprawnienia();
		return 'save it';
	}
};
?>