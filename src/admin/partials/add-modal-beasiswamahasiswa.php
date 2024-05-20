<div class="modal fade" id="tambahBeasiswaMahasiswa" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Beasiswa Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-beasiswa-mahasiswa.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarBeasiswa" class="form-label">Gambar Beasiswa</label>
                        <input type="file" placeholder="Masukkan Gambar Beasiswa" name="Gambar" class="form-control" id="tambahGambarBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaPenerima" class="form-label">Nama Penerima</label>
                        <input type="text" placeholder="Masukkan Nama Penerima" name="Nama_Penerima" class="form-control" id="tambahNamaPenerima" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaBeasiswa" class="form-label">Nama Beasiswa</label>
                        <input type="link" placeholder="Masukkan Nama Beasiswa" name="Nama_Beasiswa" class="form-control" id="tambahNamaBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahDurasiBeasiswa" class="form-label">Durasi Beasiswa</label>
                        <input type="text" placeholder="Masukkan DurasiBeasiswa" name="Durasi_Beasiswa" class="form-control" id="tambahDurasiBeasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahInstagram" class="form-label">Link Instagram Beasiswa</label>
                        <input type="link" placeholder="Masukkan Link Instagram" name="Link_Instagram" class="form-control" id="tambahInstagram" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahWebsite" class="form-label">Link Website Beasiswa</label>
                        <input type="link" placeholder="Masukkan Link Website" name="Link_Website" class="form-control" id="tambahWebsite" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>