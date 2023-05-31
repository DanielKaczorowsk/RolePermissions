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
     $this->base = new Model\MyBasePDO;
     $this->base->Connect();
    ->Select(['1','2'])
    ->From('Your From') -> null = From role
    ->Where(['Role=Admin','Uprawnienia=Adder']) -> implode AND
    ->OrWhere(['Role=Admin','Uprawnienia=Adder']) ->implode OR, if Where is not null can use WHERE then OrWhere
    ->ON(['']) ->implode AND
    ->INNERJOIN(['innerjoin'],'['on']') -> ->INNERJOIN(['permission a','role b'],['a.id=b.id_permission']);
