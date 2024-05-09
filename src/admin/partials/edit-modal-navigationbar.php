<div class="modal fade" id="suntingNavbar" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Data Bar Navigasi</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingNavbarID" name="ID_Navbar" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingNamaBarNavigasi" class="form-label">Nama Bar Navigasi</label>
                        <input type="text" placeholder="Masukan Nama Bar Navigasi" name="Daftar_Nama" class="form-control" id="suntingNamaBarNavigasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingTautanBarNavigasi" class="form-label">Tautan Bar Navigasi</label>
                        <input type="link" placeholder="Masukan Tautan Bar Navigasi" name="Tautan" class="form-control" id="suntingTautanBarNavigasi" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="Simpan" id="tombolSimpanNavbar">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>