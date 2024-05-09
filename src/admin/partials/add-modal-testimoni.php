<div class="modal fade" id="tambahTestimoni" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Testimoni</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-testimoni.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahFotoMahasiswa" class="form-label">Foto Mahasiswa</label>
                        <input type="file" name="Foto_Mahasiswa" class="form-control" id="tambahFotoMahasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaMahasiswa" class="form-label">Nama Mahasiswa</label>
                        <input type="text" placeholder="Masukan Nama Mahasiswa" name="Nama_Mahasiswa" class="form-control" id="tambahNamaMahasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahKesanMahasiswa" class="form-label">Kesan Mahasiswa</label>
                        <textarea id="tambahKesanMahasiswa" class="form-control" placeholder="Masukan Kesan Mahasiswa" style="resize: none;" rows="3" name="Kesan_Mahasiswa" autocomplete="off"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tambahTsanggalTestimoni" class="form-label">Tanggal Testimoni</label>
                        <input type="date" name="Tanggal_Testimoni" class="form-control" id="tambahTsanggalTestimoni" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>