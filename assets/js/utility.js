var scroll = new SmoothScroll('a[href*="#"]');

//add shadow when scroll
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll >= 10) {
		$('#navbarTop').addClass('shadow-sm');
	} else {
		$('#navbarTop').removeClass('shadow-sm');
	}
});
