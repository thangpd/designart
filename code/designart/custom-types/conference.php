<?php


// Register Custom Post Type
function conference_custom_type() {
    $labels = array(
        'name'                  => _x( 'Conference', 'Post Type General Name', 'encoton' ),
        'singular_name'         => _x( 'Conference', 'Post Type Singular Name', 'encoton' ),
        'menu_name'             => __( 'Conference', 'encoton' ),
        'name_admin_bar'        => __( 'Conference', 'encoton' ),
    );
    $args = array(
        'label'                 => __( 'Conference', 'encoton' ),
        'description'           => __( 'Conference', 'encoton' ),
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
    register_post_type( 'conference', $args );

    $labels = array(
        'name'                  => _x( 'Panelist', 'Post Type General Name', 'encoton' ),
        'singular_name'         => _x( 'Panelist', 'Post Type Singular Name', 'encoton' ),
        'menu_name'             => __( 'Panelist', 'encoton' ),
        'name_admin_bar'        => __( 'Panelist', 'encoton' ),
    );
    $args = array(
        'label'                 => __( 'Panelist', 'encoton' ),
        'description'           => __( 'Panelist', 'encoton' ),
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
    register_post_type( 'panelist', $args );

}
add_action( 'init', 'conference_custom_type', 0 );




