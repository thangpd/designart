jQuery(function($) {
    $(document).on('click', '#main_header a.anchor_scroll', function () {
        var path = $(this).attr('href');
        var home_url = $('#home_url').data();
        window.location = home_url['url']+'/'+path;
        return false;
    })
	// Open Menu
	$(document).on('click', '.ds-header-black #nav-icon-open', function(e) {
		e.preventDefault();
		$(this).parents('.site-header').addClass('menu-mb-active');
		$('.header-main').append('<div class="menu-backdrops"></div>');
	});
	// Click item close menu
	if($(window).width() <= 767){
		$(document).on('click', '.items-black-header li .anchor_scroll', function(e) {
			e.preventDefault();
			$(this).parents('.site-header').removeClass('menu-mb-active');
			$('.menu-backdrops').remove();
		});
	}
})
