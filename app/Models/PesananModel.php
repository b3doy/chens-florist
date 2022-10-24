<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'tanggal', 'nama_konsumen', 'tujuan', 'ucapan', 'jumlah', 'harga', 'total_harga', 'produk_id',
        'jenis_pembayaran', 'rekening'
    ];

    public function getPesanan($id)
    {
        return $this->db->table('pesanan')->select('*')->join('produk', 'produk.id_produk = pesanan.produk_id')
            ->where('id', $id)->get()->getResult();
    }

    public function getPesananTable()
    {
        return $this->db->table('pesanan')->select('*')->join('produk', 'produk.id_produk = pesanan.produk_id')
            ->orderBy('tanggal', 'DESC')->get()->getResult();
    }
}
