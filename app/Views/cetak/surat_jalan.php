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

    <title>Print Surat Jalan</title>
</head>

<body>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <img src="<?= base_url(); ?>/public/assets/img/chens-logo-lagih-ajah.png" width="100%">
                </div>
                <div class="col-md-4 fs-4 mt-4">
                    <p>Sukabumi, <?= date('d-M-Y'); ?></p>
                    <span>Kepada Yth :</span>
                    <p><?= $pesanan[0]->tujuan; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="border-top:black solid 1px; border-bottom:black solid 1px;">
                        <h2 class="align-middle">&nbsp SURAT JALAN</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered fs-2 text-center" style="border:black solid 1px ;">
                        <thead>
                            <tr>
                                <th>Banyaknya</th>
                                <th>Uraian</th>
                                <th>Ucapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $pesanan[0]->jumlah; ?></td>
                                <td><?= $pesanan[0]->nama_produk; ?></td>
                                <td><?= $pesanan[0]->ucapan; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <h4>Yang Menerima,</h4>
                    <br><br><br>
                    <p>_______________________________</p>
                </div>
                <div class="col-md-6 text-center">
                    <h4>Hormat Kami,</h4>
                    <br><br><br>
                    <p>_______________________________</p>
                </div>
            </div>
        </div>
        <div class=" noprint mt-3">
            <button class="btn btn-success mx-3" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            <a href="<?= base_url('/pesanan/detail/' . $pesanan[0]->id); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Batal</a>
        </div>

</body>

</html>