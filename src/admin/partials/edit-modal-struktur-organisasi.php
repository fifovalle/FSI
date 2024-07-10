<div class="modal fade" id="suntingStrukturOrganisasi" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Struktur Organisasi</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingStrukturOrganisasiID" name="ID_Organisasi" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarAnggotaStruktur" class="form-label">Gambar Anggota Struktur Organisasi</label>
                        <input type="file" name="Foto_Dosen_Organisasi" class="form-control" id="suntingGambarAnggotaStruktur" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaAnggotaStruktur" class="form-label">Nama Anggota Struktur Organisasi</label>
                        <input type="text" placeholder="Masukkan Nama Anggota Struktur Organisasi" name="Nama_Dosen_Organisasi" class="form-control" id="suntingNamaAnggotaStruktur" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJabatanAnggotaStruktur" class="form-label">Jabatan Anggota Struktur Organisasi</label>
                        <input type="text" placeholder="Masukkan Jabatan Anggota Struktur Organisasi" name="Jabatan_Dosen_Organisasi" class="form-control" id="suntingJabatanAnggotaStruktur" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingKasubagAnggotaStruktur" class="form-label">Kasubag Anggota Struktur Organisasi</label>
                        <select name="Kasubag_Organisasi" id="suntingKasubagAnggotaStruktur" class="form-control" required>
                            <option value="" disabled selected>Pilih Kasubag</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan" id="tombolSimpanStrukturOrganisasi"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>