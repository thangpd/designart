<?php
// Register Custom Post Type
function exhibitorguide_custom_type() {
	register_taxonomy(
		'exhibitorguide-cat',
		'exhibitorguide',
		array(
			'hierarchical' => true,
			'label' => 'Exhibitor Guide Category',
			'public' => true,
			'show_ui' => true,
			'show_in_menu'    => true,
		)
	);

	$labels = array(
		'name'                  => _x( 'Exhibitor Guide', 'Post Type General Name', 'encoton' ),
		'singular_name'         => _x( 'Exhibitor Guide', 'Post Type Singular Name', 'encoton' ),
		'menu_name'             => __( 'Exhibitor Guide', 'encoton' ),
		'name_admin_bar'        => __( 'Exhibitor Guide', 'encoton' ),
	);
	$args = array(
		'label'                 => __( 'Exhibitor Guide', 'encoton' ),
		'description'           => __( 'Exhibitor Guide', 'encoton' ),
		'labels'                => $labels,
		'supports'              => array('title','custom-fields'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'rewrite' => array('slug' => 'exploremore/exhibitorguide'),
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'exhibitorguide', $args );

	$labels = array(
		'name'                  => _x( 'Location', 'Post Type General Name', 'encoton' ),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'encoton' ),
		'menu_name'             => __( 'Location', 'encoton' ),
		'name_admin_bar'        => __( 'Location', 'encoton' ),
	);
	$args = array(
		'label'                 => __( 'Location', 'encoton' ),
		'description'           => __( 'Location', 'encoton' ),
		'labels'                => $labels,
		'supports'              => array('title','custom-fields'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'menu_position'         => 20,
		'can_export'            => true,
		'has_archive'           => true,
		'publicly_queryable'    => true,
		'show_in_menu'          => false,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'exclude_from_search'   => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'location', $args );

}
add_action( 'init', 'exhibitorguide_custom_type', 0 );



//add acf-custom-options-page to setting order category exhibitor guide
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_sub_page( array(
		'page_title'  => 'Exhibitor Guide Setting',
		'menu_title'  => 'Exhibitor Guide Setting',
		'capability'  => 'edit_posts',
		'parent_slug' => 'edit.php?post_type=exhibitorguide',
		'position'    => false,
		'icon_url'    => false,
	) );

}

// add sub menu page
function add_submenu_pages(){

	add_submenu_page( 'edit.php?post_type=exhibitorguide', esc_html__( 'Location', 'encoton' ), esc_html__( 'Location', 'encoton' ), 'edit_posts', 'edit.php?post_type=location' );
}
add_action('admin_menu', 'add_submenu_pages' );