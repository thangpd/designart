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

$exhibitors                  = get_posts( array(
	'post_type'      => 'exhibitor',
	'post_status'    => 'publish',
	'posts_per_page' => 10,
	'orderby'        => 'publish_date',
	'order'          => 'DESC'
//    'orderby'    => ['post_modified' => 'desc'],
) );
$exhibitor_list              = '';
$exhibitor_thumbnail_list    = '';
$exhibitor_list_mb           = '';
$exhibitor_thumbnail_list_mb = '';
foreach ( $exhibitors as $exhibitor ) {
	$exhibitor_id        = $exhibitor->ID;
	$exhibitor_thumbnail = get_field( 'exhibitor_thumbnail', $exhibitor_id, '' );
	$gallery             = get_field( 'exhibitor_gallery', $exhibitor_id );
	$time                = get_field( $prefix_varible . 'exhibitor_venue', $exhibitor_id );
	$thumbail_url        = '';
	if ( ! empty( $gallery ) ) {
		$thumbail_url = take_value_array( 'url', $gallery[0] );
	}
	/*
	if ( ! empty( $exhibitor_thumbnail ) ) {
		$exhibitor_thumbnail = take_value_array( 'url', $exhibitor_thumbnail, $exhibitor_thumbnail );
		$thumbail_url        = wp_get_attachment_image_url( $exhibitor_thumbnail );
	}*/

	$exhibitor_title          = get_field( $prefix_varible . 'exhibitor_title', $exhibitor_id );
	$exhibitor_list           .= '<div class="exhibitor_mySlides desc-wrapp">
                                         <p class="text-16">' . $time[0]['information'][2]['value'] . ':</p> 
                                        <p class="text-24">
                                            ' . $exhibitor_title . '
                                        </p>
                                </div>';
	$exhibitor_thumbnail_list .= '
<div class="mySlides">
<a href="' . get_permalink( $exhibitor_id ) . '" class="link">  
<img src="' . $thumbail_url . '"  style="width:100%" alt="" class="img-responsive">
 </a>
</div>';


	$exhibitor_list_mb           .= '<div class="exhibitor_mySlidesmb desc-wrapp">
                                         <p class="text-16">' . $time[0]['information'][2]['value'] . ':</p> 
                                        <p class="text-24">
                                            ' . $exhibitor_title . '
                                        </p>
                                </div>';
	$exhibitor_thumbnail_list_mb .= '
<div class="mySlidesmb">
<a href="' . get_permalink( $exhibitor_id ) . '" class="link">  
<img src="' . $thumbail_url . '"  style="width:100%" alt="" class="img-responsive">
 </a>
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
            $('a[data-demo=item-0]').parent().addClass('current-menu-item');
        });
    })

    ;(function ($) {
        var url = $(location).attr('href');
        if (url) {
            $('body').addClass('body-white');
        }

        $('.js-slick-carousel').slick(
            {
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                prevArrow: "<img class='a-left control-c prev slick-prev' src='<?php echo URL_STATICS; ?>/images/top/arrow-left-banner.png'>",
                nextArrow: "<img class='a-right control-c next slick-next' src='<?php echo URL_STATICS; ?>/images/top/arrow-right-banner.png'>"

            }
        );


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
        var exhibitor = document.getElementsByClassName("exhibitor_mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            exhibitor[i].style.display = "none";

        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        exhibitor[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    var slideIndexmb = 1;
    showSlidesmb(slideIndexmb);

    function plusSlidesmb(n) {
        showSlidesmb(slideIndexmb += n);
    }

    function currentSlidemb(n) {
        showSlidesmb(slideIndexmb = n);
    }

    function showSlidesmb(n) {
        let i;
        let slides = document.getElementsByClassName("mySlidesmb");
        let exhibitor = document.getElementsByClassName("exhibitor_mySlidesmb");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndexmb = 1
        }
        if (n < 1) {
            slideIndexmb = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            exhibitor[i].style.display = "none";

        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndexmb - 1].style.display = "block";
        exhibitor[slideIndexmb - 1].style.display = "block";
        dots[slideIndexmb - 1].className += " active";
    }

    var slideIndexmb2 = 1;
    showSlidesmb2(slideIndexmb2);

    function plusSlidesmb2(n) {
        showSlidesmb2(slideIndexmb2 += n);
    }

    function currentSlidemb2(n) {
        showSlidesmb2(slideIndexmb2 = n);
    }

    function showSlidesmb2(n) {
        var i;
        var slides = document.getElementsByClassName("mySlidesmb2");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndexmb2 = 1
        }
        if (n < 1) {
            slideIndexmb2 = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";

        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndexmb2 - 1].style.display = "block";
        dots[slideIndexmb2 - 1].className += " active";
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
        console.log(slides);
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
    }

    document.addEventListener("DOMContentLoaded", function (event) {
        setInterval(function () {
            // plusSlides(1)
            plusSlidesmb(1)
            plusSlides2(1)
            plusSlidesmb2(1)
        }, 3000);
    });

</script>
