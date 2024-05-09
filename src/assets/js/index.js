document.addEventListener('DOMContentLoaded', function() {
  let myCarousel = document.getElementById('carouselExampleCaptions');
  let carousel = new bootstrap.Carousel(myCarousel, {
      interval: 6000
  });
});

function scrollBeritaTerbaru(entries, observer1) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeInLeft');
        } else {
            entry.target.classList.remove('animate__animated', 'animate__fadeInLeft');
        }
    });
}

const observer1 = new IntersectionObserver(scrollBeritaTerbaru);
const element1 = document.querySelector('.beritaterbaru-animation');
observer1.observe(element1);

function scrollJurusan(entries, observer2) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeInRight');
        } else {
            entry.target.classList.remove('animate__animated', 'animate__fadeInRight');
        }
    });
}
const observer2 = new IntersectionObserver(scrollJurusan);
const element2 = document.querySelector('.jurusan-animation');
observer2.observe(element2);

function scrollVisiMisi(entries, observer3) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeInRight');
        } else {
            entry.target.classList.remove('animate__animated', 'animate__fadeInRight');
        }
    });
}
const observer3 = new IntersectionObserver(scrollVisiMisi);
const element3 = document.querySelector('.visimisi-animation');
observer3.observe(element3);
function scrollDekan(entries, observer4) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeInLeft');
        } else {
            entry.target.classList.remove('animate__animated', 'animate__fadeInLeft');
        }
    });
}
const observer4 = new IntersectionObserver(scrollDekan);
const element4 = document.querySelector('.dekan-animation');
observer4.observe(element4);

let video = document.querySelector('.video-profil');
video.addEventListener('ended', function() {
    video.currentTime = 0;
    video.play();
});

document.getElementById("AgendaButton").addEventListener("click", function() {
    document.getElementById("bg-agenda").classList.add("active");
    document.getElementById("bg-berita").classList.remove("active");
    document.getElementById("bg-pengumuman").classList.remove("active");
    document.getElementById("content-agenda").style.display = "block";
    document.getElementById("content-berita").style.display = "none";
    document.getElementById("content-pengumuman").style.display = "none";
});

document.getElementById("BeritaButton").addEventListener("click", function() {
    document.getElementById("bg-agenda").classList.remove("active");
    document.getElementById("bg-berita").classList.add("active");
    document.getElementById("bg-pengumuman").classList.remove("active");
    document.getElementById("content-agenda").style.display = "none";
    document.getElementById("content-berita").style.display = "block";
    document.getElementById("content-pengumuman").style.display = "none";
});

document.getElementById("PengumumanButton").addEventListener("click", function() {
    document.getElementById("bg-agenda").classList.remove("active");
    document.getElementById("bg-berita").classList.remove("active");
    document.getElementById("bg-pengumuman").classList.add("active");
    document.getElementById("content-agenda").style.display = "none";
    document.getElementById("content-berita").style.display = "none";
    document.getElementById("content-pengumuman").style.display = "block";
});

  optionPrevious.onclick = function () {
    if (i === 0) {
      i = text1_options.length;
    }
    i = i - 1;
    currentOptionText1.dataset.previousText = text1_options[i];
  
    currentOptionText2.dataset.previousText = text2_options[i];
  
    mainMenu.style.background = color_options[i];
    carousel.classList.add("anim-previous");
  
    setTimeout(() => {
      currentOptionImage.style.backgroundImage = "url(" + image_options[i] + ")";
    }, 455);
    
    setTimeout(() => {
      currentOptionText1.innerText = text1_options[i];
      currentOptionText2.innerText = text2_options[i];
      carousel.classList.remove("anim-previous");
    }, 650);
  };

// CAROUSEL TESTIMONI
  