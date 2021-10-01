var scroll = new SmoothScroll('a[href*="#"]');

//add shadow when scroll
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll >= 10) {
		$('.navbar').addClass('shadow-sm');
	} else {
		$('.navbar').removeClass('shadow-sm');
	}
});
