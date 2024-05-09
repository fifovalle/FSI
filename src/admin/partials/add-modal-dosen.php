<div class="modal fade" id="tambahDosen" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Dosen</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-dosen.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahNIPNID" class="form-label">NIP / NID</label>
                        <input type="number" placeholder="Masukkan NIP / NID" name="NIP_NID_Dosen" class="form-control" id="tambahNIPNID" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaDosen" class="form-label">Nama Dosen</label>
                        <input type="text" placeholder="Masukkan Nama Dosen" name="Nama_Dosen" class="form-control" id="tambahNamaDosen" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaJabatanDosen" class="form-label">Jabatan Dosen</label>
                        <input type="text" placeholder="Masukkan Jabatan Dosen" name="Jabatan_Dosen" class="form-control" id="tambahNamaJabatanDosen" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>