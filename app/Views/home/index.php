<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="row">
    <div class="col">
        <h1 class="warna-chens">
            <?php

            date_default_timezone_set("Asia/Jakarta");

            $b = time();
            $hour = date("G", $b);

            if ($hour >= 0 && $hour <= 11) {
                echo "Selamat Pagi, Selamat Datang di ";
            } elseif ($hour >= 12 && $hour <= 14) {
                echo "Selamat Siang, Selamat Datang di ";
            } elseif ($hour >= 15 && $hour <= 17) {
                echo "Selamat Sore, Selamat Datang di ";
            } elseif ($hour >= 17 && $hour <= 18) {
                echo "Selamat Petang, Selamat Datang di ";
            } elseif ($hour >= 19 && $hour <= 23) {
                echo "Selamat Malam, Selamat Datang di ";
            }

            ?>
        </h1>
        <div class="nav justify-content-center">
            <img src="public/assets/img/chens-florist.png">
        </div>
        <h1 class="nav justify-content-end warna-chens"> Admin System</h1>
    </div>
</div>


<?= $this->endSection(); ?>