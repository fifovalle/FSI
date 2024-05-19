<div class="modal fade" id="suntingPenelitianSistemInformasi" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Penelitian Sistem Informasi S1</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="editJudulPenelitian" class="form-label">Judul Penelitian</label>
                        <input type="text" placeholder="Masukkan Judul Penelitian" name="Judul_Penelitian" class="form-control" id="editJudulPenelitian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editLinkPenelitian" class="form-label">Link Penelitian</label>
                        <input type="link" placeholder="Masukkan Link Penelitian" name="Link_Penlitian" class="form-control" id="editLinkPenelitian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editTingkatan" class="form-label">Tingkatan</label>
                        <input type="text" placeholder="Masukkan Tingkatan" name="Tingkatan" class="form-control" id="editTingkatan" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editJudulJournal" class="form-label">Judul Journal</label>
                        <input type="text" placeholder="Masukkan Judul Journal" name="Judul_Journal" class="form-control" id="editJudulJournal" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editLinkJournal" class="form-label">Link Journal</label>
                        <input type="link" placeholder="Masukkan Link Journal" name="Link_Journal" class="form-control" id="editLinkJournal" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editCreator" class="form-label">Creator</label>
                        <input type="text" placeholder="Masukkan Creator" name="Creator" class="form-control" id="editCreator" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editTahun" class="form-label">Tahun</label>
                        <input type="text" placeholder="Masukkan Tahun" name="Tahun" class="form-control" id="editTahun" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>