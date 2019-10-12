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
$format  = '<div class="item %1$s">
                                <a href="%4$s">
                                <div class="date">%2$s</div>
                                <div class="desc">
									%3$s
                                </div>
                                </a>
                            </div>';
$content = '';
foreach ( $json['data'] as $value ):
	if ( empty( $value['message'] ) ) {
		continue;
	}
//	wp-content/themes/designart_2019/statics/images/top/banner2019.jpg
	$time = date( "Y年m月d", strtotime( $value['created_time'] ) );
	$str1 = trim( strtok( $value['message'], "\n" ) );
	$str1 =  strlen( $str1 ) > 70 ? substr( $str1, 0, 70 ) . "..." : $str1;
//	$str1    = preg_replace( '/[^\w\s]+/u', '', strlen( $str1 ) > 70 ? substr( $str1, 0, 70 ) . "..." : $str1 );
	$content .= sprintf( $format, $active, $time, $str1, $value['id'] );

	$active = '';
endforeach;

$description = str_replace( '{%CAROUSEL_NEWS%}', $content, $description );

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
            $('a[data-demo=item-0]').parent().addClass('current-menu-item');
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
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }


    var slideIndex2 = 1;
    showSlides2(slideIndex2);

    function plusSlides2(n) {
        showSlides2(slideIndex2 += n);
    }

    function currentSlide2(n) {
        showSlides2(slideIndex2 = n);
    }

    function showSlides2(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides2");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex2 = 1
        }
        if (n < 1) {
            slideIndex2 = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex2 - 1].style.display = "block";
        dots[slideIndex2 - 1].className += " active";
        // setInterval(plusSlides2(1), 3000);
    }

    document.addEventListener("DOMContentLoaded", function (event) {
        setInterval(function () {
            plusSlides2(1)
        }, 3000);
    });

</script>
