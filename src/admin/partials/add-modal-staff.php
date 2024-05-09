<div class="modal fade" id="tambahStaff" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Staff</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-staff.php">
                    <div class="mb-3">
                        <label for="tambahNIPNID" class="form-label">NIP / NID</label>
                        <input type="number" placeholder="Masukkan NIP / NID" name="NIP_NID_Staff" class="form-control" id="tambahNIPNID" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaStaff" class="form-label">Nama Staff</label>
                        <input type="text" placeholder="Masukkan Nama Staff" name="Nama_Staff" class="form-control" id="tambahNamaStaff" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaJabatanStaff" class="form-label">Jabatan Staff</label>
                        <input type="text" placeholder="Masukkan Jabatan Staff" name="Jabatan_Staff" class="form-control" id="tambahNamaJabatanStaff" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>