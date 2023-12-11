

jQuery(document).ready(function () {
  
    jQuery('.mobile').meanmenu();
 

 });

jQuery(function () {

    // Slideshow 4
    $("#front-image-slider").responsiveSlides({
        auto: true,
        pager: false,
        nav: false,
        speed: 2000,
        maxwidth: 960,
        namespace: "callbacks"
    });
  
});

  $('.main-slider').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    items:1,
    dots:false,
    video:true,
    autoplay: true,
    autoplayTimeout:5000,
    smartSpeed: 1200,
    navText: ['<i class="las la-long-arrow-alt-left"></i>', '<i class="las la-long-arrow-alt-right"></i>'],
    responsive : {
    0 : {
      items:1,
      nav:false,
       
    },
    480 : {
      items:1
        
    },
    768 : {
      items:1
        
      }

  }

    
  });