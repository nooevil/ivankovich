import {
  Swiper, Navigation, Pagination, A11y, Controller, Thumbs,
} from 'swiper/dist/js/swiper.esm';

Swiper.use([Navigation, Pagination, A11y, Controller, Thumbs]);

export default class CustomSwiper {
  constructor(selector, settings) {
    return new Swiper(selector, settings);
  }
}
