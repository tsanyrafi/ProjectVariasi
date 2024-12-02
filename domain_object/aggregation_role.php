<?php

class Department
{
    private $namaDepartemen;


    public function __construct($namaDepartemen)
    {
        $this->namaDepartemen = $namaDepartemen;
    }

    public function getDepartmentInfo()
    {
        return "Department: " . $this->namaDepartemen;
    }
}

class Role
{
    public $idPeran;
    public $namaPeran;
    public $descPeran;
    public $statusPekerjaan;
    public $departemen; // aggregation

    public function __construct($idPeran, $namaPeran, $descPeran, $statusPekerjaan, Department $departemen)
    {
        $this->idPeran = $idPeran;
        $this->namaPeran = $namaPeran;
        $this->descPeran = $descPeran;
        $this->statusPekerjaan = $statusPekerjaan;
        $this->departemen = $departemen; // departemen dihubungkkan melalui aggregation
    }

    public function tampilkanInfoPeran()
    {
        echo "Role ID : " . $this->idPeran . "<br>";
        echo "Role Name : " . $this->namaPeran . "<br>";
        echo "Role Description : " . $this->descPeran . "<br>";
        echo "Role Status : " . $this->statusPekerjaan . "<br>";
        echo $this->departemen->getDepartmentInfo() . "<br>";
        echo "<br>";
    }
}
