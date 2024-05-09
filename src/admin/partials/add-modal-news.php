<div class="modal fade" id="tambahBerita" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Berita</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-news.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarBerita" class="form-label">Gambar Berita</label>
                        <input type="file" name="Gambar" class="form-control" id="tambahGambarBerita" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJudulBerita" class="form-label">Judul Berita</label>
                        <input type="text" placeholder="Masukan Judul Berita" name="Judul" class="form-control" id="tambahJudulBerita" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahIsiBerita" class="form-label">Isi Berita</label>
                        <textarea id="tambahIsiBerita" class="form-control" placeholder="Masukan Isi Berita Carousel" style="resize: none;" rows="3" name="Isi_Berita" autocomplete="off"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tambahTanggalTerbitBerita" class="form-label">Tanggal Terbit Berita</label>
                        <input type="date" name="Tanggal_Terbit" class="form-control" id="tambahTanggalTerbitBerita" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>