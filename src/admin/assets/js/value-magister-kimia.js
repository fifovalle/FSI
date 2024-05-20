$(document).ready(function () {
  $(".buttonMagisterKimia").click(function (e) {
    e.preventDefault();
    let magisterKimiaID = $(this).data("id");
    console.log(magisterKimiaID);
    $.ajax({
      url: "../config/get-magister-kimia-data.php",
      method: "GET",
      data: {
        magister_kimia_id: magisterKimiaID,
      },
      success: function (data) {
        console.log(data);
        let magisterKimiaData = JSON.parse(data);
        console.log(magisterKimiaData);
        $("#suntingIDPenelitianMagisterKimia").val(
          magisterKimiaData.ID_Penelitian_Magister_Kimia
        );
        $("#suntingJudulPenelitian").val(magisterKimiaData.Judul_Penelitian);
        $("#suntingLinkPenelitian").val(magisterKimiaData.Tautan_Penelitian);
        $("#suntingTingkatan").val(magisterKimiaData.Tingkatan);
        $("#suntingJudulJournal").val(magisterKimiaData.Judul_Journal);
        $("#suntingLinkJournal").val(magisterKimiaData.Tautan_Journal);
        $("#suntingCreator").val(magisterKimiaData.Pencipta);
        $("#suntingTahun").val(magisterKimiaData.Tahun);
        $("#suntingPenelitianMagisterKimia").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanMagisterKimia").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-magister-kimia.php",
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
                    "../pages/penelitian-magisterkimia.php")
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
          $("#suntingPenelitianMagisterKimia").modal("hide");
        },
      });
    });
  });
});
