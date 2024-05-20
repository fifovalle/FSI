function konfirmasiHapusSistemInformasi(id) {
  swal({
    title: "Yakin Menghapus data Sistem Informasi?",
    text: "Data Sistem Informasi yang dihapus tidak dapat dipulihkan!",
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
      window.location.href = "../config/delete-sistem-informasi.php?id=" + id;
    }
  });
}
