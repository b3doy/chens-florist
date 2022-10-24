<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="row warna-chens">
    <div class="col">
        <div class="row">
            <div class="col-md-9">
                <h2>Data Detail Pesanan</h2>
            </div>
            <div class="col-md-2">
                <a href="<?= base_url('/pesanan'); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Kembali</a>
            </div>
        </div>
        <div class="card" style="width: 62rem; color:black">
            <div class="card-body">
                <table class="table table-borderless ms-5 fs-5">
                    <tr>
                        <td>Dari</td>
                        <td>:</td>
                        <th><?= $pesanan[0]->nama_konsumen; ?></th>
                    </tr>
                    <tr>
                        <td>Produk</td>
                        <td>:</td>
                        <th><?= $pesanan[0]->nama_produk; ?></th>
                    </tr>
                    <tr>
                        <td>Ucapan</td>
                        <td>:</td>
                        <th><?= $pesanan[0]->ucapan; ?></th>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>:</td>
                        <th><?= $pesanan[0]->tujuan; ?></th>
                    </tr>
                    <tr>
                        <td>Banyaknya</td>
                        <td>:</td>
                        <th><?= $pesanan[0]->jumlah; ?></th>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <th><?= $konverter->rupiah($pesanan[0]->harga); ?></th>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td>:</td>
                        <th><?= $konverter->rupiah($pesanan[0]->total_harga); ?></th>
                    </tr>
                    <tr>
                        <td>Tanggal Pesanan</td>
                        <td>:</td>
                        <th><?= date('d-M-Y', strtotime($pesanan[0]->tanggal)); ?></th>
                    </tr>
                </table>
                <a href="<?= base_url('/cetak/ucapan/' . $pesanan[0]->id); ?>" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print Kartu Ucapan
                </a>
                <a href="<?= base_url('/cetak/suratjalan/' . $pesanan[0]->id); ?>" class="btn btn-info">
                    <i class="fa fa-print"></i> Print Surat Jalan
                </a>
                <a href="<?= base_url('/cetak/kwitansi/' . $pesanan[0]->id); ?>" class="btn btn-success">
                    <i class="fa fa-print"></i> Print Kwitansi
                </a>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>