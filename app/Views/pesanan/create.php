<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>

<div class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-10">
                <h2 class="warna-chens">Form Tambah Pesanan</h2>
            </div>
            <div class="col-md-2">
                <a href="<?= base_url('/pesanan'); ?>" class="btn btn-secondary">
                    <i class="fa fa-undo"></i> Batal
                </a>
            </div>
        </div>
        <?= form_open('/pesanan/save', ['class' => 'formTambahPesanan warna-chens']); ?>
        <div class="mb-3">
            <input type="hidden" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d H:i:s'); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
            <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="<?= old('nama_konsumen'); ?>" required autofocus>
        </div>
        <div class="mb-3">
            <label for="tujuan" class="form-label">Nama Tujuan</label>
            <textarea name="tujuan" id="tujuan" class="form-control"><?= old('tujuan'); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="ucapan" class="form-label">Ucapan</label>
            <textarea name="ucapan" id="ucapan" class="form-control"><?= old('ucapan'); ?></textarea>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="harga" class="form-label">Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control angka6" id="harga" name="harga" value="<?= old('harga'); ?>" onkeyup="hitungHarga()" required>
                </div>
            </div>
            <div class="col-md-5">
                <label for="total_harga" class="form-label">Total Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" class="form-control angka6" id="total_harga" name="total_harga" value="<?= old('total_harga'); ?>" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="produk_id" class="form-label">Nama Produk</label>
            <select name="produk_id" id="produk_id" class="form-control fw-bold text-center">
                <option value="" class="fw-bold"> ----- Silahkan Pilih Produk ----- </option>
                <?php foreach ($produk as $produk) : ?>
                    <option class="fw-bold" value="<?= $produk['id_produk']; ?>"><?= $produk['nama_produk']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btnTambah"><i class="fa fa-paper-plane"></i> Simpan</button>
        <?= form_close(); ?>
    </div>
</div>

<script>
    function hitungHarga() {
        var jumlah = document.getElementById('jumlah').value
        console.log(jumlah)
        var hrg = document.getElementById('harga').value
        var harga = hrg.split(',').join('')
        console.log(hrg)
        var totalHarga = parseInt(jumlah) * parseInt(harga)
        console.log(totalHarga)
        console.log(typeof(totalHarga))
        document.getElementById('total_harga').value = totalHarga
    }

    $(document).ready(function() {
        $('.formTambahPesanan').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function(e) {
                    $('.btnTambah').prop('disabled', true)
                    $('.btnTambah').html('<i class="fa fa-spin fa spinner"></i>')
                },
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire(
                            'Berhasil',
                            response.sukses,
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?= base_url('/pesanan'); ?>"
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
</script>

<?= $this->endSection(); ?>