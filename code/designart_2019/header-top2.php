<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package designart
 */
?>
<!doctype html>
<html lang="<?php echo get_meta_language() ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php get_meta_acf() ?>
	<?php do_action('meta_share') ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_STATICS; ?>/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_STATICS; ?>/libs/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php echo URL_STATICS; ?>/libs/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <?php wp_head(); ?>
</head>

<body <?php body_class('body-white'); ?>>
<div id="pageCover"></div>
<div id="page"data-daa="this" class="content-site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'designart' ); ?></a>

    <header id="main_header" class="site-header main-header-page header-top-2">
        <!-- <div class="site-branding">
            <?php
		the_custom_logo();
		if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
		endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
		endif; ?>
        </div> --><!-- .site-branding -->
        <div class="header-main">
            <a href="<?php echo get_home_url() ?>" class="logo-site">
                <img src="<?php echo URL_STATICS; ?>/images/commons/logo_2019.svg" alt="" class="img-responsive">
            </a>

            <div class="schedule">
                <div class="tit">DESIGNART TOKYO 2019</div>
                <div class="date">2019.10.18 <span>Fri</span> -10.27 <span>Sun</span></div>
            </div>

            <div id="nav-icon2" class="btn-hamberger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="nav-collapse menu-pc">
<!--                <p class="btn-designart">2018.10.19(Fri.)〜10.28(Sun.) @TOKYO</p>-->

                <!--
                <div id="nav-icon3" class="btn-hamberger open">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                -->
                <!-- main-navigation -->
                <nav id="site-navigation" class="main-navigation">

                    <div class="menu-menu-1-container">
                        <ul id="primary-menu" class="menu">
                            <!--li id="menu-item-404" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-404 scroll-menu-item">
                                <a href="<?php echo home_url() ?>/news" data-demo="item-0"><?php echo translate_text_language('news') ?></a>
                            </li-->
                            <!--li id="menu-item-559" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-559">
                                <a data-demo="item-1"><?php echo translate_text_language('outline') ?></a>
                                <ul class="sub-menu"-->
                                    <li id="menu-item-543" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-543">
                                        <a href="<?php echo home_url() ?>/about/" data-demo="item-1"><?php echo translate_text_language('about designart') ?></a>
                                    </li>
                                    <!--li id="menu-item-613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-613">
                                        <a href="<?php echo home_url() ?>/official/" data-demo="item-1"><?php echo translate_text_language('official contents') ?></a>
                                    </li>
                                </ul>
                            </li-->
                            <li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78 scroll-menu-item">
                                <a href="<?php echo home_url() ?>/exhibitor/" data-demo="item-2"><?php echo translate_text_language('exhibition') ?></a>
                            </li>

							<?php if (check_enable('architecture')): ?>
                            <!--li id="menu-item-624" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-624"-->

                            <?php endif; ?>

                            <?php if (check_enable('event-party')): ?>
                            <!--li id="menu-item-516" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-516 scroll-menu-item">
                                <a href="<?php echo home_url() ?>/event-party/" data-demo="item-4"><?php echo translate_text_language('event &amp; party') ?></a>
                            </li-->
                            <?php endif; ?>

                            <!-- TODO -->
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78 scroll-menu-item">
                                <a href="http://designart.jp/conference2019/" target="_blank" class="external"><?php echo translate_text_language('conference') ?></a>
                            </li>

                            <!--li id="menu-item-386" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-386"><a data-demo="item-5"><?php echo translate_text_language('explore more') ?></a>
                                <ul class="sub-menu">

                                    <li id="menu-item-549" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-549">
                                        <a data-reload='1' href="<?php echo home_url() ?>/exploremore/exhibitorguide" data-demo="item-5"><?php echo translate_text_language('exhibition guide') ?></a>
                                    </li>
                                    <li id="menu-item-550" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-549">
                                        <a href="<?php echo home_url() ?>/exploremore/architecture/" data-demo="item-5"><?php echo translate_text_language('architecture guide') ?></a>
                                    </li>
                                </ul>
                            </li-->
							<?php if (check_enable('report')): ?>
                                <!-- li id="menu-item-2164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2164 scroll-menu-item">
                                    <a href="<?php echo home_url() ?>/report/" data-demo="item-6"><?php echo translate_text_language('report') ?></a>
                                </li-->
							<?php endif; ?>
                        </ul></div>
                </nav>
                <!-- ./end .main-navigation -->
                <div class="btn-map"><a href="https://www.google.com/maps/d/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397678%2C139.72963319999997&z=13"><i class="fa fa-map-marker"></i>展示マップ</a></div>
                <div class="right-site">
                    <div class="tit">SNS:</div>
                    <div class="social-list">
                        <a href="https://twitter.com/DESIGNART_TOKYO" target="_blank" class="social-item"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/designart.jp" target="_blank" class="social-item"><i class="fa fa-facebook-official"></i></a>
                        <a href="https://www.instagram.com/DESIGNART_TOKYO/" target="_blank" class="social-item"><i class="fa fa-instagram"></i></a>
                    </div>
                    <?php
                        generate_select_languagle();
                    ?>
                </div>
<!--
                <div class="exhibit_map">
                    <a href="https://www.google.com/maps/d/viewer?mid=1BIcFqbsYCO7qKWp891w7vUhK0trHY0cv" target="_blank"><?php echo translate_text_language('exhibition map') ?></a>
                </div>
-->
            </div>
            <div class="nav-collapse menu-sp">
                <ul class="nav-menu">
                    <li>
                        <a href="<?php echo home_url() ?>/about/">
                            ABOUT <br>
                            DESIGNART
                            <span>デザイナートについて</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_url() ?>/exhibitor/">
                            EXHIBITION
                            <span>展示作品</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://designart.jp/conference2019/">
                            CONFERENCE
                            <span>カンファレンス</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.google.com/maps/d/viewer?mid=1FFBUJ7kpkClWfUhbNioWGEH4kynf8Nuf&ll=35.66768702397678%2C139.72963319999997&z=13">
                            GUIDE MAP
                            <span> 展示マップ</span>
                        </a>
                    </li>
                </ul>
                <div class="block-info">
                    <div class="social-list">
                        <div class="title sns text-22">SNS</div>
                        <a href="https://twitter.com/DESIGNART_TOKYO" target="_blank" class="social-item"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/designart.jp" target="_blank" class="social-item"><i class="fa fa-facebook-official"></i></a>
                        <a href="https://www.instagram.com/DESIGNART_TOKYO/" target="_blank" class="social-item"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="language ">
                        <div class="language-text title text-22">LANGUAGE</div>
	                    <?php
	                    generate_select_languagle();
	                    ?>
                        <div class="item"><span>EN/</span>JP</div>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">

 
