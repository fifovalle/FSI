<div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Admin</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-admin.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahFotoAdmin" class="form-label">Foto Admin</label>
                        <input type="file" class="form-control" name="Foto_Admin" id="tambahFotoAdmin" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahNamaAdmin" class="form-label">Nama Admin</label>
                        <input type="text" placeholder="Masukan Nama Admin" name="Nama_Admin" class="form-control" id="tambahNamaAdmin" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahEmailAdmin" class="form-label">Email Admin</label>
                        <input type="email" placeholder="Masukan Email Admin" name="Email_Admin" class="form-control" id="tambahEmailAdmin" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJenisKelaminAdmin" class="form-label">Jenis Kelamin</label>
                        <select name="Jenis_Kelamin_Admin" id="tambahJenisKelaminAdmin" class="form-control" autocomplete="off">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tambahKataSandiAdmin" class="form-label">Kata Sandi Admin</label>
                        <div class="position-relative">
                            <input type="password" placeholder="***********" name="Kata_Sandi" class="form-control" id="tambahKataSandiAdmin" autocomplete="off">
                            <i class="toggle-password fas fa-eye-slash position-absolute end-0 top-50 translate-middle cursor-pointer" onclick="toogleKataSandi('tambahKataSandiAdmin')"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tambahKonfirmasiKataSandiAdmin" class="form-label">Konfirmasi Kata Sandi Admin</label>
                        <div class="position-relative">
                            <input type="password" placeholder="***********" name="Konfirmasi_Kata_Sandi" class="form-control" id="tambahKonfirmasiKataSandiAdmin" autocomplete="off">
                            <i class="toggle-password fas fa-eye-slash position-absolute end-0 top-50 translate-middle cursor-pointer" onclick="toogleKataSandi('tambahKonfirmasiKataSandiAdmin')"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pemuat" id="pemuat"></div>
                        <button type="submit" class="btn btn-primary" id="addTombolSimpanAdmin" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>