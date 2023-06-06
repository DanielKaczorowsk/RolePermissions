<?php
namespace User\Control;
use User\login as Login;
use RolePermission\Model as Model;

class Control
{
	$id,$user;
	public function Auth()
	{
		if($_SESSION['login']==true){
			$this->id=$_SESSION['user'];
			return $this;
		}else{
			return 'No Auth';
		}
	}
	public function Get_Role(){
		return $this->user;
	}
	public function Set_Role(Model\UserControl $role){
		$this->user = $role->findUserRoleId($this->id);
	}
}
?>