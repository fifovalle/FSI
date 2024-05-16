$(document).ready(function () {
  $(".buttonAgenda").click(function (e) {
    e.preventDefault();
    let agendaID = $(this).data("id");
    console.log(agendaID);
    $.ajax({
      url: "../config/get-agenda-data.php",
      method: "GET",
      data: {
        agenda_id: agendaID,
      },
      success: function (data) {
        console.log(data);
        let agendaData = JSON.parse(data);
        console.log(agendaData);
        $("#suntingAgendaID").val(agendaData.ID_Agenda);
        $("#suntingJudulAgenda").val(agendaData.Judul_Agenda);
        $("#suntingIsiAgenda").val(agendaData.Isi_Agenda);
        $("#suntingAgenda").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanAgenda").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-agenda.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function (xhr) {
          console.log("Mengirim data ke server:", formData);
        },
        success: function (response) {
          console.log("Respon dari server:", response);
          let responseData = JSON.parse(response);
          if (responseData.success) {
            Swal.fire({
              icon: "success",
              title: "Sukses!",
              text: responseData.message,
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
            }).then((result) => {
              result.dismiss === Swal.DismissReason.timer
                ? (window.location.href = "../pages/agenda.php")
                : null;
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Gagal!",
              text: responseData.message,
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
            });
          }
        },
        error: function (xhr) {
          console.error(xhr.responseText);
          Swal.fire({
            icon: "error",
            title: "Error!",
            text: "Terjadi kesalahan saat mengirim permintaan.",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
          });
        },
        complete: function () {
          $("#suntingAgenda").modal("hide");
        },
      });
    });
  });
});
