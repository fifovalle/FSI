<div class="modal fade" id="tambahProgramStudi" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Program Studi</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-study.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarProdi" class="form-label">Gambar Program Studi</label>
                        <input type="file" name="Gambar_Prodi" class="form-control" id="tambahGambarProdi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaProgramStudi" class="form-label">Program Studi</label>
                        <input type="text" placeholder="Masukkan Nama Program Studi" name="Nama_Prodi" class="form-control" id="tambahNamaProgramStudi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahTautanProgramStudi" class="form-label">Tautan Program Studi</label>
                        <input type="text" placeholder="Masukkan Tautan Program Studi" name="Tautan_Prodi" class="form-control" id="tambahTautanProgramStudi" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>