import './bootstrap';

// زر المنيو بالجوال
document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && closeBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('is-open');
            menuBtn.style.display = 'none';
            closeBtn.style.display = 'block';
        });

        closeBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('is-open');
            closeBtn.style.display = 'none';
            menuBtn.style.display = 'block';
        });
    }
});

