<div class="modal fade" id="suntingTestimoni" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">sunting Testimoni</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingTestimoniID" name="ID_Testimoni" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingFotoMahasiswa" class="form-label">Foto Mahasiswa</label>
                        <input type="file" name="Foto_Mahasiswa" class="form-control" id="suntingFotoMahasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaMahasiswa" class="form-label">Nama Mahasiswa</label>
                        <input type="text" placeholder="Masukan Nama Mahasiswa" name="Nama_Mahasiswa" class="form-control" id="suntingNamaMahasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingKesanMahasiswa" class="form-label">Kesan Mahasiswa</label>
                        <textarea id="suntingKesanMahasiswa" class="form-control" placeholder="Masukan Kesan Mahasiswa" style="resize: none;" rows="3" name="Kesan_Mahasiswa"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="suntingTanggalTestimoni" class="form-label">Tanggal Testimoni</label>
                        <input type="date" name="Tanggal_Testimoni" class="form-control" id="suntingTanggalTestimoni" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanTestimoni">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>