<?php
add_action( 'after_setup_theme', 'designart_action_theme_setup' );


if ( ! function_exists( 'designart_action_theme_setup' ) ) :

	function designart_action_theme_setup() {


		add_image_size( 'designart-thumb', 190, 143 );
		/*
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 650, true );*/
	}
endif;








