<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambahProduk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content warna-modal">
            <div class="modal-header">
                <h5 class="modal-title warna-chens" id="staticBackdropLabel">Form Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('/produk/save', ['class' => 'formTambahProduk']); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label warna-chens">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= old('nama_produk'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_produk" class="form-label warna-chens">Deskripsi Produk</label>
                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
                <button type="submit" class="btn btn-primary tombolSimpan"><i class="fa fa-paper-plane" onclick="simpan()"></i> Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formTambahProduk').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function(e) {
                    $('.tombolSimpan').prop('disabled', true)
                    $('.tombolSimpan').html('<i class="fa fa-spin fa-spinner"></i>')
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
</script>