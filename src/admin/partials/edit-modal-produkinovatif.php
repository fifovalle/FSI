<div class="modal fade" id="suntingProdukInovatif" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Sunting ProdukInovatif</h5>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="editIDProduk" name="ID_Produk" autocomplete="off">
                    <div class="mb-3">
                        <label for="editJudulInovasi" class="form-label">Judul Inovasi</label>
                        <input type="text" placeholder="Masukkan Judul Inovasi" name="Judul_Inovasi" class="form-control" id="editJudulInovasi" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="editLinkInovasi" class="form-label">Link Inovasi</label>
                        <input type="link" placeholder="Masukkan Link Inovasi" name="Link_Inovasi" class="form-control" id="editLinkInovasi" autocomplete="off">
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
                        <input type="number" placeholder="Masukkan Tahun" name="Tahun" class="form-control" id="editTahun" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="tombolSimpanProduk" name="Simpan"><?php echo htmlspecialchars('Simpan'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>