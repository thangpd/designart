<?php


// Register Custom Post Type
function exhibitor_custom_type() {
    register_taxonomy(
        'exhibitor-cat',
        'exhibitor',
        array(
            'hierarchical' => true,
            'label' => 'Exhibitor Category',
            'public' => true,
            'show_ui' => true,
            'show_in_menu'    => true,
        )
    );

    $labels = array(
        'name'                  => _x( 'Exhibitor', 'Post Type General Name', 'encoton' ),
        'singular_name'         => _x( 'Exhibitor', 'Post Type Singular Name', 'encoton' ),
        'menu_name'             => __( 'Exhibitor', 'encoton' ),
        'name_admin_bar'        => __( 'Exhibitor', 'encoton' ),
    );
    $args = array(
        'label'                 => __( 'Exhibitor', 'encoton' ),
        'description'           => __( 'Exhibitor', 'encoton' ),
        'labels'                => $labels,
        'supports'              => array('title','custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
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
    register_post_type( 'exhibitor', $args );

}
add_action( 'init', 'exhibitor_custom_type', 0 );

//add acf-custom-options-page to setting order category exhibitor guide
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_sub_page( array(
		'page_title'  => 'Exhibitor Setting',
		'menu_title'  => 'Exhibitor Setting',
		'capability'  => 'edit_posts',
		'parent_slug' => 'edit.php?post_type=exhibitor',
		'position'    => false,
		'icon_url'    => false,
	) );
}



function blog_custom_type() {
//    remove_post_type_support( 'post', 'title');
    remove_post_type_support( 'post', 'editor');
    remove_post_type_support( 'page', 'editor');
}
add_action( 'init', 'blog_custom_type', 0 );
