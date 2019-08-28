<?php


// Register Custom Post Type
function architecture_custom_type() {
	register_taxonomy(
		'architecture-cat',
		'architecture',
		array(
			'hierarchical' => true,
			'label' => 'Architecture Category',
			'public' => true,
			'show_ui' => true,
			'show_in_menu'    => true,
		)
	);

	$labels = array(
		'name'                  => _x( 'Architecture', 'Post Type General Name', 'encoton' ),
		'singular_name'         => _x( 'Architecture', 'Post Type Singular Name', 'encoton' ),
		'menu_name'             => __( 'Architecture', 'encoton' ),
		'name_admin_bar'        => __( 'Architecture', 'encoton' ),
	);
	$args = array(
		'label'                 => __( 'Architecture', 'encoton' ),
		'description'           => __( 'Architecture', 'encoton' ),
		'labels'                => $labels,
		'supports'              => array('title','custom-fields'),
		'hierarchical'          => false,
		'public'                => true,
		'rewrite' => array('slug' => 'exploremore/architecture'),
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'architecture', $args );

}
add_action( 'init', 'architecture_custom_type', 0 );
