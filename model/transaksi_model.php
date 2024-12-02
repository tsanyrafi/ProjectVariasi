<?php
require_once __DIR__ . '/../domain_object/node_transaksi.php';
require_once __DIR__ . '/../domain_object/node_user.php';
require_once __DIR__ . '/../domain_object/node_role.php';
require_once __DIR__ . '/../domain_object/node_barang.php';
require_once 'model/barang_model.php';

class ModelTransaksi
{
    private $transaksis = [];
    private $nextId = 1;
    private $modelUser;
    private $modelRole;
    private $modelBarang;

    public function __construct($modelUser, $modelRole, $modelBarang)
    {
        $this->modelUser = $modelUser;
        $this->modelRole = $modelRole;
        $this->modelBarang = $modelBarang;

        if (isset($_SESSION['transaksis'])) {
            $this->transaksis = unserialize($_SESSION['transaksis']);
            $this->nextId = count($this->transaksis) + 1;
        } else {
            $this->initializeDefaultTransaksi();
        }
    }

    public function initializeDefaultTransaksi()
    {
        $customer = $this->modelUser->getUserByName("Pratama");
        $kasirRole = $this->modelRole->getRoleByName("Kasir");

        if (!$kasirRole) {
            throw new Exception("Role Kasir tidak ditemukan.");
        }

        $kasirs = $this->modelUser->getUserByRole($kasirRole);
        $kasir = !empty($kasirs) ? $kasirs[0] : null;

        if (!$customer || !$kasir) {
            throw new Exception("Customer atau Kasir tidak ditemukan.");
        }

        $barang1 = $this->modelBarang->getBarangByName("Sapu");
        $barang2 = $this->modelBarang->getBarangByName("Kipas Angin");

        if (!$barang1 || !$barang2) {
            throw new Exception("Barang tidak ditemukan.");
        }


        $tgl_transaksi = date('d-m-Y');

        $this->addTransaksi($tgl_transaksi, $customer, $kasir, 50000, [$barang1, $barang2], [2, 3]);
    }



    public function addTransaksi($tgl_transaksi, $customer, $kasir, $total, $barangs, $jumlahs)
    {
        if ($kasir->role->namaPeran == "Kasir") {
            $dateTime = DateTime::createFromFormat('d-m-Y', $tgl_transaksi);


            $transaksi = new Transaksi($this->nextId++, $dateTime->format('Y-m-d'), $customer, $kasir, $total, $barangs, $jumlahs);
            $this->transaksis[] = $transaksi;
            $this->saveToSession();
        } else {
            throw new Exception("User tidak memiliki peran Kasir");
        }
    }


    private function saveToSession()
    {
        $_SESSION['transaksis'] = serialize($this->transaksis);
    }

    public function getAllTransaksi()
    {
        return $this->transaksis;
    }

    public function getTransaksiById($transaksi_id)
    {
        foreach ($this->transaksis as $transaksi) {
            if ($transaksi->idTransaksi == $transaksi_id) {
                return $transaksi;
            }
        }
        return null;
    }

    public function updateTransaksi($transaksi_id, $customer, $kasir, $total, $barangs, $jumlahs)
    {
        foreach ($this->transaksis as $transaksi) {
            if ($transaksi->idTransaksi == $transaksi_id) {
                $transaksi->customer = $customer;
                $transaksi->kasir = $kasir;
                $transaksi->total = $total;
                $transaksi->barangs = $barangs;
                $transaksi->jumlahs = $jumlahs;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteTransaksi($transaksi_id)
    {
        foreach ($this->transaksis as $key => $transaksi) {
            if ($transaksi->idTransaksi == $transaksi_id) {
                unset($this->transaksis[$key]);
                $this->transaksis = array_values($this->transaksis);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}
