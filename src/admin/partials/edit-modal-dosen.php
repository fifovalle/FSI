<div class="modal fade" id="suntingDosen" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Dosen</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingDosenID" name="ID_Dosen" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingNIPNID" class="form-label">NIP / NID</label>
                        <input type="number" placeholder="Masukkan NIP / NID" name="NIP_NID_Dosen" class="form-control" id="suntingNIPNID" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaDosen" class="form-label">Nama Dosen</label>
                        <input type="text" placeholder="Masukkan Nama Dosen" name="Nama_Dosen" class="form-control" id="suntingNamaDosen" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaJabatanDosen" class="form-label">Jabatan Dosen</label>
                        <input type="text" placeholder="Masukkan Jabatan Dosen" name="Jabatan_Dosen" class="form-control" id="suntingNamaJabatanDosen" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanDosen">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>