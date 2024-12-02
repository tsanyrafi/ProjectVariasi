<?php

class Department
{
    public $namaDepartemen;

    public function __construct($namaDepartemen)
    {
        $this->namaDepartemen = $namaDepartemen;
    }

    public function getInfo()
    {
        return $this->namaDepartemen;
    }
}

class Role
{
    public $idPeran;
    public $namaPeran;
    public $descPeran;
    public $statusPekerjaan;
    public $departemen; // Composition

    public function __construct($idPeran, $namaPeran, $descPeran, $statusPekerjaan, $namaDepartemen)
    {
        $this->idPeran = $idPeran;
        $this->namaPeran = $namaPeran;
        $this->descPeran = $descPeran;
        $this->statusPekerjaan = $statusPekerjaan;
        $this->departemen = new Department($namaDepartemen);
    }

    public function getDepartmentInfo()
    {
        return $this->departemen->getInfo();
    }

    public function tampilkanInfoPeran()
    {
        echo "Role ID : " . $this->idPeran . "<br>";
        echo "Role Name : " . $this->namaPeran . "<br>";
        echo "Role Description : " . $this->descPeran . "<br>";
        echo "Role Status : " . $this->statusPekerjaan . "<br>";
        echo "Role Department : " . $this->getDepartmentInfo() . "<br>";
        echo "<br>";
    }
}
