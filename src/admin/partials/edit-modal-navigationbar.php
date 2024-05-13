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
                        <select name="Kategori" id="suntingKategoriBarNavigasi" class="form-control">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Profil">Profil</option>
                            <option value="SDM">SDM</option>
                            <option value="Akademik">Akademik</option> 
                            <option value="Penelitian">Penelitian</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Peminjaman Mutu">Peminjaman Mutu</option>
                        </select>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanNavbar">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
