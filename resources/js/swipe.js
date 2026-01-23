import Swiper from 'swiper';
import { EffectCards } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/effect-cards';

Swiper.use([EffectCards]);

document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.swiper', {
        effect: 'cards',
        grabCursor: true,
    });
});
