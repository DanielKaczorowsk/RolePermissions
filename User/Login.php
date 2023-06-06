<?php 
namespace User;
use DataBase\Model as Data;
class Login
{
	Private	$login,$user;
	public function reset():void
{
	$this->login = new \stdClass();
}
	public function name($name)
	{
		$this->reset();
		$this->login->name = $name;
		return $this;
	}
	public function password($password)
	{
		$this->login->password = $password;
		return $this;
	}
	public function login(Data\interface_connect $data)
	{
		$this->user= $data
		->Select(['id','name'])
		->From('users')
		->Where(["name='".$this->login->name."'"])
		->getSql();
		 $_SESSION['login'] = true;
		 $_SESSION['userid'] = $this->user[0]['id'];
		 $_SESSION['user'] = $this->user[0]['name'];
		 return print_r($_SESSION['user']);
	}
}
?>