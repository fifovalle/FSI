<div class="modal fade" id="suntingPengabdianMasyarakat" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Pengabdian Kepada Masyarakat</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="editJudulPengabdian" class="form-label">Judul Pengabdian</label>
                        <input type="text" placeholder="Masukkan Judul Pengabdian" name="Judul_Pengabdian" class="form-control" id="editJudulPengabdian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editLinkPengabdian" class="form-label">Link Pengabdian</label>
                        <input type="link" placeholder="Masukkan Link Pengabdian" name="Link_Pengabdian" class="form-control" id="editLinkPengabdian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editLeader" class="form-label">Leader</label>
                        <input type="text" placeholder="Masukkan Leader" name="Leader" class="form-control" id="editLeader" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editJudulEvent" class="form-label">Judul Event</label>
                        <input type="text" placeholder="Masukkan Judul Event" name="Judul_Event" class="form-control" id="editJudulEvent" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editPersonil" class="form-label">Personil</label>
                        <input type="text" placeholder="Masukkan Personil" name="Personil" class="form-control" id="editPersonil" autocomplete="off">
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