const previousButton = document.querySelector('.pagination .page-item:first-child .page-link');
const nextButton = document.querySelector('.pagination .page-item:last-child .page-link');

const paginationLinks = document.querySelectorAll('.pagination .page-item:not(:first-child):not(:last-child) .page-link');

paginationLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        paginationLinks.forEach(link => {
            link.classList.remove('active');
        });

        this.classList.add('active');
    });
});

previousButton.addEventListener('click', function(event) {
    event.preventDefault();

    paginationLinks[0].classList.add('active');

    for (let i = 1; i < paginationLinks.length; i++) {
        paginationLinks[i].classList.remove('active');
    }
});

nextButton.addEventListener('click', function(event) {
    event.preventDefault();

    for (let i = 0; i < paginationLinks.length - 1; i++) {
        paginationLinks[i].classList.remove('active');
    }

    paginationLinks[paginationLinks.length - 1].classList.add('active');
});
