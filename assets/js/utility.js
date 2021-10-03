//add shadow when scroll
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll >= 10) {
		$('#topNav').addClass('shadow-sm');
	} else {
		$('#topNav').removeClass('shadow-sm');
	}
});
