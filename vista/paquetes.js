
    const scrollAmount = 500;

    document.querySelector('.scroll-btn.left').addEventListener('click', () => {
        document.getElementById('section1').scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    document.querySelector('.scroll-btn.right').addEventListener('click', () => {
        document.getElementById('section1').scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

        function showInfo(title, genre, bio) {
            const infoBox = document.getElementById('infoBox');
            infoBox.innerHTML = `<strong>${title}</strong><br>${genre}<br>${bio}`;
            infoBox.style.display = 'block';
        }

        document.addEventListener('click', function(event) {
            const infoBox = document.getElementById('infoBox');
            if (!infoBox.contains(event.target) && !event.target.closest('.gallery div')) {
                infoBox.style.display = 'none';
            }
        });