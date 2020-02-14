import $ from 'jquery';

class HomeSlider {
  constructor() {
    this.els = $(".slider");
    this.initSlider();
  }

  initSlider() {
    this.els.slick({
      autoplay: true,
      arrows: false,
      dots: false
    });
  }
}

export default HomeSlider;
