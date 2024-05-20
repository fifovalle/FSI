<div class="modal fade" id="suntingPengabdianMasyarakat" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting Pengabdian Kepada Masyarakat</h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="ID_Pengabdian" id="suntingIDPengabdian">
                    <div class="mb-3">
                        <label for="suntingJudulPengabdian" class="form-label">Judul Pengabdian</label>
                        <input type="text" placeholder="Masukkan Judul Pengabdian" name="Judul_Pengabdian" class="form-control" id="suntingJudulPengabdian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingLinkPengabdian" class="form-label">Link Pengabdian</label>
                        <input type="link" placeholder="Masukkan Link Pengabdian" name="Link_Pengabdian" class="form-control" id="suntingLinkPengabdian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingLeader" class="form-label">Leader</label>
                        <input type="text" placeholder="Masukkan Leader" name="Leader" class="form-control" id="suntingLeader" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingJudulEvent" class="form-label">Judul Event</label>
                        <input type="text" placeholder="Masukkan Judul Event" name="Judul_Event" class="form-control" id="suntingJudulEvent" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingPersonil" class="form-label">Personil</label>
                        <input type="text" placeholder="Masukkan Personil" name="Personil" class="form-control" id="suntingPersonil" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suntingTahun" class="form-label">Tahun</label>
                        <input type="number" placeholder="Masukkan Tahun" name="Tahun" class="form-control" id="suntingTahun" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="tombolSuntingPengabdian" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>