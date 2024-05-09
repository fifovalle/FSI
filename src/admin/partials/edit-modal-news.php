<div class="modal fade" id="suntingBerita" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Berita</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingBeritaID" name="ID_Berita" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarBerita" class="form-label">Gambar Berita</label>
                        <input type="file" name="Gambar" class="form-control" id="suntingGambarBerita" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJudulBerita" class="form-label">Judul Berita</label>
                        <input type="text" placeholder="Masukan Judul Berita" name="Judul" class="form-control" id="suntingJudulBerita" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingIsiBerita" class="form-label">Isi Berita</label>
                        <textarea id="suntingIsiBerita" class="form-control" placeholder="Masukan Isi Berita Carousel" name="Isi_Berita" style="resize: none;" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="suntingTanggalTerbitBerita" class="form-label">Tanggal Terbit Berita</label>
                        <input type="date" name="Tanggal_Terbit" class="form-control" id="suntingTanggalTerbitBerita" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanBerita">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>