document.getElementById("upload").addEventListener("change", function () {
  var file = this.files[0];
  var reader = new FileReader();
  reader.onload = function (e) {
    document.getElementById("uploadedAvatar").src = e.target.result;
  };
  reader.readAsDataURL(file);
});
