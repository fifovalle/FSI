$(document).ready(function () {
  $(".buttonPengabdianMasyarakat").click(function (e) {
    e.preventDefault();
    let pengabdianID = $(this).data("id");
    console.log(pengabdianID);
    $.ajax({
      url: "../config/get-pengabdian-data.php",
      method: "GET",
      data: {
        pengabdian_id: pengabdianID,
      },
      success: function (data) {
        console.log(data);
        let produkData = JSON.parse(data);
        console.log(produkData);
        $("#suntingIDPengabdian").val(produkData.ID_Pengabdian);
        $("#suntingJudulPengabdian").val(produkData.Judul_Pengabdian);
        $("#suntingLinkPengabdian").val(produkData.Tautan_Pengabdian);
        $("#suntingLeader").val(produkData.Leader);
        $("#suntingJudulEvent").val(produkData.Event);
        $("#suntingPersonil").val(produkData.Personil);
        $("#suntingTahun").val(produkData.Tahun);
        $("#suntingPengabdianMasyarakat").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSuntingPengabdian").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-pengabdian-masyarakat.php",
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
                ? (window.location.href = "../pages/pengabdian-masyarakat.php")
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
          $("#suntingPengabdianMasyarakat").modal("hide");
        },
      });
    });
  });
});
