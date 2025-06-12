
    const scrollAmount = 500;

    document.querySelector('.scroll-btn.left').addEventListener('click', () => {
        document.getElementById('section1').scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    document.querySelector('.scroll-btn.right').addEventListener('click', () => {
        document.getElementById('section1').scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

