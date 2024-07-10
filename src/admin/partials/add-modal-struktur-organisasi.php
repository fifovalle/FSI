<div class="modal fade" id="tambahStrukturOrganisasi" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Struktur Organisasi</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-struktur-organisasi.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarAnggotaStruktur" class="form-label">Gambar Anggota Struktur Organisasi</label>
                        <input type="file" name="Foto_Dosen_Organisasi" class="form-control" id="tambahGambarAnggotaStruktur" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaAnggotaStruktur" class="form-label">Nama Anggota Struktur Organisasi</label>
                        <input type="text" placeholder="Masukkan Nama Anggota Struktur Organisasi" name="Nama_Dosen_Organisasi" class="form-control" id="tambahNamaAnggotaStruktur" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJabatanAnggotaStruktur" class="form-label">Jabatan Anggota Struktur Organisasi</label>
                        <input type="text" placeholder="Masukkan Jabatan Anggota Struktur Organisasi" name="Jabatan_Dosen_Organisasi" class="form-control" id="tambahJabatanAnggotaStruktur" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahKasubagAnggotaStruktur" class="form-label">Kasubag Anggota Struktur Organisasi</label>
                        <select name="Kasubag_Organisasi" id="tambahKasubagAnggotaStruktur" class="form-control" required>
                            <option value="" disabled selected>Pilih Kasubag</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>