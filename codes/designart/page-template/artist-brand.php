<?php
get_header( 'top' );
global $wpdb;

wp_enqueue_style( 'artist-brand', URL_STATICS . '/css/artist-brand.css' );
$page_title  = isset( $custom_page->post_title ) ? $custom_page->post_title : '';
$page_url    = isset( $custom_page->guid ) ? $custom_page->guid : '';
$current_uri = $_SERVER['REQUEST_URI'];

$arr_year_url = array(
	'All'  => '',
	'2017' => 'designart2017',
	'2018' => 'designarttokyo2018',
	'2019' => 'designart2019'
);


$cats          = get_terms( array(
	'taxonomy' => 'artist-brand-cat'
) );
$years_support = array_merge( array( (object) array( 'slug' => 'All' ) ), get_terms(
	array(
		'taxonomy'   => 'ab_year_cat',
		'hide_empty' => false
	)
) );

if ( isset( $_GET['y'] ) && $_GET['y'] ) {
	$year_current = ( $_GET['y'] );
} else {
	$year_current = 'All';
}
$year_current_model = '';
$language           = get_key_languagle();
$prefix_varible     = get_prefix_languagle( $language, "_" );

?>
<div class="artist-brand">
    <section class="content-festival">
        <div class="container">
            <div class="heading-title">
                <div class="first-letter"><?php echo esc_html( $page_title ) ?></div>
                <div class="block-category">
					<?php if ( ! empty( $years_support ) ): ?>
                        <div class="year">
							<?php foreach ( $years_support as $index => $y ): ?>
								<?php
								$year_taburl        = home_url() . '/artist-brand?y=' . $y->slug;
								$year_current_model = $y->slug == $year_current ? $y : $year_current_model;
								?>
                                <div class="item <?php echo( $y->slug == $year_current ? 'active' : '' ) ?>">
                                    <a href="<?php echo $year_taburl ?>"><?php echo esc_html( $y->slug ) ?></a>
                                </div>
							<?php endforeach; ?>
                        </div>
					<?php endif; ?>
                    <div class="year-content">
                        <div class="block-content">
                            <div class="title"><?php echo translate_text_language( '6x' ) ?>:</div>
							<?php
							if ( isset( $arr_year_url[ $year_current ] ) ) {
								$year_url = home_url() . DIRECTORY_SEPARATOR . $arr_year_url[ $year_current ];
							} else {
								$year_url = home_url();
							}
							?>
                            <div class="title-description"><a
                                        href="<?php echo esc_url( $year_url ) ?>"><?php echo 'DESIGNART ' . strtoupper( $year_current == 'All' ? '' : $year_current ) ?></a>
                            </div>
                        </div>
                        <div class="block-character">
                            <div class="menu">MENU<i class="fa fa-angle-down" aria-hidden="true"></i>:</div>
                            <div class="character">
								<?php for ( $i = 97; $i < 123; $i ++ ): ?>
									<?php $chr = chr( $i ); ?>
                                    <a href="#<?php echo ucwords( $chr ) ?>"
                                       class="anchor_scroll active-link"><span><?php echo ucwords( $chr ) ?></span></a>
								<?php endfor; ?>
                            </div>
                            <div class="card">
                                <ul class="nav nav-tabs" role="tablist">
									<?php
									/**
									 * @var $cat WP_Term
									 */
									$classActive = 'active';
									?>

									<?php foreach ( $cats as $cat ): $catId = $cat->term_id;
										$catName = $cat->name; ?>
                                        <li role="presentation" class="<?php echo $classActive ?>"><a
                                                    href="#<?php echo esc_attr( $catId ) ?>"
                                                    aria-controls="home" role="tab"
                                                    data-toggle="tab"><?php echo esc_html( $catName ) ?></a>
                                        </li>
										<?php $classActive = ''; ?>
									<?php endforeach; ?>
                                </ul>
                                <div class="tab-content">
                                    <div class="row">
										<?php $classActive = 'active'; ?>
										<?php foreach ( $cats as $cat ): ?>
                                            <div role="tabpanel"
                                                 class="tab-pane col-md-6 col-sm-6 <?php echo esc_attr( $classActive ) ?>"
                                                 id="<?php echo $cat->term_id ?>">
												<?php
												$classActive       = '';
												/**
												 * @var $query WP_Query
												 */
												global $wpdb;
												for ( $i = 97; $i < 123; $i ++ ):
													$key = chr( $i );
													$args['title'] = $key;
