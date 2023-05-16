jQuery(document).ready(function() {
    "use strict"; 
    
    
    // popup
    jQuery(document).ready(function() {
     // При клике на кнопку открытия всплывающего окна
        jQuery(".open_popup").click(function() {
            // Получаем уникальный идентификатор всплывающего окна из атрибута data-popup-id кнопки вызова окна
            var popup_id = jQuery(this).data('popup-id');
    
            // Показываем затемнение фона и всплывающее окно с соответствующим идентификатором
            jQuery("body").append('<div class="popup_overlay"></div>');
            jQuery("#" + popup_id).animate({ opacity: 1, top: '50%' }, 100).fadeIn(100);
    
            // Обработчик клика за пределами всплывающего окна
            jQuery(".popup_overlay").click(function() {
                // Скрываем затемнение фона и всплывающее окно
                jQuery("#" + popup_id).animate({ opacity: 0, top: '45%' }, 100).fadeOut(100, function() {
                    jQuery(".popup_overlay").remove();
                });
            });
        });


        // При клике на кнопку закрытия всплывающего окна
        jQuery(".open_popup_content_close").click(function() {
            // Скрываем затемнение фона и всплывающее окно
            jQuery(".popup_overlay").remove();
            jQuery(".open_popup_content").animate({ opacity: 0, top: '45%' }, 100).fadeOut(100);
        });
    });
    
     // home tabs 
     (function($){               
         $.fn.lightTabs = function(options){
                var createTabs = function(){
                var tabs = this;
                var i = 0;
                var prevIndex = 0;
    
                var showPage = function(i){
                    $(tabs).children("div").children("div").hide();
                    $(tabs).children("div").children("div").eq(i).show();
                    $(tabs).children("ul").children("li").removeClass("tabactive");
                    $(tabs).children("ul").children("li").eq(i).addClass("tabactive");
                    $(tabs).children("ul").children("li").eq(prevIndex).removeClass("prev");
                    $(tabs).children("ul").children("li").eq(i - 1).addClass("prev");
                    prevIndex = i - 1;
                } 
                showPage(0);
                $(tabs).children("ul").children("li").eq(0).addClass("prev");
    
                $(tabs).children("ul").children("li").each(function(index, element){
                    $(element).attr("data-page", i);
                    i++;                        
                });
    
                $(tabs).children("ul").children("li").click(function(){
                    var currentIndex = parseInt($(this).attr("data-page"));
                    showPage(currentIndex);
                });                
            }; 
            return this.each(createTabs);
        };  
    })(jQuery);
    
    $(document).ready(function(){
        $(".tabs").lightTabs();
    });
     
    
    //  Back to top
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('#back-to-top').addClass('show');
                } else {
                    jQuery('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function () {
            backToTop(); 
        });
        jQuery('#back-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    } ; 
    
    
    
 
    // Sticky Header 
    function stickyHeader(headerSelector){

        //hide right header menu when sticky header is inited
        var mainHeader = jQuery(headerSelector),
            headerHeight = mainHeader.height();

        //set scrolling variables
        var scrolling = false,
            previousTop = 0,
            currentTop = 0,
            scrollDelta = 10,
            scrollOffset = 60;

        mainHeader.addClass('autohide');

        jQuery(window).on('scroll', function(){
            if( !scrolling ) {
                scrolling = true;
                (!window.requestAnimationFrame)
                    ? setTimeout(autoHideHeader, 250)
                    : requestAnimationFrame(autoHideHeader);
            }
        });

        jQuery(window).on('resize', function(){
            headerHeight = mainHeader.height();
        });

        function autoHideHeader() {
            var currentTop = jQuery(window).scrollTop();

            checkSimpleNavigation(currentTop);
            previousTop = currentTop;
            scrolling = false;

            // add class when pass offset
            if (jQuery(window).scrollTop() > scrollOffset) {
                mainHeader.addClass('fixed');
            } else {
                mainHeader.removeClass('fixed');
            }
        }

        function checkSimpleNavigation(currentTop) {
            //there's no secondary nav or secondary nav is below primary nav
            if (previousTop - currentTop > scrollDelta) {
                //if scrolling up...
                mainHeader.removeClass('is-hidden');
            } else if( currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
                //if scrolling down...
                mainHeader.addClass('is-hidden');
            }
        }
    }
    if (jQuery(window).width() > 991) {stickyHeader('#site-header.sticky');} 


    //  Back to top
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('#back-to-top').addClass('show');
                } else {
                    jQuery('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function () {
            backToTop(); 
        });
        jQuery('#back-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    
    // top list
    jQuery('.owl_top_list').owlCarousel({
        loop:true, 
        autoWidth:false,
        // stagePadding: 100,                
        margin:20,
        dots:false,
        navText:["<div class='arrow arrow_left'></div>","<div class='arrow arrow_right'></div>"],  
        nav:true,
        startPosition:1,
        responsiveRefreshRate:1000,
        responsive:{
        0:{items:1, margin:10},
        600:{items:1,margin:10}, 
        800:{items:2, margin:20},
        1024:{items:2, margin:20},
        1300:{items:2, margin:20},
        1310:{items:2, margin:20}
        }
    });      
    
    
     // Accordeon FAQ - что бы скрыть, добавить вконце после .stop() - .hide();
        jQuery(document).ready(function($){
           jQuery('#accordion-js').find('.heading').click(function($){
               jQuery(this).toggleClass('accord_active').next().stop().slideToggle(); 
           }).next().stop();
        });

     
    
    
    
    
// ---------------------------------------------------------------------------------------------------------    

    
    
    
    
    


    //learn_more text
    $(document).ready(function() {
      $(".learn_morebtn_text").click(function(event) {
        event.preventDefault();
        if ($(this).hasClass("close")) {
          $(this).removeClass("close").text("Развернуть");
          $(this).closest(".learn_more_text").prev(".more_text").css("max-height", "279px");
        } else {
          $(this).addClass("close").text("Закрыть");
          $(this).closest(".learn_more_text").prev(".more_text").css("max-height", "none");
        }
      });
    });
    
    
    //learn_morebtn_text_litle text
    $(document).ready(function() {
      $(".learn_morebtn_text_litle").click(function(event) {
        event.preventDefault();
        if ($(this).hasClass("close")) {
          $(this).removeClass("close").text("Развернуть");
          $(this).closest(".learn_more_text_litle").prev(".more_text_litle").css("max-height", "225px");
        } else {
          $(this).addClass("close").text("Закрыть");
          $(this).closest(".learn_more_text_litle").prev(".more_text_litle").css("max-height", "none");
        }
      });
    });
    
    //learn_more block
    $(document).ready(function() {
      // Количество видимых элементов по умолчанию
      var defaultItemsCount = 6;
    
      // Количество элементов, которые будут подгружаться при каждом клике
      var loadMoreCount = 3;
    
      // Находим все блоки object_item
      var items = $('.object_item');
    
      // Скрываем все блоки, кроме первых defaultItemsCount
      items.slice(defaultItemsCount).hide();
    
      // Обработчик клика на кнопку "Показать еще"
      $('.learn_morebtn').on('click', function(e) {
        e.preventDefault();
        
        // Находим скрытые блоки object_item
        var hiddenItems = items.filter(':hidden');
    
        // Если больше нет скрытых блоков, скрываем кнопку "Показать еще"
        if (hiddenItems.length === 0) {
          $('.learn_more').hide();
          return;
        }
    
        // Показываем следующие loadMoreCount скрытых блоков с анимацией
        hiddenItems.slice(0, loadMoreCount).slideDown('slow');
      });
    });
        
        
        
    //learn_more block
    $(document).ready(function() {
      // Количество видимых элементов по умолчанию
      var defaultItemsCount = 12;
    
      // Количество элементов, которые будут подгружаться при каждом клике
      var loadMoreCount = 6;
    
      // Находим все блоки object_item
      var items = $('.object_cat_item');
    
      // Скрываем все блоки, кроме первых defaultItemsCount
      items.slice(defaultItemsCount).hide();
    
      // Обработчик клика на кнопку "Показать еще"
      $('.learn_morebtn').on('click', function(e) {
        e.preventDefault();
         
        // Находим скрытые блоки object_item
        var hiddenItems = items.filter(':hidden');
    
        // Если больше нет скрытых блоков, скрываем кнопку "Показать еще"
        if (hiddenItems.length === 0) {
          $('.learn_more_cat').hide();
          return;
        }
    
        // Показываем следующие loadMoreCount скрытых блоков с анимацией
        hiddenItems.slice(0, loadMoreCount).slideDown('slow');
      });
    });
        
        

    // mobile_menu_btn  
    jQuery(".di_menu_text").on('click', function(){
        jQuery(this).next(".di_menu_text ul").toggle("fast")
    }); 
 
     if (jQuery(window).width()  < 879) {
        jQuery(document).on('click', function(e) { 
          if (!jQuery(e.target).closest(".di_menu_text").length) {
            jQuery('.di_menu_text ul').hide();
          } 
          e.stopPropagation();
        })
        } ; 
    
    jQuery(".di_menu_text").on('click', function(){
         jQuery(this).toggleClass('open');
    }); 
    
    jQuery(document).on('click', function(e) { 
      if (!jQuery(e.target).closest(".open").length) {
        jQuery('.open').toggleClass('open');
      } 
      e.stopPropagation();
    });
    
    
    

    
 
    // mobile_menu_btn  
    jQuery(".mobile_menu_btn").on('click', function(){
        jQuery(this).next(".header_nav").toggle("fast")
    }); 
 
     if (jQuery(window).width()  < 879) {
        jQuery(document).on('click', function(e) { 
          if (!jQuery(e.target).closest(".mobile_menu_btn").length) {
            jQuery('.header_nav').hide();
          } 
          e.stopPropagation();
        })
        } ; 
    
    jQuery(".mobile_menu_btn").on('click', function(){
         jQuery(this).toggleClass('open');
    }); 
    
    jQuery(document).on('click', function(e) { 
      if (!jQuery(e.target).closest(".open").length) {
        jQuery('.open').toggleClass('open');
      } 
      e.stopPropagation();
    });
    
    
    
    
    

 
    // text_hide
     var token = 1;
    jQuery(".di-read-more input").on("click", function() {
        var jQuerylink = jQuery(this);
        var jQuerycontent = jQuerylink.parent().prev("div.text_hide");
        jQuerycontent.toggleClass("full-text");
        if(token == 1)
        {jQuery(this).val("Скрыть");token = 0; }
        else
        {jQuery(this).val("Читать подробнее");token = 1;}
        return false;
    }); 
    
    // See All teg
    jQuery(".seeall").on('click', function(){
        jQuery(this).next(".seeall_vn").toggle("fast")
    });
    jQuery(".seeall_close").on('click', function(){
        jQuery(this).parents(".seeall_vn:first").hide("fast")
    });   



 

   // Load More jQuery   
    jQuery(".more .col_4_di").slice(0, 8).css("display", "block");
    jQuery(".more2 .cat_item").slice(0, 4).css("display", "block");
    
    jQuery("#loadMore").on('click', function (e) {
        e.preventDefault(); 
        jQuery(".more .col_4_di:hidden").slice(0, 8).slideDown();
        
        jQuery(".more2 .cat_item:hidden").slice(0, 4).slideDown();
        
        if (jQuery(".more2 .cat_item").length == 0) {
            jQuery("#load").fadeOut('slow');
        }  
        
        if (jQuery(".cat_item:hidden").length == 0) {
            jQuery("#load").fadeOut('slow');
        }  
    }); 

 
    
    // Убавляем кол-во по клику
        jQuery('.quantity_inner .bt_minus').click(function() {
        let jQueryinput = jQuery(this).parent().find('.quantity');
        let count = parseInt(jQueryinput.val()) - 1;
        count = count < 1 ? 1 : count;
        jQueryinput.val(count);
    });
    // Прибавляем кол-во по клику
    jQuery('.quantity_inner .bt_plus').click(function() {
        let jQueryinput = jQuery(this).parent().find('.quantity');
        let count = parseInt(jQueryinput.val()) + 1;
        count = count > parseInt(jQueryinput.data('max-count')) ? parseInt(jQueryinput.data('max-count')) : count;
        jQueryinput.val(parseInt(count));
    }); 
    // Убираем все лишнее и невозможное при изменении поля
    jQuery('.quantity_inner .quantity').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
        if (this.value == "") {
            this.value = 1;
        }
        if (this.value > parseInt(jQuery(this).data('max-count'))) {
            this.value = parseInt(jQuery(this).data('max-count'));
        }    
    });    
        
        
   
     

 
 
 
 
});