<div class="modal fade" id="tambahNavbar" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Bar Navigasi</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-navigationbar.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahNamaBarNavigasi" class="form-label">Nama Bar Navigasi</label>
                        <input type="text" placeholder="Masukan Nama Bar Navigasi" name="Daftar_Nama" class="form-control" id="tambahNamaBarNavigasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahTautanBarNavigasi" class="form-label">Tautan Bar Navigasi</label>
                        <input type="link" placeholder="Masukan Tautan Bar Navigasi" name="Tautan" class="form-control" id="tambahTautanBarNavigasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahKategoriBarNavigasi" class="form-label">Kategori</label>
                        <select name="Kategori" id="tambahKategoriBarNavigasi" class="form-control" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Profil">Profil</option>
                            <option value="SDM">SDM</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Penjaminan Mutu">Penjaminan Mutu</option>
                            <option value="Berita Dan Pengumuman">Berita Dan Pengumuman</option>
                            <option value="Penelitian Dan Pengabdian">Penelitian Dan Pengabdian</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Siterpadu">Siterpadu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tambahSubKategoriBarNavigasi" class="form-label">Sub Kategori</label>
                        <select name="Sub_Kategori" id="tambahSubKategoriBarNavigasi" class="form-control">
                            <option value="" selected>Pilih Sub Kategori</option>
                            <option value="Survey" id="surveyOption">Survey</option>
                            <option value="Dokumen Akademik" id="dokumenAkademikOption">Dokumen Akademik</option>
                            <option value="Penelitian" id="penelitianOption">Penelitian</option>
                        </select>
                        <p id="subKategoriMessage" class="text-danger d-none">Sub Kategori Tidak Tersedia</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>