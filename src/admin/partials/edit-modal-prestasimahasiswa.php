<div class="modal fade" id="suntingPrestasiMahasiswa" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Prestasi Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="suntingIDPrestasiMahasiswa" name="ID_Prestasi" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarPrestasi" class="form-label">Gambar Prestasi</label>
                        <input type="file" placeholder="Masukkan Gambar Prestasi" name="Gambar_Prestasi" class="form-control" id="suntingGambarPrestasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaMahasiswa" class="form-label">Nama Mahasiswa</label>
                        <input type="text" placeholder="Masukkan Nama Mahasiswa" name="Nama_Mahasiswa" class="form-control" id="suntingNamaMahasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaKegiatan" class="form-label">Kegiatan</label>
                        <input type="link" placeholder="Masukkan Nama Kegiatan" name="Nama_Kegiatan" class="form-control" id="suntingNamaKegiatan" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingPencapaian" class="form-label">Pencapaian</label>
                        <input type="text" placeholder="Masukkan Pencapaian" name="Pencapaian" class="form-control" id="suntingPencapaian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingTahunPencapaian" class="form-label">Tahun Pencapaian</label>
                        <input type="number" placeholder="Masukkan Tahun Pencapaian" name="Tahun_Pencapaian" class="form-control" id="suntingTahunPencapaian" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="tombolSimpanPrestasiMahasiswa" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>