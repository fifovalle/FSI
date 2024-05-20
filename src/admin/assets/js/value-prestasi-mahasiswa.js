$(document).ready(function () {
  $(".buttonPrestasiMahasiswa").click(function (e) {
    e.preventDefault();
    let prestasiID = $(this).data("id");
    console.log(prestasiID);
    $.ajax({
      url: "../config/get-prestasi-data.php",
      method: "GET",
      data: {
        presstasi_id: prestasiID,
      },
      success: function (data) {
        console.log(data);
        let prestasiData = JSON.parse(data);
        console.log(prestasiData);
        $("#suntingIDPrestasiMahasiswa").val(prestasiData.ID_Prestasi);
        $("#suntingNamaMahasiswa").val(prestasiData.Nama_Mahasiswa);
        $("#suntingNamaKegiatan").val(prestasiData.Kegiatan);
        $("#suntingPencapaian").val(prestasiData.Pencapaian);
        $("#suntingTahunPencapaian").val(prestasiData.Tahun_Pencapaian);
        $("#suntingPrestasiMahasiswa").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $(document).ready(function () {
    $("#tombolSimpanPrestasiMahasiswa").click(function (e) {
      e.preventDefault();

      let formData = new FormData($(this).closest("form")[0]);

      $.ajax({
        url: "../config/edit-prestasi-mahasiswa.php",
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
                ? (window.location.href = "../pages/prestasi-mahasiswa.php")
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
          $("#suntingPrestasiMahasiswa").modal("hide");
        },
      });
    });
  });
});
