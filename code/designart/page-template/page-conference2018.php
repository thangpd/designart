<?php
get_header( 'top' );
$post           = get_page_by_path( 'conference' );
$post_id        = $post->ID;
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );
$description    = get_field( $prefix_varible . 'description', $post_id, false );
$description    = str_replace( '{%URL_STATICS%}', URL_STATICS, $description );

$html_share  = get_html_share( false );
$description = str_replace( '{%HTML_SHARE%}', $html_share, $description );

$description = str_replace( '{%HOME_URL%}', home_url(), $description );

$html_info   = get_html_information_post();
$description = str_replace( '{%INFORMATION_POST%}', $html_info, $description );

//    back history
$html_back   = back_page_history( false );
$description = str_replace( '{%BACK_HISTORY%}', $html_back, $description );

//    back history
$html_countdown = getHtmlCountdown( $post_id );
$description    = str_replace( '{%COUNT_DOWN%}', $html_countdown, $description );

//echo '<pre>';
//print_r( $post );
//echo '</pre>';
$page_title = $post->post_title;
/*
 * get_field:
 * list_conference arr
 * title_sumary   jp/cn_
 * conference_schedule   jp/cn_
 * venue          jp/cn_
 * price          jp/cn_
 * og:image
 *
 * */


$conference_schedule = get_field( $prefix_varible . 'conference_schedule', $post_id );
$venue    = get_field( $prefix_varible . 'venue', $post_id );
$price    = get_field( $prefix_varible . 'price', $post_id );
$og_image = get_field( 'og:image', $post_id );

$conference = get_field( 'list_conference', $post_id );


?>


<section class="wp-page conference-page">
    <div class="container">


        <a href="https://dat2018-conf.peatix.com/" role="button" class="btn btn-entry-fixed" target="_blank">
            <span class="text mb-10">TICKET</span>
            <span class="icon"></span>
        </a><!-- ./end .btn-entry-fixed -->

        <div class="conference-banner heading-title heading-style-02 mb-30">
            <h1 class="title mb-30"><?php echo $page_title; ?></h1>
            <div class="banner-wrapper">
                <div class="banner-image p-relative">
                    <img src="<?php echo $og_image['url']; ?>"
                         alt="banner-image" class="img-responsive"/>
                    <ul class="p-absolute title">

                        <li class="mb-10">DESIGNART</li>
                        <br>
                        <li class="mb-10">Conference</li>
                        <br>
                        <li>BRIDGE</li>
                    </ul>
                </div>
                <p class="banner-description cl-white mb-0 py-40"><?php
					echo $description;
					?></p>
            </div>
        </div><!-- ./end .conference-banner -->

        <div class="conference-summary-list st-list">
            <h2 class="title lineb">開催概要</h2>
            <div class="desc" style="color:#fff;">
				<?php


//				echo do_shortcode( '[conference_list style="style-2" prefix_varible="' . $prefix_varible . '" conference_list="' . urlencode( json_encode( $conference ) ) . '"]' );

				echo $conference_schedule;

				echo $venue;

				echo $price;
				?>


            </div>
        </div><!-- ./end .conference-summary-list -->

        <div class="conference-program heading-title heading-style-02">
            <h2 class="title lineb"><?php echo translate_text_language('DESIGNART CONFERECNE 2018 PROGRAM') ?></h2>
			<?php


			echo do_shortcode( '[conference_list style="style-1" prefix_varible="' . $prefix_varible . '" conference_list="' . urlencode( json_encode( $conference ) ) . '"]' );


			?>


        </div><!-- ./end .conference-program -->


    </div>
</section>

<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/slick/slick.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        // // Hàm scroll to section add class
        var section = $('.section'),
            nav_bar = $('.ds-header-black'),
            nav_bar_height = nav_bar.height();

        var site_url = '<?php echo site_url(); ?>';
        $(window).on('scroll', function () {
            var scroll_top = $(this).scrollTop();
            section.each(function () {
                var top = $(this).offset().top - nav_bar_height,
                    bottom = top + $(this).height();
                if (scroll_top >= top && scroll_top <= bottom) {
                    nav_bar.find('.anchor_scroll').removeClass('active-link');
                    nav_bar.find('a[href="#' + $(this).attr('id') + '"]').addClass('active-link');
                } else {
                    nav_bar.find('.anchor_scroll').removeClass('active-link');
                    nav_bar.find('a[id="mn-conference"]').addClass('active-link');
                }
            });
        });
        //click scroll to section
        $(document).on('click', '.anchor_scroll', function (e) {
            console.log($(this).attr('href'));
            if ($(this).attr('href') === '#contact') {
                e.preventDefault();
                $('.anchor_scroll').removeClass('active-link');
                $(this).addClass('active-link');
                var attr = $(this).attr("href");
                $('html, body').stop().animate({
                    scrollTop: $("" + attr + "").offset().top
                }, 1350, 'easeInOutExpo');
            } else {
                window.location.href = site_url + '/' + $(this).attr('href');
            }
        });
        // slick slider
        $('.slide-top').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            cssEase: 'linear',
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 5000,
        });
        // Open Menu
        $(document).on('click', '.ds-header-black #nav-icon-open', function (e) {
            e.preventDefault();
            $(this).parents('.site-header').addClass('menu-mb-active');
            $('.header-main').append('<div class="menu-backdrops"></div>');
        });
        // Click item close menu
        if ($(window).width() <= 767) {
            $(document).on('click', '.items-black-header li .anchor_scroll', function (e) {
                e.preventDefault();
                $(this).parents('.site-header').removeClass('menu-mb-active');
                $('.menu-backdrops').remove();
            });
        }


        //Bookmark to section program detail
        $(document).on('click', '.bookmark', function (e) {
            e.preventDefault();
            var attr = $(this).attr("href");

            if ($(window).width() >= 1000) {
                $('html, body').stop().animate({
                    scrollTop: $("" + attr + "").offset().top - nav_bar_height
                }, 1350, 'easeInOutExpo');
            } else {
                $('html, body').stop().animate({
                    scrollTop: $("" + attr + "").offset().top - nav_bar_height - 90
                }, 1350, 'easeInOutExpo');
            }
        });



        $('#mn-conference').addClass('active-link');
        $('#mn-conference').addClass('anchor_scroll');

    });
    window.addEventListener('DOMContentLoaded', function(){
        var html= document.getElementsByTagName('html');
        console.log(html);
        html[0].classList.remove('loading');
        var element = document.getElementById("pageCover");
        element.parentNode.removeChild(element);

    });

</script>
<div class="wp-back-to-top top2 show">
    <span class="line"></span>
    <span class="text">TOP</span>
</div>

<section id="contact" class="section contact-area section-4 ">
    <div class="wp-bg-skew wp-padding">
        <div class="wp-ds-ldpage">
            <div class="wp-block-contact landing-st contact-st">
                <div class="text-center">
	                <?php get_html_share(); ?>
                </div>
                <div class="title first  padding-tb-30">Contact</div>
                <div class="text-center group-btn">
                    <a href="mailto:info@designart.jp" class="btn btn-bg black">Contact for DESIGNARTs<i
                                class="icons fa fa-angle-right"></i></a>
                    <a href="<?php echo "mailto:designarttokyo@camronpr.com"; ?>"
                       class="btn btn-bg black">Contact for Press<i
                                class="icons fa fa-angle-right"></i></a>
                </div>


            </div>
        </div>
    </div>
    </div>
</section>

<?php
get_footer( 'top' );
?>
