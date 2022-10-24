<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="row warna-chens">
    <div class="col">
        <h2 class="warna-chens">Data Pesanan Chen's Florist</h2>
        <div class="row mb-3">
            <div class="col">
                <a href="<?= base_url('/pesanan/create'); ?>" class="btn btn-primary my-3">
                    <i class="fa fa-plus-circle"></i> Tambah Pesanan
                </a>
            </div>
        </div>
        <table class="table table-hover warna-chens mt-5" id="pesananTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Konsumen</th>
                    <th>Nama Tujuan</th>
                    <th>Nama Produk</th>
                    <!-- <th>Jumlah</th> -->
                    <!-- <th>Harga</th> -->
                    <!-- <th>Total Harga</th> -->
                    <th>#</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script>
    table = $('#pesananTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/pesanan/pesananTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
        }]
    });

    // Hapus Data
    function hapus(id, nama) {
        Swal.fire({
            title: 'Hapus Data Produk?',
            html: `Apakah Anda Yakin Akan Menghapus Pesanan Dari <strong>${nama}</strong> Ini?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('pesanan/delete'); ?>",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        Swal.fire(
                            'Berhasil',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload()
                            }
                        })
                    }
                });
            }
        })
    }
</script>

<?= $this->endSection(); ?>