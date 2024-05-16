$(document).ready(function () {
  $(".buttonStudy").click(function (e) {
    e.preventDefault();
    let studyID = $(this).data("id");
    console.log(studyID);
    $.ajax({
      url: "../config/get-study-data.php",
      method: "GET",
      data: {
        study_id: studyID,
      },
      success: function (data) {
        console.log(data);
        let studyData = JSON.parse(data);
        console.log(studyData);
        $("#suntingProgramStudiID").val(studyData.ID_Prodi);
        $("#suntingNamaProgramStudi").val(studyData.Nama_Prodi);
        $("#suntingTautanProgramStudi").val(studyData.Tautan_Prodi);
        $("#suntingProgramStudi").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanProgramStudi").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-study.php",
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
                ? (window.location.href = "../pages/program-studi.php")
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
          $("#suntingProgramStudi").modal("hide");
        },
      });
    });
  });
});
