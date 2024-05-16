<div class="modal fade" id="suntingPengumuman" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Pengumuman</h5>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" id="suntingPengumumanID" name="ID_Pengumuman" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarPengumuman" class="form-label">Gambar Pengumuman</label>
                        <input type="file" name="Foto_Pengumuman" class="form-control" id="suntingGambarPengumuman" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJudulPengumuman" class="form-label">Judul Pengumuman</label>
                        <input type="text" placeholder="Masukan Judul Pengumuman" name="Judul_Pengumuman" class="form-control" id="suntingJudulPengumuman" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingIsiPengumuman" class="form-label">Isi Pengumuman</label>
                        <textarea id="suntingIsiPengumuman" class="form-control" placeholder="Masukan Isi Pengumuman" style="resize: none;" rows="3" name="Isi_Pengumuman" autocomplete="off"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="tombolSimpanPengumuman"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>