<div class="modal fade" id="tambahPrestasiMahasiswa" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Prestasi Mahasiswa</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-prestasi-mahasiswa.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarPrestasi" class="form-label">Gambar Prestasi</label>
                        <input type="file" placeholder="Masukkan Gambar Prestasi" name="Gambar" class="form-control" id="tambahGambarPrestasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaMahasiswa" class="form-label">Nama Mahasiswa</label>
                        <input type="text" placeholder="Masukkan Nama Mahasiswa" name="Nama_Mahasiswa" class="form-control" id="tambahNamaMahasiswa" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaKegiatan" class="form-label">Kegiatan</label>
                        <input type="link" placeholder="Masukkan Nama Kegiatan" name="Kegiatan" class="form-control" id="tambahNamaKegiatan" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahPencapaian" class="form-label">Pencapaian</label>
                        <input type="text" placeholder="Masukkan Pencapaian" name="Pencapaian" class="form-control" id="tambahPencapaian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahTahunPencapaian" class="form-label">Tahun Pencapaian</label>
                        <input type="number" placeholder="Masukkan Tahun Pencapaian" name="Tahun_Pencapaian" class="form-control" id="tambahTahunPencapaian" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>