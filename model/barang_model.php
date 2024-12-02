<?php
require_once 'domain_object/node_barang.php';

class modelBarang
{
    private $barangs = [];
    private $nextId = 1;

    public function __construct()
    {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = count($this->barangs) + 1;
        } else {
            $this->initiliazeDefaultBarang();
        }
    }

    public function initiliazeDefaultBarang()
    {
        $this->addBarang("Sapu", 200, 10000);
        $this->addBarang("Kipas Angin", 300, 150000);
        $this->addBarang("Kursi", 400, 320000);
    }

    public function addBarang($barang_nama, $barang_stok, $barang_harga)
    {
        $brg = new \Barang($this->nextId++, $barang_nama, $barang_stok, $barang_harga);
        $this->barangs[] = $brg;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['barangs'] = serialize($this->barangs);
    }

    public function getAllBarangs()
    {
        return $this->barangs;
    }

    public function getBarangById($barang_id)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->barang_id == $barang_id) {
                return $barang;
            }
        }
        return null;
    }

    public function updateBarang($barang_id, $barang_nama, $barang_stok, $barang_harga)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->barang_id == $barang_id) {
                $barang->barang_nama = $barang_nama;
                $barang->barang_stok = $barang_stok;
                $barang->barang_harga = $barang_harga;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteBarang($barang_id)
    {
        foreach ($this->barangs as $key => $barang) {
            if ($barang->barang_id == $barang_id) {
                unset($this->barangs[$key]);
                $this->barangs = array_values($this->barangs);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getBarangByName($barang_nama)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->barang_nama == $barang_nama) {
                return $barang;
            }
        }
    }
}
