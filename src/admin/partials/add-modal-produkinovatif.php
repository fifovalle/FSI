<div class="modal fade" id="tambahProdukInovatif" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Produk Inovatif</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="../config/add-produk-inovatif.php">
                    <div class="mb-3">
                        <label for="tambahJudulInovasi" class="form-label">Judul Inovasi</label>
                        <input type="text" placeholder="Masukkan Judul Inovasi" name="Judul_Inovasi" class="form-control" id="tambahJudulInovasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="tambahLinkInovasi" class="form-label">Link Inovasi</label>
                        <input type="text" placeholder="Masukkan Link Inovasi" name="Link_Inovasi" class="form-control" id="tambahLinkInovasi" autocomplete="off">
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