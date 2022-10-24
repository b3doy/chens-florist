<?php
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/style.css">

    <script src="<?= base_url(); ?>/public/assets/js/bootstrap.bundle.min.js"></script>

    <title>Print Kwitansi</title>
</head>

<body>

    <form action="<?= base_url('/cetak/update/' . $pesanan[0]->id); ?>" method="post">
        <div class="card mb-3" style="max-width: 1500px; height: 770px;">
            <div class="row g-0">
                <div class="col">
                    <div class="row" style="border-bottom: 1px solid;">
                        <div class="col-md-8">
                            <img src="<?= base_url(); ?>/public/assets/img/chens-logo-lagih-ajah1.png" class="img-fluid rounded-start logoKwitansi" width="80%;">
                        </div>
                        <div class="col-md-3 mt-5 nav justify-content-end">
                            <h2 class="fw-bold">KWITANSI</h2>
                        </div>
                    </div>
                    <div class="col" style="border-bottom: 1px solid black;">
                        <div class="card-body mt-4">
                            <table class="card-text table-borderless fs-3">
                                <tr>
                                    <td>Telah Terima Dari</td>
                                    <td>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                    <td><?= $pesanan[0]->nama_konsumen; ?></td>
                                </tr>
                                <tr>
                                    <td>Uang Sejumlah</td>
                                    <td>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                    <td class="rp fw-bolder"><?= $konverter->terbilang($pesanan[0]->total_harga); ?> Rupiah</td>
                                </tr>
                                <tr>
                                    <td>Untuk Pembayaran</td>
                                    <td>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                    <td><?= $pesanan[0]->nama_produk; ?></td>
                                </tr>
                            </table>

                            <div class="form-check fs-3">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="jenis_pembayaran" value="Tunai" required>
                                <label class="form-check-label" for="jenis_pembayaran">
                                    Tunai
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-md-3 fs-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_pembayaran" id="jenis_pembayaran" value="Transfer">
                                        <label class="form-check-label" for="jenis_pembayaran">
                                            Transfer
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-9 fs-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rekening" value="BCA KC Sukabumi No. 0384-1155-40 a/n SRIYANTI" required>
                                        <label class="form-check-label">
                                            BCA KC Sukabumi No. 0384-1155-40 a/n SRIYANTI
                                        </label>
                                    </div>
                                    <div class="form-check fs-4">
                                        <input class="form-check-input" type="radio" name="rekening" value="BJB KC Sukabumi No. 0020456612100 a/n SRIYANTI">
                                        <label class="form-check-label">
                                            BJB KC Sukabumi No. 0020456612100 a/n SRIYANTI
                                        </label>
                                    </div>
                                    <div class="form-check fs-4">
                                        <input class="form-check-input" type="radio" name="rekening" value="Bank Mandiri Sukabumi No Rek. 182 002 8888881 a/n SRIYANTI">
                                        <label class="form-check-label">
                                            Bank Mandiri Sukabumi No Rek. 182 002 8888881 a/n SRIYANTI
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $pesanan[0]->id; ?>">
                            <div class="row ms-5 mt-3">
                                <div class="col-md-4">
                                    <h4 class="fw-bolder rp text-center fs-2"><?= $konverter->rupiah($pesanan[0]->total_harga); ?></h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row nav justify_content-end mt-2">
                    <div class="col-md-9">
                        <!--  -->
                    </div>
                    <div class="col-md-3">
                        <h4>Sukabumi, <?= date('d-M-Y'); ?></h4>
                        <br><br><br>
                        <h5>Chen's Florist</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class=" noprint mt-3">
            <button class="btn btn-success mx-3" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            <a href="<?= base_url('/pesanan/detail/' . $pesanan[0]->id); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Batal</a>
        </div>
    </form>
</body>

</html>