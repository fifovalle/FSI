<div class="modal fade" id="suntingNavbar" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Data Bar Navigasi</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="formSuntingNavbar">
                    <input type="hidden" id="suntingNavbarID" name="ID_Navbar" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingNamaBarNavigasi" class="form-label">Nama Bar Navigasi</label>
                        <input type="text" placeholder="Masukan Nama Bar Navigasi" name="Daftar_Nama" class="form-control" id="suntingNamaBarNavigasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingTautanBarNavigasi" class="form-label">Tautan Bar Navigasi</label>
                        <input type="link" placeholder="Masukan Tautan Bar Navigasi" name="Tautan" class="form-control" id="suntingTautanBarNavigasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingKategoriBarNavigasi" class="form-label">Kategori</label>
                        <select name="Kategori" id="suntingKategoriBarNavigasi" class="form-control" required>
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
                        <label for="suntingSubKategoriBarNavigasi" class="form-label">Sub Kategori</label>
                        <select name="Sub_Kategori" id="suntingSubKategoriBarNavigasi" class="form-control">
                            <option value="" selected>Pilih Sub Kategori</option>
                            <option value="Survey" id="suntingSurveyOption">Survey</option>
                            <option value="Dokumen Akademik" id="suntingDokumenAkademikOption">Dokumen Akademik</option>
                            <option value="Penelitian" id="suntingPenelitianOption">Penelitian</option>
                        </select>
                        <p id="subKategoriMessage" class="text-danger d-none">Sub Kategori Tidak Tersedia</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanNavbar">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>