<?php



class Role
{
    public $idPeran;
    public $namaPeran;
    public $descPeran;
    public $statusPekerjaan;


    public function __construct($idPeran, $namaPeran, $descPeran, $statusPekerjaan)
    {
        $this->idPeran = $idPeran;
        $this->namaPeran = $namaPeran;
        $this->descPeran = $descPeran;
        $this->statusPekerjaan = $statusPekerjaan;
    }
}
