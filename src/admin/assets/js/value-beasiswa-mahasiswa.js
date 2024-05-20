$(document).ready(function () {
  $(".buttonBeasiswaMahasiswa").click(function (e) {
    e.preventDefault();
    let beasiswaID = $(this).data("id");
    console.log(beasiswaID);
    $.ajax({
      url: "../config/get-beasiswa-data.php",
      method: "GET",
      data: {
        beasiswa_id: beasiswaID,
      },
      success: function (data) {
        console.log(data);
        let beasiswaData = JSON.parse(data);
        console.log(beasiswaData);
        $("#suntingIDBeasiswaMahasiswa").val(beasiswaData.ID_Beasiswa);
        $("#suntingNamaPenerima").val(beasiswaData.Nama_Penerima);
        $("#suntingNamaBeasiswa").val(beasiswaData.Nama_Beasiswa);
        $("#suntingDurasiBeasiswa").val(beasiswaData.Durasi_Beasiswa);
        $("#suntingInstagram").val(beasiswaData.Link_Instagram);
        $("#suntingWebsite").val(beasiswaData.Link_Website);
        $("#suntingBeasiswaMahasiswa").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanBeasiswa").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-beasiswa-mahasiswa.php",
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
                ? (window.location.href = "../pages/beasiswa-mahasiswa.php")
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
          $("#suntingBeasiswaMahasiswa").modal("hide");
        },
      });
    });
  });
});
