<?php 
namespace controller;
use Model;
include "../"."SPL_autoload_register.php";
class controller
{
	private $UserControl;
	public function __construct()
	{
		$UserControl = new Model\UserControl;
		print_r($UserControl->loadRole('gosc'));
	}
}
$controller = new controller;
?>