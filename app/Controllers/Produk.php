<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title'     => "Produk Chen's Florist",
            'produk'    => $this->produkModel->getProduk()
        ];
        return view('produk/index', $data);
    }

    public function produkTable()
    {
        $list = $this->produkModel->getProdukTable();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $list->nama_produk;
            $row[] = $list->deskripsi_produk;
            $row[] = '<button type="button" class="btn btn-sm btn-warning editProduk" data-bs-toggle="modal" data-bs-target="#editProduk' . $list->id_produk . '">
                        <i class="fa fa-edit"></i> Edit
                      </button>
                      ||
                      <button type="button" class="btn btn-sm btn-danger hapus" onclick=\'javascript: hapus("' . $list->id_produk . '","' . $list->nama_produk . '")\'">
                        <i class="fa fa-trash"></i> Hapus
                      </button>';
            $data[] = $row;
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $output = [
                'data'  => view('produk/create')
            ];
            echo json_encode($output);
        } else {
            exit('Maaf Tidak Ada Halaman Yang Bisa Ditampilkan');
        }
    }

    public function save()
    {
        $this->produkModel->save([
            'nama_produk'       => $this->request->getVar('nama_produk'),
            'deskripsi_produk'  => $this->request->getVar('deskripsi_produk'),
        ]);
        $output = ['sukses' => 'Data Produk Berhasil Disimpan!'];
        echo json_encode($output);
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $output = ['data' => view('produk/edit')];
            echo json_encode($output);
        } else {
            exit('Maaf Tidak Ada Halaman Yang Bisa Ditampilkan');
        }
    }

    public function update($id_produk)
    {
        $sql = [
            'nama_produk'       => $this->request->getVar('nama_produk'),
            'deskripsi_produk'  => $this->request->getVar('deskripsi_produk'),
            'id_produk'         => $id_produk
        ];
        $this->produkModel->save($sql);
        $output = ['sukses' => 'Data Produk Berhasil Diupdate!'];
        echo json_encode($output);
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id_produk = $this->request->getVar('id_produk');
            $this->produkModel->delete($id_produk);

            $output = ['sukses' => 'Data Produk Berhasil Dihapus!'];
            echo json_encode($output);
        }
    }
}
