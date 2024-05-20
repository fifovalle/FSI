$(document).ready(function () {
  $(".buttonSistemInformasi").click(function (e) {
    e.preventDefault();
    let sistemInformasiID = $(this).data("id");
    console.log(sistemInformasiID);
    $.ajax({
      url: "../config/get-sistem-informasi-data.php",
      method: "GET",
      data: {
        sistem_informasi_id: sistemInformasiID,
      },
      success: function (data) {
        console.log(data);
        let sistemInformasiData = JSON.parse(data);
        console.log(sistemInformasiData);
        $("#suntingIDPenelitianSistemInformasi").val(
          sistemInformasiData.ID_Sistem_Informasi
        );
        $("#suntingJudulPenelitian").val(sistemInformasiData.Judul_Penelitian);
        $("#suntingLinkPenelitian").val(sistemInformasiData.Tautan_Penelitian);
        $("#suntingTingkatan").val(sistemInformasiData.Tingkatan);
        $("#suntingJudulJournal").val(sistemInformasiData.Judul_Jurnal);
        $("#suntingLinkJournal").val(sistemInformasiData.Tautan_Jurnal);
        $("#suntingCreator").val(sistemInformasiData.Pencipta);
        $("#suntingTahun").val(sistemInformasiData.Tahun);
        $("#suntingPenelitianSistemInformasi").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanSistemInformasi").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-sistem-informasi.php",
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
                    "../pages/penelitian-sisteminformasi.php")
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
          $("#suntingPenelitianSistemInformasi").modal("hide");
        },
      });
    });
  });
});
