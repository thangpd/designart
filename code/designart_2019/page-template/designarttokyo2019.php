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

$exhibitors               = get_posts( array(
	'post_type'      => 'exhibitor',
	'post_status'    => 'publish',
	'posts_per_page' => 10,
	'orderby'        => 'rand'
//    'orderby'    => ['post_modified' => 'desc'],
) );
$exhibitor_thumbnail_list = '';
$exhibitor_list           = '';
foreach ( $exhibitors as $exhibitor ) {
	$exhibitor_id        = $exhibitor->ID;
	$exhibitor_thumbnail = get_field( 'exhibitor_thumbnail', $exhibitor_id, '' );
	$gallery             = get_field( 'exhibitor_gallery', $exhibitor_id );
	$time                = get_field( $prefix_varible . 'exhibitor_venue', $exhibitor_id );
	$thumbail_url        = '';
	if ( ! empty( $gallery ) ) {
		$thumbail_url = take_value_array( 'url', $gallery[0] );
	}

	if ( ! empty( $exhibitor_thumbnail ) ) {
		$exhibitor_thumbnail = take_value_array( 'url', $exhibitor_thumbnail, $exhibitor_thumbnail );
		$thumbail_url        = wp_get_attachment_image_url( $exhibitor_thumbnail );
	}

	$exhibitor_title          = get_field( $prefix_varible . 'exhibitor_title', $exhibitor_id );
	$exhibitor_thumbnail_list .= '
<div class="mySlides">
<a href="' . get_permalink( $exhibitor_id ) . '" class="link">  
<img src="' . $thumbail_url . '"  style="width:100%" alt="" class="img-responsive">
 </a>
</div>';
	$exhibitor_list           .= '<div class="exhibitor_mySlides desc-wrapp">
                                         <p class="text-16">' . $time[0]['information'][2]['value'] . ':</p> 
                                        <p class="text-24">
                                            ' . $exhibitor_title . '
                                        </p>
                                </div>';
}


$description = str_replace( '{%EXHIBITOR_LIST%}', $exhibitor_list, $description );
$description = str_replace( '{%EXHIBITOR_THUMBNAIL%}', $exhibitor_thumbnail_list, $description );
//echo $description;

//$prefix_varible_slider = get_prefix_languagle( $language, "-" );

//echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider"]' );
//echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider-2019"]' );
?>


<section>
    <div class="banner-top">
        <div class="content">
            <h1 class="title-h1">DESIGN & ART
                <span>into emotions</span></h1>
            <div class="banner-top-sub">DESIGNART TOKYO 2019
                <p>2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p></div>
        </div>
        <div class="scroll mb-block"><img src="<?php echo URL_STATICS ?>/images/top/scroll.png" alt=""/></div>
        <div class=" banner-top-btn js-slick-carousel u-slick"
             data-autoplay="true"
             data-speed="10000"
             data-infinite="true"
             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
             data-arrow-left-classes="fa fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
             data-arrow-right-classes="fa fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4">

            <?php echo $content; ?>
        </div>

    </div>
</section>
<section class="container">
    <div class="banner-center">
        <h2 class="title-h2">TOKYO TRANSFORMED <br>
            INTO A MUSEUM</h2>
        <p class="text-32">東京の街全体がミュージアムになる10日間</p>
        <p class="text-35">2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p>
        <p class="text-28">表参道・外苑前、原宿・明治神宮前、渋谷・恵比寿、代官山・中目黒、六本木、新宿、銀座 で開催</p>
    </div>
</section>
<section class="container-black">
    <div class="banner-bottom container">
        <span class="about">ABOUT</span>
        <h4 class="title-h4">
            BRINGING EMOTION
            <span>INTO LIVES <span class="mb-block">感動を、すべての人々に</span></span>
        </h4>
        <p class="text-18 dt-block">感動を、すべての人々に</p>
        <p class="text-20">「DESIGNART
            TOKYO」は、毎年秋に開催するデザイン＆アートフェスティバルです。世界屈指のミックスカルチャー都市である東京を舞台に、世界中からアート、インテリア、ファッション、テクノロジーなどさまざまなジャンルのモノやコトが集結し、都内各所で多彩な作品を発表していきます。</p>
        <a href="{%HOME_URL%}/about" class="text-38 more dt-block">more <span><img
                        src="<?php echo URL_STATICS ?>/images/top/arrow-item.png"></span></a>
    </div>
