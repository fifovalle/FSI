$(document).ready(function () {
  $(".buttonNavbar").click(function (e) {
    e.preventDefault();
    let navbarID = $(this).data("id");
    console.log(navbarID);
    $.ajax({
      url: "../config/get-navbar-data.php",
      method: "GET",
      data: {
        navbar_id: navbarID,
      },
      success: function (data) {
        console.log(data);
        let navbarData = JSON.parse(data);
        console.log(navbarData);
        $("#suntingNavbarID").val(navbarData.ID_Navbar);
        $("#suntingNamaBarNavigasi").val(navbarData.Daftar_Nama);
        $("#suntingTautanBarNavigasi").val(navbarData.Tautan);
        $("#suntingKategoriBarNavigasi").val(navbarData.Kategori);
        $("#suntingSubKategoriBarNavigasi").val(navbarData.Sub_Kategori);
        $("#suntingNavbar").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanNavbar").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-navbar.php",
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
                ? (window.location.href = "../pages/bar-navigasi.php")
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
          $("#suntingNavbar").modal("hide");
        },
      });
    });
  });
});
