<div class="modal fade" id="suntingAgenda" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Agenda</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="suntingAgendaID" name="ID_Agenda" autocomplete="off">
                    <div class="mb-3">
                        <label for="suntingGambarAgenda" class="form-label">Gambar Agenda</label>
                        <input type="file" name="Gambar_Agenda" class="form-control" id="suntingGambarAgenda" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJudulAgenda" class="form-label">Judul Agenda</label>
                        <input type="text" placeholder="Masukan Judul Agenda" name="Judul_Agenda" class="form-control" id="suntingJudulAgenda" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingIsiAgenda" class="form-label">Isi Agenda</label>
                        <textarea id="suntingIsiAgenda" class="form-control" placeholder="Masukan Isi Agenda" style="resize: none;" rows="3" name="Isi_Agenda" autocomplete="off"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="Simpan" id="tombolSimpanAgenda"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>