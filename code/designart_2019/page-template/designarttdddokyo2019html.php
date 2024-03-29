<?php /* Template Name: DesignArt2019*/ ?>
<?php
get_header('top2');

$post           = get_page_by_title('Designart 2019');
$post_id        = $post->ID;
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");
$description    = get_field($prefix_varible . 'description', $post_id, FALSE);
$description    = str_replace('{%URL_STATICS%}', URL_STATICS, $description);

$html_share  = get_html_share(FALSE);
$description = str_replace('{%HTML_SHARE%}', $html_share, $description);

$description = str_replace('{%HOME_URL%}', home_url(), $description);

$description = str_replace('{%HOME_MAIN_URL%}', get_home_url(), $description);

$html_info   = get_html_information_post();
$description = str_replace('{%INFORMATION_POST%}', $html_info, $description);

//    back history
$html_back   = back_page_history(FALSE);
$description = str_replace('{%BACK_HISTORY%}', $html_back, $description);

//    back history
$html_countdown = getHtmlCountdown($post_id);
$description    = str_replace('{%COUNT_DOWN%}', $html_countdown, $description);

if (FALSE === ($json = get_transient('special_query_fb')))
{

	$accessToken = 'EAAGeTfHqa2sBAGT5cdF3PZAqZAibKrtFBzHTpHMRSZBK8x7pgsWkFC5Lt8m8xUyFIdZBM1qjiC4ZCZC4giAexGs5dD3AkHukA8dEU3IV5CQExSQFQ7gGMtFXVwx5M66z7IUEZAOvgZBF9XVkUJt3pTVP2MhAMWemhAWpsldIdEZCVSgZDZD'; // designart アクセストークン(User Token)
	$search      = 'designart.jp/feed';
	$url         = 'https://graph.facebook.com/v4.0/' . $search . '?access_token=' . $accessToken;
	$jsonData    = file_get_contents($url);

	// jsonデータの整形・出力
	$json = json_decode($jsonData, TRUE);
//    $str = json_encode($json['data']);
	// It wasn't there, so regenerate the data and save the transient
	set_transient('special_query_fb', $json, 6000);
}


$active  = 'active';
$format  = '<div class="item %1$s">
                                <div class="date">%2$s</div>
                                <div class="desc">
									%3$s
                                </div>
                            </div>';
$content = '';
foreach ($json['data'] as $value):
	if (empty($value['message']))
	{
		continue;
	}
	$time    = date("Y-m-d", strtotime($value['created_time']));
	$str1    = trim(strtok($value['message'], "\n"));
	$str1    = strlen($str1) > 100 ? substr($str1, 0, 100) . "..." : $str1;
	$content .= sprintf($format, $active, $time, $str1);

	$active = '';
endforeach;

$description = str_replace('{%CAROUSEL_NEWS%}', $content, $description);

//echo $description;

//$prefix_varible_slider = get_prefix_languagle( $language, "-" );

//echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider"]' );
//echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider-2019"]' );
?>
<!--en-->
<section>
    <div class="banner-top">
        <div class="content">
            <h1 class="title-h1">DESIGN & ART
                <span>into emotions</span></h1>
            <div class="banner-top-sub">DESIGNART TOKYO 2019
                <p>2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p></div>
        </div>
        <div class="scroll mb-block"><img src="{%URL_STATICS%}/images/top/scroll.png" alt=""/></div>
        <div class=" banner-top-btn js-slick-carousel u-slick"
             data-autoplay="true"
             data-speed="10000"
             data-infinite="true"
             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
             data-arrow-left-classes="fa fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
             data-arrow-right-classes="fa fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4">

            {%CAROUSEL_NEWS%}
        </div>
    </div>
