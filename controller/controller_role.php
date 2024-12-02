<?php

require_once 'model/model_role.php';

class controllerRole
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new ModelRole();
    }

    public function listRoles()
    {
        $roles = $this->roleModel->getAllRoles();
        include 'views/role_list.php';
    }


    public function addRole($role_name, $role_description, $role_status)
    {
        $this->roleModel->addRole($role_name, $role_description, $role_status);
        header('Location: /index.php?modul=role');
    }

    public function editById($role_id)
    {
        $peran = $this->roleModel->getRoleById($role_id);
        include 'views/role_update.php';
    }

    public function updateRole($id, $role_name, $role_desc, $role_status)
    {
        $this->roleModel->updateRole($id, $role_name, $role_desc, $role_status);
        header('Location: index.php?modul=role');
    }

    public function deleteRole($id)
    {
        $cek = $this->roleModel->deleteRole($id);
        if ($cek == false) {
            throw new Exception('gak onok coy');
        } else {
            header('location: index.php?modul=role');
        }
    }

    public function getListRoleName()
    {
        $listRoleName = [];
        foreach ($this->roleModel->getAllRoles() as $role) {
            $listRoleName[] = $role->namaPeran;
        }
        return $listRoleName;
    }

    public function getRoleByName($name)
    {
        return $this->roleModel->getRoleByName($name);
    }
}
