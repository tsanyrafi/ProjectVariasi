<?php

require_once 'domain_object/composite_role.php';

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
        $this->tambahRole("Admin", "Administrator", 1, "IT Department");
        $this->tambahRole("User", "Customer/member", 1, "Marketing Department");
        $this->tambahRole("Kasir", "Pembayaran", 0, "Finance Department");
        $this->saveToSession();
    }

    public function tambahRole($namaPeran, $descPeran, $statusPekerjaan, $namaDepartemen)
    {
        $role = new Role($this->next_id++, $namaPeran, $descPeran, $statusPekerjaan, $namaDepartemen);
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
    public function updateRole($idPeran, $namaPeran, $descPeran, $statusPekerjaan, $namaDepartemen)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $idPeran) {
                $role->namaPeran = $namaPeran;
                $role->descPeran = $descPeran;
                $role->statusPekerjaan = $statusPekerjaan;
                $role->departemen = new Department($namaDepartemen);
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
