<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$current_theme = wp_get_theme();
$version       = $current_theme->get( 'Version' );

//wp_register_style( 'fancybox-buttons', esc_url( URL_STATICS . '/libs/fancybox/source/helpers/jquery.fancybox-buttons.css' ), array(), $version );
//wp_register_style( 'fancybox-thumbs', esc_url( URL_STATICS . '/libs/fancybox/source/helpers/jquery.fancybox-thumbs.css' ), array(), $version );


wp_register_style( 'fancybox', esc_url( URL_STATICS . '/libs/fancybox/source/jquery.fancybox.css' ), array('bootstrap'), $version );
wp_register_script( 'fancybox', esc_url( URL_STATICS . '/libs/fancybox/source/jquery.fancybox.js' ), array( 'jquery' ), $version );



//wp_register_script( 'fancybox-pack', esc_url( URL_STATICS . '/libs/fancybox/source/jquery.fancybox.pack.js' ), array( 'jquery' ), $version );
//wp_register_script( 'fancybox-buttons', esc_url( URL_STATICS . '/libs/fancybox/source/helpers/jquery.fancybox-buttons.js' ), array(
//	'jquery',
//	'fancybox',
//), $version );
//wp_register_script( 'fancybox-thumbs', esc_url( URL_STATICS . '/libs/fancybox/source/helpers/jquery.fancybox-thumbs.js' ), array(
//	'jquery',
//	'fancybox',
//), $version );