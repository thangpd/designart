<?php /* Template Name: DesignArt2018 */ ?>
<?php
get_header( 'top2' );
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );

//get id front page
$frontpage_id = get_option( 'page_on_front' );

$news = get_posts( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
	'order'          => 'date',
	'orderby'        => 'DESC',
) );

$exhibitors = get_posts( array(
	'post_type'      => 'exhibitor',
	'post_status'    => 'publish',
	'posts_per_page' => 10,
	'orderby'        => 'rand'
//    'orderby'    => ['post_modified' => 'desc'],
) );

$events = get_posts( array(
	'post_type'      => 'event-party',
	'posts_per_page' => 4,
	'order'          => 'ASC',
	'orderby'=>'post_date',
	'post_status'    => array( 'future' )
) );

if ( empty( $events ) ) {
	$events = get_posts( array(
		'post_type'      => 'event-party',
		'posts_per_page' => 4,
		'order'          => 'DESC',
	) );
}
$prefix_varible_slider = get_prefix_languagle( $language, "-" );

echo do_shortcode( '[rev_slider alias="'.$prefix_varible_slider.'page-top-slider"]' );
?>
<div class="designart-page font-custom">

	<?php if ( ! empty( $news ) ): ?>
        <div class="landing-st" id="item-0">
            <div class="container">
                <div class="heading-title heading-style-01">
                    <div class="title-wrapp">
                        <div class="one-letter">N</div>
                        <h2 class="first-letter"><?php echo translate_text_language('news') ?></h2>
                    </div>
                </div>
                <div class="landing-blog-wrapp">
                    <div class="blogs-list">
						<?php

						foreach ( $news as $new ) {
							$new_id    = $new->ID;
							$new_title = get_field( $prefix_varible . 'title', $new_id );
							$new_date  = get_date_post( $new_id );
							$new_icon = '';
							if ( compare_date_from_current_date( get_the_date( 'Y-m-d', $new_id ), 3 ) ) {
								$new_icon = '<span class="new_label_news_page">NEW</span>';
							}
							echo '<div class="blog-item">
                                <span class="info date">' . $new_date . '</span>'. $new_icon .
							     '<h3 class="title">
                                    <a href="' . get_news_permalink( $new_id ) . '" class="link">' . $new_title . '</a>
                                </h3>
                            </div>';
						}
						?>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo home_url() . '/news'; ?>"
                           class="btn btn-line yellow-br capti-text"><?php echo translate_text_language( 'more info' ) ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>
    <!--    news -->


	<?php if ( ! empty( $exhibitors ) ): ?>
        <div class="landing-st exhibitor-st" id="item-2">
            <div class="container">
                <div class="heading-title heading-style-01">
                    <div class="title-wrapp">
                        <div class="one-letter">E</div>
                        <h2 class="first-letter"><?php echo translate_text_language('exhibition'); ?></h2>
                        <p class="intro-des">
                            <?php echo translate_text_language('Introduction of EXHIBITION at DESIGNART TOKYO 2018') ?><br>
                        <span class="intro-sub-des">
                            <?php echo translate_text_language('*Some exhibitions have already ended. Please check the exhibition pages of each exhibitors before you visit.') ?>
                        </span>
                        </p>
                    </div>
                </div>
                <div class="exhibitors-list">
					<?php
					foreach ( $exhibitors as $exhibitor ) {
						$exhibitor_id        = $exhibitor->ID;
						$exhibitor_thumbnail = get_field( 'exhibitor_thumbnail', $exhibitor_id, '' );
						$gallery             = get_field( 'exhibitor_gallery', $exhibitor_id );
						$thumbail_url        = '';
						if ( ! empty( $gallery ) ) {
							$thumbail_url = take_value_array( 'url', $gallery[0] );
						}

						if ( ! empty( $exhibitor_thumbnail ) ) {
							$exhibitor_thumbnail = take_value_array( 'url', $exhibitor_thumbnail, $exhibitor_thumbnail );
							$thumbail_url        = wp_get_attachment_image_url( $exhibitor_thumbnail );
						}

						$name_cat  = '';
						$categorys = get_the_terms( $exhibitor_id, 'exhibitor-cat' );
						if ( ! empty( $categorys ) ) {
							$cat_obj = $categorys[0];
							if ( isset( $cat_obj ) ) {
								$name_cat = $cat_obj->name;
							}
						}

						$exhibitor_title = get_field( $prefix_varible . 'exhibitor_title', $exhibitor_id );

						echo '<div class="exhibitor-item">
                            <div class="inner">
                                <div class="pic-wrapp">
                                    <img src="' . $thumbail_url . '" alt="" class="img-responsive">
                                </div>
                                <div class="desc-wrapp">
                                    <a href="' . get_permalink( $exhibitor_id ) . '" class="link">
                                         <span class="category">' . $name_cat . ':</span> 
                                        <span class="desc">
                                            ' . $exhibitor_title . '
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>';
					}
					?>
                </div>
                <div class="text-center">
                    <a href="<?php echo home_url() . '/exhibitor/' ?>"
                       class="btn btn-line yellow-br capti-text"><?php echo translate_text_language( 'exhibition list' ) ?>
                    </a>
                </div>
            </div>
        </div>
	<?php endif; ?>
    <!-- ./end exhibitor-->

	<?php
	$terms = get_terms( array(
		'taxonomy'   => 'exhibitor-cat',
		'hide_empty' => false,
		'order'      => 'DESC',
	) );
	?>

    <div class="landing-st area-map-st">
        <div class="container">
            <div class="heading-title heading-style-01">
                <div class="title-wrapp">
                    <div class="one-letter">A</div>
                    <h2 class="first-letter"><?php echo translate_text_language('area map') ?></h2>
                    <p class="intro-des"><?php echo translate_text_language('Find the Information Center / Exhibiting venue / Architecture spot') ?></p>
                </div>
            </div>
            <div id="mapArea">
                <div class="text-center">
                    <ul class="tab">
                        <!-- <?php
						foreach ( $terms as $term ) {
							$data = get_field( 'data_map', 'exhibitor-cat_' . $term->term_id, '' );
							echo '<li data-category="' . $term->name . '" data-map="' . $data . '" >
                                <a href="javascript:void(0)" class="btn btn-bg border-bg yellow" >' . $term->name . '<i class="icons fa fa-angle-right"></i></a>
                            </li>';

						}
						?> -->

                        <li data-category="all"
                            data-mapurl="https://www.google.com/maps/d/u/0/viewer?mid=1l_UM2HJzqr_B1dv-5WlEf3BNjvsAZbBk&ll=35.666161212788225%2C139.70869435415727&z=14"
                            data-map="<?php echo ( $language == '' ) ? '1BIcFqbsYCO7qKWp891w7vUhK0trHY0cv' : '1BIcFqbsYCO7qKWp891w7vUhK0trHY0cv'; ?>">
                            <a href="javascript:void(0)" class="btn btn-bg border-bg yellow onlick"><?php echo translate_text_language('all') ?></a>
                        </li>
                        <li data-category="exhibitor"
                            data-mapurl="https://www.google.com/maps/d/u/0/viewer?ll=35.666387737221264%2C139.73068431914248&z=18&mid=1BIcFqbsYCO7qKWp891w7vUhK0trHY0cv"
                            data-map="<?php echo ( $language == '' ) ? '1BIcFqbsYCO7qKWp891w7vUhK0trHY0cv' : '1BIcFqbsYCO7qKWp891w7vUhK0trHY0cv'; ?>">
                            <a href="javascript:void(0)" class="btn btn-bg border-bg yellow onlick"><?php echo translate_text_language('exhibitor') ?></a>
                        </li>
                        <li data-category="architecture"
                            data-mapurl="https://www.google.com/maps/d/u/0/viewer?ll=35.66045350057845%2C139.70904112881124&z=15&mid=1JfredQJ-HRfICEsg-6s7648f2Fdf56LZ"
                            data-map="<?php echo ( $language == '' ) ? '1JfredQJ-HRfICEsg-6s7648f2Fdf56LZ' : '1JfredQJ-HRfICEsg-6s7648f2Fdf56LZ'; ?>">
                            <a href="javascript:void(0)" class="btn btn-bg border-bg yellow onlick"><?php echo translate_text_language('architectures') ?></a>
                        </li>
                        <li data-category="official-cafe"
                            data-mapurl="https://www.google.com/maps/d/u/0/viewer?ll=35.66751248030992%2C139.71379236471785&z=17&mid=179uA3O5MXCcY4WsNZThlS750CD_ZA4xG"
                            data-map="<?php echo ( $language == '' ) ? '179uA3O5MXCcY4WsNZThlS750CD_ZA4xG' : '179uA3O5MXCcY4WsNZThlS750CD_ZA4xG'; ?>">
                            <a href="javascript:void(0)" class="btn btn-bg border-bg yellow onlick"><?php echo translate_text_language('official spots') ?></a>
                        </li>


                    </ul>
                </div>
                <div class="map" style="height:500px;">
                    <iframe src=""></iframe>
                </div>
                <div class="text-center view_map_url">
                    <a href="https://www.google.com/maps/d/u/0/viewer?mid=1l_UM2HJzqr_B1dv-5WlEf3BNjvsAZbBk&ll=35.666161212788225%2C139.70869435415727&z=14" class="btn btn-line yellow" target="_blank"> <?php echo translate_text_language('View in Google Map') ?>
                    </a>
                </div>
            </div>


        </div>
    </div><!-- ./end area-map-st -->

    <!--Exhibitor guide-->
	<?php

	$exhibitor_guide = get_posts( array(
		'post_type'      => 'exhibitorguide',
		'post_status'    => 'publish',
		'posts_per_page' => 10,
		'orderby'        => 'rand'
//    'orderby'    => ['post_modified' => 'desc'],
	) );


	if(!empty($exhibitor_guide)): ?>

        <div class="landing-st exhibition-guide-st">
            <div class="container">
                <div class="heading-title heading-style-01">
                    <div class="title-wrapp">
                        <div class="one-letter">G</div>
                        <h2 class="first-letter"><?php echo translate_text_language( 'Specialized Courses' ) ?></h2>
                        <p class="intro-des"><?php echo translate_text_language( 'We are here to help you for the specialized courses' ) ?></p>
                    </div>
                </div>
                <div class="blogs-list">
                    <div class="exhibitor_guide_container_ajax">
                        <!--
						'style'        => 'style-1',
						'page_current' => 1,
						'post_num'     => 10,
						'cat_filter'   => '',
						'hide_filter' =>false,
						'hide_pagination' => false,-->
						<?php echo do_shortcode( '[exhibitor_guide_list  hide_filter="1" post_num="3" hide_pagination="1"]' ) ?>
                    </div>

                </div>
                <div class="text-center">
                    <a href="<?php echo home_url() . '/exploremore/exhibitorguide'; ?>"
                       class="btn btn-line yellow-br capti-text"><?php echo translate_text_language( 'more info' ) ?>
                    </a>
                </div>
            </div>
        </div>

	<?php endif; ?>

    <!-- ./end .exhibition-guide-st -->

	<?php if ( check_enable( 'event-party' ) ): ?>
    <div class="landing-st event-party-st" id="item-4">
        <div class="container">
            <div class="heading-title heading-style-01">
                <div class="title-wrapp">
                    <div class="one-letter">E</div>
                    <h2 class="first-letter"><?php echo translate_text_language( 'event &amp; party' ) ?></h2>
                </div>
            </div>
            <div class="events-list">
				<?php
				foreach ( $events as $event ) {
					$title         = get_field( $prefix_varible . 'title', $event->ID, '' );
					$category      = get_category_post( $event->ID, 'event-party-cat' );
					$category_slug = $category_slug_html = '';
					if ( ! empty( $category ) ) {
						$category_slug      = $category->slug;
						$category_slug_html = '<span class="cate">' . $category->slug . '</span>';
					}

					$area_html = get_field( 'area', $event->ID, '' );
					if ( ! empty( $area_html ) ) {
						$area_html = '<div class="area">
                                            <span class="lb-text">Area: </span>
                                            <span class="place">' . $area_html . '</span>
                                        </div>';
					}

					$date_html        = get_date_post( $event->ID, 'M. j H:i' );
					$event_link = get_field( 'more_info', $event->ID, '' );
					$event_link_block = ! empty( $event_link )?'<div class="right-block">
                                <a target="_blank" href="' . $event_link . '" class="btn black btn-line">More info <i class="icons fa fa-angle-right"></i></a>
                            </div>':'';
					echo '<div class="event-item ' . $category_slug . '">
                            <div class="event-top-block">
                                ' . $category_slug_html . '
                                <span class="date">' . $date_html . '-</span>
                            </div>
                            <div class="main-block">
                                ' . $area_html . '
                                <div class="title">' . $title . '</div>
                            </div>
                           ' . $event_link_block . '
                           </div>';
				}
				?>
            </div>
            <div class="text-center">
                <a href="<?php echo home_url() . '/event-party/' ?>" class="btn btn-line yellow-br capti-text"><?php echo translate_text_language( 'more info' ) ?></a>
            </div>
        </div>
    </div>
	<?php endif; ?><!-- ./end .event-party-st -->


    <div class="landing-st contact-st">
        <div class="container">
			<?php get_html_contact(); ?>
        </div>
    </div><!-- ./end .contact-st -->

</div>
<div class="wp-back-to-top top2">
    <span class="line"></span>
    <span class="text">TOP</span>
</div>


<?php get_footer( 'top2' ); ?>

<script type="text/javascript">
    /* Add current menu
--------------------------------------------------*/

    ;(function ($) {
        var url = $(location).attr('href');
        if (url) {
            $('body').addClass('body-white');
        }
        // $.each($('#primary-menu li'), function (index) {
        //     $(this).find('a').attr('data-demo', 'item-'+index);
        // })
    })(jQuery);
</script>
