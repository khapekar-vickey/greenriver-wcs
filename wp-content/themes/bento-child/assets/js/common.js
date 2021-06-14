/*var script = document.createElement('script');
script.src = 'wow.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
*/


     
 jQuery(document).ready(function ($) {
        function checkPosition() {
            if (jQuery(this).scrollTop() > 200) {
                jQuery('.top-arrow').fadeIn(500);
            } else {
                jQuery('.top-arrow').fadeOut(300);
            }
        }
        // Show or hide the sticky footer button
        jQuery(window).scroll(checkPosition);
    
        jQuery(".top-arrow a").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });
          checkPosition();

        // for home page top header banner hide show 
        var button = document.getElementById('TB_close');
        button.onclick = function() {
          document.getElementsByClassName("top-header-banner")[0].style.display = "none";
        };
        


    });
    
 jQuery(document).ready(function() {     
    

  // added for search bar autocomplete input filed ---->(Date :- 10-02-2021) 
    jQuery('.proinput input.autocomplete').attr('tabindex','-1');
     

    // added for primary menu main ul li a tag ---->(Date :- 17-02-2021) 
    jQuery('#menu-main-menu-2 .menu-item-602').find('a:first').attr('id','wwo-links');
    jQuery('#menu-main-menu-2 .menu-item-602 ul.sub-menu').attr('aria-labelledby','wwo-links');
    
    jQuery('#menu-main-menu-2 .menu-item-982').find('a:first').attr('id','tcs-links');
    jQuery('#menu-main-menu-2 .menu-item-982 ul.sub-menu').attr('aria-labelledby','tcs-links');
    
    jQuery('#menu-main-menu-2 .menu-item-1038').find('a:first').attr('id','bat-links');
    jQuery('#menu-main-menu-2 .menu-item-1038 ul.sub-menu').attr('aria-labelledby','bat-links');

    jQuery('#menu-main-menu-2 li.menu-item-602').find('a:first').attr('class','link1');
    jQuery('#menu-main-menu-2 li.menu-item-982').find('a:first').attr('class','link2');
    jQuery('#menu-main-menu-2 li.menu-item-1038').find('a:first').attr('class','link3');
    
    jQuery('#wpforms-form-47 input').attr('aria-required','true');
    jQuery('#wpforms-form-47 textarea').attr('aria-required','true');
    jQuery('.secMenu .current-menu-item a.active').attr('aria-current','page');


    
    const wwo = document.querySelector('.link1');
    const tcs = document.querySelector('.link2');
    const bat = document.querySelector('.link3');
    // added for on nav menu mouse-enter and mouse leave
    wwo.addEventListener('mouseenter',() => {
        wwo.ariaExpanded = !JSON.parse(wwo.ariaExpanded)});
    wwo.addEventListener('mouseleave',() => {
        wwo.ariaExpanded = !JSON.parse(wwo.ariaExpanded)});
    tcs.addEventListener('mouseenter',() => {
        tcs.ariaExpanded = !JSON.parse(tcs.ariaExpanded)});
    tcs.addEventListener('mouseleave',() => {
        tcs.ariaExpanded = !JSON.parse(tcs.ariaExpanded)});
    bat.addEventListener('mouseenter',() => {
        bat.ariaExpanded = !JSON.parse(bat.ariaExpanded)});
    bat.addEventListener('mouseleave',() => {
        bat.ariaExpanded = !JSON.parse(bat.ariaExpanded)});

    // added for tab focus in and out nav menu
    wwo.addEventListener('focusin',() => {
        wwo.ariaExpanded = !JSON.parse(wwo.ariaExpanded)});
    wwo.addEventListener('focusout',() => {
        wwo.ariaExpanded = !JSON.parse(wwo.ariaExpanded)});
    tcs.addEventListener('focusin',() => {
        tcs.ariaExpanded = !JSON.parse(tcs.ariaExpanded)});
    tcs.addEventListener('focusout',() => {
        tcs.ariaExpanded = !JSON.parse(tcs.ariaExpanded)});
    bat.addEventListener('focusin',() => {
        bat.ariaExpanded = !JSON.parse(bat.ariaExpanded)});
    bat.addEventListener('focusout',() => {
        bat.ariaExpanded = !JSON.parse(bat.ariaExpanded)});

jQuery('.primary-menu .menu-item-has-children a').attr('aria-haspopup','true');
// jQuery('.primary-menu .menu-item-has-children ul').attr('aria-expanded','false');
// jQuery('.primary-menu .menu-item-has-children.menu-item-602 ul').attr('aria-label','Waterworks Operators submenu');
// jQuery('.primary-menu .menu-item-has-children.menu-item-982 ul').attr('aria-label','Taining Course Sponsers submenu');
// jQuery('.primary-menu .menu-item-has-children.menu-item-1038 ul').attr('aria-label','BatFlow Assembly esters submenu');

    jQuery('.primary-menu').attr('role','menubar');
    jQuery('.primary-menu .menu-item-object-page').attr('role','none');
    jQuery('.primary-menu .menu-item-object-page a').attr('role','menuitem');
  
        
 // added SHOW class for flipping the up and down arrow on tab focus on WWO, TCS,BAT ul li 
 /* jQuery('ul#menu-main-menu-2 li.menu-item-602 a').hover(function(){     
    jQuery("ul#menu-main-menu-2 li.menu-item-602").addClass("show");
  },
  function(){    
    jQuery("ul#menu-main-menu-2 li.menu-item-602").removeClass('show');     
  });

  jQuery('ul#menu-main-menu-2 li.menu-item-982 a').hover(function(){     
    jQuery("ul#menu-main-menu-2 li.menu-item-982").addClass("show");
  },
  function(){    
    jQuery("ul#menu-main-menu-2 li.menu-item-982").removeClass('show');     
  });

  jQuery('ul#menu-main-menu-2 li.menu-item-1038 a').hover(function(){     
    jQuery("ul#menu-main-menu-2 li.menu-item-1038").addClass("show");
  },
  function(){    
    jQuery("ul#menu-main-menu-2 li.menu-item-1038").removeClass('show');     
  });
  */

  //added for re-order seach results container
  setTimeout(function(){
    jQuery("#ajaxsearchliteres1").insertAfter("#ajaxsearchlite1");
  }, 2000);

  // when we click on anchor tag + hash-accordion value then it will redirect to 
  // the respective page and open respective accordion
  // if(window.location.hash) {
  //   var accordVal = window.location.hash.substr(1);
  //   setTimeout(function(){
  //     if(document.getElementById(accordVal)){
  //       document.getElementById(accordVal).click();
  //       jQuery('.card-body-wrap .prime-accordion .card:first-child .card-header button').attr('aria-expanded','true');
  //       jQuery('.card-body-wrap .prime-accordion .card:first-child .card-body-wrap').addClass('show');
  //     }
  //   }, 1000);
  //   console.log(accordVal);
    
  // }
});

var menubar = new Menubar(document.getElementById('menu-main-menu-2'));
menubar.init();
