const stack = document.getElementById('cardStack');

function initCards() {
    const cards = stack.querySelectorAll('.card');

    cards.forEach((card, index) => {
        card.style.zIndex = cards.length - index;
    });

    const topCard = cards[0];
    if (!topCard) return;

    let startX = 0;
    let currentX = 0;
    let dragging = false;

    topCard.addEventListener('pointerdown', e => {
        startX = e.clientX;
        dragging = true;
        topCard.setPointerCapture(e.pointerId);
        topCard.style.transition = 'none';
    });

    topCard.addEventListener('pointermove', e => {
        if (!dragging) return;

        currentX += (e.clientX - startX - currentX) * 0.25;
        const rotate = currentX * 0.05;

        topCard.style.transform =
            `translateX(${currentX}px, 0, 0) rotate(${rotate}deg)`;
    });

    topCard.addEventListener('pointerup', () => {
        dragging = false;

        const threshold = 100;

        if (Math.abs(currentX) > threshold) {
            const liked = currentX < 0;

            console.log(
                liked ? 'LIKE ❤️' : 'DISLIKE ❌',
                topCard.dataset.id
            );

            topCard.style.transition = 'transform 0.4s ease-out';
            topCard.style.transform =
                `translateX(${liked ? -1000 : 1000}px) rotate(${currentX * 0.1}deg)`;

            setTimeout(() => {
                topCard.remove();
                initCards();
            }, 400);
        } else {
            topCard.style.transition = 'transform 0.3s ease';
            topCard.style.transform = '';
        }
    });
}

initCards();
