<?php
get_header( 'top2' );


$post           = get_page_by_path( 'about' );
$post_id        = $post->ID;
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );
$description    = get_field( $prefix_varible . 'description', $post_id, false );
$description    = str_replace( '{%URL_STATICS%}', URL_STATICS, $description );

$html_share  = get_html_share( false );
$description = str_replace( '{%HTML_SHARE%}', $html_share, $description );

//    back history
$html_back   = back_page_history( false );
$description = str_replace( '{%BACK_HISTORY%}', $html_back, $description );
// html banner page
$html_banner_page = get_html_banner_page();
$description      = str_replace( '{%BANNER_PAGE%}', $html_banner_page, $description );

//echo $description;
?>

    <section class="about-page about-outline-page">
        <div class="container">

            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter">ABOUT DESIGNART</div>
                </div>
            </div>

            <div class="wp-tab">
                <div class="wp-scroll-page tab-filter">
                    <div class="show-tabs">Outline</div>
                    <ul class="list-scroll-item">
                        <li>
                            <a class="item-filter active-tab" data-value="about-outline">Outline<i
                                        class="icons fa fa-angle-down" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a class="item-filter" data-value="about-cafegoods">CAFE&GOODS<i
                                        class="icons fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a class="item-filter" data-value="about-program">PROGRAM<i class="icons fa fa-angle-down"
                                                                                        aria-hidden="true"></i></a>
                        </li>

                        <li>
                            <a class="item-filter" data-value="about-credit">Credit<i class="icons fa fa-angle-down"
                                                                                      aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <div class="tab-filter-section tab-official-page">
                        <div>
                            <!-- About Outline -->
                            <div class="wp-content show-content" data-value="about-outline">

                                <div class="wp-section-area block-st">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">Concept<span class="line-middle"></span></h2>
                                    </div>
                                    <div class="block-wrapp">
                                        <div class="row">
                                            <div class="col-left">
                                                <img alt="" class="img-responsive"
                                                     src="<?php echo URL_STATICS; ?>/images/about/img-about-01.png">
                                            </div>
                                            <div class="col-right">
                                                <div class="desc">
                                                    <h3 class="title">TOKYO TRANSFORMED INTO A MUSEUM</h3>
                                                    <p>DESIGNART is an endeavor to transmit and share the magnificence
                                                        of objects and experiences created across all genres of design
                                                        and art.
                                                        "DESIGNART TOKYO" is a design & art festival held every fall
                                                        since 2017 as a platform for showcasing these activities.
                                                        It is a revolutionary attempt to bring together diverse objects
                                                        and
                                                        experiences created in crossover fields of art, design,
                                                        interior design, fashion, and food from around the globe
                                                        to be presented on the stages in various locations in Tokyo,
                                                        one of the world's leading mixed culture cities.
                                                        This is a 10-day event that transforms all of Tokyo into a
                                                        museum of
                                                        design and art, allowing everyone to stroll the city enjoying
                                                        each display.
                                                        Through hosting the past two years of the festival,
                                                        more and more people in Tokyo are starting to purchase artworks
                                                        and
                                                        design products and appreciate them in their daily lives. So,
                                                        for our third
                                                        year of DESIGNART TOKYO,
                                                        we are launching a movement to encourage the culture of
                                                        supporting art, not just on the individual level, but by the
                                                        whole society.
                                                        "1% for Art" is a cultural program in which one percent of the
                                                        construction fee for public architecture is devoted to the
                                                        production
                                                        of public art. This cultural legislation has already been
                                                        enacted
                                                        in the U.S., Europe, South Korea, and Taiwan.
                                                        The program aims to realize the society where people have
                                                        opportunities to appreciate art in their everyday lives, while
                                                        energizing
                                                        the creative industry by creating jobs for artists and
                                                        designers.
                                                        DESIGNART TOKYO is launching various projects to realize
                                                        "1% for Art" in Japan. A campaign for collecting signatures
                                                        will also be held throughout the festival,
                                                        aiming to realize the "1% for Art" legislation.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- ./end concept -->

                                <div class="wp-section-area block-st">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">Vision<span class="line-middle"></span></h2>
                                    </div>
                                    <div class="block-wrapp">
                                        <div class="row">
                                            <div class="col-left hidden-col">
                                                <p></p>
                                            </div>
                                            <div class="col-right">
                                                <div class="desc">
                                                    <p>
                                                        <strong>1. REVITALIZING THE CREATIVE INDUSTRY FROM
                                                            JAPAN </strong><br>
                                                        DESIGNART Tokyo is a platform to educate and enrich visitors’
                                                        lives through the power of creativity and high-quality
                                                        craftsmanship.
                                                        The aim is to energize the creative industry by sparking
                                                        people’s passion for craft.
                                                        In addition to large-scale installations and unique works of art
                                                        and design, visitors will be able to purchase items from
                                                        exhibitors, thus stimulating the creative economy in Tokyo.
                                                    </p>
                                                    <p>
                                                        <strong>2. IGNITING A CREATIVE REVOLUTION </strong><br>
                                                        Tokyo is one of a handful of cities in the world where
                                                        architecture, interior design, fashion, art, graphic design,
                                                        technology, food, and more combine into a cultural mixture that
                                                        attracts people from all over the world.
                                                        Through design, our aim is to spark a creative revolution,
                                                        bringing a diverse array of people together across a wide
                                                        variety of fields to engage in creative dialogue and design
                                                        discourse
                                                    </p>
                                                    <p>
                                                        <strong>3.SUPPORTING YOUNG DESIGNERS AND ARTISTS </strong><br>
                                                        Discovering and supporting young designers and artists who are
                                                        the future of Japanese culture, is at the heart of ‘Under-30’,
                                                        a key initiative for the festival founders.
                                                        DESIGNART Tokyo has initiated a call out to promising young
                                                        designers,
                                                        artists and curators from various creative genres and will
                                                        provide a place for young creators to show their work
                                                        by connecting them to shops, galleries, manufacturers.

                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- ./end Vision -->

                                <div class="wp-section-area block-st">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">Outline<span class="line-middle"></span>
                                        </h2>

                                    </div>

                                    <div class="brand-wrapp">
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">Event Name</span></div>
                                            <div class="col-right"><span class="info-text">DESIGNART TOKYO 2019</span>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">Session</span></div>
                                            <div class="col-right"><span
                                                        class="info-text">Friday 19th Oct. 2018〜Sunday 28th, Oct. 2018</span>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">Venue</span></div>
                                            <div class="col-right"><span class="info-text">
                                                    Omotesando, Gaienmae／Harajuku, Meiji-jingumae／Shibuya, Ebisu／
