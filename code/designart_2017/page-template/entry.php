<?php
/* Template Name: Template Entry */

get_header('top');

$redirect_url = $_SERVER['REDIRECT_URL'];
$reg = '/(.*)\/(.*)\/$/';
preg_match($reg, $redirect_url, $maths);
$post = get_page_by_path( $maths[2], OBJECT, 'page' );
if (!empty($post)) {
    $post_id = $post->ID;
    $language = get_key_languagle();
    $prefix_varible = get_prefix_languagle($language, "_");
    $description = get_field($prefix_varible.'description', $post_id, false );
    $description = str_replace('{%URL_STATICS%}', URL_STATICS, $description);

    $html_share = get_html_share(false);
    $description = str_replace('{%HTML_SHARE%}', $html_share, $description);

//    back history
    $html_back = back_page_history(false);
    $description = str_replace('{%BACK_HISTORY%}', $html_back, $description);
// html banner page
    $html_banner_page = get_html_banner_page();
    $description = str_replace('{%BANNER_PAGE%}', $html_banner_page, $description);

    echo $description;
    // echo apply_filters('the_content', $description);
}
?>
    <script src="<?php echo URL_STATICS ?>/js/top2_custom.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/slick/slick.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            //click scroll to section
            $(document).on('click','.anchor_scroll',function(e) {
                e.preventDefault();
                $('.anchor_scroll').removeClass('active-link');
                $(this).addClass('active-link');
                var attr  = $(this).attr("href");
                $('html, body').stop().animate({
                    scrollTop: $(""+attr+"").offset().top
                },1350,'easeInOutExpo');
            });
            // Hàm scroll to section add class
            var section = $('.section'),
                nav_bar = $('.ds-header-black'),
                nav_bar_height = nav_bar.height();
            $(window).on('scroll', function() {
                var scroll_top = $(this).scrollTop();
                section.each(function () {
                    var top = $(this).offset().top - nav_bar_height,
                        bottom = top + $(this).height();
                    if (scroll_top >= top && scroll_top <= bottom) {
                        nav_bar.find('.anchor_scroll').removeClass('active-link');
                        nav_bar.find('a[href="#' + $(this).attr('id') + '"]').addClass('active-link');
                    }
                });
            });
            // slick slider
            $('.slide-top').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                cssEase: 'linear',
                arrows:false,
                dots:false,
                autoplay: true,
                autoplaySpeed: 5000,
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
        })
    </script>
<?php
get_footer('top');
?>