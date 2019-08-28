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
    <meta property="og:image" content="http://designart.jp/wp-content/themes/designart/statics/images/da2019_ogp.jpg">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
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

    <div id="content" class="site-content">
