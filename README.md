# Load Role
    $UserControl = new Model\UserControl;
		$UserControl->loadRole('role')
# Load Permission
    $UserControl = new Model\UserControl;
    $UserControl->loadPermission('permission')
# Save Role
    $UserControl = new Model\UserControl;
    $UserControl->saveRole('new role','permission')
# Your Data Base
    use interface Model interface_connect
