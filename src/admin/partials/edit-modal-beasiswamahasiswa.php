<div class="modal fade" id="suntingBeasiswaMahasiswa" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Beasiswa Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="editGambarBeasiswa" class="form-label">Gambar Beasiswa</label>
                        <input type="file" placeholder="Masukkan Gambar Beasiswa" name="Gambar_Beasiswa" class="form-control" id="editGambarBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editNamaPenerima" class="form-label">Nama Penerima</label>
                        <input type="text" placeholder="Masukkan Nama Penerima" name="Nama_Penerima" class="form-control" id="editNamaPenerima" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editNamaBeasiswa" class="form-label">Nama Beasiswa</label>
                        <input type="link" placeholder="Masukkan Nama Beasiswa" name="Nama_Beasiswa" class="form-control" id="editNamaBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editDurasiBeasiswa" class="form-label">Durasi Beasiswa</label>
                        <input type="text" placeholder="Masukkan DurasiBeasiswa" name="DurasiBeasiswa" class="form-control" id="editDurasiBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editInstagram" class="form-label">Link Instagram Beasiswa</label>
                        <input type="link" placeholder="Masukkan Link Instagram" name="Instagram" class="form-control" id="editInstagram" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editWebsite" class="form-label">Link Website Beasiswa</label>
                        <input type="link" placeholder="Masukkan Link Website" name="Website" class="form-control" id="editWebsite" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>