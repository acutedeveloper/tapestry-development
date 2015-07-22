jQuery(document).ready(function($){

	//------ MAIN MENU ------//
	$('.to-main-nav').click(function(e) {
		e.preventDefault();
		$('.main-nav').slideToggle();
	});

	//------ PAGE MENUS ------//
	$('.inner-nav-link').click(function(e) {
		e.preventDefault();
		$('#leftcolumn ul').slideToggle();
	});

	//------ HOME PAGE SLIDERS ------//

	$('.bxslider').bxSlider({
		minSlides: 1,
		maxSlides: 1,
		slideWidth: 0,
		auto: true
	});


});

