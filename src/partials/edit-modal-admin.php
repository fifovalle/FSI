<div class="modal fade" id="suntingAdmin" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Data Admin</h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="suntingAdminID" name="ID_Admin" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingNamaAdmin" class="form-label">Nama Admin</label>
                        <input type="text" placeholder="Masukan Nama Admin" name="Nama_Admin" class="form-control" id="suntingNamaAdmin">
                    </div>
                    <div class="mb-3">
                        <label for="suntingEmailAdmin" class="form-label">Email Admin</label>
                        <input type="email" placeholder="Masukan Email Admin" name="Email_Admin" class="form-control" id="suntingEmailAdmin">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJenisKelaminAdmin" class="form-label">Jenis Kelamin</label>
                        <select name="Jenis_Kelamin_Admin" id="suntingJenisKelaminAdmin" class="form-control">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanAdmin">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>