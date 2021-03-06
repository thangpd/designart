<?php /* Template Name: DesignArt2019*/ ?>
<?php
get_header( 'top2' );

$post           = get_page_by_title( 'Designart 2019' );
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

if ( false === ( $json = get_transient( 'special_query_fb' ) ) ) {

	$accessToken = 'EAAGeTfHqa2sBAGT5cdF3PZAqZAibKrtFBzHTpHMRSZBK8x7pgsWkFC5Lt8m8xUyFIdZBM1qjiC4ZCZC4giAexGs5dD3AkHukA8dEU3IV5CQExSQFQ7gGMtFXVwx5M66z7IUEZAOvgZBF9XVkUJt3pTVP2MhAMWemhAWpsldIdEZCVSgZDZD'; // designart アクセストークン(User Token)
	$search      = 'designart.jp/feed';
	$url         = 'https://graph.facebook.com/v4.0/' . $search . '?access_token=' . $accessToken;
	$jsonData    = file_get_contents( $url );

	// jsonデータの整形・出力
	$json = json_decode( $jsonData, true );
//    $str = json_encode($json['data']);
	// It wasn't there, so regenerate the data and save the transient
	set_transient( 'special_query_fb', $json, 6000 );
}

$active  = 'active';
$format  = '<div class="js-slide u-bg-img-hero-center">
                            <div class="item">
                               
                                    <div class="date">%2$s</div>
                                <div class="desc">
									 <a href="https://www.facebook.com/designart.jp/posts/%4$s" >%3$s                                </a>
                                </div>
                                </div>
                                </div>';
$content = '';
foreach ( $json['data'] as $value ):
	if ( empty( $value['message'] ) ) {
		continue;
	}
//	wp-content/themes/designart_2019/statics/images/top/banner2019.jpg
	$time = date( "Y年m月d日", strtotime( $value['created_time'] ) );
	$str1 = trim( strtok( $value['message'], "\n" ) );
	$str1 = strlen( $str1 ) > 25 ? mb_substr( $str1, 0, 25 ) . "..." : $str1;
//	$str1    = preg_replace( '/[^\w\s]+/u', '', strlen( $str1 ) > 70 ? substr( $str1, 0, 70 ) . "..." : $str1 );
	$id = explode( '_', $value['id'] );

	$content .= sprintf( $format, $active, $time, $str1, $id[1] );

	$active = '';
endforeach;

$description = str_replace( '{%CAROUSEL_NEWS%}', $content, $description );

/*$exhibitors = get_posts(array(
	'post_type'      => 'exhibitor',
	'post_status'    => 'publish',
	'posts_per_page' => 10,
	'orderby'        => 'publish_date',
	'order'          => 'DESC'
//    'orderby'    => ['post_modified' => 'desc'],
));*/
$events = get_posts( array(
	'post_type'      => 'event-party',
	'posts_per_page' => 5,
	'order'          => 'DESC',
	'orderby'        => 'post_date',
	'post_status'    => [ 'future' ],
) );

$exhibitor_list              = '';
$exhibitor_thumbnail_list    = '';
$exhibitor_list_mb           = '';
$exhibitor_thumbnail_list_mb = '';
foreach ( $events as $event ) {
	$exhibitor_id = $event->ID;
	$gallery      = get_field( 'thumbnail', $exhibitor_id );
	$time         = get_field( 'time_schedule', $exhibitor_id );


	$thumbail_url = $gallery;
	/*if ( ! empty($gallery))
	{
		$thumbail_url = take_value_array('url', $gallery[0]);
	}*/
	$exhibitor_title = get_field( $prefix_varible . 'title', $exhibitor_id );

	$exhibitor_list           .= '<div class="exhibitor_mySlides desc-wrapp">
                                         <p class="text-16">' . $time . ':</p> 
                                        <p class="text-24">
                                            ' . $exhibitor_title . '
                                        </p>
                                </div>';
	$exhibitor_thumbnail_list .= '
<div class="mySlides">
<img src="' . $thumbail_url . '"  style="width:100%" alt="" class="img-responsive">
</div>';


	$exhibitor_list_mb           .= '<div class="exhibitor_mySlidesmb desc-wrapp">
                                         <p class="text-16">' . $time . ':</p> 
                                        <p class="text-24">
                                            ' . $exhibitor_title . '
                                        </p>
                                </div>';
	$exhibitor_thumbnail_list_mb .= '
<div class="mySlidesmb">
<img src="' . $thumbail_url . '"  style="width:100%" alt="" class="img-responsive">
</div>';
}


$description = str_replace( '{%EXHIBITOR_LIST%}', $exhibitor_list, $description );
$description = str_replace( '{%EXHIBITOR_THUMBNAIL%}', $exhibitor_thumbnail_list, $description );
$description = str_replace( '{%EXHIBITOR_LIST_MB%}', $exhibitor_list_mb, $description );
$description = str_replace( '{%EXHIBITOR_THUMBNAIL_MB%}', $exhibitor_thumbnail_list_mb, $description );
echo $description;

//$prefix_varible_slider = get_prefix_languagle( $language, "-" );

//echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider"]' );
//echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider-2019"]' );
?>


<?php get_footer( 'top2' ); ?>

<script type="text/javascript">
    /* Add current menu
--------------------------------------------------*/


    jQuery(function ($) {
        $(document).ready(function () {
            $('a[data-demo="item-1"]').parent().addClass('current-menu-item');

            $('.js-slick-carousel').slick(
                {
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: true,
                    prevArrow: "<img class='a-left control-c prev slick-prev' src='<?php echo URL_STATICS; ?>/images/top/arrow-left-banner.png'>",
                    nextArrow: "<img class='a-right control-c next slick-next' src='<?php echo URL_STATICS; ?>/images/top/arrow-right-banner.png'>"

                }
            );


            setTimeout(function () {

                $('.slick-office-good').slick(
                    {
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        prevArrow: "<div><img class='a-left control-c prev slick-prev' src='<?php echo URL_STATICS; ?>/images/top/arrow-left-banner.png'></div>",
                        nextArrow: "<div><img class='a-right control-c next slick-next' src='<?php echo URL_STATICS; ?>/images/top/arrow-right-banner.png'></div>"

                    }
                );
            }, 500);
            setTimeout(function () {

                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    focusOnSelect: true,
                    nextArrow: "<div><img class='next ' src='<?php echo URL_STATICS; ?>/images/top/arrow-right-banner.png'></div>",
                    prevArrow: "<div><img class='prev ' src='<?php echo URL_STATICS; ?>/images/top/arrow-left-banner.png'></div>",

                });
            }, 800);

        });
    })

    ;(function ($) {
        var url = $(location).attr('href');
        if (url) {
            $('body').addClass('body-white');
        }

        // $.each($('#primary-menu li'), function (index) {
        //     $(this).find('a').attr('data-demo', 'item-'+index);
        // })
    })(jQuery);
</script>
