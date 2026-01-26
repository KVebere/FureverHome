document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('#menuToggle');
    const sideNav = document.querySelector('#sideNav');
    const closeBtn = document.querySelector('.close-btn');

    if (!menuToggle || !sideNav) return;

    menuToggle.addEventListener('click', () => {
        sideNav.classList.add('open');
        sideNav.setAttribute('aria-hidden', 'false');
        menuToggle.setAttribute('aria-expanded', 'true');
    });

    closeBtn?.addEventListener('click', () => {
        sideNav.classList.remove('open');
        sideNav.setAttribute('aria-hidden', 'true');
        menuToggle.setAttribute('aria-expanded', 'false');
    });
});

document.addEventListener('click', (e) => {
    const sideNav = document.querySelector('#sideNav');
    const menuToggle = document.querySelector('#menuToggle');

    if (!sideNav.classList.contains('open')) return;

    if (!sideNav.contains(e.target) && !menuToggle.contains(e.target)) {
        sideNav.classList.remove('open');
    }
});
