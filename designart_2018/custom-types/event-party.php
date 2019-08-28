<?php


// Register Custom Post Type
function event_party_custom_type() {
    register_taxonomy(
        'event-party-cat',
        'event-party',
        array(
            'hierarchical' => true,
            'label' => 'Event & Party Category',
            'public' => true,
            'show_ui' => true,
            'show_in_menu'    => true,
        )
    );

    $labels = array(
        'name'                  => _x( 'Event & Party', 'Post Type General Name', 'encoton' ),
        'singular_name'         => _x( 'Event & Party', 'Post Type Singular Name', 'encoton' ),
        'menu_name'             => __( 'Event & Party', 'encoton' ),
        'name_admin_bar'        => __( 'Event & Party', 'encoton' ),
    );
    $args = array(
        'label'                 => __( 'Event & Party', 'encoton' ),
        'description'           => __( 'Event & Party', 'encoton' ),
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
    register_post_type( 'event-party', $args );

}
add_action( 'init', 'event_party_custom_type', 0 );
