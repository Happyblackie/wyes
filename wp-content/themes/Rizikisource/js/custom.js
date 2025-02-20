
  (function ($) {
  
  "use strict";

    // COUNTER NUMBERS
    jQuery('.counter-thumb').appear(function() {
      jQuery('.counter-number').countTo();
    });
    
    // CUSTOM LINK
    $('.smoothscroll').click(function(){
    var el = $(this).attr('href');
    var elWrapped = $(el);
    var header_height = $('.navbar').height();

    scrollToDiv(elWrapped,header_height);
    return false;

    function scrollToDiv(element,navheight){
      var offset = element.offset();
      var offsetTop = offset.top;
      var totalScroll = offsetTop-navheight;

      $('body,html').animate({
      scrollTop: totalScroll
      }, 300);
    }
});


 /**
   * Initiate Pure Counter
   */
 new PureCounter();


 
 document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide.riziki-whatwedo', {
    drag   : 'free',
    focus  : 'center',
    rewind : true,
    padding:'2rem',
    perPage: 2,
    gap    : '1rem',
      breakpoints: {
    992: {
      perPage: 1,
      gap    : '0.4rem',
      
    },
    480: {
      perPage: 1,
      gap    : '0.4rem',
      
    },
  },
    autoScroll: {
      speed: 1,
    },
    
  }).mount();
});


document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide.riziki-howwedoit', {
    drag   : 'free',
    focus  : 'center',
    rewind : true,
    padding:'2rem',
    perPage: 2,
    gap    : '1rem',
      breakpoints: {
    992: {
      perPage: 1,
      gap    : '0.4rem',
      
    },
    480: {
      perPage: 1,
      gap    : '0.4rem',
      
    },
  },
    autoScroll: {
      speed: 1,
    },
    
  }).mount();
});



document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide.riziki-donors', {
    type   : 'loop',
    drag   : 'free',
    focus  : 'center',
    rewind : true,
    perPage: 6,
    autoplay    : true,
    gap    : '0.3rem',
      breakpoints: {
    760: {
      perPage: 4,
      gap    : '0.4rem',
      
    },
    480: {
      perPage: 2,
      gap    : '0.4rem',
      
    },
  },
    autoScroll: {
      speed: 1,
    },
    
  }).mount();
});



 document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide.riziki-partners', {
    type   : 'loop',
    drag   : 'free',
    focus  : 'center',
    rewind : true,
    perPage: 6,
    autoplay    : true,
    gap    : '0.3rem',
      breakpoints: {
    760: {
      perPage: 4,
      gap    : '0.4rem',
      
    },
    480: {
      perPage: 2,
      gap    : '0.4rem',
      
    },
  },
    autoScroll: {
      speed: 1,
    },
    
  }).mount();
});



document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide.riziki-events', {
    drag   : 'free',
    focus  : 'center',
    rewind : true,
    padding:'2rem',
    perPage: 2,
    gap    : '1rem',
      breakpoints: {
    992: {
      perPage: 1,
      gap    : '0.4rem',
      
    },
    480: {
      perPage: 1,
      gap    : '0.4rem',
      
    },
  },
    autoScroll: {
      speed: 1,
    },
    
  }).mount();
});




   //Sticky Menu

  //  let stickheader = document.getElementById('sticky-header');
  //  let offset = stickheader.offsetHeight;
  //  window.onscroll = function() {
  //   if (window.onscroll > offset-10 ){
  //      stickheader.classList.add('sticky-header');

  //   }else if (window.scrollY < offset -20) {
  //     stickheader.classList.remove('stick-header')
  //   }
  //  }

  $(window).scroll(function () {
    //if you hard code, then use console
    //.log to determine when you want the
    //nav bar to stick.
    console.log($(window).scrollTop());
    if ($(window).scrollTop() > 200) {
        $('#body-start').addClass('stick-header');
    }
    if ($(window).scrollTop() < 200) {
        $('#body-start').removeClass('stick-header');
    }
});

$(function () {
  $(".divmore").slice(0, 3).show();
  $("#loadMore").on('click', function (e) {
      e.preventDefault();
      $(".divmore:hidden").slice(0,3).slideDown();
      if ($(".divmore:hidden").length == 0) {
          $("#load").fadeOut('slow');
      }
      $('html,body').animate({
          scrollTop: $(this).offset().top
      }, 0);
  });
});


$(window).scroll(function () {
  if ($(this).scrollTop() > 50) {
      $('.totop a').fadeIn();
  } else {
      $('.totop a').fadeOut();
  }
});




   //Mega Menu
  

   const menu = document.querySelector(".menu");
   const menuMain = menu.querySelector(".menu-main");
   const goBack = menu.querySelector(".go-back");
   const menuTrigger = document.querySelector(".mobile-menu-trigger");
   const closeMenu = menu.querySelector(".mobile-menu-close");
   let subMenu;
   menuMain.addEventListener("click", (e) =>{
     if(!menu.classList.contains("active")){
       return;
     }
     if(e.target.closest(".menu-item-has-children")){
        const hasChildren = e.target.closest(".menu-item-has-children");
        showSubMenu(hasChildren);
     }
   });
   goBack.addEventListener("click",() =>{
      hideSubMenu();
   })
   menuTrigger.addEventListener("click",() =>{
      toggleMenu();
   })
   closeMenu.addEventListener("click",() =>{
      toggleMenu();
   })
   document.querySelector(".menu-overlay").addEventListener("click",() =>{
     toggleMenu();
   })
   function toggleMenu(){
     menu.classList.toggle("active");
     document.querySelector(".menu-overlay").classList.toggle("active");
   }
   function showSubMenu(hasChildren){
      subMenu = hasChildren.querySelector(".sub-menu");
      subMenu.classList.add("active");
      subMenu.style.animation = "slideLeft 0.5s ease forwards";
      const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
      menu.querySelector(".current-menu-title").innerHTML=menuTitle;
      menu.querySelector(".mobile-menu-head").classList.add("active");
   }
  
   function  hideSubMenu(){  
      subMenu.style.animation = "slideRight 0.5s ease forwards";
      setTimeout(() =>{
         subMenu.classList.remove("active");	
      },300); 
      menu.querySelector(".current-menu-title").innerHTML="";
      menu.querySelector(".mobile-menu-head").classList.remove("active");
   }
   
   window.onresize = function(){
     if(this.innerWidth >991){
       if(menu.classList.contains("active")){
         toggleMenu();
       }
  
     }
   }
  
  
    
    
  })(window.jQuery);


