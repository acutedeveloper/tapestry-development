jQuery(document).ready(function($){

	//------ MAIN MENU ------//
	
	// To display the sub-menu on mobile devices
	$('.to-main-nav').click(function(e) {
		e.preventDefault();
		$('.main-nav').slideToggle();
	});

	// The following is to delay the hiding of the submenu
    var timeOut;
    
    $('.main-nav li a').hover(
	    function() {
		    
		    //when mouse hovers in
			$(this).siblings('.sub-menu').css('display', 'block');

        },
        function() {
	    
	    	var menu = this;
	        //when mouse hovers out
            timeOut = setTimeout( function(){
				$(menu).siblings('.sub-menu').css('display', 'none');
    		}, 250 );
    		
        }
    );
    
    // Highlights the main menu item
	$( ".sub-menu" ).hover(
		function() {
			clearTimeout(timeOut);
			$(this).siblings("a").addClass("mmhover");	
		},
		function() {
			$(this).siblings("a").removeClass("mmhover");
    		$(this).hide();
   		}
	);

	//------ PAGE MENUS ------//
	
	// To display the sub-menu on mobile devices
	$('.inner-nav-link').click(function(e) {
		e.preventDefault();
		$('#leftcolumn ul').slideToggle();
	});


	// To change colors of the side menu	
	if($(".current-menu-parent").length > 0)
	{
		var classNames = $(".current-menu-parent").attr("class").toString().split(' ');
		
		if (classNames !== false)
		{
			$('.current_page_item').addClass(classNames[0]);
		}
	}		

	//------ HOME PAGE SLIDERS ------//

	$('.bxslider').bxSlider({
		minSlides: 1,
		maxSlides: 1,
		slideWidth: 0,
		auto: true
	});


});