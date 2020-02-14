import $ from 'jquery';

class MobileMenu {
  constructor() {
    this.menu = $(".site-header__main-navigation");
    this.menuContent = $(".site-header__main-navigation-content");
    this.openButton = $(".site-header__menu-icon");
    this.events();
  }

  events() {
    this.openButton.on("click", this.openMenu.bind(this));
  }

  openMenu() {
    this.openButton.toggleClass("site-header__menu-icon--close-x");
    this.menuContent.toggleClass("site-header__main-navigation-content--is-visible");
    this.menu.toggleClass("site-header__main-navigation--is-visible");
  }
}

export default MobileMenu;
