function konfirmasiHapusCarousel(id) {
  swal({
    title: "Yakin Menghapus Carousel?",
    text: "Carousel yang dihapus tidak dapat dipulihkan!",
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
      window.location.href = "../config/delete-carousel.php?id=" + id;
    }
  });
}
