$(function() {
	
    var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 5,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 10,
        loop: true
    });
    
    $(document).on('click', 'a.menu-about', function (event) {
    	event.stopPropagation();
    	$('html, body').animate({
		    scrollTop: ($("section.site-about-wrapper").offset().top - 80)
		}, 800);
    });
    
    $(document).on('click', 'a.menu-contact', function (event) {
    	event.stopPropagation();
    	$('html, body').animate({
		    scrollTop: ($("section.site-contact-wrapper").offset().top - 80)
		}, 800);
    });
    
    $('#carousel-example-generic').bcSwipe({ threshold: 50 });

});