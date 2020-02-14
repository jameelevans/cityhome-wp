import $ from 'jquery';
import waypoints from '../../node_modules/waypoints/lib/noframework.waypoints';
import smoothScroll from 'jquery-smooth-scroll';

class StickyHeader {
  constructor(){
    this.lazyImages = $(".lazyload");
    this.siteHeader = $(".site-header");
    this.headerBtn = $(".btn-header");
    this.headerTriggerElement = $(".home-banner, .page-banner");
    this.smoothScrollLink = $(".smooth-scroll");
    this.pageSections = $(".page-section");
    this.headerLinks = $(".nav-link");
    this.backTopLink = $(".footer-return-to-top");
    this.backTopWaypoint();
    this.addSmoothScrolling();
    this.refreshWaypoints();
  }

  refreshWaypoints() {
    this.lazyImages.on('load', function() {
      Waypoint.refreshAll();
    });
  }

  addSmoothScrolling() {
    this.headerLinks.smoothScroll();
  }

  backTopWaypoint() {
    var that = this;
    new Waypoint({
      element: this.headerTriggerElement[0],
      handler: function(direction) {
        if (direction == "down"){
          that.backTopLink.addClass("footer-return-to-top--is-visible");
        }else{
          that.backTopLink.removeClass("footer-return-to-top--is-visible");
        }
      }
    })
  }


}

export default StickyHeader;
