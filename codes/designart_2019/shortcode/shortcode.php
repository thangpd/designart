<?php

function shortcode_register_scripts() {
//http://site/designart/designarttokyo2018/wp-content/themes/designart_2018
	$shortcode_assets_uri = get_template_directory_uri();
	wp_register_script( 'exhibitorguide_script', $shortcode_assets_uri . '/shortcode/static/js/exhibitorguide.js', array( 'jquery' ), '1.1', true );
}

add_action( 'wp_enqueue_scripts', 'shortcode_register_scripts' );


function get_exhibitorguide_list( $args, $content ) {

	if ( ! is_array( $args ) ) {
		$args = array();
	}

	$config = array(
		'style'        => 'style-1',
		'page_current' => 1,
		'post_num'     => 10,
		'cat_filter'   => '',
        'hide_filter' =>     false,
        'hide_pagination' => false,
	);
	$data   = array_merge( $config, $args );

	$style        = $data['style'];
	$page_current = $data['page_current'];
	$post_num     = $data['post_num'];
	$hide_filter=$data['hide_filter'];
	$hide_pagination=$data['hide_pagination'];

	//taxonomy ajax filter
	$cat_filter   = ! empty( $data['cat_filter'] ) ? json_decode( urldecode( $data['cat_filter'] ) ) : array();
	if ( ! is_array( $cat_filter ) ) {
		$cat_filter = array();
	}


	//Taxonomy list
	if ( function_exists( 'acf_add_options_page' ) && ! empty( $terms = get_field( 'order_exhibitor_category', 'option' ) ) ) {
	} else {
		$terms = get_terms( [ 'taxonomy' => 'exhibitorguide-cat', 'hide_empty' => false ] );
	}
	$tax_query = array();
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $i => $val ) {
			$tax_query[ $i ] = $val->slug;
		}
	}

	$res            = '';
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );

	$post_current = ( $page_current - 1 ) * $post_num;


	if ( ! empty( $cat_filter ) ) {
		$post_total = get_posts( array(
			'post_type'      => 'exhibitorguide',
			'posts_per_page' => - 1,
			'tax_query'      => array(
				array(
					'taxonomy' => 'exhibitorguide-cat',
					'field'    => 'slug',
					'terms'    => $cat_filter
				)
			)
		) );
		$posts      = get_posts( array(
			'post_type'      => 'exhibitorguide',
			'posts_per_page' => $post_num,
			'offset'         => $post_current,
			'post_status'    => 'publish',
			'orderby'        => [ 'post_date' => 'desc' ],
			'tax_query'      => array(
				array(
					'taxonomy' => 'exhibitorguide-cat',
					'field'    => 'slug',
					'terms'    => $cat_filter
				)
			)
		) );
	} else {
		$post_total = get_posts( array(
			'post_type'      => 'exhibitorguide',
			'posts_per_page' => - 1,
			'tax_query'      => array(
				array(
					'taxonomy' => 'exhibitorguide-cat',
					'field'    => 'slug',
					'terms'    => $tax_query
				)
			),
		) );
		$posts      = get_posts( array(
			'post_type'      => 'exhibitorguide',
			'posts_per_page' => $post_num,
			'offset'         => $post_current,
			'post_status'    => 'publish',
			'orderby'        => [ 'post_date' => 'desc' ],
			'tax_query'      => array(
				array(
					'taxonomy' => 'exhibitorguide-cat',
					'field'    => 'slug',
					'terms'    => $tax_query
				)
			),
		) );

	}

	$maxpage = numPage( count( $post_total ), intval( $post_num ) );
	?>

    <!-- Filter category -->
    <?php if(!$hide_filter): ?>
    <div class="filter_category">
		<?php

		foreach ( $terms as $term ):
			$term_name = translate_category_name( $term, $prefix_varible );
			if ( in_array( $term->slug, $cat_filter ) ) {
				?>
                <a class="category active" href="<?php echo '#' . $term->slug; ?>"><?php echo $term_name ?></a>
				<?php
			} else {
				?>
                <a class="category" href="<?php echo '#' . $term->slug; ?>"><?php echo $term_name ?></a>
				<?php
			}
		endforeach;

		?>

    </div>
    <?php endif; ?>
    <!--end filter category-->

    <div class="filter">
		<?php render_exhibitorguid_post( $posts ); ?>

    <!-- pagination -->
	<?php if( !$hide_pagination): ?>
		<?php pagination_custom_posttype( $page_current, $maxpage ); ?>
	<?php endif; ?>
    </div>
    <!--end pagination-->
	<?php


	wp_enqueue_script( 'exhibitorguide_script' );

	return $res;
}

add_shortcode( 'exhibitor_guide_list', 'get_exhibitorguide_list' );

function get_exhibitorguide_location( $args, $content ) {

	if ( ! is_array( $args ) ) {
		$args = array();
	}

	$config = array(
		'style'   => 'style-1',
		'post_id' => '',
	);
	$data   = array_merge( $config, $args );

	$style   = $data['style'];
	$post_id = $data['post_id'];


	$res            = '';
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );

	/*
	image
	url_address
	jp/en
	    title
	    description
	    address
	 * */

	$image = get_field( 'image', $post_id );
	$url_address = get_field( 'url_address', $post_id );
	$title = nl2br( get_field( $prefix_varible . 'title', $post_id ) );
	$description = nl2br( get_field( $prefix_varible . 'description', $post_id ) );
	$address = get_field( $prefix_varible . 'address', $post_id );


	$format_html = '<div class="block-item">
        <div class="block-mobile-item">
            <div class="block-image">
                <a href="#">
                    <img src="%1$s"
                         alt="image location"/>
                </a>
            </div>
            <div class="block-content">
                <div class="title">
                    %2$s
                </div>
                <div class="group-btn show">
                    <span class="btn btn-line yellow" target="_blank" data-active="閉じる" data-deactive="もっと見る">もっと見る</span>
                </div>
            </div>
        </div>
        <div class="show-content">
            <div class="description">
                %3$s
            </div>
            <div class="info">
                %4$s
            </div>
            <a class="color-primary" href="%5$s">詳細情報をもっと見る ></a>
        </div>
    </div>';

	$format_html = sprintf( $format_html, $image, $title, $description, $address, $url_address  );

	$res = $format_html;

	return $res;
}

add_shortcode( 'exhibitor_guide_location', 'get_exhibitorguide_location' );

