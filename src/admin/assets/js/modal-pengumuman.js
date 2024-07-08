$(document).ready(function () {
  $(".buttonModalPengumuman").click(function (e) {
    e.preventDefault();
    let pengumumanID = $(this).data("id");
    console.log(pengumumanID);
    $.ajax({
      url: "../../src/admin/config/get-announcement-data.php",
      method: "GET",
      data: {
        pengumuman_id: pengumumanID,
      },
      success: function (data) {
        console.log(data);
        let pengumumanData = JSON.parse(data);
        console.log(pengumumanData);
        $("#judulPengumuman").text(pengumumanData.Judul_Pengumuman);
        $("#fotoPengumuman").attr(
          "src",
          "../uploads/" + pengumumanData.Foto_Pengumuman
        );
        $("#isiPengumuman").text(pengumumanData.Isi_Pengumuman);
        $("#pengumumanModal").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });
});
