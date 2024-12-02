<?php

require_once 'domain_object/aggregation_role.php';

class RoleModel
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
        $this->tambahRole($this->next_id++, "Admin", "Administrator", 1, new Department("IT Department"));
        $this->tambahRole($this->next_id++, "User", "Customer/member", 1, new Department("Marketing Department"));
        $this->tambahRole($this->next_id++, "Kasir", "Pembayaran", 0, new Department("Finance Department"));
        $this->saveToSession();
    }

    public function tambahRole($idPeran, $namaPeran, $descPeran, $statusPekerjaan, Department $departemen)
    {
        $role = new Role($idPeran, $namaPeran, $descPeran, $statusPekerjaan, $departemen);
        $this->roles[] = $role;
        $this->saveToSession();
    }

    public function getAllRoles()
    {
        return $this->roles;
    }

    public function hapusRole($idPeran)
    {
        foreach ($this->roles as $index => $role) {
            if ($role->idPeran == $idPeran) {
                unset($this->roles[$index]);
            }
        }
        $this->roles = array_values($this->roles);
        $this->saveToSession();
    }

    public function updateRole($idPeran, $namaPeran, $descPeran, $statusPekerjaan, Department $departemen)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $idPeran) {
                $role->namaPeran = $namaPeran;
                $role->descPeran = $descPeran;
                $role->statusPekerjaan = $statusPekerjaan;
                $role->departemen = $departemen;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getRoleById($idPeran)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $idPeran) {
                return $role;
            }
        }
        return null;
    }

    public function getRoleByName($namaPeran)
    {
        foreach ($this->roles as $role) {
            if ($role->namaPeran == $namaPeran) {
                return $role;
            }
        }
        return null;
    }

    private function saveToSession()
    {
        $_SESSION['roles'] = serialize($this->roles);
    }
}
