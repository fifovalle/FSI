$(document).ready(function () {
  $(".buttonDosen").click(function (e) {
    e.preventDefault();
    let dosenID = $(this).data("id");
    console.log(dosenID);
    $.ajax({
      url: "../config/get-dosen-data.php",
      method: "GET",
      data: {
        dosen_id: dosenID,
      },
      success: function (data) {
        console.log(data);
        let dosenData = JSON.parse(data);
        console.log(dosenData);
        $("#suntingDosenID").val(dosenData.ID_Dosen);
        $("#suntingNIPNID").val(dosenData.NIP_NID_Dosen);
        $("#suntingNamaDosen").val(dosenData.Nama_Dosen);
        $("#suntingNamaJabatanDosen").val(dosenData.Jabatan_Dosen);
        $("#suntingDosen").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanDosen").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-dosen.php",
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
                ? (window.location.href = "../pages/dosen.php")
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
          $("#suntingDosen").modal("hide");
        },
      });
    });
  });
});
