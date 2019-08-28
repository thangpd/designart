jQuery(function($) {
    $(document).ready(function() {
        $('#primary-menu').find('a[data-demo=item-1]').parent().addClass('current-menu-item');
    });
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

}); 