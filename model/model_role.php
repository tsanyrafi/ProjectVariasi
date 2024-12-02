<?php
require_once __DIR__ . '/../domain_object/node_role.php';

class ModelRole
{
    private $roles = [];
    private $next_id = 1;

    public function __construct()
    {

        if (isset($_SESSION['roles'])) {
            $this->roles = unserialize($_SESSION['roles']);
            $this->next_id = count($this->roles) + 1;
        } else {
            $this->initializeDefaultRole();
        }
    }

    public function initializeDefaultRole()
    {
        $this->addRole("Admin", "Sebagai Admin", 1);
        $this->addRole("Kasir", "Sebagai Kasir", 1);
        $this->addRole("Customer", "Sebagai Customer", 1);
        $this->saveToSession();
    }

    public function addRole($namaPeran, $descPeran, $statusPekerjaan)
    {
        $peran = new \Role($this->next_id++, $namaPeran, $descPeran, $statusPekerjaan);
        $this->roles[] = $peran;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getAllRoles()
    {
        return $this->roles;
    }

    public function getRoleById($role_id)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $role_id) {
                return $role;
            }
        }
        return null;
    }

    public function updateRole($role_id, $namaPeran, $descPeran, $statusPekerjaan)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $role_id) {
                $role->namaPeran = $namaPeran;
                $role->descPeran = $descPeran;
                $role->statusPekerjaan = $statusPekerjaan;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }


    public function deleteRole($role_id)
    {
        foreach ($this->roles as $key => $role) {
            if ($role->idPeran == $role_id) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }


    public function getRoleByName($namaPeran)
    {
        foreach ($this->roles as $role) {
            if ($namaPeran == $role->namaPeran) {
                return $role;
            }
        }
        return null;
    }
}
