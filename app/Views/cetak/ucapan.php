<?php
date_default_timezone_set('Asia/Jakarta');
// echo $this->extend('layout/template');
// echo $this->section('content');
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

    <title>Print Ucapan</title>
</head>

<body>
    <div class="card text-center">
        <div class="card-header">
            <img src="<?= base_url(); ?>/public/assets/img/chens-logo.png" width="100%">
        </div>
        <div class="row ms-2">
            <div class="card-body col-md-9">
                <h1 class="card-title fw-bolder" style="font-size: 7em;"><?= $pesanan[0]->ucapan; ?></h1>
            </div>
            <div class="nav justify-content-end col-md-3">
                <img src="<?= base_url(); ?>/public/assets/img/bunga.png" width="80%">
            </div>
        </div>
    </div>
    <div class=" noprint card-footer mt-3">
        <button class="btn btn-success mx-3" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        <a href="<?= base_url('/pesanan/detail/' . $pesanan[0]->id); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Batal</a>
    </div>
</body>

</html>