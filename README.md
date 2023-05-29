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
# Use DataBase Query
    ->Select(['1','2'])
    ->From('Your From') -> null = From role
    ->Where(['Role=Admin','Uprawnienia=Adder']) -> implode AND
    ->ON(['']) ->implode AND
    ->INNERJOIN('string')
