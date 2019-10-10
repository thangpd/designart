<?php
get_header( 'top2' );
$term_venue  = get_term_by( 'slug', 'artist-venue', 'exhibitor-cat' );
$term_parent = 0;
if ( isset( $term_venue ) ) {
	$term_parent = $term_venue->term_id;
}
//$terms = get_terms( array(
//    'taxonomy' => 'exhibitor-cat',
//    'hide_empty' => true,
//    'orderby'   => 'name',
//    'order' => 'ASC',
//    'parent' => $term_parent
//) );


if ( function_exists( 'acf_add_options_page' ) && ! empty( $terms = get_field( 'exhibitor_category_setting', 'option' ) ) ) {
} else {
	$terms          = get_terms( [ 'taxonomy' => 'exhibitor-cat', 'hide_empty' => true ] );
}

$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );

$page        = get_page_by_path( 'exhibitor' );

$description = get_field( $prefix_varible . 'description', $page->ID, '' );

$terms2 = get_field( 'exhibitor_category_setting2', 'option' );
?>

<div class="exhibition-page padding-t-50">
    <div class="container">
        <!-- back button -->
        <!-- <?php back_page_history( true, 'top' ) ?> -->
        <!-- title -->
        <div class="heading-title heading-style-01 padding-tb-50">
            <div class="title-wrapp">
                <div class="first-letter"><?php echo translate_text_language('exhibition'); ?></div>
                <h2 class="title case-1"><?php echo translate_text_language('exhibition'); ?></h2>
            </div>
        </div>
        <p class="title-des"><?php echo $description ?></p>


        <?php get_search_form(); ?>

        <!-- Filter category -->
<!--        <div class="filter_category">
            <div class="block-category">
	            <?php
/*	            $tranlated_term = get_category_exhibitor($terms,'',true);
	            echo $tranlated_term;
	            */?>
            </div>
        </div>
-->
        <!-- scroll - page -->
		<?php if ( ! empty( $terms ) ): ?>
            <!-- wp-block-section -->
			<?php
			foreach (
				$terms

				as $term
			):

				$posts = get_posts( array(
					'post_type'      => 'exhibitor',
					'posts_per_page' => - 1,
					'tax_query'      => array(
						array(
							'taxonomy' => $term->taxonomy,
							'field'    => 'term_id',
							'terms'    => $term->term_id,
						)
					),
					'orderby'        => 'post_title',
					'order'          => 'ASC',
				) );
				if ( ! isset( $term ) || empty( $term ) || empty($posts) ) {
					continue;
				}

				$map_cat = get_field( 'map', 'exhibitor-cat_' . $term->term_id, '' );
				$terms_traned=translate_category_name( $term, $prefix_varible );
				?>
                <div id="<?php echo $term->slug ?>" class="section_scroll wp-block-section">
                    <div class="heading-title heading-style-02">
                        <h2 class="title upper-text"><?php echo $terms_traned ?><span class="line-middle"></span></h2>
                    </div>
                    <ul class="wp-list-exhibiter">
						<?php

						foreach ( $posts as $post ) {
							$post_id = $post->ID;

							$title               = get_field( $prefix_varible . 'exhibitor_title', $post_id );
							$exhibitor_thumbnail = get_field( 'exhibitor_thumbnail', $post_id, '' );
							$gallery             = get_field( 'exhibitor_gallery', $post_id );
							$thumbail_url        = '';
							if ( ! empty( $gallery ) ) {
								$thumbail_url = take_value_array( 'url', $gallery[0] );
							}

							if ( ! empty( $exhibitor_thumbnail ) ) {
								$exhibitor_thumbnail = take_value_array( 'url', $exhibitor_thumbnail, $exhibitor_thumbnail );
								$thumbail_url        = wp_get_attachment_image_url( $exhibitor_thumbnail );
							}
							echo '<li class="item">
                                <div class="item-left images">
                                    <a href="' . get_permalink( $post_id ) . '" class="link-img">
                                        <img src="' . $thumbail_url . '" alt="' . $title . '" class="img-responsive">
                                    </a>
                                </div>
                                <div class="item-right information">
                                    <div class="description">
                                        ' . $title . '
                                    </div>
                                </div>
                            </li>';
						}
						?>
                        <!--wp-list-exhibiter--></ul>
                    <!--section_scroll wp-block-section--></div>

			<?php

			endforeach;
			?>
		<?php endif; ?>


        <!-- back button -->
		<?php back_page_history( false, 'bot' ) ?>
    </div>
    <!-- landing-share -->
<!--    <div class="landing-st contact-st">
        <div class="container">
			<?php /*get_html_share() */?>
            <div class="contact-info">
				<?php /*get_html_contact(); */?>
            </div>
        </div>
    </div>-->

    <div class="landing-st contact-st">
        <div class="container">
            <?php get_html_contact(); ?>
        </div>
    </div><!-- ./end .contact-st -->


    <!-- landing-back-to-top -->
    <div class="wp-back-to-top-wrap">
        <div class="wp-back-to-top top2">
            <img src="<?php echo URL_STATICS; ?>/images/commons/to_top_bt.png" alt="TOP">
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        $(document).ready(function () {
            $('a[data-demo=item-1]').parent().addClass('current-menu-item');
            $('.filter_category a.category').on('click', function (e) {
                e.preventDefault();
                var window = screen.width;
                var descrease_offset = 0;
                if (window >= 1024) {
                    descrease_offset = 100;
                } else if (window <= 425) {
                    descrease_offset = 40;
                } else {
                    descrease_offset = 60;
                }
                var top_div = $($(this).attr('href')).offset().top - descrease_offset;
                $('html, body').animate({scrollTop: top_div}, 'slow');
            });


        });
    })
</script>

<script src="<?php echo URL_STATICS; ?>/js/search.js"></script>
<?php get_footer( 'top2' ) ?>
