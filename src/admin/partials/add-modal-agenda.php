<div class="modal fade" id="tambahAgenda" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Agenda</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-agenda.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambahGambarAgenda" class="form-label">Gambar Agenda</label>
                        <input type="file" name="Gambar_Agenda" class="form-control" id="tambahGambarAgenda" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJudulAgenda" class="form-label">Judul Agenda</label>
                        <input type="text" placeholder="Masukan Judul Agenda" name="Judul_Agenda" class="form-control" id="tambahJudulAgenda" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahIsiAgenda" class="form-label">Isi Agenda</label>
                        <textarea id="tambahIsiAgenda" class="form-control" placeholder="Masukan Isi Agenda" style="resize: none;" rows="3" name="Isi_Agenda" autocomplete="off"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>