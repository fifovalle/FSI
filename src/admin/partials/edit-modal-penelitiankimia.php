<div class="modal fade" id="suntingPenelitianKimia" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Penelitian Kimia S1</h5>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="suntingIDPenelitianKimia" name="ID_Penelitian_Kimia" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingJudulPenelitian" class="form-label">Judul Penelitian</label>
                        <input type="text" placeholder="Masukkan Judul Penelitian" name="Judul_Penelitian" class="form-control" id="suntingJudulPenelitian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingLinkPenelitian" class="form-label">Link Penelitian</label>
                        <input type="link" placeholder="Masukkan Link Penelitian" name="Link_Penelitian" class="form-control" id="suntingLinkPenelitian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingTingkatan" class="form-label">Tingkatan</label>
                        <input type="text" placeholder="Masukkan Tingkatan" name="Tingkatan" class="form-control" id="suntingTingkatan" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJudulJournal" class="form-label">Judul Journal</label>
                        <input type="text" placeholder="Masukkan Judul Journal" name="Judul_Journal" class="form-control" id="suntingJudulJournal" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingLinkJournal" class="form-label">Link Journal</label>
                        <input type="link" placeholder="Masukkan Link Journal" name="Link_Journal" class="form-control" id="suntingLinkJournal" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingCreator" class="form-label">Creator</label>
                        <input type="text" placeholder="Masukkan Creator" name="Creator" class="form-control" id="suntingCreator" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingTahun" class="form-label">Tahun</label>
                        <input type="number" placeholder="Masukkan Tahun" name="Tahun" class="form-control" id="suntingTahun" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="tombolSimpanKimia" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>