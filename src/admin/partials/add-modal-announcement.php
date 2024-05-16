<div class="modal fade" id="tambahPengumuman" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Pengumuman</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-announcement.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarPengumuman" class="form-label">Gambar Pengumuman</label>
                        <input type="file" name="Foto_Pengumuman" class="form-control" id="tambahGambarPengumuman" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJudulPengumuman" class="form-label">Judul Pengumuman</label>
                        <input type="text" placeholder="Masukan Judul Pengumuman" name="Judul_Pengumuman" class="form-control" id="tambahJudulPengumuman" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahIsiPengumuman" class="form-label">Isi Pengumuman</label>
                        <textarea id="tambahIsiPengumuman" class="form-control" placeholder="Masukan Isi Pengumuman" style="resize: none;" rows="3" name="Isi_Pengumuman" autocomplete="off"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>