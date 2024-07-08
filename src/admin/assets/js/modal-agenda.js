$(document).ready(function () {
  $(".buttonModalAgenda").click(function (e) {
    e.preventDefault();
    let agendaID = $(this).data("id");
    console.log(agendaID);
    $.ajax({
      url: "../../src/admin/config/get-agenda-data.php",
      method: "GET",
      data: {
        agenda_id: agendaID,
      },
      success: function (data) {
        console.log(data);
        let agendaData = JSON.parse(data);
        console.log(agendaData);
        $("#judulAgenda").text(agendaData.Judul_Agenda);
        $("#fotoAgenda").attr("src", "../uploads/" + agendaData.Gambar_Agenda);
        $("#isiAgenda").text(agendaData.Isi_Agenda);
        $("#agendaModal").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });
});
