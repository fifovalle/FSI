<div class="modal fade" id="tambahCarousel" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Carousel</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-carousel.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarCarousel" class="form-label">Gambar Carousel</label>
                        <input type="file" class="form-control" name="Gambar" id="tambahGambarCarousel" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJudulCarousel" class="form-label">Judul Carousel</label>
                        <input type="text" placeholder="Masukan Judul Carousel" name="Judul" class="form-control" id="tambahJudulCarousel" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahDeskripsiCarousel" class="form-label">Deskripsi Carousel</label>
                        <textarea id="tambahDeskripsiCarousel" class="form-control" placeholder="Masukan Deskripsi Carousel" style="resize: none;" rows="3" name="Deskripsi" autocomplete="off"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>