document
  .getElementById("togglePassword")
  .addEventListener("click", function (e) {
    const password = document.querySelector('input[name="Reset_Kata_Sandi"]');
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    this.classList.toggle("bx-show");
    this.classList.toggle("bx-hide");
  });

document
  .getElementById("togglePassword2")
  .addEventListener("click", function (e) {
    const password = document.querySelector('input[name="Konfirmasi_Reset"]');
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    this.classList.toggle("bx-show");
    this.classList.toggle("bx-hide");
  });
