jQuery(function ($) {
	// get firstletter
	// $('.first-letter').each(function(index, el) {
	// 	var str = $(this).parents('.heading-title').find('.title').text();
	// 	var result= str.substring(0, 1);
	// 	$(this).html(result);
	// });
	
	var getHeaderHeight = $('.main-header-page').outerHeight();
	var borderAmount = 0;
	var shadowAmount = 4;
	var lastScrollPosition = 0,
		fixNotopBar = 36,
		adminbar;
	if($('body').hasClass('admin-bar')){
		adminbar =32;
	}
	else {
		adminbar=0;
	}
	$('.header-main').css('top', '-' + (getHeaderHeight + shadowAmount + borderAmount) + 'px');

	$(window).scroll(function() {
		var currentScrollPosition = $(window).scrollTop();

		if ($(window).scrollTop() > 0 ) {

			$('body').addClass('scrollActive').css('padding-top', getHeaderHeight);
			if($('body').hasClass('admin-bar')){
				$('.header-main').css('top', '-'+(fixNotopBar-adminbar)+'px');
			}
			else{
				$('.header-main').css('top', '-'+fixNotopBar+'px');
			}
			
			lastScrollPosition = currentScrollPosition;

		} else {
			$('body').removeClass('scrollActive').css('padding-top', 0);
		}
	});

	// Menu mobile JS
	$(document).on('click', '#nav-icon3', function(e) {
		e.preventDefault();
		$(this).parents('.site-header').removeClass('menu-mb-active');
		$('.menu-backdrops').remove();
		$("body").removeAttr( 'style' );
	});
	$(document).on('click', '.menu-backdrops', function(event) {
		event.preventDefault();
		$('.site-header').removeClass('menu-mb-active');
		$("body").removeAttr( 'style' );
		$(this).remove();
	});
	$(document).on('click', '#nav-icon2', function(e) {
		e.preventDefault();
		$(this).parents('.site-header').addClass('menu-mb-active');
		$('.header-main').append('<div class="menu-backdrops"></div>');
		$("body").css({
			'position': 'fixed',
			'z-index:': '-1',
			'top':'0px',
			'left':'0px',
			'touch-action':'none'
		});
	});
	// Back to top
	$(document).on('click','.wp-back-to-top', function(e) {
    	e.preventDefault();
    	$('html,body').stop().animate({
    		scrollTop: 0
    	},1200,'easeInOutExpo');
    });
    // clickable map
	$('#btn-a').click(function(event) {
		$('.table-exhibition th').removeClass('active');
		$(this).parents('th').addClass('active');
		$('.cl-b,.cl-c').css('display', 'none');
		$('.cl-a').css('display', 'inline-block');
	});	
	$('#btn-b').click(function(event) {
		$('.table-exhibition th').removeClass('active');
		$(this).parents('th').addClass('active');
		$('.cl-a,.cl-c').css('display', 'none');
		$('.cl-b').css('display', 'inline-block');
	});	
	$('#btn-c').click(function(event) {
		$('.table-exhibition th').removeClass('active');
		$(this).parents('th').addClass('active');
		$('.cl-b,.cl-a').css('display', 'none');
		$('.cl-c').css('display', 'inline-block');
	});
    
    // active tab
    $('#mapArea .tab li a').on('click', function(){
	    $('#mapArea .tab li a').removeClass('active-map');
	    $(this).addClass('active-map');
	});
	var linkMap = $('#mapArea .map iframe').attr('src');
	console.log(linkMap);
	$('.area-map-st .btn-map-link').attr('href', linkMap);
    var pj = pj || {};
    var
		_me = this,
		$tab = $('#mapArea .tab'),
		$map = $('#mapArea .map'),
		$mapFrame = $map.find('iframe');
		_me.change = function(category){
		var map = $tab.find('li[data-category="'+category+'"]').data('map');
		$tab.find('li[data-category="'+category+'"]').addClass('on')
			.siblings().removeClass('on');
		$map.addClass('loading');
		$('.area-map-st .btn-map-link').attr('href', 'https://www.google.com/maps/d/embed?mid='+map);
		$mapFrame
			.css({visibility:'hidden', opacity:0})
			.attr('src', 'https://www.google.com/maps/d/embed?mid='+map)
			.load(function(){
				$map.removeClass('loading');
				$mapFrame
					.css({visibility:'visible'})
					.animate({opacity:1});
			});
	};

	// 
	_me.init = function(){
		// if( $tab.find('li[data-category="'+initCategory+'"]').length ) {
		// 	_me.change(initCategory);
		// } else {
		// 	_me.change('all');
		// }
		$tab.find('li').each(function(){
			var category = $(this).data('category');
			$(this).find('a').on('click', function(){
				_me.change(category);
				return false;
			});
		});
	};
	_me.init();
	console.log('load mainjs');

})