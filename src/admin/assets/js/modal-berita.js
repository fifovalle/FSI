$(document).ready(function () {
  $(".buttonModalBerita").click(function (e) {
    e.preventDefault();
    let beritaID = $(this).data("id");
    console.log(beritaID);
    $.ajax({
      url: "../../src/admin/config/get-berita-data.php",
      method: "GET",
      data: {
        berita_id: beritaID,
      },
      success: function (data) {
        console.log(data);
        let beritaData = JSON.parse(data);
        console.log(beritaData);
        $("#judulBerita").text(beritaData.Judul);
        $("#fotoBerita").attr("src", "../uploads/" + beritaData.Gambar);
        $("#isiBerita").text(beritaData.Isi_Berita);
        $("#beritaModal").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });
});
