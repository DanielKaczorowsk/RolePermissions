<?php 
namespace controller;
use Model;
include "../"."SPL_autoload_register.php";
class controller
{
	private $UserControl,$base;
	public function __construct()
	{
		$this->UserControl = new Model\UserControl;
		print_r($this->UserControl->loadUprawnienia('Edytor'));
		$this->base = new Model\MyBasePDO;
		$this->base->Connect();
		$query = $this->base
		->Select(['a.rola','b.uprawnienia'])
		->From('role a')
		->INNERJOIN('uprawnienie b')
		->ON(['a.uprawnienia_id = b.id'])
		->Where(['a.rola="gosc"'])
		->getSql();
		//print_r($query);
	}
}
$controller = new controller;
?>