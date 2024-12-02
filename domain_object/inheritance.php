<?php

class Manusia
{
    protected $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }
}

class Role extends Manusia
{
    public $idPeran;
    public $namaPeran;
    public $descPeran;
    public $statusPekerjaan;

    public function __construct($idPeran, $namaPeran, $descPeran, $statusPekerjaan, $namaManusia)
    {
        parent::__construct($namaManusia); // memanggil constructor dari kelas manusia
        $this->idPeran = $idPeran;
        $this->namaPeran = $namaPeran;
        $this->descPeran = $descPeran;
        $this->statusPekerjaan = $statusPekerjaan;
    }

    public function tampilkanInfoPeran()
    {
        echo "Nama : " . $this->getNama() . "<br>";
        echo "Role ID : " . $this->idPeran . "<br>";
        echo "Role Name : " . $this->namaPeran . "<br>";
        echo "Role Description : " . $this->descPeran . "<br>";
        echo "Role Status : " . $this->statusPekerjaan . "<br>";
        echo "<br>";
    }
}
