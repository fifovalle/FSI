$(document).ready(function () {
  $(".buttonStaff").click(function (e) {
    e.preventDefault();
    let staffID = $(this).data("id");
    console.log(staffID);
    $.ajax({
      url: "../config/get-staff-data.php",
      method: "GET",
      data: {
        staff_id: staffID,
      },
      success: function (data) {
        console.log(data);
        let staffData = JSON.parse(data);
        console.log(staffData);
        $("#suntingStaffID").val(staffData.ID_Staff);
        $("#suntingNIPNIDStaff").val(staffData.NIP_NID_Staff);
        $("#suntingNamaStaff").val(staffData.Nama_Staff);
        $("#suntingNamaJabatanStaff").val(staffData.Jabatan_Staff);
        $("#suntingStaff").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanStaff").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-staff.php",
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
                ? (window.location.href = "../pages/staff.php")
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
          $("#suntingStaff").modal("hide");
        },
      });
    });
  });
});