</section>
<section class="container">
    <div class="banner-center">
        <h2 class="title-h2 pc-hidden">TOKYO TRANSFORMED <br>
            INTO A MUSEUM</h2>
        <h2 class="title-h2 mobile-hidden">TOKYO <br>
            TRANSFORMED <br> INTO A MUSEUM</h2>
        <p class="text-35">2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p>
        <p class="text-28">HELD IN OMOTESANDO / GAIENMAE / HARAJUKU・MEIJI JINGUMAE / SHIBUYA・EBISU /
            DAIKANYAMA・NAKAMEGURO / ROPPONGI / SHINJUKU / GINZA</p>
    </div>
</section>
<section class="container-black">
    <div class="banner-bottom container">
        <span class="about">ABOUT</span>
        <h4 class="title-h4">
            BRINGING EMOTION
            <span>INTO LIVES</span>
        </h4>

        <p class="text-20">"DESIGNART TOKYO" IS A DESIGN & ART FESTIVAL HELD EVERY FALL. THERE ARE MANY EXHIBITIONS TO
            BRING TOGETHER DIVERSE OBJECTS AND EXPERIENCES CREATED IN CROSSOVER FIELDS OF ART, INTERIOR DESIGN, FASHION,
            AND FOOD FROM AROUND THE GLOBE TO BE PRESENTED ON THE STAGES IN VARIOUS LOCATIONS IN TOKYO, ONE OF THE
            WORLD'S LEADING MIXED CULTURE CITIES.</p>
        <a href="{%HOME_URL%}/about" class="text-38 more">more <span><img
                        src="{%URL_STATICS%}/images/top/arrow-item.png"></span></a>
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
                        <div class="sub-title">
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-18"> The 100 groups exhibit their works in the 11 areas in
                            2019.<br>The photo shows The exhibition “Garden of Eden” of Israel as the Partner Country, DESIGNART TOKYO 2019
                        </p>
                        <div class="link-group">
                            <a href="{%HOME_URL%}/exhibitor/" class="link-step">
                                <div class="left">
                                    <div class="text-38">exhibition list</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                            <a href="https://www.google.com/maps/d/u/0/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397681%2C139.72963319999997&z=13"
                               class="link-step">
                                <div class="left">
                                    <div class="text-38">guide map</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/discoverart.jpg" alt=""/>
                </div>
            </div>
            <div class="step-item step-2">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span class="number">02.</span>
                            <span>LEARN ART</span>
                        </div>
                        <div class="sub-title">
                        </div>
                    </div>

                    <div class="desc">
                        <p class="text-16">
                            DESIGNART Conference “BRIDGE” is a platform to learn
                            <br> and exchange opinions about what is happening in the
                            <br> field of art and design.
                        </p>
                        <div class="link-group">
                            <a href="http://designart.jp/conference2019/" class="more link-step">
                                <div class="left">
                                    <div class="text-38">more</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/learnart.jpg" alt=""/>
                </div>
            </div>
            <div class="step-item step-slick ">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>EVENT & PARTY</span>
                        </div>
                    </div>
                    <div class="desc slider-for">
                        {%EXHIBITOR_LIST%}

                    </div>
                    <div class="link-group">
                        <a href="http://designart.jp/designarttokyo2019/wp-content/uploads/sites/8/2019/10/DA_schedule.pdf" target="_blank" class="more link-step">
                            <div class="left">
                                <div class="text-38">more</div>

                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="img-wrapper img-slick">


                    <div class="slideshow-container slider-nav">
                        <!--thumbail-->
                        {%EXHIBITOR_THUMBNAIL%}


                    </div>

                </div>


            </div>
            <div class="step-item step-3">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span class="number">03.</span>
                            <span>BUY ART</span>
                        </div>

                    </div>

                    <div class="desc">
                        <p class="text-16">All but a few art works on display at the designer can be <br>purchased.
                        </p>
                    </div>

                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/buyart.jpg" alt=""/>
                </div>
            </div>
            <div class="step-item step-slick ">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>OFFICIAL CAFE <br> & GOODS</span>
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-16 cs-mb">An official guidebook to help you get around the <br> exhibition
                        </p>
                        <div class="link-group">
                            <a href="{%HOME_URL%}/about/?tab=cafe" class=" more link-step">
                                <div class="left">
                                    <div class="text-38">more</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper img-slick">

                    <div class="slideshow-container slick-office-good">

                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide01.jpg">
                        </div>

                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide02.jpg">
                        </div>

                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide03.jpg">
                        </div>
                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide04.jpg">
                        </div>

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
                    <div class="sub-title">
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/discoverart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16"> The 100 groups exhibit their works in the 11 areas in
                        2019.<br>The photo shows The exhibition “Garden of Eden” of Israel as the Partner Country, DESIGNART TOKYO 2019
                    </p>
                    <div class="link-group">
                        <a href="{%HOME_URL%}/exhibitor/" class="link-step">
                            <div class="left">
                                <div class="text-38">exhibition list</div>
                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                        <a href="https://www.google.com/maps/d/u/0/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397681%2C139.72963319999997&z=13"
                           class="link-step">
                            <div class="left">
                                <div class="text-38">guide map</div>
                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
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
                    <div class="sub-title">
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/learnart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">
                        DESIGNART Conference “BRIDGE” is a platform to learn
                        <br> and exchange opinions about what is happening in the
                        <br> field of art and design.
                    </p>
                    <div class="link-group">
                        <a href="http://designart.jp/conference2019/" class="more link-step">
                            <div class="left">
                                <div class="text-38">more</div>
                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="step-item step-slick ">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>EVENT & PARTY</span>
                        </div>
                    </div>
                    <div class="desc slider-for">
                        {%EXHIBITOR_LIST_MB%}
                    </div>
                    <div class="link-group">
                        <a href="http://designart.jp/designarttokyo2019/wp-content/uploads/sites/8/2019/10/DA_schedule.pdf" target="_blank" class="more link-step">
                            <div class="left">
                                <div class="text-38">more</div>

                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>

                    </div>
                    <br>
                </div>

                <div class="img-wrapper img-slick">


                    <div class="slideshow-container slider-nav">
                        <!--thumbail-->
                        {%EXHIBITOR_THUMBNAIL_MB%}

                    </div>

                </div>

            </div>
            <div class="step-item step-3">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">03.</span>
                        <span>BUY ART</span>
                    </div>

                </div>


                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/buyart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">All but a few art works on display at the designer can be <br>purchased.
                    </p>
                </div>

            </div>
            <div class="step-item step-slick ">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span>OFFICIAL CAFE <br> & GOODS</span>
                    </div>
                </div>
                <div class="img-wrapper img-slick">

                    <div class="slideshow-container slick-office-good">

                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide01.jpg">
                        </div>

                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide02.jpg">
                        </div>

                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide03.jpg">
                        </div>
                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide04.jpg">
                        </div>

                    </div>
                </div>

                <div class="desc">
                    <p class="text-16 cs-mb">An official guidebook to help you get around the <br> exhibition
                    </p>
                    <div class="link-group">
                        <a href="{%HOME_URL%}/about/?tab=cafe" class=" more link-step">
                            <div class="left">
                                <div class="text-38">more</div>
                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
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
        <img src="{%URL_STATICS%}/images/commons/to_top_bt.png" alt="TOP">
    </div>
