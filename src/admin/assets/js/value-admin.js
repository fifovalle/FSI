$(document).ready(function () {
  $(".buttonAdmin").click(function (e) {
    e.preventDefault();
    let adminID = $(this).data("id");
    console.log(adminID);
    $.ajax({
      url: "../config/get-admin-data.php",
      method: "GET",
      data: {
        admin_id: adminID,
      },
      success: function (data) {
        console.log(data);
        let adminData = JSON.parse(data);
        console.log(adminData);
        $("#suntingAdminID").val(adminData.ID_Admin);
        $("#suntingNamaAdmin").val(adminData.Nama_Admin);
        $("#suntingEmailAdmin").val(adminData.Email_Admin);
        $("#suntingJenisKelaminAdmin").val(adminData.Jenis_Kelamin_Admin);
        $("#suntingAdmin").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanAdmin").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-admin.php",
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
                ? (window.location.href = "../pages/admin.php")
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
          $("#suntingAdmin").modal("hide");
        },
      });
    });
  });
});
