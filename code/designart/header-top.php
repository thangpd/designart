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
    <meta name="viewport" content="width=device-width">
	<?php get_meta_acf() ?>
	<?php do_action('meta_share') ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_STATICS; ?>/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_STATICS; ?>/libs/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL_STATICS; ?>/libs/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_STATICS; ?>/libs/animate.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class('body-bg'); ?>>
<div id="pageCover"></div>
<div id="home_url" data-url="<?php echo home_url() ?>"></div>
<div id="page" class="ds-ldpage site">
    <!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'designart' ); ?></a>
 -->
    <header id="main_header" class="ds-header-black site-header main-header-page">
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
                <img src="<?php echo URL_STATICS; ?>/images/commons/logo.svg" alt="" class="img-responsive">
            </a>
            <div class="button-top pc-show">
                <a href="<?php echo get_home_url().'/designarttokyo2019' ?>"><span>DESIGNART TOKYO 2019</span><i class="icons fa fa-angle-right"></i></a>
            </div>
            <div id="nav-icon-open" class="btn-hamberger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="nav-collapse">
                <!--                 <a href="<?php echo get_home_url() ?>/designart2017/" class="btn btn-link btn-designart">DESIGNART 2017<span class="icons"></span></a> -->
                <div id="nav-icon3" class="btn-hamberger open">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="right-site">
                    <div class="social-list">
                        <a href="https://twitter.com/DESIGNART_TOKYO" target="_blank" class="social-item"><i
                                    class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/designart.jp" target="_blank" class="social-item"><i
                                    class="fa fa-facebook-official"></i></a>
                        <a href="https://www.instagram.com/DESIGNART_TOKYO/" target="_blank" class="social-item"><i
                                    class="fa fa-instagram"></i></a>
                    </div>
					<?php
					generate_select_languagle();
					?>
                </div>
                <div class="button-top mb-show">
                    <a href="<?php echo get_home_url().'/designarttokyo2019' ?>"><span>DESIGNART TOKYO 2019</span><i
                                class="icons fa fa-angle-right"></i></a>
                </div>
                <nav id="site-navigation" class="wp_scroll_section main-navigation">
                    <ul class="list_scroll_section list-menu-item items-black-header">
                        <li>
                            <a href="<?php echo get_home_url() ?>/about/" id="mn-about"
                               ><?php echo translate_text_language( 'about' ) ?></a>
                        </li>
                        <li>
                            <a href="#report"
                               class="anchor_scroll"><?php echo translate_text_language( 'festival' ) ?></a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="<?php echo get_home_url().'/designarttokyo2019/' ?>">DESIGNART TOKYO 2019</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="<?php echo get_home_url().'/designarttokyo2018/report/' ?>">DESIGNART TOKYO 2018</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="<?php echo get_home_url() ?>/designart2017/">DESIGNART TOKYO 2017</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="<?php site_url(); echo PATH_CURRENT_SITE; ?>conference/" id="mn-conference"
                            ><?php echo translate_text_language( 'conference' ) ?></a>
                        </li>
                        <li>
                            <a href="<?php site_url(); echo PATH_CURRENT_SITE; ?>artist-brand/"
                               id="mn-artist-brand"><?php echo translate_text_language( 'artist&brand' ) ?></a>
                        </li>
                        <li>
                            <a href="<?php site_url(); echo PATH_CURRENT_SITE; ?>article"
                               id="interview"><?php echo translate_text_language( 'article' ) ?></a>
                        </li>
                        <li>
                            <a href="<?php site_url(); echo PATH_CURRENT_SITE; ?>news" id="news"><?php echo translate_text_language( 'news' ) ?></a>
                        </li>
                        <li>
                            <a href="#contact"
                               class="anchor_scroll"><?php echo translate_text_language( 'contact' ) ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">
