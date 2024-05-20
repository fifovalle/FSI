function konfirmasiHapusProdukInovatif(id) {
  swal({
    title: "Yakin Menghapus data Produk Inovatif?",
    text: "Data Produk Inovatif yang dihapus tidak dapat dipulihkan!",
    icon: "warning",
    buttons: {
      cancel: {
        text: "Batal",
        value: null,
        visible: true,
        className: "",
        closeModal: true,
      },
      confirm: {
        text: "Ya, Hapus",
        value: true,
        visible: true,
        className: "",
        closeModal: true,
      },
    },
  }).then((confirm) => {
    if (confirm) {
      window.location.href = "../config/delete-produk-inovatif.php?id=" + id;
    }
  });
}
