function konfirmasiHapusNavbar(id) {
  swal({
    title: "Yakin Menghapus Navbar?",
    text: "Navbar yang dihapus tidak dapat dipulihkan!",
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
      window.location.href = "../config/delete-navigationbar.php?id=" + id;
    }
  });
}