//													$sql           = $wpdb->prepare( "SELECT SQL_CALC_FOUND_ROWS  wp_posts.* FROM wp_posts  LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) WHERE 1=1  AND (YEAR( wp_posts.post_date ) = %s
//) AND wp_posts.post_title LIKE %s AND (wp_term_relationships.term_taxonomy_id IN (%s) and wp_term_relationships.term_taxonomy_id in (%s) ) AND wp_posts.post_type=%s AND ((wp_posts.post_status = %s OR wp_posts.post_status = %s)) GROUP BY wp_posts.ID ORDER BY wp_posts.post_title ASC", $year_current, $wpdb->esc_like( $key ) . '%', $cat->term_id, $year_current_model->term_id, 'artist-brand', 'publish', 'future' );
													if ( $year_current == 'All' ) {
														$sql = $wpdb->prepare( "
SELECT wp_posts.ID FROM wp_posts  right JOIN wp_term_relationships ON 
(wp_posts.ID = wp_term_relationships.object_id) WHERE 1=1 AND wp_posts.post_title LIKE '%s'AND 
wp_term_relationships.term_taxonomy_id = %s AND
 wp_posts.post_type='%s' AND ((wp_posts.post_status = '%s' OR wp_posts.post_status = '%s')) 
 GROUP BY wp_posts.ID ORDER BY wp_posts.post_title ASC ",
															$wpdb->esc_like( $key ) . '%',
															$cat->term_id,
															'artist-brand',
															'publish',
															'future' );
													} else {
														$sql = $wpdb->prepare( "select SQL_CALC_FOUND_ROWS wp_posts.* 
from wp_posts left join wp_term_relationships on (wp_posts.ID=wp_term_relationships.object_id) 
where wp_posts.ID in (SELECT wp_posts.ID FROM wp_posts  right JOIN wp_term_relationships ON 
(wp_posts.ID = wp_term_relationships.object_id) WHERE 1=1 AND wp_posts.post_title LIKE '%s'AND 
wp_term_relationships.term_taxonomy_id = %s ) and wp_term_relationships.term_taxonomy_id = %s AND
 wp_posts.post_type='%s' AND ((wp_posts.post_status = '%s' OR wp_posts.post_status = '%s')) 
 GROUP BY wp_posts.ID ORDER BY wp_posts.post_title ASC ",
															$wpdb->esc_like( $key ) . '%',
															$cat->term_id,
															$year_current_model->term_id,
															'artist-brand',
															'publish',
															'future' );
													}

													$posts = $wpdb->get_results( $sql );
													?>
                                                    <div class="item-chr"
                                                         data-name="<?php echo esc_attr( ucwords( $key ) ) ?>"
                                                         data-count="<?php echo count( $posts ) ?>">
                                                        <div class="title-index"
                                                             id="<?php echo esc_attr( ucwords( $key ) ) ?>">
                                                            <span><?php echo esc_html( ucwords( $key ) ) ?></span></div>
                                                        <div class="content-index"
                                                             data-id="<?php echo esc_attr( ucwords( $key ) ) ?>">
                                                            <ul>
																<?php foreach ( $posts as $post ): ?>
																	<?php
																	$post_title = '';
																	if ( class_exists( 'acf' ) ) :
																		$post_title = get_field( $prefix_varible . 'title', $post->ID, '' );
																	endif;
																	?>
																	<?php
																	$view_url = '';
																	if ( class_exists( 'acf' ) ) :
																		$view_url = get_field( 'view_site', $post->ID, '' );
																	endif;
																	?>

																	<?php if ( ! empty( $view_url ) ): ?>
                                                                        <li><a href="<?php echo esc_url( $view_url ) ?>"
                                                                               target="_blank"><?php echo $post_title ?>
                                                                                <img
                                                                                        src="<?php echo esc_url( URL_STATICS ) ?>/images/icon.png"></a>
                                                                        </li>
																	<?php else:
																		?>
                                                                        <li><?php echo $post_title ?>
                                                                        </li>
																	<?php endif; ?>
																<?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
												<?php endfor; ?>
                                            </div>
										<?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<section id="contact" class="section contact-area section-4 ">
    <div class="wp-bg-skew wp-padding">
        <div class="wp-ds-ldpage">
            <div class="wp-block-contact landing-st contact-st">
                <div class="text-center">
					<?php get_html_share() ?>
                </div>
                <div class="title first  padding-tb-30">Contact</div>
                <div class="text-center group-btn">
                    <a href="mailto:info@designart.jp" class="btn btn-bg black">Contact for DESIGNARTs<i
                                class="icons fa fa-angle-right"></i></a>
                    <a href="<?php if ( $current_uri == '/en/artist-brand/' ): echo "mailto:designarttokyo@camronpr.com"; else: echo "mailto:press@designart.jp"; endif; ?>"
                       class="btn btn-bg black">Contact for Press<i
                                class="icons fa fa-angle-right"></i></a>
                </div>


            </div>
        </div>
    </div>
    </div>
</section>
<?php get_html_banner_page( false ) ?>
<div class="wp-back-to-top top2 show">
    <span class="line"></span>
    <span class="text">TOP</span>
</div>
<?php
get_footer( 'top' );
?>
<script type="text/javascript">
	<?php if ( ! wp_is_mobile() ): ?>
    ;(function ($) {
        $(".content-index").each(function () {
            var id = $(this).attr("data-id");
            var maxHeight = 0;
            $('[data-id=' + id + ']').each(function () {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });
            $('[data-id=' + id + ']').height(maxHeight);
        });
    })(jQuery);
	<?php endif; ?>
</script>
<script type="text/javascript">
    jQuery(function ($) {
        $(".artist-brand .anchor_scroll").click(function () {
            var section = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(section).offset().top - 150
            });
        });
    });
</script>
<script type="text/javascript">
    ;(function ($) {
        $(".item-chr").each(function () {
            var id = $(this).attr("data-name");
            var count = 0;
            $('[data-name=' + id + ']').each(function () {
                count += parseInt($(this).attr("data-count"));
            })
            if (count == 0) {
                $('[data-name=' + id + ']').css("display", "none");
            }
        });

        $('#site-navigation a').removeClass('active-link');
        $('#mn-artist-brand').addClass('active-link');
        $('#mn-artist-brand').addClass('anchor_scroll');
    })(jQuery);


</script>