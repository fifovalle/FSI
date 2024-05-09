<div class="modal fade" id="suntingCarousel" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Data Carousel</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingCarouselID" name="ID_Carousel" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarCarousel" class="form-label">Gambar Carousel</label>
                        <input type="file" class="form-control" name="Gambar" id="suntingGambarCarousel" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJudulCarousel" class="form-label">Judul Carousel</label>
                        <input type="text" placeholder="Masukan Judul Carousel" name="Judul" class="form-control" id="suntingJudulCarousel" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingDeskripsiCarousel" class="form-label">Deskripsi Carousel</label>
                        <textarea id="suntingDeskripsiCarousel" class="form-control" placeholder="Masukan Deskripsi Carousel" name="Deskripsi" style="resize: none;" rows="3" autocomplete="off"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanCarousel">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>