</div>


<!--jp-->
<section>
    <div class="banner-top">
        <div class="content">
            <h1 class="title-h1">DESIGN & ART
                <span>into emotions</span></h1>
            <div class="banner-top-sub">DESIGNART TOKYO 2019
                <p>2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p></div>
        </div>
        <div class="scroll mb-block"><img src="{%URL_STATICS%}/images/top/scroll.png" alt=""/></div>
        <div class=" banner-top-btn js-slick-carousel u-slick"
             data-autoplay="true"
             data-speed="10000"
             data-infinite="true"
             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
             data-arrow-left-classes="fa fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
             data-arrow-right-classes="fa fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4">
            {%CAROUSEL_NEWS%}

        </div>
    </div>
</section>
<section class="container">
    <div class="banner-center">
        <h2 class="title-h2 pc-hidden">TOKYO TRANSFORMED <br>
            INTO A MUSEUM</h2>
        <h2 class="title-h2 mobile-hidden">TOKYO <br>
            TRANSFORMED <br> INTO A MUSEUM</h2>
        <p class="text-32">東京の街全体がミュージアムになる10日間</p>
        <p class="text-35">2019.10.18 <span>fri.</span> - 27 <span>sun.</span></p>
        <p class="text-28">表参道・外苑前、原宿・明治神宮前、渋谷・恵比寿、代官山・中目黒、六本木、新宿、銀座で開催</p>
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
        <a href="{%HOME_URL%}/about" class="text-38 more">more <span><img
                        src="{%URL_STATICS%}/images/top/arrow-item.png"></span></a>
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
                        <p class="text-16">2019年は全展示会場100箇所以上11エリアで<br>開催致します。写真は、今年のパートナーカントリーに<br>選ばれたイスラエルのエキシビション<br>「エデンの園 at スパイラルガーデン」</p>
                        <div class="link-group">
                            <a href="{%HOME_URL%}/exhibitor/" class="link-step">
                                <div class="left">
                                    <div class="text-38">exhibition list</div>
                                    <div class="text-20">展示作品一覧</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                            <a href="https://www.google.com/maps/d/u/0/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397681%2C139.72963319999997&z=13"
                               class="link-step">
                                <div class="left">
                                    <div class="text-38">guide map</div>
                                    <div class="text-20">展示マップ</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/discoverart.jpg" alt=""/>
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
                        <p class="text-16">デザイナートカンファレンス「BRIDGE」は、アート<br>とデザインの視点から今、社会で起きている変化に<br>ついて考え学び意見を交換し合う場です。</p>
                        <div class="link-group">
                            <a href="http://designart.jp/conference2019/" class="more link-step">
                                <div class="left">
                                    <div class="text-38">more</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/learnart.jpg" alt=""/>
                </div>
            </div>
            <div class="step-item step-slick">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>EVENT & PARTY</span>
                        </div>
                    </div>
                    <div class="desc slider-for">
                        {%EXHIBITOR_LIST%}
                    </div>

                    <div class="link-group">
                        <a href="http://designart.jp/designarttokyo2019/wp-content/uploads/sites/8/2019/10/DA_schedule.pdf" target="_blank" class="more link-step">
                            <div class="left">
                                <div class="text-38">more</div>

                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>

                    </div>

                </div>

                <div class="img-wrapper img-slick">


                    <div class="slideshow-container slider-nav">
                        <!--thumbail-->
                        {%EXHIBITOR_THUMBNAIL%}


                    </div>

                </div>

            </div>
            <div class="step-item step-3">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span class="number">03.</span>
                            <span>BUY ART</span>
                        </div>
                        <div class="sub-title">アートを買う
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-16">デザイナートで展示されているアート作品は一部を除<br>いて全て購入可能です。</p>
                    </div>
                </div>

                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/buyart.jpg" alt=""/>
                </div>

            </div>
            <div class="step-item step-slick">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>OFFICIAL CAFE <br> & GOODS</span>
                        </div>
                    </div>
                    <div class="desc">
                        <p class="text-16 cs-mb"> 展示巡りに役立つオフィシャルガイドブック</p>
                        <div class="link-group">
                            <a href="{%HOME_URL%}/about/?tab=cafe" class=" more link-step">
                                <div class="left">
                                    <div class="text-38">more</div>
                                </div>
                                <div class="right">
                                    <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="img-wrapper img-slick">

                    <div class="slideshow-container slick-office-good">

                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide01.jpg">
                        </div>

                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide02.jpg">
                        </div>

                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide03.jpg">
                        </div>
                        <div class="mySlides2 ">
                            <img src="{%URL_STATICS%}/images/top/slide04.jpg">
                        </div>

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
                    <img src="{%URL_STATICS%}/images/top/discoverart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-18">2019年は全展示会場100箇所以上11エリアで開催致します。
                        写真は、今年のパートナーカントリーに選ばれたイスラエルのエキシビション「エデンの園 at スパイラルガーデン」</p>
                    <div class="link-group">
                        <a href="{%HOME_URL%}/exhibitor/" class="link-step">
                            <div class="left">
                                <div class="text-38">exhibition list</div>
                                <div class="text-20">展示作品一覧</div>
                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                        <a href="https://www.google.com/maps/d/u/0/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397681%2C139.72963319999997&z=13"
                           class="link-step">
                            <div class="left">
                                <div class="text-38">guide map</div>
                                <div class="text-20">展示マップ</div>
                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
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
                    <img src="{%URL_STATICS%}/images/top/learnart.jpg" alt=""/>
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
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="step-item step-slick ">
                <div class="left">
                    <div class="title-wrapper">
                        <div class="main-title">
                            <span>EVENT & PARTY</span>
                        </div>
                    </div>
                    <div class="desc slider-for">
                        {%EXHIBITOR_LIST_MB%}
                    </div>

                    <div class="link-group">
                        <a href="http://designart.jp/designarttokyo2019/wp-content/uploads/sites/8/2019/10/DA_schedule.pdf" target="_blank" class="more link-step">
                            <div class="left">
                                <div class="text-38">more</div>

                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
                            </div>
                        </a>

                    </div>
                    <br>
                </div>

                <div class="img-wrapper img-slick">


                    <div class="slideshow-container slider-nav">
                        <!--thumbail-->
                        {%EXHIBITOR_THUMBNAIL_MB%}

                    </div>

                </div>

            </div>
            <div class="step-item step-3">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span class="number">03.</span>
                        <span>BUY ART</span>
                    </div>
                    <div class="sub-title">アートを買う
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="{%URL_STATICS%}/images/top/buyart.jpg" alt=""/>
                </div>
                <div class="desc">
                    <p class="text-16">デザイナートで展示されているアート作品は一部を除いて全て購入可能です。</p>
                </div>
            </div>
            <div class="step-item step-slick ">
                <div class="title-wrapper">
                    <div class="main-title">
                        <span>OFFICIAL CAFE <br> & GOODS</span>
                    </div>
                </div>

                <div class="img-wrapper img-slick">

                    <div class="slideshow-container slick-office-good">

                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide01.jpg">
                        </div>

                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide02.jpg">
                        </div>

                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide03.jpg">
                        </div>
                        <div class="mySlidesmb2 ">
                            <img src="{%URL_STATICS%}/images/top/slide04.jpg">
                        </div>

                    </div>
                </div>
                <div class="desc">
                    <p class="text-16 cs-mb"> 展示巡りに役立つオフィシャルガイドブック</p>
                    <div class="link-group">
                        <a href="{%HOME_URL%}/about/?tab=cafe" class=" more link-step">
                            <div class="left">
                                <div class="text-38">more</div>
                            </div>
                            <div class="right">
                                <img src="{%URL_STATICS%}/images/top/arrow-item.png" alt=""/>
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
        <img src="{%URL_STATICS%}/images/commons/to_top_bt.png" alt="TOP">
    </div>
</div>


<?php get_footer('top2'); ?>

<script type="text/javascript">
    /* Add current menu
--------------------------------------------------*/


    jQuery(function ($) {
        $(document).ready(function () {
            $('a[data-demo=item-0]').parent().addClass('current-menu-item');

            $('.js-slick-carousel').slick(
                {
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: true,
                    prevArrow: "<img class='a-left control-c prev slick-prev' src='<?php echo URL_STATICS; ?>/images/top/arrow-left-banner.png'>",
                    nextArrow: "<img class='a-right control-c next slick-next' src='<?php echo URL_STATICS; ?>/images/top/arrow-right-banner.png'>"

                }
            );

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