<?php
class Barang
{
    public $barang_id;
    public $barang_nama;
    public $barang_stok;
    public $barang_harga;

    function __construct($barang_id, $barang_nama, $barang_stok, $barang_harga)
    {
        $this->barang_id = $barang_id;
        $this->barang_nama = $barang_nama;
        $this->barang_stok = $barang_stok;
        $this->barang_harga = $barang_harga;
    }
}
