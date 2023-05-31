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
		print_r($this->UserControl->findUserRoleId(1));
		$this->base = new Model\MyBasePDO;
		$this->base->Connect();
		/*$query = $this->base
		->Select(['a.rola','b.permission','u.name'])
		->From('role a')
		->INNERJOIN(['permission b','users u'],['a.uprawnienia_id = b.id','a.users_id = u.id'])
		->Where(['a.rola="Admin"'])
		->getSql();
		print_r($query);
		*/
	}
}
$controller = new controller;
?>