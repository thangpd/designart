<?php
// if (!check_enable('architecture')) {
//     header('location: '.home_url().'/designart2017');
// }
get_header( 'top2' );
$term           = get_term_by( 'slug', 'architecture', 'architecture-cat' );
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );
$page           = get_page_by_path( 'access-architecture' );
$description    = get_field( $prefix_varible . 'description', $page->ID, '' );

$map_cat = get_field( 'map', $page->ID, '' );



if ( ! empty( $term ) ) {
	$term_id = $term->term_id;
	?>
    <div class="privacy-page access-page padding-tb-50">
        <div class="container">
            <!-- back button -->
            <!-- <?php back_page_history( true, 'top' ) ?> -->
            <!-- title -->
            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter">Achitecture</div>
                    <h2 class="title case-3">Achitecture</h2>
                </div>
            </div>
            <p class="title-des"><?php echo $description ?></p>
            <div class="wp-block-section">
                <div class="heading-title heading-style-02">
                    <h2 class="title upper-text">
                        Pickup
                        <span class="line-middle"></span>
                    </h2>
                </div>
                <ul class="wp-list-exhibiter">
					<?php
					$posts = get_posts( array(
						'post_type'      => 'architecture',
						'posts_per_page' => - 1,
						'tax_query'      => array(
							array(
								'taxonomy' => $term->taxonomy,
								'field'    => 'term_id',
								'terms'    => $term_id,
							)
						),
						'orderby'        => 'post_title',
						'order'          => 'ASC',
					) );
					foreach ( $posts as $post ) {
						$post_id             = $post->ID;
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
                                    <div class="category">
                                       ' . $term->name . ':
                                    </div>
                                    <div class="description">
                                        ' . $title . '
                                    </div>
                                    <a href="' . get_permalink( $post_id ) . '" class="btn btn-line yellow capti-text">
                                        ' . translate_text_language( 'more info' ) . '
                                        <i class="icons fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>';
					}
					?>
                </ul>
            </div>
            <!--gooogle map link-->
			<?php if ( ! empty( $map_cat ) ) {
				echo '<div class="text-center"><a href="' . $map_cat . '" class="btn btn-line yellow" target="_blank">Google MAPで建築を見る</a></div>';
			}else{
			    echo '<!--no google map-->';
            } ?>
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
        </div>
    </div>
    <script>
        jQuery(function ($) {
            $(document).ready(function () {
                $('a[data-demo=item-5]').parent().addClass('current-menu-item');
            });
        })
    </script>
	<?php
}
get_footer( 'top2' ) ?>
