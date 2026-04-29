import './bootstrap';

import './swipe';

import './sideMenu.js';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form').forEach(form => {
        form.setAttribute('novalidate', true);
    });
});
