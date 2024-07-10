$(document).ready(function () {
  $(".buttonStrukturOrganisasi").click(function (e) {
    e.preventDefault();
    let organisasiID = $(this).data("id");
    console.log(organisasiID);
    $.ajax({
      url: "../config/get-struktur-organisasi-data.php",
      method: "GET",
      data: {
        struktur_organisasi_id: organisasiID,
      },
      success: function (data) {
        console.log(data);
        let organisasiData = JSON.parse(data);
        console.log(organisasiData);
        $("#suntingStrukturOrganisasiID").val(organisasiData.ID_Organisasi);
        $("#suntingNamaAnggotaStruktur").val(
          organisasiData.Nama_Dosen_Organisasi
        );
        $("#suntingJabatanAnggotaStruktur").val(
          organisasiData.Jabatan_Dosen_Organisasi
        );
        $("#suntingKasubagAnggotaStruktur").val(
          organisasiData.Kasubag_Organisasi
        );
        $("#suntingStrukturOrganisasi").modal("show");
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });

  $("#tombolSimpanStrukturOrganisasi").click(function (e) {
    e.preventDefault();

    let formData = new FormData($(this).closest("form")[0]);

    $.ajax({
      url: "../config/edit-struktur-organisasi.php",
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
              ? (window.location.href = "../pages/struktur-organisasi.php")
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
        $("#suntingStrukturOrganisasi").modal("hide");
      },
    });
  });
});
