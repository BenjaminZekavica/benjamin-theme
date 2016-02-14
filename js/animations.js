 
  jQuery(document).ready(function(){
	 	   
		  // Responsives Hauptmenü  
		  jQuery(".respon-men").click(function() {
			jQuery("nav ul#navigation li" ).slideToggle( "slow" );
		  });
		  
		  // Nach oben scollen			
		  jQuery(window).scroll(function(){
			  if (jQuery(this).scrollTop() > 100) {
				  jQuery('.scrollToTop').fadeIn();
			  } else {
				  jQuery('.scrollToTop').fadeOut();
			  }
		  });
			  
		   // Nach oben scollen, wenn auf dem Button jemand geklickt hat	  
		  jQuery('.scrollToTop').click(function(){
			  jQuery('html, body').animate({scrollTop : 0},800);
			  return false;
		  });

		// Neuangepasstes Menü
	
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100){  
				$('.container-fluid.top-menu').addClass("sticky");
			  }
			  else{
				$('.container-fluid.top-menu').removeClass("sticky");
			  }
		});
		
		// Der Top Header verschwindet
		
		$(window).scroll(function() {
			if ($(this).scrollTop() > 99){  
				$('.container-fluid.top-header').addClass("top");
			  }
			  else{
				$('.container-fluid.top-header').removeClass("top");
			  }
		});
		
		//Neues Logo wird eingefügt
		
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100){  
				$('.logo').addClass("sticky");
			  }
			  else{
				$('.logo').removeClass("sticky");
			  }
		});
		
		// Die Navigation wird eingfügt
		
		$(window).scroll(function() {
			if ($(this).scrollTop() > 110){  
				$('nav ul li').addClass("sticky");
			  }
			  else{
				$('nav ul li').removeClass("sticky");
			  }
		});
		
			$(window).scroll(function() {
			if ($(this).scrollTop() > 111){  
				$('.suchbutton').addClass("sticky");
			  }
			  else{
				$('.suchbutton').removeClass("sticky");
			  }
		});
		
		
	  }); 


$(function(){ 
 
  if (!!$('aside#sidebar').offset()) { 
 
    var stickyTop = $('.sticky').offset().top; 
 
    $(window).scroll(function(){ 
 
      var windowTop = $(window).scrollTop(); 
 
      if (stickyTop < windowTop){
        $('aside#sidebar').css({ position: 'fixed', top: 0 });
      }
      else {
        $('aside#sidebar').css('position','static');
      }
 
    });
 
  }	   
});

