<div class="modal fade" id="tambahPenelitianTeknikInformatika" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Penelitian Teknik Informatika S1</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-informatika.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahJudulPenelitian" class="form-label">Judul Penelitian</label>
                        <input type="text" placeholder="Masukkan Judul Penelitian" name="Judul_Penelitian" class="form-control" id="tambahJudulPenelitian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahLinkPenelitian" class="form-label">Link Penelitian</label>
                        <input type="link" placeholder="Masukkan Link Penelitian" name="Link_Penelitian" class="form-control" id="tambahLinkPenelitian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahTingkatan" class="form-label">Tingkatan</label>
                        <input type="text" placeholder="Masukkan Tingkatan" name="Tingkatan" class="form-control" id="tambahTingkatan" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJudulJournal" class="form-label">Judul Journal</label>
                        <input type="text" placeholder="Masukkan Judul Journal" name="Judul_Jurnal" class="form-control" id="tambahJudulJournal" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahLinkJournal" class="form-label">Link Journal</label>
                        <input type="link" placeholder="Masukkan Link Journal" name="Link_Jurnal" class="form-control" id="tambahLinkJournal" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahCreator" class="form-label">Creator</label>
                        <input type="text" placeholder="Masukkan Creator" name="Pencipta" class="form-control" id="tambahCreator" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahTahun" class="form-label">Tahun</label>
                        <input type="number" placeholder="Masukkan Tahun" name="Tahun" class="form-control" id="tambahTahun" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>