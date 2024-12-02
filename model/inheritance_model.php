<?php

require_once 'domain_object/inheritance.php';

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
        $this->tambahRole("Admin", "Administrator", 1, "Budi");
        $this->tambahRole("User", "Customer/member", 1, "Siti");
        $this->tambahRole("Kasir", "Pembayaran", 0, "Hegel");
        $this->saveToSession();
    }

    public function tambahRole($namaPeran, $descPeran, $statusPekerjaan, $namaManusia)
    {
        $role = new Role($this->next_id++, $namaPeran, $descPeran, $statusPekerjaan, $namaManusia);
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

    public function updateRole($idPeran, $namaPeran, $descPeran, $statusPekerjaan, $namaManusia)
    {
        foreach ($this->roles as $role) {
            if ($role->idPeran == $idPeran) {
                $role->namaPeran = $namaPeran;
                $role->descPeran = $descPeran;
                $role->statusPekerjaan = $statusPekerjaan;
                $role->namaManusia = $namaManusia;
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
