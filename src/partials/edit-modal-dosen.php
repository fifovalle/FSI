<div class="modal fade" id="suntingDosen" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Dosen</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/">
                    <div class="mb-3">
                        <label for="suntingNIPNID" class="form-label">NIP / NID</label>
                        <input type="number" placeholder="Masukkan NIP / NID" name="NIP_NID" class="form-control" id="suntingNIPNID">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaDosen" class="form-label">Nama Dosen</label>
                        <input type="text" placeholder="Masukkan Nama Dosen" name="Nama_Dosen" class="form-control" id="suntingNamaDosen">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaJabatanDosen" class="form-label">Jabatan Dosen</label>
                        <input type="text" placeholder="Masukkan Jabatan Dosen" name="Jabatan_Dosen" class="form-control" id="suntingNamaJabatanDosen">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>