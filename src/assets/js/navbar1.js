document.addEventListener("DOMContentLoaded", function() {
    // Menangkap elemen link "Pengabdian Kepada Masyarakat"
    var pengabdianLink = document.querySelector("#pengabdian");

    // Menambahkan event listener untuk saat link diklik
    pengabdianLink.addEventListener("click", function() {
        // Mengubah kelas elemen dengan ID "penelitian" menjadi "menu-active"
        document.querySelector("#penelitian").classList.remove("menu-active");

        // Menambahkan kelas "active" pada dropdown item dengan ID "pengabdian"
        document.querySelector("#pengabdian").parentNode.classList.add("active");

        // Mengubah warna teks menjadi ungu
        pengabdianLink.style.color = "purple";
    });
});
