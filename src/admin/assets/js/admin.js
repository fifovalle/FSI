function toogleKataSandi(idMasukan) {
  let masukan = document.getElementById(idMasukan);
  let ikon = document.querySelector(`#${idMasukan} + .toggle-password`);

  if (masukan.type === "password") {
    masukan.type = "text";
    ikon.classList.remove("fa-eye-slash");
    ikon.classList.add("fa-eye");
  } else {
    masukan.type = "password";
    ikon.classList.remove("fa-eye");
    ikon.classList.add("fa-eye-slash");
  }
}

document
  .getElementById("addTombolSimpanAdmin")
  .addEventListener("click", function () {
    document.getElementById("addTombolSimpanAdmin").style.display = "none";
    document.getElementById("pemuat").style.display = "block";
  });
