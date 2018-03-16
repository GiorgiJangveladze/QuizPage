$(".main-iso").isotope({
        itemSelector: '.item',
        layoutMode: 'fitRows',
    });
    
    $('.iso-nav ul li').click(function(){ 
        
      $(".iso-nav ul li").removeClass("active");
      $(this).addClass("active");        

        var selector = $(this).attr('data-filter'); 
        $(".main-iso").isotope({ 
            filter: selector, 
            animationOptions: { 
                duration: 750, 
                easing: 'linear', 
                queue: false, 
            } 
        }); 
      return false; 
    }); 
    