Daikanyama, Nakameguro／Roppongi, Hiroo, Mita
                                                </span>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">Exhibition Area	</span></div>
                                            <div class="col-right"><span
                                                        class="info-text">Approx. 120 exhibitions</span></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">ORGANIZER</span></div>
                                            <div class="col-right"><span class="info-text">DESIGNART COMMITTEE</span>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">PARTNER COUNTRY</span></div>
                                            <div class="col-right"><span class="info-text">
                                                   KINGDOM OF SWEDEN
                                                </span></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">SUBSIDY</span></div>
                                            <div class="col-right"><span class="info-text">
                                                    Tokyo Metropolitan Foundation for History and Culture
                                                </span></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">SPONSORS</span></div>
                                            <div class="col-right">
                                                <div class="brand-list">
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a
                                                                    href="http://www.agb.co.jp/english/index.html"
                                                                    target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-asahibuil.png"
                                                                        alt="logo-asahibuil">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a
                                                                    href="https://www.askul.co.jp/kaisya/english/"
                                                                    target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-askul.png"
                                                                        alt="logo-askul">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">
                                                            <a href="http://www.canadagoose.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-canadagoose.png"
                                                                     alt="logo-canadagoose">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.dbrain.co.jp/en/"
                                                                                 target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-dbrain.png"
                                                                     alt="logo-dbrain">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.francfranc.co.jp/en/"
                                                                                 target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-francfranc.png"
                                                                     alt="logo-francfranc">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap">
                                                            <a href="http://gervasoni.jp/" target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-gervasoni.png"
                                                                     alt="logo-gervasoni">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a
                                                                    href="https://www.panasonic.com/jp/home.html"
                                                                    target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-panasonic.png"
                                                                     alt="logo-panasonic">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a
                                                                    href="https://www.perrier-jouet.com/en-ww/"
                                                                    target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-perrierjouet.png"
                                                                     alt="logo-perrierjouet">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.sony.co.jp/"
                                                                                 target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-sony.png"
                                                                     alt="logo-sony">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.space-tokyo.co.jp/"
                                                                                 target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-space.png"
                                                                     alt="logo-space">
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.tanseisha.co.jp/"
                                                                                 target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-tanseisha.png"
                                                                     alt="logo-tanseisha">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a
                                                                    href="https://www.volvocars.com/jp/about/our-company/aoyama"
                                                                    target="_blank">
                                                                <img src="<?php echo URL_STATICS; ?>/images/about/logo/logo-volvostudioaoyama.png"
                                                                     alt="logo-volvostudioaoyama">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">COOPERATION</span></div>
                                            <div class="col-right">

                                                <div class="brand-list ">
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            AGC Inc.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            amanadesign inc
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            AMAN KYOTO
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            B&B Italia Tokyo
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            BUNKITSU Roppongi
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            DEAN & <br>DELUCA CAFE
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            DIESEL JAPAN
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Japan Airlines <br>
                                                            Co., Ltd.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Japan Fashion <br>
                                                            Week Organization
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            KARIMOKU FURNITURE <br>INC.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Koshin Planing <br>Co.,Ltd
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            MATSUMIDORI BREWERY <br>CO., LTD
                                                        </div>
                                                    </div>

                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            MOIWA RESORTS <br>OPERATION GK

                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Moleskine
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Nakagawa <br>
                                                            Chemical Inc.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Nest Hotel Japan <br>Corporation
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            PLUSTOKYO
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            Shigotohito Inc.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">Spiral/Wacoal <br>
                                                            Art Center
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            TAKEO Co., Ltd.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">TOKYU PLAZA GINZA
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            WeWork
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            WORLD CO.,LTD.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            WORLD PRODUCTION <br>
                                                            PARTNERS CO.,LTD.
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="brand-title sm-text">
                                                            WORLD SPACE <br>
                                                            SOLUTIONS CO.,LTD.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">SUPPORTS</span></div>
                                            <div class="col-right">
                                                <table class="table_col_right_text" style=" white-space:nowrap">
                                                    <tr>
                                                        <td>
                                                            EMBASSY OF ISRAEL
                                                        </td>
                                                        <td>
                                                            Minato City
                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td></td>
                                                    </tr>

                                                </table>

                                            </div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">SUPPORTING MEDIA</span></div>
                                            <div class="col-right"><a target="_blank"
                                                                      href="https://www.j-wave.co.jp"><img
                                                            src="<?php echo URL_STATICS; ?>/images/about/logo/logo-jwave.png"
                                                            alt="logo-jwave"></a></div>
                                        </div>
                                        <div class="brand-block">
                                            <div class="col-left"><span class="lb-text">MEDIA PARTNERS</span></div>
                                            <div class="col-right">
                                                <div class="brand-list">

                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.dezeen.com"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-dezeen.png"
                                                                        alt="logo-dezeen"></a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.elle.com"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-elledecor_designwalk.png"
                                                                        alt="logo-elledecor_designwalk">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.fashionsnap.com"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-fashionsnapcom.png"
                                                                        alt="logo-fashionsnapcom"></a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="http://imhome-style.com"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-imhome.png"
                                                                        alt="logo-imhome">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.japandesign.ne.jp"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-jdn.png"
                                                                        alt="logo-jdn">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://madamefigaro.jp"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-figaro.png"
                                                                        alt="logo-figaro"></a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.pen-online.jp"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-pen.png"
                                                                        alt="logo-pen"></a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a
                                                                    href="http://www.shotenkenchiku.com/blog/en/"
                                                                    target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-shotenkenchiku.png"
                                                                        alt="logo-shotenkenchiku"></a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://theartling.com/en/"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-theartling.png"
                                                                        alt="logo-theartling">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.timeout.com/tokyo"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-timeouttokyo.png"
                                                                        alt="logo-timeouttokyo"></a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="http://www.tokyoartbeat.com"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-tokyoartbeat.png"
                                                                        alt="logo-tokyoartbeat"></a>
                                                        </div>
                                                    </div>
                                                    <div class="brand-item">
                                                        <div class="pic-wrap"><a href="https://www.wwdjapan.com"
                                                                                 target="_blank"><img
                                                                        src="<?php echo URL_STATICS; ?>/images/about/logo/logo-wwdjapan.png"
                                                                        alt="logo-wwdjapan"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="more-detail">

                                    </div>

                                </div><!-- ./end Outline -->

                            </div>
                            <!-- ./end About Outline -->

                            <!-- About CafeGoods -->
                            <div class="wp-content" data-value="about-cafegoods">
                                <div class="heading-title heading-style-02">
                                    <h2 class="title upper-text">
                                        Official Cafe
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="heading-des official_cafe">
                                    <div class="left">
                                        <img src="<?php echo URL_STATICS; ?>/images/official/cafe_2.png"
                                             alt="Aoyama Area" class="img-responsive">
                                        </a>
                                    </div>

                                    <div class="right">
                                        <h3> LOOKING FOR A PLACE TO STOP FOR A BREAK? </h3><br>
                                        <div class="info">
                                            We have prepared several ideal cafes for when you get tired at
                                            DESIGNART TOKYO 2019, an exhibition where you walk freely around an
                                            exhibition spread out across town. At DEAN & DELUCA CAFE Aoyama,
                                            plus Echika Omotesando, Roppongi (except the market) and Shibuya
                                            Stream, Tokyo College of Music (Nakameguro/Daikanyama Campus), a
                                            DESIGNART special drink, " EARLGREY PEAR NECTAR," will be available.
                                            Nectar is juice made by grinding fruit. Seasonal pear with a flavor of Earl
                                            Gray, Vanilla and Cardamom. Pomegranate is added for a finishing touch
                                            with a hint of refreshing acidity.
                                            Customers who bring this book will receive a free size upgrade.
                                            (Only for drinks with different sizes.) Please make use of this space to
                                            take
                                            a break and enjoy a conversation about design & art.
                                        </div>
                                    </div>
                                </div>


                                <div class="heading-title heading-style-02">
                                    <h2 class="title md upper-text">
                                        Shop Info
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="shoplist">
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="aoyama-area">
                                                <div class="wp-content-area">
                                                    <div class="title">DEAN & DELUCA CAFE <span class="sub-title"> AOYAMA</span>
                                                    </div>

                                                    <div class="address">
                                                        3-2-2 Kitaaoyama, Minato-ku<br/>
                                                        hours.　 8:00 - 23:00, Mon - Fri<br/>
                                                        8:00 - 22:00, Sat, Sun & Holidays<br/>
                                                        <a href="https://www.deandeluca.co.jp/ddshop/50029"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="jinguu-area">

                                                <div class="wp-content-area">
                                                    <div class="title">DEAN & DELUCA CAFE ECHIKA <span
                                                                class="sub-title"> OMOTESANDO</span></div>

                                                    <div class="address">
                                                        Echika Omotesando, Tokyo Metro Omotesando Station,<br/>
                                                        3-6-12 Kitaaoyama,Minato-ku<br/>
                                                        hours.　 8:00 - 22:00, Mon - Sat<br/>
                                                        9:00 - 22:00, Sun & Holiday<br/>
                                                        <a href="https://www.deandeluca.co.jp/ddshop/50012"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="shibuya-area">
                                                <div class="wp-content-area">
                                                    <div class="title">DEAN & DELUCA CAFE <span class="sub-title"> ROPPONGI</span>
                                                    </div>

                                                    <div class="address">
                                                        9-7-3 Akasaka, Minato-ku<br/>
                                                        hours.　 7:00 - 23:00<br/>
                                                        Market store is out of scope.<br/>
                                                        <a href="https://www.deandeluca.co.jp/ddshop/5003/"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="shibuya-area">
                                                <div class="wp-content-area">
                                                    <div class="title">DEAN & DELUCA CAFE <span class="sub-title"> SHIBUYA STREAM</span>
                                                    </div>

                                                    <div class="address">
                                                        Address : Shibuya Stream 2F, 3-21-3 Shibuya, Shibuya-ku<br/>
                                                        TEL : 03-6427-3601<br/>
                                                        Hours : 7:00 - 22:00<br/>
                                                        <a href="https://www.deandeluca.co.jp/ddshop/50044"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="wp-section-area">
                                        <div class="area-section">
                                            <div id="shibuya-area">
                                                <div class="wp-content-area">
                                                    <div class="title">DEAN & DELUCA CAFE<span class="sub-title"> TOKYO COLLEGE OF MUSIC NAKAMEGURO / DAIKANYAMA CAMPUS</span>
                                                    </div>

                                                    <div class="address">
                                                        Address : Tokyo College of Music Nakameguro / Daikanyama 3F, 1-9
                                                        Kamimeguro, Meguro-ku<br/>
                                                        TEL : 03-6416-3431<br/>
                                                        Hours : 8:00 - 18:00, Mon - Fri 9:00 - 18:00, Sat, Sun &
                                                        Holidays (Irregular Holidays)<br/>
                                                        <a href="https://www.deandeluca.co.jp/ddshop/50051/"
                                                           target="_blank">SHOP INFO</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div id="pickup-aoyama" class="pickup">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title md upper-text">
                                            SPECIAL DRINK
                                            <span class="line-middle"></span>
                                        </h2>
                                    </div>
                                    <ul class="wp-block-pickup">
                                        <li class="item-pickup">
                                            <div class="wp-image img-cafe">
                                                <img src="<?php echo URL_STATICS; ?>/images/official/cafe_1.png" alt=""
                                                     class="img-responsive">
                                            </div>
                                            <div class="product">
                                                <h2 class="title">DESIGNART TOKYO 2019 ORIGINAL DRINK <br>EARLGREY PEAR
                                                    NECTAR</h2>
                                                <p class="description">
                                                    Non alcohol<br>
                                                    SIZE S ¥540(tax in)
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                                <div class="heading-title heading-style-02">
                                    <h2 class="title upper-text">
                                        Official Goods
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="wp-section-goods" id="audio-guide1">
                                    <div class="area-section">
                                        <div class="title-head background-black">DESIGNART 2019 official tabroid &
                                            booklet
                                        </div>
                                        <div class="wp-content-inner">
                                            <div class="wp-left">
                                                <div class="">
                                                    <img src="<?php echo URL_STATICS; ?>/images/official/official_goods_renew.png"
                                                         alt="" class="img-responsive">
                                                </div>
                                            </div>
                                            <div class="wp-right">
                                                <div class="title">DESIGNART TOKYO 2019 <span class="sub-title">official tabroid</span>
                                                </div>
                                                <div class="info-area">
                                                    Highlights of DESIGNART TOKYO 2019.


                                                    <br/><br>
                                                    <a href="" target="_blank"><span
                                                                style="text-decoration: underline;">PDF download</span></a>
                                                </div>

                                                <div class="title">DESIGNART TOKYO 2019 <span class="sub-title">official guide book</span>
                                                </div>
                                                <div class="info-area">
                                                    Special articles on exhibits and official programs,
                                                    An interview with the founder leading to the birth of the designer.
                                                    Also included is a map that summarizes the exhibition hall and
                                                    architecture.
                                                    The guidebook expands the fun of designers!

                                                    <br/>
                                                    <span style="padding: 8px 0 5px 0; display: block;">exhibition venues:</span>
                                                    <ul>
                                                        <li>・information center, official café etc.</li>

                                                    </ul>
                                                    <br><a href="" target="_blank"><span
                                                                style="text-decoration: underline;">PDF download</span></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="wp-section-goods">
                                    <div class="area-section">
                                        <div class="title-head background-black">
                                            THIS YEAR’S OFFICIAL T-SHIRT ADORNED WITH A SIMPLE LOGO
                                        </div>
                                        <div class="wp-content-inner wp-content-img-left wp-content-img-left-1">
                                            <div class="wp-left">
                                                <div class="">
                                                    <img alt="" class="img-responsive"
                                                         src="<?php echo URL_STATICS; ?>/images/official/official_goods_renew-02.png">
                                                </div>
                                            </div>
                                            <div class="wp-right">
                                                <div class="title-a">DESIGNART TOKYO 2019 <br/><span
                                                            class="sub-title">OFFICIALT-SHIRT</span></div>
                                                <div class="info-area-a">
                                                    This year’s official T-shirt
                                                    prominently displays the
                                                    DESIGNART logo in gold on
                                                    top of a black background, for a
                                                    simple, yet impactful design.
                                                    The logo, designed by
                                                    DESIGNART founder Shun
                                                    Kawakami, is distinguished
                                                    by the refined appearance
                                                    bestowed by its stoic, blackand-
                                                    gold color scheme, as well
                                                    as the flexible scalability of
                                                    its border.
                                                    Should you see any staff
                                                    wearing this T-shir t during
                                                    the event, please don’t hesitate
                                                    to inquire with them regarding
                                                    information about the area or
                                                    any other questions you
                                                    may have.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="wp-section-goods">
                                    <div class="area-section">
                                        <div class="title-head background-black">展示会場の目印はスタイリッシュなフラッグバッグ</div>
                                        <div class="wp-content-inner wp-content-img-left">
                                            <div class="left">
                                                <img src="<?php echo URL_STATICS; ?>/images/official/official_goods_renew-05.png"
                                                     alt="" class="img-responsive">
                                            </div>
                                            <div class="right">
                                                <div class="title-a">DESIGNART TOKYO 2019 <br/><span class="sub-title">オフィシャルフラッグ</span>
                                                </div>
                                                <div class="info-area-a">
                                                    街中に点在するDESIGNART
                                                    の展示会場の目印となるのが、
                                                    オフィシャルフラッグです。
                                                    　今年は、ブラックとメタリック
                                                    ゴールドをベースにしたリバーシブ
                                                    ル仕様にリニューアル。両方向か
                                                    らの視認性が高まり、会場がさら
                                                    に見つけやすくなりました。ロゴ
                                                    を取り囲む図形のかたちは５種類
                                                    あるのもユニーク。制作はサイン
                                                    やディスプレイのプロ集団、光伸
                                                    プランニングが担当しています。
                                                    　なお、昨年まで使用していたフ
                                                    ラッグとフラッグスタンドも継続利
                                                    用。DESIGNART が初年度から
                                                    コンセプトに掲げている持続可能
                                                    性を体現しています。
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- ./end About CafeGoods -->

                            <!-- About Program -->
                            <div class="wp-content official program" data-value="about-program">
                                <div class="heading-title heading-style-02">
                                    <h2 class="title upper-text">
                                        Program
                                        <span class="line-middle"></span>
                                    </h2>
                                </div>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="aoyama-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class="">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_1.png"
                                                             alt="Aoyama Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART FEATURE 1% for Art EXHIBITION</div>
                                                    <div class="info">
                                                        Design Pier proudly partners with DESIGNART TOKYO to curate and
                                                        organize the Design Week’s main event joining the 1% for Art
                                                        program and presenting a divers array of highly creative design
                                                        objects by design studios from the Asian continent.

                                                        <br>
                                                        <a href="http://designart.jp/designarttokyo2019/en/exhibitor/designartfeature/"
                                                           target="_blank">MORE INFO</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="jinguu-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class="">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_2.png"
                                                             alt="Roppongi Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">PARTNER COUNTRY ISRAEL</div>
                                                    <div class="info">
                                                        Israel is honored to be invited with the most leading design
                                                        event in Israel, as the Partner Country to DESIGNART TOKYO 2019
                                                        and share and introduce Israeli design to the Japanese public.
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img-small">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_3.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART GALLERY at TENOHA 代官山</div>
                                                    <div class="info">
                                                        DESIGNART GALLERY @ TENOHA DAIKANYAMA is a creators’ group
                                                        exhibition to pursue borderless and free creativity beyond
                                                        domains of design and art.
                                                        <br><br>
                                                        Beyond molecular weight<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        FIL<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        “DECO” by Triple A / Design image seat & VONDS RANSEL / Atsushi
                                                        onuma<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        TIMON<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        HAFT DESIGN<br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        Katsuki Connection
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        TANSAN DESIGN STUDIO
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        Kosuke Araki
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>
                                                        TARAMAN+
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a><br><br>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_4.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART GALLERY at LIVING DESIGN CENTER OZONE
                                                    </div>
                                                    <div class="info">
                                                        In its 25th anniversary year of establishment, LIVING DESIGN
                                                        CENTER OZONE is taking part in DESIGNART TOKYO at its new area,
                                                        Shinjuku, for the first time this year. In the gallery on the
                                                        first floor, several designers and artists from Europe are
                                                        exhibiting the latest works of their countries.
                                                        <br>
                                                        Creative Lithuania
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        Young Swedish Design
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_4.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">DESIGNART CREATIVE CONFERENCE BRIDGE
                                                    </div>
                                                    <div class="info">
                                                        “DESIGNART CREATIVE CONFERENCE BRIDGE” will be a place where all
                                                        participants will think, learn, and exchange ideas about what
                                                        design and art can do today and in the coming future.
                                                        <br>
                                                        10/20(sun)
                                                        <br>
                                                        WeWork Iceberg
                                                        <br>
                                                        Address：6-12-6 Jingumae, Sibuya-ku, Tokyo
                                                        <br>
                                                        tickets：<a href="https://dat2019-conf.peatix.com/"
                                                                   target="_blank" class="noborder">https://dat2019-conf.peatix.com/</a><br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_5.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">OPENING PARTY
                                                    </div>
                                                    <div class="info">
                                                        The design and art festival anyone can participate in an opening
                                                        event made by and for all.

                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_5.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">CLOSING EVENT</div>
                                                    <div class="info">
                                                        PARTNER COUNTRY ISRAEL X DESIGNART TOKYO<br>
                                                        At the closing event of the festival, the newly created
                                                        “DESIGNART AWARD” will be announced!<br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_6.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">FIVE ARTISTS UNDER THIRTY</div>
                                                    <div class="info">
                                                        Here we feature young minds shouldering the design and art of
                                                        tomorrow that have caught the eye of the founders of DESIGNART.
                                                        They present their pick of these promising talents in a unique
                                                        perspective, with the condition that they all be under 30.
                                                        <br><br>
                                                        CHIALING CHANG
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        KENJI ABE
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        KIZUKI NAKANO・AIKA NISHIYAMA
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        HAMID SHAHI
                                                        <br>
                                                        <a href="" target="_blank">MORE INFO</a>
                                                        <br><br>
                                                        M&T<br>
                                                        <a href="" target="_blank">MORE INFO</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <span class="line-sp"></span>
                                <div class="wp-section-area">
                                    <div class="area-section">
                                        <div id="shibuya-area">
                                            <div class="wp-content-area">
                                                <div class="wp-left">
                                                    <a href="#" class=" img--big">
                                                        <img src="<?php echo URL_STATICS; ?>/images/official/program_7.png"
                                                             alt="Shibuya Area" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="wp-right">
                                                    <div class="title">JOIN THE STAMP RALLY</div>
                                                    <div class="info">
                                                        AND GET PARTICIPATING ITEMS!
                                                        <br><br>
                                                        1.GET A MAP
                                                        <br>
                                                        Get DESIGNART TOKYO 2019 area map with stamp rally mount on the
                                                        exhibition hall and information center.
                                                        <br><br>
                                                        2.COLLECT STAMPS
                                                        <br>
                                                        Go around each exhibition hall and collect 12 pieces by pushing
                                                        a stamp on the corresponding par t on the back side of the map.
                                                        <br><br>
                                                        3. PARTICIPATE IN THE LOTTERY
                                                        <br>
                                                        Par ticipate in the lottery at the information center in the
                                                        World Kitaaoyama building.
                                                        <br><br>
                                                        INFORMATION CENTER
                                                        <br>
                                                        WORLD KITA-AOYAMA BLDG.
                                                        <br>
                                                        3-5-10 Kitaaoyama, Minato-ku
                                                        <br>
                                                        10:00 - 18:00
                                                        <br>
                                                        Open everyday during DESIGNART
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./end About Program -->

                            <!-- About Credit -->
                            <div class="wp-content" data-value="about-credit">
                                <div class="wp-section-area">
                                    <div class="heading-title heading-style-02">
                                        <h2 class="title upper-text">Credit<span class="line-middle"></span></h2>
                                    </div>
                                    <div class="brand-wrapp">
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">FOUNDERS / 発起人</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Akio Aoki / MIRU DESIGN</p>
                                                    <p class="info-group-item">Shun Kawakami / artless Inc.</p>
                                                    <p class="info-group-item">Mark Dytham / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Astrid Klein / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Hiroshi Koike / NON-GRID / IMG SRC</p>
                                                    <p class="info-group-item">Okisato Nagata / EXS</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">DESIGNART COMMITTEE / </br>
                                                    デザイナート実行委員会</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Kimiaki Tanigawa / Director</p>
                                                    <p class="info-group-item">Akio Aoki / Creative director</p>
                                                    <p class="info-group-item">Rika Yamada / PR Manager</p>
                                                    <p class="info-group-item">Yoko Yamazaki / Knot Japan</p>
                                                    <p class="info-group-item">Takashi Ono</p>
                                                    <p class="info-group-item">Takefumi Yamaguchi</p>
                                                    <p class="info-group-item">Kiyomi Watanabe</p>
                                                    <p class="info-group-item">Sakiko Kimura</p>
                                                    <p class="info-group-item">Kaori Kodama</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">DESIGNART MEMBERS / </br>
                                                    デザイナートメンバー</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Shun Kawakami / artless Inc. / Art
                                                        Director</p>
                                                    <p class="info-group-item">Kanako Ueno / artless Inc. / Designer</p>
                                                    <p class="info-group-item">Yasuyuki Fukuoka LABORATORY inc.</p>
                                                    <p class="info-group-item">Ryohei Sato LABORATORY inc. /
                                                        Designer</p>
                                                    <p class="info-group-item">Hiroshi Koike / NON-GRID, IMG SRC / Web
                                                        Creative Director</p>
                                                    <p class="info-group-item">Takuya Nishi / NON-GRID / Web
                                                        Director</p>
                                                    <p class="info-group-item">Junichi Okamoto / jojodesign Inc. /
                                                        Design & Coding</p>
                                                    <p class="info-group-item">Yukinari Hisayama / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Yumiko Fujiki / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Yuko Yoshikawa / Klein Dytham
                                                        architecture</p>
                                                    <p class="info-group-item">Wakako Tanjo / MIRU DESIGN</p>
                                                    <p class="info-group-item">Noriko Sasaki / MIRU DESIGN</p>
                                                    <p class="info-group-item">Rika Olivia Sakakibara / MIRU DESIGN</p>
                                                    <p class="info-group-item">Tomoko Kawasaki</p>
                                                    <p class="info-group-item">Keena Yoshida</p>
                                                    <p class="info-group-item">Miho Fujii</p>
                                                    <p class="info-group-item">Mei Iwasaki</p>
                                                    <p class="info-group-item">Rikako Takahashi</p>
                                                    <p class="info-group-item">Mai Okazaki</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">PRESS / プレス</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Ai Yoshida</p>
                                                    <p class="info-group-item">Hitomi Kodaka Rehearsal</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">INTERNATIONAL PR / </br>
                                                    インターナショナルPR</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Martin Webb COMMUNION</p>
                                                    <p class="info-group-item">Atsushi Yamauchi COMMUNION</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">THE OFFICIAL BOOKLETS & TABLOIDS / </br>
                                                    オフィシャルブックレット & タブロイド</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Toshiaki Ishii river / Editor in
                                                        Chief</p>
                                                    <p class="info-group-item">Masato Warita river</p>
                                                    <p class="info-group-item">Taku Kasuya Photographer</p>
                                                    <p class="info-group-item">Tohru Yuasa Photographer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">PHOTOGRAPHERS / フォトグラファー</span>
                                            </div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Keiko Chiba Nac.sa & Partners</p>
                                                    <p class="info-group-item">Futa Moriishi Nac.sa & Partners</p>
                                                    <p class="info-group-item">Donggyu Kim Nac.sa & Partners</p>
                                                    <p class="info-group-item">Kai Kanno Nac.sa & Partners</p>
                                                    <p class="info-group-item">Akira Arai Nac.sa & Partners</p>
                                                    <p class="info-group-item">Sakura Sueyoshi Nac.sa & Partners</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">TRANSLATORS / 翻訳</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Terrance Young</p>
                                                    <p class="info-group-item">Haruki Makio Fraze Craze Inc.</p>
                                                    <p class="info-group-item">Yayoi Morikawa Fraze Craze Inc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">WRITER / <br>  ライター</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Yuto Miyamoto</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">SUPPORTING MEMBERS / </br>
                                                    サポートメンバー</span></div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Gwenael Nicolas</p>
                                                    <p class="info-group-item">Jungo Kanayama</p>
                                                    <p class="info-group-item">Masaki Yokokawa</p>
                                                    <p class="info-group-item">Masamichi Toyama</p>
                                                    <p class="info-group-item">Masatoshi Kumagai</p>
                                                    <p class="info-group-item">Mizuyo Yoshida</p>
                                                    <p class="info-group-item">Tatsuro Sato</p>
                                                    <p class="info-group-item">William To</p>
                                                    <p class="info-group-item">Yoshiko Ikoma</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="brand-block pd-info">
                                            <div class="col-left"><span class="lb-text">EVERLASTING MEMBER / エヴァーラスティングメンバー</span>
                                            </div>
                                            <div class="col-right">
                                                <div class="info-group">
                                                    <p class="info-group-item">Dai Takeuchi</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="more-detail">

                                </div>
                            </div>
                            <!-- ./end About Credit -->

                        </div>
                    </div>


                </div>
            </div><!-- ./end .wp-tab -->

        </div>
    </section>


    <!-- 固定ページ入力ソースここから-->


    <!-- 固定ページ入力ソースここまで-->


    <div class="landing-st contact-st">
        <div class="container">
			<?php get_html_contact(); ?>
        </div>
    </div>

    <!-- landing-back-to-top -->
    <div class="wp-back-to-top-wrap">
        <div class="wp-back-to-top top2">
            <img src="<?php echo URL_STATICS; ?>/images/commons/to_top_bt.png" alt="TOP">
        </div>
    </div>

    <script src="<?php echo esc_url( URL_STATICS ) ?>/js/officialgoodcafe.js"></script>
    <script !src="">
        jQuery(function ($) {
            $(document).ready(function () {
                $('a[data-demo=item-0]').parent().addClass('current-menu-item');
            });


        })
    </script>
<?php get_footer( 'top2' ) ?>