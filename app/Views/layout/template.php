<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/sweetAlert2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/style.css">

    <script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
    <script src="<?= base_url(); ?>/public/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/sweetalert2.all.min.js"></script>

    <title><?= $title; ?></title>
</head>

<body>

    <!-- Topbar / Navbar -->
    <?= $this->include('layout/topbar'); ?>


    <!-- Page Content -->
    <div class="container mt-3 mb-5">
        <?= $this->renderSection('content'); ?>
    </div>

    <!-- footer -->
    <?= $this->include('layout/footer'); ?>
</body>

<script src="<?= base_url(); ?>/public/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/jquery.mask.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/sum.js"></script>
<script src="<?= base_url(); ?>/public/assets/fontawesome-free/js/all.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/fontawesome-free/js/fontawesome.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/jquery.maskMoney.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/js/my.js"></script>

</html>