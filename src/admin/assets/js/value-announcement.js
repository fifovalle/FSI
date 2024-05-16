$(document).ready(function () {
  $(".buttonPengumuman").click(function (e) {
    e.preventDefault();
    let pengumuman = $(this).data("id");
    console.log(pengumuman);
    $.ajax({
      url: "../config/get-announcement-data.php",
      method: "GET",
      data: {
        pengumuman_id: pengumuman,
      },
      success: function (data) {
        console.log(data);
        let pengumumanData = JSON.parse(data);
        console.log(pengumuman);
        $("#suntingPengumumanID").val(pengumumanData.ID_Pengumuman);
        $("#suntingJudulPengumuman").val(pengumumanData.Judul_Pengumuman);
        $("#suntingIsiPengumuman").val(pengumumanData.Isi_Pengumuman);
        $("#suntingPengumuman").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanPengumuman").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-announcement.php",
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
                ? (window.location.href = "../pages/announcement.php")
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
          $("#suntingPengumuman").modal("hide");
        },
      });
    });
  });
});
