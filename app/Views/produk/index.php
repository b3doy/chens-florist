<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="row text-light">
    <div class="col">
        <h2 class="warna-chens">Daftar Produk Chen's Florist</h2>
        <div class="row">
            <div class="col">
                <!-- Modal Trigger -->
                <button type="button" class="btn btn-primary my-3 tambahProduk">
                    <i class=" fa fa-plus-circle"></i> Tambah Data
                </button>
            </div>
        </div>
        <table class="table table-hover mt-3 warna-chens" id="produkTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi Produk</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<div class="viewModal" style="display:none;"></div>

<!-- Modal Edit Produk -->
<?php foreach ($produk as $produk) : ?>
    <div class="modal fade" id="editProduk<?= $produk['id_produk']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content warna-modal">
                <div class="modal-header">
                    <h5 class="modal-title warna-chens" id="staticBackdropLabel">Form Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('/produk/update/' . $produk['id_produk'], ['class' => 'formUpdateProduk']); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label warna-chens">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_produk" class="form-label warna-chens">Deskripsi Produk</label>
                        <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control"><?= $produk['deskripsi_produk']; ?></textarea>
                    </div>
                    <input type="hidden" id="id_produk" name="id_produk" value="<?= $produk['id_produk']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
                    <button type="submit" class="btn btn-primary tombolUpdate"><i class="fa fa-paper-plane" onclick="simpan()"></i> Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    table = $('#produkTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/produk/produkTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
        }]
    });

    $(document).ready(function() {
        //  Menampilkan Modal Untuk Tambah Data
        $('.tambahProduk').click(function(e) {
            e.preventDefault()

            $.ajax({
                url: "<?= base_url('produk/create'); ?>",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.viewModal').html(response.data).show()
                        $('#tambahProduk').on('shown.bs.modal', function(event) {
                            $('#nama_produk').focus()
                        })
                        $('#tambahProduk').modal('show')
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        })
    });


    // Update Data Setelah Di Edit
    $(document).ready(function() {
        $('.formUpdateProduk').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function(e) {
                    $('.tombolUpdate').prop('disable', true)
                    $('.tombolUpdate').html('<i class= fa fa-spin fa-spinner></i>')
                },
                success: function(response) {
                    if (response.sukses) {
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
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        })
    });


    // Mengirim Hapus Data Ke Controller
    function hapus(id_produk, nama_produk) {
        Swal.fire({
            title: 'Hapus Data Produk?',
            html: `Apakah Anda Yakin Akan Menghapus Produk <strong>${nama_produk}</strong> Ini?`,
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
                    url: "<?= base_url('/produk/delete'); ?>",
                    data: {
                        id_produk: id_produk
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