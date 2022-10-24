<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama_produk', 'deskripsi_produk'
    ];

    public function getProduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getProdukTable()
    {
        return $this->db->table('produk')->select('*')->get()->getResult();
    }
}
