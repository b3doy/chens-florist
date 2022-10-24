<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\PesananModel;

class Cetak extends BaseController
{
    protected $pesananModel;
    protected $konverter;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->konverter = new Konverter;
    }

    public function ucapan($id)
    {
        $data = [
            'title'     => 'Print Ucapan',
            'pesanan'   => $this->pesananModel->getPesanan($id)
        ];
        return view('cetak/ucapan', $data);
    }

    public function suratjalan($id)
    {
        $data = [
            'title'     => 'Print Surat Jalan',
            'pesanan'   => $this->pesananModel->getPesanan($id)
        ];
        return view('cetak/surat_jalan', $data);
    }

    public function kwitansi($id)
    {
        $data = [
            'title'     => 'Print Surat Jalan',
            'pesanan'   => $this->pesananModel->getPesanan($id),
            'konverter' => $this->konverter
        ];
        return view('cetak/kwitansi', $data);
    }

    public function update($id)
    {
        $this->pesananModel->save([
            'id'                => $id,
            'jenis_pembayaran'  => $this->request->getVar('jenis_pembayaran'),
            'rekening'          => $this->request->getVar('rekening')
        ]);
        return redirect()->to(base_url('/pesanan/detail/' . $id));
    }
}
