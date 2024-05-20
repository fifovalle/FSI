<div class="modal fade" id="tambahPengabdianMasyarakat" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Pengabdian Kepada Masyarakat</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-pengabdian-masyarakat.php">
                    <div class="mb-3">
                        <label for="tambahJudulPengabdian" class="form-label">Judul Pengabdian</label>
                        <input type="text" placeholder="Masukkan Judul Pengabdian" name="Judul_Pengabdian" class="form-control" id="tambahJudulPengabdian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahLinkPengabdian" class="form-label">Link Pengabdian</label>
                        <input type="link" placeholder="Masukkan Link Pengabdian" name="Link_Pengabdian" class="form-control" id="tambahLinkPengabdian" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahLeader" class="form-label">Leader</label>
                        <input type="text" placeholder="Masukkan Leader" name="Leader" class="form-control" id="tambahLeader" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahJudulEvent" class="form-label">Judul Event</label>
                        <input type="text" placeholder="Masukkan Judul Event" name="Judul_Event" class="form-control" id="tambahJudulEvent" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahPersonil" class="form-label">Personil</label>
                        <input type="text" placeholder="Masukkan Personil" name="Personil" class="form-control" id="tambahPersonil" autocomplete="off">
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