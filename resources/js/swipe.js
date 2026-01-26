document.addEventListener('DOMContentLoaded', () => {
    const stack = document.querySelector('#cardStack');
    if (!stack) return;

    function updateCardStack() {
        const cards = Array.from(stack.querySelectorAll('.card'));
        cards.forEach((card, index) => {
            card.style.zIndex = cards.length - index;
            card.style.transition = 'transform 0.3s ease';
            card.style.transform = `scale(${1 - index * 0.04}) translateY(${index * 8}px)`;
        });
    }

    function initCards() {
        const cards = stack.querySelectorAll('.card');
        if (!cards.length) return;

        const topCard = cards[0];
        let startX = 0;
        let currentX = 0;
        let dragging = false;

        topCard.addEventListener('pointerdown', e => {
            startX = e.clientX;
            currentX = 0;
            dragging = true;

            topCard.setPointerCapture(e.pointerId);
            topCard.style.transition = 'none';
        });

        topCard.addEventListener('pointermove', e => {
            if (!dragging) return;

            currentX = e.clientX - startX;
            const rotate = currentX * 0.05;
            topCard.style.transform = `translateX(${currentX}px) rotate(${rotate}deg)`;
        });

        topCard.addEventListener('pointerup', () => {
            dragging = false;
            const threshold = 100;
            const liked = currentX > 0;

            if (Math.abs(currentX) > threshold) {
                console.log(liked ? 'LIKE ❤️' : 'DISLIKE ❌', topCard.dataset.id);

                topCard.style.transition = 'transform 0.4s ease-out, opacity 0.4s ease-out';
                topCard.style.transform = `translateX(${liked ? 1000 : -1000}px) rotate(${currentX * 0.1}deg)`;
                topCard.style.opacity = '0';

                setTimeout(() => {
                    topCard.remove();
                    updateCardStack();
                    initCards();
                }, 400);
            } else {
                topCard.style.transition = 'transform 0.3s ease';
                topCard.style.transform = `scale(1) translateY(0px)`;
            }
        });
    }

    updateCardStack();
    initCards();
});
