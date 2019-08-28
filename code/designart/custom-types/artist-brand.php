<?php


// Register Custom Post Type
function artist_brand_custom_type() {
	register_taxonomy(
		'artist-brand-cat',
		'artist-brand',
		array(
			'hierarchical' => true,
			'label'        => 'Artist & Brand Category',
			'public'       => true,
			'show_ui'      => true,
			'show_in_menu' => true,
		)
	);
	register_taxonomy(
		'ab_year_cat',
		'artist-brand',
		array(
			'hierarchical' => true,
			'label'        => 'Artist & Brand Year',
			'public'       => true,
			'show_ui'      => true,
			'show_in_menu' => true,
		)
	);

	$labels = array(
		'name'           => _x( 'Artist & Brand', 'Post Type General Name', 'encoton' ),
		'singular_name'  => _x( 'Artist & Brand', 'Post Type Singular Name', 'encoton' ),
		'menu_name'      => __( 'Artist & Brand', 'encoton' ),
		'name_admin_bar' => __( 'Artist & Brand', 'encoton' ),
	);
	$args   = array(
		'label'               => __( 'Artist & Brand', 'encoton' ),
		'description'         => __( 'Artist & Brand', 'encoton' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'artist-brand', $args );

}

add_action( 'init', 'artist_brand_custom_type', 0 );

add_filter( 'manage_artist-brand_posts_columns', 'set_custom_edit_book_columns' );
function set_custom_edit_book_columns( $columns ) {
	$columns['ab_year_cat']      = __( 'Year', 'designart' );
	$columns['artist_brand_cat'] = __( 'Category', 'designart' );

	return $columns;
}

add_action( 'manage_artist-brand_posts_custom_column', 'custom_columnss', 10, 2 );

function custom_columnss( $column, $post_id ) {
	switch ( $column ) {
		case 'ab_year_cat' :
			$terms = get_the_term_list( $post_id, 'ab_year_cat', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'Unassigned year yet', 'designart' );
			}
			break;

		case 'artist_brand_cat' :
			$terms = get_the_term_list( $post_id, 'artist-brand-cat', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'Unable to get category', 'designart' );
			}
			break;
	}
}


add_filter( 'manage_artist-brand_sortable_columns', 'my_sortable_artist_brand_column' );
function my_sortable_artist_brand_column( $columns ) {
	$columns['ab_year_cat']      = 'ab_year_cat';
	$columns['artist_brand_cat'] = 'artist_brand_cat';

	//To make a column 'un-sortable' remove it from the array
	//unset($columns['date']);

	return $columns;
}