</section>
<section class="container">
    <div class="main-content">
        <h3 class="title-h3">DESIGNART GUIDE</h3>
        <p class="text-28 sub-title">EVERYONE CAN ENJOY<br>
            DESIGN & ART</p>
        <div class="steps dt-block">
            <div class="step-item step-1">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span class="number">01.</span>
                            <span>DISCOVER ART</span>
                        </div>
                        <div class="sub-title">アートに出会う
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-18">2019年は120組、11エリアで作品を展示します。</p>
                        <div class="link-group">
                            <a href="{%HOME_URL%}/exhibitor/" class="link-step">
                                <div class="left">
                                    <div class="text-38">exhibition list</div>
                                    <div class="text-20">展示作品一覧</div>
                                </div>
                                <div class="right">
                                    <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                            <a href="https://www.google.com/maps/d/u/0/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397681%2C139.72963319999997&z=13"
                               class="link-step">
                                <div class="left">
                                    <div class="text-38">guide map</div>
                                    <div class="text-20">展示マップ</div>
                                </div>
                                <div class="right">
                                    <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS ?>/images/top/discoverart.jpg" alt=""/>
                </div>
            </div>
            <div class="step-item step-2">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span class="number">02.</span>
                            <span>LEARN ART</span>
                        </div>
                        <div class="sub-title">アートを学ぶ
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-16">デザイナートカンファレンス「BRIDGE」は、アート<br>
                            とデザインの視点から今、社会で起きている変化につ<br>
                            いて考え学び意見を交換し合う場です。</p>
                        <div class="link-group">
                            <a href="http://designart.jp/conference2019/" class="more link-step">
                                <div class="left">
                                    <div class="text-38">more</div>
                                </div>
                                <div class="right">
                                    <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS ?>/images/top/learnart.jpg" alt=""/>
                </div>
            </div>
            <div class="step-item step-slick ">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>EVENT & PARTY</span>
                        </div>
                    </div>
                    <div class="desc">
		                <?php echo $exhibitor_list; ?>
                    </div>
                </div>

                <div class="img-wrapper img-slick">


                    <div class="slideshow-container">
                        <!--thumbail-->
					    <?php echo $exhibitor_thumbnail_list; ?>

                        <a class="prev" onclick="plusSlides(-1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-left-banner.png"></a>
                        <a class="next" onclick="plusSlides(1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-right-banner.png"></a>

                    </div>
                    <div style="text-align:center;display:none;">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>

            </div>
            <div class="step-item step-3">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span class="number">03.</span>
                            <span>BY ART</span>
                        </div>
                        <div class="sub-title">アートを買う
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-16">デザイナートで展示されているアート作品は一部を除<br>いて全て購入可能です。</p>
                    </div>
                </div>

                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS ?>/images/top/buyart.jpg" alt=""/>
                </div>

            </div>
            <div class="step-item step-slick mb-110">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>OFFICIAL CAFE <br> & GOODS</span>
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-16 cs-mb"> 展示巡りに役立つオフィシャルガイドブック</p>
                        <div class="link-group">
                            <a href="{%HOME_URL%}/about" class=" more link-step">
                                <div class="left">
                                    <div class="text-38">more</div>
                                </div>
                                <div class="right">
                                    <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="img-wrapper img-slick mb-230">

                    <div class="slideshow-container">

                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide01.jpg" style="width:100%">
                        </div>

                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide02.jpg" style="width:100%">
                        </div>

                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide03.jpg" style="width:100%">
                        </div>
                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide04.jpg" style="width:100%">
                        </div>

                        <a class="prev " onclick="plusSlides2(-1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-left-banner.png"/></a>
                        <a class="next " onclick="plusSlides2(1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-right-banner.png"/></a>
                    </div>
                    <div style="text-align:center;display:none;">
                        <span class="dot" onclick="currentSlide2(1)"></span>
                        <span class="dot" onclick="currentSlide2(2)"></span>
                        <span class="dot" onclick="currentSlide2(3)"></span>
                        <span class="dot" onclick="currentSlide2(4)"></span>
                    </div>
                </div>

            </div>
        </div>
        <div class="steps mb-block">
            <div class="step-item step-1">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">01.</span>
                        <span>DISCOVER ART</span>
                    </div>
                    <div class="sub-title">アートに出会う
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS ?>/images/top/discoverart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-18">2019年は120組、11エリアで作品を展示します。</p>
                    <div class="link-group">
                        <a href="{%HOME_URL%}/exhibitor/" class="link-step">
                            <div class="left">
                                <div class="text-38">exhibition list</div>
                                <div class="text-20">展示作品一覧</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                        <a href="https://www.google.com/maps/d/u/0/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397681%2C139.72963319999997&z=13"
                           class="link-step">
                            <div class="left">
                                <div class="text-38">guide map</div>
                                <div class="text-20">展示マップ</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="step-item step-2">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">02.</span>
                        <span>LEARN ART</span>
                    </div>
                    <div class="sub-title">アートを学ぶ
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS ?>/images/top/learnart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">デザイナートカンファレンス「BRIDGE」は、アート<br>
                        とデザインの視点から今、社会で起きている変化につ<br>
                        いて考え学び意見を交換し合う場です。</p>
                    <div class="link-group">
                        <a href="http://designart.jp/conference2019/" class="more link-step">
                            <div class="left">
                                <div class="text-38">more</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="step-item step-slick ">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span>EVENT & PARTY</span>
                    </div>
                </div>
                <div class="img-wrapper img-slick">


                    <div class="slideshow-container">
                        <!--thumbail-->
                        <?php echo $exhibitor_thumbnail_list; ?>

                        <a class="prev" onclick="plusSlides(-1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-left-banner.png"></a>
                        <a class="next" onclick="plusSlides(1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-right-banner.png"></a>

                    </div>
                    <div style="text-align:center;display:none;">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
                <div class="desc">
                    <?php echo $exhibitor_list; ?>
                </div>
            </div>
            <div class="step-item step-3">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">03.</span>
                        <span>BY ART</span>
                    </div>
                    <div class="sub-title">アートを買う
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo URL_STATICS ?>/images/top/buyart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">デザイナートで展示されているアート作品は一部を除<br>いて全て購入可能です。</p>
                </div>
            </div>
            <div class="step-item step-slick mb-110">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span>OFFICIAL CAFE <br> & GOODS</span>
                    </div>
                </div>
                <!--<div class="img-wrapper img-slick mb-230">
                    <img src="<?php /*echo URL_STATICS; */ ?>/images/top/cafeandgood.jpg" alt=""/>
                </div>-->
                <div class="img-wrapper img-slick mb-230">

                    <div class="slideshow-container">

                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide01.jpg" style="width:100%">
                        </div>

                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide02.jpg" style="width:100%">
                        </div>

                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide03.jpg" style="width:100%">
                        </div>
                        <div class="mySlides2 ">
                            <img src="<?php echo URL_STATICS ?>/images/top/slide04.jpg" style="width:100%">
                        </div>

                        <a class="prev " onclick="plusSlides2(-1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-left-banner.png"/></a>
                        <a class="next " onclick="plusSlides2(1)"><img
                                    src="<?php echo URL_STATICS ?>/images/top/arrow-right-banner.png"/></a>
                    </div>
                    <div style="text-align:center;display:none;">
                        <span class="dot" onclick="currentSlide2(1)"></span>
                        <span class="dot" onclick="currentSlide2(2)"></span>
                        <span class="dot" onclick="currentSlide2(3)"></span>
                        <span class="dot" onclick="currentSlide2(4)"></span>
                    </div>
                </div>
                <div class="desc">
                    <p class="text-16 cs-mb"> 展示巡りに役立つオフィシャルガイドブック</p>
                    <div class="link-group">
                        <a href="{%HOME_URL%}/about" class=" more link-step">
                            <div class="left">
                                <div class="text-38">more</div>
                            </div>
                            <div class="right">
                                <img src="<?php echo URL_STATICS ?>/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="wp-back-to-top-wrap">
    <div class="wp-back-to-top top top2">
        <img src="<?php echo URL_STATICS ?>/images/commons/to_top_bt.png" alt="TOP">
    </div>
</div>


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
