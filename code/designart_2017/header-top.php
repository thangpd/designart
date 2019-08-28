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
                        <a href="https://twitter.com/DESIGNART_TOKYO" target="_blank" class="social-item"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/designart.jp" target="_blank" class="social-item"><i class="fa fa-facebook-official"></i></a>
                        <a href="https://www.instagram.com/DESIGNART_TOKYO/" target="_blank" class="social-item"><i class="fa fa-instagram"></i></a>
                    </div>
                   <?php
                   generate_select_languagle();
                   ?>
                </div>
                 <nav id="site-navigation" class="wp_scroll_section main-navigation">
                    <ul class="list_scroll_section list-menu-item items-black-header">
                        <li>
                            <a href="#concept" class="anchor_scroll active-link"><?php echo translate_text_language('concept') ?></a>
                        </li>
                       <li>
                            <a href="#report" class="anchor_scroll"><?php echo translate_text_language('festival') ?></a>
                            <ul class="sub-menu">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                        <a href="<?php echo site_url(); ?>/designart2017/report/">Designart 2017</a>
                                    </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="http://designart.jp/entry/">Designart 2018</a>
                                </li>
                            </ul>
                        </li>
                      <li>
                            <a href="http://designart.jp/artist&brand/" id="mn-artist-brand"><?php echo translate_text_language('artist&brand') ?></a>
                        </li>
                        <li>
                            <a href="#information" class="anchor_scroll"><?php echo translate_text_language('information') ?></a>
                        </li>
                        <li>
                            <a href="#contact" class="anchor_scroll"><?php echo translate_text_language('contact') ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
    </header><!-- #masthead -->

    <div id="content" class="site-content">
