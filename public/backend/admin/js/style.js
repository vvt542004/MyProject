document.querySelectorAll('.menu-title').forEach(title => {
    title.addEventListener('click', () => {
        const parent = title.parentElement;
        parent.classList.toggle('active');
    });
});
