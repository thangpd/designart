<?php get_header( 'top2' );

global $custom_page;
if ( ! empty( $custom_page ) ) {
	$post_id        = $custom_page->ID;
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );
	/*
	ExhibitorGuide
	jp/en
	    title
	    information

	area_list   array
	    jp/en
	        area
	iframe_google_map
	register_area

	*/

	$title = get_field( $prefix_varible . 'title', $post_id );

	$term_of_post = get_the_terms( $post_id, 'exhibitorguide-cat' );

	$format_term_html = '<ul class="exhibitor-cat-list-detail">%1$s</ul>';
	$format_term_html = get_category_exhiguide( $term_of_post, $format_term_html );


	$information = get_field( $prefix_varible . 'information', $post_id );

	$area_list = get_field( 'area_list', $post_id );

	$iframe_google_map = get_field( 'iframe_google_map', $post_id );


	$register_area       = get_field( 'register_area', $post_id );
	$count_register_area = count( $register_area );


};

$other_posts = get_posts( array(
	'post_type'      => 'exhibitorguide',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'exclude'		 =>  array($post_id),
	'orderby'        => [ 'post_date' => 'desc' ],

) );

?>
    <div class="exhibiton-detai-page padding-tb-60 exhibitorguide-detail">
        <div class="container">
            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter"><?php echo translate_text_language('exhibition guide'); ?></div>
                    <h2 class="title case-1"><?php echo translate_text_language('exhibition guide'); ?></h2>
                </div>
            </div>
            <p class="title-des"><?php echo translate_text_language('We are here to help you for the specialized courses'); ?></p>
            <div class="block-title"><?php echo $title ?></div>
			<?php echo $format_term_html; ?>
            <div class="block-top">
                <div class="block-left">
                    <div class="heading-title heading-style-02">
                        <h2 class="title upper-text color-primary">INFORMATION<span class="line-middle"></span></h2>
                    </div>
                    <div class="description">
                        <p><?php echo nl2br( $information ); ?></p>
                    </div>
                    <div class="number">
                        <span class="color-primary">掲載数 :</span>
                        <span><?php echo $count_register_area; ?></span>
                    </div>
                    <div class="block-tag">
                        <div class="title color-primary">掲載エリア :</div>
                        <ul >
							<?php
							if ( ! empty( $area_list && is_array( $area_list ) ) ) {
								foreach ( $area_list as $area ) {
									/*
									 * jp/en
									 *      area
									 * */
									?>
                                    <li class="exhibitor-cat-list width-auto">
										<?php echo $area[ $prefix_varible . 'area' ]; ?>
                                    </li>
									<?php
								}
							}
							?>
                        </ul>
                    </div>
                </div>
                <div class="block-right">
					<?php if ( ! empty( $iframe_google_map ) ) {
						if ( preg_match( '/src="(.*?)"/', $iframe_google_map, $match ) ) {

							$link_to_gmap = ! empty( $match[1] ) ? $match[1] : '';
						}
						?>
                        <div class="map">
							<?php
							echo $iframe_google_map;
							?>
                        </div>
                        <div class="group-btn"><a href="<?php echo $link_to_gmap ?>" class="btn yellow capti-text ">Google
                                Mapでもっと見る ></a></div>
						<?php
					} ?>

                </div>
            </div>
            <div class="block-list-blog">

				<?php

				if ( ! empty( $register_area ) && is_array( $register_area ) ) {
					foreach ( $register_area as $location_id ) {


						echo do_shortcode( '[exhibitor_guide_location post_id="' . $location_id . '"]' );

					}
				}

				?>

            </div>

            <div class="blogs-list">
				<?php if ( ! empty( $other_posts ) ): ?>
                    <div class="title"><?php echo translate_text_language('OTHER EXHIBITION GUIDE'); ?></div>
					<?php
					render_exhibitorguid_post( $other_posts );
					?>
				<?php endif; ?>
                <div class="group-btn">
                    <a href="<?php echo home_url() . '/exploremore/exhibitorguide' ?>" class="btn btn-line yellow"
                    ><?php echo translate_text_language('BACK TO LIST'); ?></a>
                </div>
            </div>

        </div>
    </div>
    <!-- landing-share -->

    <div class="landing-st contact-st">
        <div class="container">
			<?php get_html_share() ?>
            <div class="contact-info">
				<?php get_html_contact(); ?>
            </div>
        </div>
    </div>
    <!-- landing-back-to-top -->
    <div class="wp-back-to-top top2 show">
        <span class="line"></span>
        <span class="text">TOP</span>
    </div>
    <script type="text/javascript">
        jQuery(function ($) {

            $(document).ready(function () {
                $('#primary-menu').find('a[data-demo=item-5]').parent().addClass('current-menu-item');
                var item_click = $('.block-item .group-btn');
                item_click.on('click', function () {

                    var deactive_text=$(this).find('span.btn').data('deactive');
                    var active_text=$(this).find('span.btn').data('active');
                    if ($(this).hasClass('active')) {
                        $(this).find('span.btn').text(deactive_text);
                        item_click.removeClass('active');
                        item_click.parents('.block-item ').find('.show-content').removeClass('active');
                    }
                    else {
                        $(this).find('span.btn').text(active_text);
                        item_click.removeClass('active');
                        item_click.parents('.block-item ').find('.show-content').removeClass('active');
                        $(this).addClass('active');
                        $(this).parents('.block-item').find('.show-content').addClass('active');
                    }
                });
            })
        })
    </script>
<?php get_footer( 'top2' ) ?>