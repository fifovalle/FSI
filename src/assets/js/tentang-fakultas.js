function scrollFakultas(entries, observer1) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeInLeft');
        } else {
            entry.target.classList.remove('animate__animated', 'animate__fadeInLeft');
        }
    });
}
const observer1 = new IntersectionObserver(scrollFakultas);
const element1 = document.querySelector('.fakultas-animation');
observer1.observe(element1);


  