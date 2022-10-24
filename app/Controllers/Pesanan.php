<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\PesananModel;
use App\Models\ProdukModel;

class Pesanan extends BaseController
{
    protected $pesananModel;
    protected $produkModel;
    protected $konverter;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->produkModel = new ProdukModel();
        $this->konverter = new Konverter;
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Pesanan Chen\'s Florist',
        ];
        return view('pesanan/index', $data);
    }

    public function pesananTable()
    {
        $list = $this->pesananModel->getPesananTable();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = date('d-M-Y', strtotime($list->tanggal));
            $row[] = $list->nama_konsumen;
            $row[] = $list->tujuan;
            $row[] = $list->nama_produk;
            // $row[] = $list->jumlah;
            // $row[] = $this->konverter->angka1($list->harga);
            // $row[] = $this->konverter->angka1($list->total_harga);
            $row[] = '<a class="badge text-bg-info" href =' . base_url("/pesanan/detail/" . $list->id) . ' data-bs-toggle="tooltip" data-bs-placement="top" title="PRINT"><i class="fa fa-print"></i> </a>
                     ||
                     <a class="badge text-bg-warning" href =' . base_url("/pesanan/edit/" . $list->id) . ' data-bs-toggle="tooltip" data-bs-placement="top" title="EDIT"><i class="fa fa-edit"></i> </a>
                     ||
                     <button type="button" class="badge text-bg-danger hapus" onclick=\'javascript: hapus("' . $list->id . '","' . $list->nama_konsumen . '")\'" data-bs-toggle="tooltip" data-bs-placement="top" title="HAPUS">
                        <i class="fa fa-trash"></i> 
                    </button>';

            $data[] = $row;
        }
        $output = ['data'   => $data];
        echo json_encode($output);
    }

    public function create()
    {
        $data = [
            'title'     => 'Form Tambah Pesanan',
            'produk'   => $this->produkModel->getProduk(),
            'konverter' => $this->konverter
        ];
        return view('pesanan/create', $data);
    }

    public function save()
    {
        $sql = [
            'tanggal'       => $this->request->getVar('tanggal'),
            'nama_konsumen' => $this->request->getVar('nama_konsumen'),
            'tujuan'        => $this->request->getVar('tujuan'),
            'ucapan'        => $this->request->getVar('ucapan'),
            'jumlah'        => $this->request->getVar('jumlah'),
            'harga'         => $this->konverter->des($this->request->getVar('harga')),
            'total_harga'   => $this->konverter->des($this->request->getVar('total_harga')),
            'produk_id'     => $this->request->getVar('produk_id'),
        ];
        $this->pesananModel->save($sql);
        $output = ['sukses' => 'Data Pesanan Berhasil Disimpan!'];
        echo json_encode($output);
    }

    public function detail($id)
    {
        $data = [
            'title'     => 'Print Pesanan',
            'pesanan'   => $this->pesananModel->getPesanan($id),
            'konverter' => $this->konverter
        ];
        return view('pesanan/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Pesanan',
            'pesanan'   => $this->pesananModel->getPesanan($id),
            'konverter' => $this->konverter,
            'produk'    => $this->produkModel->getProduk()
        ];
        return view('pesanan/edit', $data);
    }

    public function update($id)
    {
        $sql = [
            'id'                => $id,
            'tanggal'           => $this->request->getVar('tanggal'),
            'nama_konsumen'     => $this->request->getVar('nama_konsumen'),
            'tujuan'            => $this->request->getVar('tujuan'),
            'ucapan'            => $this->request->getVar('ucapan'),
            'jumlah'            => $this->request->getVar('jumlah'),
            'harga'             => $this->konverter->des($this->request->getVar('harga')),
            'total_harga'       => $this->konverter->des($this->request->getVar('total_harga')),
            'produk_id'         => $this->request->getVar('produk_id'),
            'jenis_pembayaran'  => $this->request->getVar('jenis_pembayaran'),
            'rekening'          => $this->request->getVar('rekening'),
        ];
        $this->pesananModel->save($sql);
        $output = ['sukses' => 'Data Pesanan Berhasil Diubah!'];
        echo json_encode($output);
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $this->pesananModel->delete($id);

            $output = ['sukses' => 'Data Pesanan Berhasil Dihapus!'];
            echo json_encode($output);
        }
    }
}
