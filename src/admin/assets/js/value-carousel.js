$(document).ready(function () {
  $(".buttonCarousel").click(function (e) {
    e.preventDefault();
    let carouselID = $(this).data("id");
    console.log(carouselID);
    $.ajax({
      url: "../config/get-carousel-data.php",
      method: "GET",
      data: {
        carousel_id: carouselID,
      },
      success: function (data) {
        console.log(data);
        let carouselData = JSON.parse(data);
        console.log(carouselData);
        $("#suntingCarouselID").val(carouselData.ID_Carousel);
        $("#suntingJudulCarousel").val(carouselData.Judul);
        $("#suntingDeskripsiCarousel").val(carouselData.Deskripsi);
        $("#suntingCarousel").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanCarousel").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-carousel.php",
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
                ? (window.location.href = "../pages/carousel.php")
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
          $("#suntingCarousel").modal("hide");
        },
      });
    });
  });
});
