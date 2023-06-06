<?php 
namespace controller;
use RolePermission\Model as Model;
use DataBase\Model as Data;
use User;
include "../"."SPL_autoload_register.php";
class controller
{
	private $UserControl,$base,$user,$login;
	public function __construct()
	{
		$this->base = new Data\MyBasePDO;
		$this->UserControl = new Model\UserControl($this->base);
		$this->user=$this->UserControl->findUserRoleId(1);
		//echo $this->user[0]['name'];
		$this->login = new User\Login;
		$this->login
		->name('Piotr')
		->password('1234')
		->login($this->base);
		print_r($this->UserControl->Auth()->Roles());

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