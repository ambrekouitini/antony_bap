const navbarToggle = document.querySelector('.navbar-toggle');
const navbarMenu = document.querySelector('nav ul');

navbarToggle.addEventListener('click', () => {
    navbarMenu.classList.toggle('active');
    navbarToggle.classList.toggle('active');
});