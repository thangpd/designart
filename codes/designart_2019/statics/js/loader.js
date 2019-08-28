jQuery(function ($) { 
	var _pj = _pj || {};
	var pj = pj || {};
	pj.param = new Array();
	/* loading
--------------------------------------------------*/
pj.loading = function(){
	var
		_me = this,
		$html = $('html'),
		$cover = $('#pageCover'),
		$icons = $('<div class="icons" />');
	_me.show = function(){
		$html.removeClass('loading');
		$cover.fadeOut(pj.duration, function(){
			$html.addClass('loaded');
			$icons.hide();
		});
	};
	_me.hide = function(callback){
		$cover.fadeIn(pj.duration, function(){
			callback();
		});
	};
	_me.pagechange = function(){
		$(document).on('click', 'a[href]', function(){
			var anc = this.href;
			if( $(this).data('noloading') ) return;
			if(
					anc.indexOf(pj.thisURL) != -1
					&& $(this).attr('target') != '_blank'
					&& !$(this).is('[href^="#"]')
					&& !$(this).is('[href^="mailto:"]')
				) {
				
				_me.hide(function(){
					location.href = anc;
				});
				return false;
			}
		});
	};
	_me.init = function(){
		if( pj.param['loading'] === 'false' ) {
			$(window).on('load pageshow', function(){
				$cover.hide();
				$html.addClass('loaded');
				_pj.smoothScroll.pageChangeScroll();
				_me.pagechange();
			});
		} else {
			$icons
				.append('<span></span><span></span><span></span>')
				.appendTo($cover);
			$html.addClass('loading');
			$(window).on('load pageshow', function(){
				setTimeout(function(){
					_me.show();
				}, 1000);
				_me.pagechange();
			});
		}
	};

	_me.init();
};
	$(document).ready(function(){
		_pj.loading = new pj.loading();
	})
})
window.addEventListener('DOMContentLoaded', function(){
    var html= document.getElementsByTagName('html');
    console.log(html);
    html[0].classList.remove('loading');
    var element = document.getElementById("pageCover");
    element.parentNode.removeChild(element);

});
