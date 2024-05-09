<div class="modal fade" id="suntingStaff" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Staff</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingStaffID" name="ID_Staff" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingNIPNIDStaff" class="form-label">NIP / NID</label>
                        <input type="number" placeholder="Masukkan NIP / NID" name="NIP_NID_Staff" class="form-control" id="suntingNIPNIDStaff" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaStaff" class="form-label">Nama Staff</label>
                        <input type="text" placeholder="Masukkan Nama Staff" name="Nama_Staff" class="form-control" id="suntingNamaStaff" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaJabatanStaff" class="form-label">Jabatan Staff</label>
                        <input type="text" placeholder="Masukkan Jabatan Staff" name="Jabatan_Staff" class="form-control" id="suntingNamaJabatanStaff" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanStaff">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>