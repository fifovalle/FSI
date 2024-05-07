<div class="modal fade" id="suntingStaff" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Staff</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/">
                    <div class="mb-3">
                        <label for="suntingNIPNID" class="form-label">NIP / NID</label>
                        <input type="number" placeholder="Masukkan NIP / NID" name="NIP_NID" class="form-control" id="suntingNIPNID">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaStaff" class="form-label">Nama Staff</label>
                        <input type="text" placeholder="Masukkan Nama Staff" name="Nama_Staff" class="form-control" id="suntingNamaStaff">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaJabatanStaff" class="form-label">Jabatan Staff</label>
                        <input type="text" placeholder="Masukkan Jabatan Staff" name="Jabatan_Staff" class="form-control" id="suntingNamaJabatanStaff">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>