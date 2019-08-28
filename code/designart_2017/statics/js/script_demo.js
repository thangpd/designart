jQuery(function ($) {
    // console.log('load js');
    $(document).ready(function () {
    $.each($('#primary-menu >li'), function (index) {
      $(this).find('a').attr('data-demo', 'item-'+index);
    })
	$('.menu >li >a[data-demo="item-0"],.menu >li >a[data-demo="item-2"],.menu >li >a[data-demo="item-4"]').parents("li").addClass('scroll-menu-item')
    $(document).on("scroll", onScroll);
    
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    if($('.designart-page').length){
        $('.menu> li.scroll-menu-item').each(function () {
            var currLink = $(this);
            var refElement = $('#'+currLink.children('a').attr("data-demo"));
            if (refElement.position().top - 150 <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.menu> li').removeClass("current-menu-item");
                currLink.addClass("current-menu-item");
            }
            else{
                currLink.removeClass("current-menu-item");
            }
        });
    }
}
 $(window).scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('.wp-back-to-top').addClass('show');
        } else {
            $('.wp-back-to-top').removeClass('show');
        }
    });
})