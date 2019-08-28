<?php



// Register Custom Post Type
function artist_brand_custom_type() {
    register_taxonomy(
        'artist-brand-cat',
        'artist-brand',
        array(
            'hierarchical' => true,
            'label' => 'Artist & Brand Category',
            'public' => true,
            'show_ui' => true,
            'show_in_menu'    => true,
        )
    );

    $labels = array(
        'name'                  => _x( 'Artist & Brand', 'Post Type General Name', 'encoton' ),
        'singular_name'         => _x( 'Artist & Brand', 'Post Type Singular Name', 'encoton' ),
        'menu_name'             => __( 'Artist & Brand', 'encoton' ),
        'name_admin_bar'        => __( 'Artist & Brand', 'encoton' ),
    );
    $args = array(
        'label'                 => __( 'Artist & Brand', 'encoton' ),
        'description'           => __( 'Artist & Brand', 'encoton' ),
        'labels'                => $labels,
        'supports'              => array('title'),
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
    register_post_type( 'artist-brand', $args );

}
add_action( 'init', 'artist_brand_custom_type', 0 );
