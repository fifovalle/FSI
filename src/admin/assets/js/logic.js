document
  .getElementById("tambahKategoriBarNavigasi")
  .addEventListener("change", function () {
    const dokumenAkademikOption = document.getElementById(
      "dokumenAkademikOption"
    );
    const surveyOption = document.getElementById("surveyOption");
    const penelitianOption = document.getElementById("penelitianOption");
    const subKategoriSelect = document.getElementById(
      "tambahSubKategoriBarNavigasi"
    );
    const subKategoriMessage = document.getElementById("subKategoriMessage");

    if (this.value === "") {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.add("d-none");
      subKategoriSelect.value = "";
      penelitianOption.classList.add("d-none");
      subKategoriMessage.classList.remove("d-none");
    } else if (this.value === "Profil") {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.remove("d-none");
      penelitianOption.classList.add("d-none");
      subKategoriSelect.value = "";
      subKategoriMessage.classList.add("d-none");
    } else if (this.value === "Akademik") {
      surveyOption.classList.add("d-none");
      dokumenAkademikOption.classList.remove("d-none");
      subKategoriSelect.value = "";
      subKategoriMessage.classList.add("d-none");
    } else if (this.value === "Penelitian Dan Pengabdian") {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.add("d-none");
      penelitianOption.classList.remove("d-none");
      subKategoriSelect.value = "";
      subKategoriMessage.classList.add("d-none");
    } else {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.add("d-none");
      penelitianOption.classList.add("d-none");
      subKategoriSelect.value = "";
      subKategoriMessage.classList.add("d-none");
    }
  });

document
  .getElementById("suntingKategoriBarNavigasi")
  .addEventListener("change", function () {
    const dokumenAkademikOption = document.getElementById(
      "suntingDokumenAkademikOption"
    );
    const surveyOption = document.getElementById("suntingSurveyOption");
    const penelitianOption = document.getElementById("suntingPenelitianOption");
    const subKategoriSelect = document.getElementById(
      "suntingSubKategoriBarNavigasi"
    );
    const subKategoriMessage = document.getElementById("subKategoriMessage");

    if (this.value === "") {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.add("d-none");
      subKategoriSelect.value = "";
      penelitianOption.classList.add("d-none");
      subKategoriMessage.classList.remove("d-none");
    } else if (this.value === "Profil") {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.remove("d-none");
      subKategoriSelect.value = "";
      penelitianOption.classList.add("d-none");
      subKategoriMessage.classList.add("d-none");
    } else if (this.value === "Akademik") {
      surveyOption.classList.add("d-none");
      dokumenAkademikOption.classList.remove("d-none");
      subKategoriSelect.value = "";
      penelitianOption.classList.add("d-none");
      subKategoriMessage.classList.add("d-none");
    } else if (this.value === "Penelitian Dan Pengabdian") {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.add("d-none");
      penelitianOption.classList.remove("d-none");
      subKategoriSelect.value = "";
      subKategoriMessage.classList.add("d-none");
    } else {
      dokumenAkademikOption.classList.add("d-none");
      surveyOption.classList.add("d-none");
      subKategoriSelect.value = "";
      subKategoriMessage.classList.add("d-none");
    }
  });
