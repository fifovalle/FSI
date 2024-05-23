<div class="modal fade" id="suntingProgramStudi" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Program Studi</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingProgramStudiID" name="ID_Prodi" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarStudi" class="form-label">Gambar Program Studi</label>
                        <input type="file" name="Gambar_Prodi" class="form-control" id="suntingGambarStudi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingNamaProgramStudi" class="form-label">Program Studi</label>
                        <input type="text" placeholder="Masukkan Nama Program Studi" name="Nama_Prodi" class="form-control" id="suntingNamaProgramStudi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingTautanProgramStudi" class="form-label">Tautan Program Studi</label>
                        <input type="text" placeholder="Masukkan Tautan Program Studi" name="Tautan_Prodi" class="form-control" id="suntingTautanProgramStudi" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanProgramStudi">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>