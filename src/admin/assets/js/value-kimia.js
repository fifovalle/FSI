$(document).ready(function () {
  $(".buttonKimia").click(function (e) {
    e.preventDefault();
    let kimiaID = $(this).data("id");
    console.log(kimiaID);
    $.ajax({
      url: "../config/get-kimia-data.php",
      method: "GET",
      data: {
        kimia_id: kimiaID,
      },
      success: function (data) {
        console.log(data);
        let kimiaData = JSON.parse(data);
        console.log(kimiaData);
        $("#suntingIDPenelitianKimia").val(kimiaData.ID_Penelitian_Kimia);
        $("#suntingJudulPenelitian").val(kimiaData.Judul_Penelitian);
        $("#suntingLinkPenelitian").val(kimiaData.Tautan_Penelitian);
        $("#suntingTingkatan").val(kimiaData.Tingkatan);
        $("#suntingJudulJournal").val(kimiaData.Judul_Jurnal);
        $("#suntingLinkJournal").val(kimiaData.Tautan_Jurnal);
        $("#suntingCreator").val(kimiaData.Pencipta);
        $("#suntingTahun").val(kimiaData.Tahun);
        $("#suntingPenelitianKimia").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanKimia").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-kimia.php",
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
                ? (window.location.href = "../pages/penelitian-kimia.php")
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
          $("#suntingPenelitianKimia").modal("hide");
        },
      });
    });
  });
});
