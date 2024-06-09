document.addEventListener("DOMContentLoaded", function () {
  let myCarousel = document.getElementById("carouselExampleCaptions");
  let carousel = new bootstrap.Carousel(myCarousel, {
    interval: 6000,
  });
});

document.addEventListener('DOMContentLoaded', function () {
    const carouselElement = document.querySelector('#carouselExampleCaptions');
    const nextButton = document.getElementById('cnextButton');

    nextButton.addEventListener('click', function () {
        const activeItem = carouselElement.querySelector('.carousel-item.active');
        const nextItem = activeItem.nextElementSibling || carouselElement.querySelector('.carousel-item:first-child');

        activeItem.querySelector('img').classList.add('animate__animated', 'animate__zoomOutLeft');
        nextItem.querySelector('img').classList.add('animate__animated', 'animate__zoomIn');

        setTimeout(() => {
            activeItem.querySelector('img').classList.remove('animate__animated', 'animate__zoomOutLeft');
            nextItem.querySelector('img').classList.remove('animate__animated', 'animate__zoomIn');
        }, 2000);  // Adjust this timeout according to the duration of the animations
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const carouselElement = document.querySelector('#carouselExampleCaptions');
    const nextButton = document.getElementById('cprevButton');

    nextButton.addEventListener('click', function () {
        const activeItem = carouselElement.querySelector('.carousel-item.active');
        const nextItem = activeItem.nextElementSibling || carouselElement.querySelector('.carousel-item:first-child');

        activeItem.querySelector('img').classList.add('animate__animated', 'animate__zoomOutRight');
        nextItem.querySelector('img').classList.add('animate__animated', 'animate__zoomIn');

        setTimeout(() => {
            activeItem.querySelector('img').classList.remove('animate__animated', 'animate__zoomOutRight');
            nextItem.querySelector('img').classList.remove('animate__animated', 'animate__zoomIn');
        }, 2000);  // Adjust this timeout according to the duration of the animations
    });
});

function scrollBeritaTerbaru(entries, observer1) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("animate__animated", "animate__fadeInLeft");
    } else {
      entry.target.classList.remove("animate__animated", "animate__fadeInLeft");
    }
  });
}

const observer1 = new IntersectionObserver(scrollBeritaTerbaru);
const element1 = document.querySelector(".beritaterbaru-animation");
observer1.observe(element1);

function scrollJurusan(entries, observer2) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("animate__animated", "animate__fadeInRight");
    } else {
      entry.target.classList.remove(
        "animate__animated",
        "animate__fadeInRight"
      );
    }
  });
}
const observer2 = new IntersectionObserver(scrollJurusan);
const element2 = document.querySelector(".jurusan-animation");
observer2.observe(element2);

function scrollVisiMisi(entries, observer3) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("animate__animated", "animate__fadeInRight");
    } else {
      entry.target.classList.remove(
        "animate__animated",
        "animate__fadeInRight"
      );
    }
  });
}
const observer3 = new IntersectionObserver(scrollVisiMisi);
const element3 = document.querySelector(".visimisi-animation");
observer3.observe(element3);
function scrollDekan(entries, observer4) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("animate__animated", "animate__fadeInLeft");
    } else {
      entry.target.classList.remove("animate__animated", "animate__fadeInLeft");
    }
  });
}
const observer4 = new IntersectionObserver(scrollDekan);
const element4 = document.querySelector(".dekan-animation");
observer4.observe(element4);

document.getElementById("AgendaButton").addEventListener("click", function () {
  document.getElementById("bg-agenda").classList.add("active");
  document.getElementById("bg-berita").classList.remove("active");
  document.getElementById("bg-pengumuman").classList.remove("active");
  document.getElementById("content-agenda").style.display = "block";
  document.getElementById("content-berita").style.display = "none";
  document.getElementById("content-pengumuman").style.display = "none";
});

document.getElementById("BeritaButton").addEventListener("click", function () {
  document.getElementById("bg-agenda").classList.remove("active");
  document.getElementById("bg-berita").classList.add("active");
  document.getElementById("bg-pengumuman").classList.remove("active");
  document.getElementById("content-agenda").style.display = "none";
  document.getElementById("content-berita").style.display = "block";
  document.getElementById("content-pengumuman").style.display = "none";
});

document
  .getElementById("PengumumanButton")
  .addEventListener("click", function () {
    document.getElementById("bg-agenda").classList.remove("active");
    document.getElementById("bg-berita").classList.remove("active");
    document.getElementById("bg-pengumuman").classList.add("active");
    document.getElementById("content-agenda").style.display = "none";
    document.getElementById("content-berita").style.display = "none";
    document.getElementById("content-pengumuman").style.display = "block";
  });

const prev = document.querySelector("#prev");
const next = document.querySelector("#next");

let carouselVp = document.querySelector("#carousel-vp");

let cCarouselInner = document.querySelector("#cCarousel-inner");
let carouselInnerWidth = cCarouselInner.getBoundingClientRect().width;

let leftValue = 0;

const totalMovementSize =
  parseFloat(
    document.querySelector(".cCarousel-item").getBoundingClientRect().width,
    10
  ) +
  parseFloat(
    window.getComputedStyle(cCarouselInner).getPropertyValue("gap"),
    50
  );

prev.addEventListener("click", () => {
  if (!leftValue == 0) {
    leftValue -= -totalMovementSize;
    cCarouselInner.style.left = leftValue + "px";
  }
});

next.addEventListener("click", () => {
  const carouselVpWidth = carouselVp.getBoundingClientRect().width;
  if (carouselInnerWidth - Math.abs(leftValue) > carouselVpWidth) {
    leftValue -= totalMovementSize;
    cCarouselInner.style.left = leftValue + "px";
  }
});

const mediaQuery510 = window.matchMedia("(max-width: 510px)");
const mediaQuery770 = window.matchMedia("(max-width: 770px)");

mediaQuery510.addEventListener("change", mediaManagement);
mediaQuery770.addEventListener("change", mediaManagement);

let oldViewportWidth = window.innerWidth;

function mediaManagement() {
  const newViewportWidth = window.innerWidth;

  if (leftValue <= -totalMovementSize && oldViewportWidth < newViewportWidth) {
    leftValue += totalMovementSize;
    cCarouselInner.style.left = leftValue + "px";
    oldViewportWidth = newViewportWidth;
  } else if (
    leftValue <= -totalMovementSize &&
    oldViewportWidth > newViewportWidth
  ) {
    leftValue -= totalMovementSize;
    cCarouselInner.style.left = leftValue + "px";
    oldViewportWidth = newViewportWidth;
  }
}