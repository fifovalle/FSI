$(document).ready(function () {
  $(".buttonInformatika").click(function (e) {
    e.preventDefault();
    let InformatikaID = $(this).data("id");
    console.log(InformatikaID);
    $.ajax({
      url: "../config/get-informatika-data.php",
      method: "GET",
      data: {
        informatika_id: InformatikaID,
      },
      success: function (data) {
        console.log(data);
        let informatikaData = JSON.parse(data);
        console.log(informatikaData);
        $("#suntingIDPenelitianTeknikInformatika").val(
          informatikaData.ID_Penelitian_If
        );
        $("#suntingJudulPenelitian").val(informatikaData.Judul_Penelitian);
        $("#suntingLinkPenelitian").val(informatikaData.Link_Penelitian);
        $("#suntingTingkatan").val(informatikaData.Tingkatan);
        $("#suntingJudulJournal").val(informatikaData.Judul_Jurnal);
        $("#suntingLinkJournal").val(informatikaData.Link_Jurnal);
        $("#suntingCreator").val(informatikaData.Pencipta);
        $("#suntingTahun").val(informatikaData.Tahun);
        $("#suntingPenelitianTeknikInformatika").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanInformatika").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-informatika.php",
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
                ? (window.location.href =
                    "../pages/penelitian-teknikinformatika.php")
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
          $("#suntingPenelitianTeknikInformatika").modal("hide");
        },
      });
    });
  });
});
