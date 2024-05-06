const togglePassword = document.getElementById("togglePassword");
const passwordField = document.querySelector('.form-control[type="password"]');

togglePassword.addEventListener("click", function () {
  const type =
    passwordField.getAttribute("type") === "password" ? "text" : "password";
  passwordField.setAttribute("type", type);

  this.classList.toggle("bx-show");
  this.classList.toggle("bx-hide");
});
