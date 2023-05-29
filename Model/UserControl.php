<?php
namespace Model;
use Model;
use Obj;
use Contex;
include "../"."SPL_autoload_register.php";

class UserControl{
	public $arr;
	private $Rola, $Uprawnienia, $PermissionRole,$MyBase;
	public function __construct(){
		$this->Rola = new Obj\Rola();
		$this->Uprawnienia = new Obj\Uprawnienia();
		$this->MyBase = new Model\MyBasePDO();
		$this->PermissionRole = new Model\PermissionRole();
	}
	public function loadRole($rola)
	{
		$this->Rola->setRola($rola);
		$Contex = new Contex\Contex($this->MyBase,$this->PermissionRole,$this->Rola,$this->Uprawnienia);
		return $table1 = $this->PermissionRole->loadRole();
	}
	public function loadUprawnienia($uprawnienia)
	{
		$this->Rola->setUprawnienia($uprawnienia);
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