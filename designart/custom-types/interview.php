<?php
// Register Custom Post Type
function interview_custom_type() {
    register_taxonomy(
        'interview-cat',
        'interview',
        array(
            'hierarchical' => true,
            'label' => 'Article Category',
            'public' => true,
            'show_ui' => true,
            'show_in_menu'    => true,
        )
    );

    $labels = array(
        'name'                  => _x( 'Article', 'Post Type General Name', 'encoton' ),
        'singular_name'         => _x( 'Article', 'Post Type Singular Name', 'encoton' ),
        'menu_name'             => __( 'Article', 'encoton' ),
        'name_admin_bar'        => __( 'Article', 'encoton' ),
    );
    $args = array(
        'label'                 => __( 'Article', 'encoton' ),
        'description'           => __( 'Article', 'encoton' ),
        'labels'                => $labels,
        'supports'              => array('title','custom-fields'),
        'rewrite'               => array( 'slug' => 'article' ),
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
    register_post_type( 'interview', $args );

}
add_action( 'init', 'interview_custom_type', 0 );