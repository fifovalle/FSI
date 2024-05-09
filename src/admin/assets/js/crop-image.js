document.addEventListener("DOMContentLoaded", function () {
  let tambahGambarCarousel = document.getElementById("tambahGambarCarousel");
  let image = document.getElementById("previewImage");
  let cropper;

  tambahGambarCarousel.addEventListener("change", function (e) {
    let files = e.target.files;
    let done = function (url) {
      image.src = url;
      if (cropper) {
        cropper.destroy();
      }
      cropper = new Cropper(image, {
        aspectRatio: 16 / 9,
        viewMode: 2,
        autoCropArea: 1,
        crop: function (e) {
          // Output hasil cropping (opsional)
          console.log(e.detail.x);
          console.log(e.detail.y);
          console.log(e.detail.width);
          console.log(e.detail.height);
        },
      });
    };
    let reader;
    let file;
    let url;

    if (files && files.length > 0) {
      file = files[0];

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
  });
});
