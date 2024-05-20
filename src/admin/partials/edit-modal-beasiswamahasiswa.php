<div class="modal fade" id="suntingBeasiswaMahasiswa" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Beasiswa Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="suntingIDBeasiswaMahasiswa" name="ID_Beasiswa" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarBeasiswa" class="form-label">Gambar Beasiswa</label>
                        <input type="file" placeholder="Masukkan Gambar Beasiswa" name="Gambar_Beasiswa" class="form-control" id="suntingGambarBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaPenerima" class="form-label">Nama Penerima</label>
                        <input type="text" placeholder="Masukkan Nama Penerima" name="Nama_Penerima" class="form-control" id="suntingNamaPenerima" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaBeasiswa" class="form-label">Nama Beasiswa</label>
                        <input type="link" placeholder="Masukkan Nama Beasiswa" name="Nama_Beasiswa" class="form-control" id="suntingNamaBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingDurasiBeasiswa" class="form-label">Durasi Beasiswa</label>
                        <input type="text" placeholder="Masukkan DurasiBeasiswa" name="Durasi_Beasiswa" class="form-control" id="suntingDurasiBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingInstagram" class="form-label">Link Instagram Beasiswa</label>
                        <input type="link" placeholder="Masukkan Link Instagram" name="Instagram" class="form-control" id="suntingInstagram" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingWebsite" class="form-label">Link Website Beasiswa</label>
                        <input type="link" placeholder="Masukkan Link Website" name="Website" class="form-control" id="suntingWebsite" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="tombolSimpanBeasiswa" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>