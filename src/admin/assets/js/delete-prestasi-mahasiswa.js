function konfirmasiHapusPrestasiMahasiswa(id) {
  swal({
    title: "Yakin Menghapus data Prestasi Mahasiswa?",
    text: "Data Prestasi Mahasiswa yang dihapus tidak dapat dipulihkan!",
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
      window.location.href = "../config/delete-prestasi-mahasiswa.php?id=" + id;
    }
  });
}
