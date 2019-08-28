<?php /* Template Name: DesignArt2017 */ ?>
<?php
get_header('top2');
$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

$term_new = get_term_by('slug', 'news', 'category');
$news = get_posts(array(
    'post_type' => 'post',
    'post_status'  => 'publish',
    'posts_per_page' => 5,
    'tax_query' => array(
        array(
            'taxonomy' => $term_new->taxonomy,
            'field' => 'term_id',
            'terms' => $term_new->term_id,
        )
    ),
    'orderby'    => ['post_modified' => 'desc'],
));

$exhibitors = get_posts(array(
    'post_type' => 'exhibitor',
    'post_status'  => 'publish',
    'posts_per_page' => 10,
    'orderby'       => 'rand'
//    'orderby'    => ['post_modified' => 'desc'],
));

$events = get_posts(array(
    'post_type' => 'event-party',
    'posts_per_page' => 4,
    'order' => 'DESC',
    'post_status' => array('future')
));

if (empty($events)) {
    $events = get_posts(array(
        'post_type' => 'event-party',
        'posts_per_page' => 4,
        'order' => 'DESC',
    ));
}

$events = array_reverse($events);
echo do_shortcode('[rev_slider alias="page-top-slider"]');
?>
<div class="designart-page">
    <!--    news -->
    <?php if (!empty($news)): ?>
    <div class="landing-st" id="item-0">
		<div class="container">
			<div class="heading-title heading-style-01 padding-tb-50">
				<div class="title-wrapp">
					<div class="first-letter">News</div>
					<h2 class="title case-3">News</h2>
				</div>
			</div>
			<div class="landing-blog-wrapp">
				<div class="blogs-list">
                    <?php

                    foreach ($news as $new) {
                        $new_id = $new->ID;
                        $new_title = get_field($prefix_varible.'title', $new_id);
                        $new_date = get_date_post($new_id);
                        echo '<div class="blog-item">
                                <span class="info date">'.$new_date.'</span>
                                <h3 class="title">
                                    <a href="'.get_news_permalink($new_id).'" class="link">'.$new_title.'</a>
                                </h3>
                            </div>';
                    }
                    ?>
				</div>
				<div class="text-center">
					<a href="<?php echo home_url().'/news'; ?>" class="btn btn-line yellow-br text-uppercase"><?php echo translate_text_language('news list') ?> <i class=" icons fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
    <?php endif; ?>

<!--    exhibitor-->
    <?php if (!empty($exhibitors)): ?>
	<div class="landing-st exhibitor-st" id="item-2">
		<div class="container">
			<div class="heading-title heading-style-01 padding-tb-50">
				<div class="title-wrapp">
					<div class="first-letter">Exhibitor</div>
					<h2 class="title case-1">Exhibitor</h2>
				</div>
			</div>
			<div class="exhibitors-list">
                <?php
                foreach ($exhibitors as $exhibitor) {
                    $exhibitor_id = $exhibitor->ID;
                    $exhibitor_thumbnail = get_field('exhibitor_thumbnail', $exhibitor_id,'');
                    $gallery = get_field('exhibitor_gallery', $exhibitor_id);
                    $thumbail_url = '';
                    if (!empty($gallery)) {
                        $thumbail_url = take_value_array('url', $gallery[0]);
                    }

                    if (!empty($exhibitor_thumbnail)) {
                        $exhibitor_thumbnail = take_value_array('url', $exhibitor_thumbnail, $exhibitor_thumbnail);
                        $thumbail_url = wp_get_attachment_image_url($exhibitor_thumbnail);
                    }

                    $name_cat = '';
                    $categorys = get_the_terms($exhibitor_id, 'exhibitor-cat');
                    if (!empty($categorys)) {
                        $cat_obj = $categorys[0];
                        if (isset($cat_obj)) {
                            $name_cat = $cat_obj->name;
                        }
                    }

                    $exhibitor_title = get_field($prefix_varible.'exhibitor_title', $exhibitor_id);

                    echo '<div class="exhibitor-item">
                            <div class="inner">
                                <div class="pic-wrapp">
                                    <img src="'.$thumbail_url.'" alt="" class="img-responsive">
                                </div>
                                <div class="desc-wrapp">
                                    <a href="'.get_permalink($exhibitor_id).'" class="link">
                                        <span class="category">'.$name_cat.':</span>
                                        <span class="desc">
                                            '.$exhibitor_title.'
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>';
                }
                ?>
			</div>
			<div class="text-center">
				<a href="<?php echo home_url().'/exhibitor/' ?>" class="btn btn-line yellow-br text-uppercase"><?php echo translate_text_language('exhibitor list') ?> <i class=" icons fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>
    <?php endif; ?>

    <?php
    $terms = get_terms( array(
        'taxonomy' => 'exhibitor-cat',
        'hide_empty' => false,
        'order' => 'DESC',
    ) );
    ?>
	<div class="landing-st area-map-st" >
		<div class="container">
			<div class="heading-title heading-style-01 padding-tb-50">
				<div class="title-wrapp">
					<div class="first-letter">Area map</div>
					<h2 class="title case-2">Area map</h2>
				</div>
			</div>
			<div id="mapArea">
				<div class="text-center">
				<ul class="tab">
                    <!-- <?php
                    foreach ($terms as $term) {
                        $data = get_field('data_map', 'exhibitor-cat_'.$term->term_id, '');
                        echo '<li data-category="'.$term->name.'" data-map="'.$data.'" >
                                <a href="javascript:void(0)" class="btn btn-bg border-bg yellow" >'.$term->name.'<i class="icons fa fa-angle-right"></i></a>
                            </li>';

                    }
                    ?> -->

                    <li data-category="all" data-map="<?php echo ($language == '') ? '1VO3LJHYX00NuuBAUCA5DHaXRhQ8' : '1ISCBf8pPrOcce1MlAoafj7t9Grg'; ?>">
                        <a href="javascript:void(0)" class="btn btn-bg border-bg yellow">ALL
                            <i class="icons fa fa-angle-right"></i>
                        </a>
                    </li>
                    <li data-category="exhibitor" data-map="<?php echo ($language == '') ? '10crUbHpT-khucTSy-HBWGmSkN6Q' : '1jeou5dOdMMs0mc7TZoKhWWyDGaU'; ?>">
                        <a href="javascript:void(0)" class="btn btn-bg border-bg yellow">EXHIBITOR
                            <i class="icons fa fa-angle-right"></i>
                        </a>
                    </li>
                    <li data-category="architecture" data-map="<?php echo ($language == '') ? '1TA2Wy0lo706qbDLyHA0M0ISWZEw' : '13JASKTp1bqo1nLmepDLogIQhadA'; ?>">
                        <a href="javascript:void(0)" class="btn btn-bg border-bg yellow">ARCHITECTURE
                            <i class="icons fa fa-angle-right"></i>
                        </a>
                    </li>
                    <li data-category="official cafe" data-map="<?php echo ($language == '') ? '1WpWYpgg6U8nIqVJvkTSH0ooU9VY' : '12eJpgjygF58QYSbcC4LxX-aoi3Q'; ?>">
                        <a href="javascript:void(0)" class="btn btn-bg border-bg yellow">OFFICIAL CAFE
                            <i class="icons fa fa-angle-right"></i>
                        </a>
                    </li>


				</ul>
				</div>
				<div class="map">
					<iframe src="https://www.google.com/maps/d/embed?mid=<?php echo ($language == '') ? '1VO3LJHYX00NuuBAUCA5DHaXRhQ8' : '1ISCBf8pPrOcce1MlAoafj7t9Grg'; ?>"></iframe>
				</div>
			</div>
			<div class="text-center">
				<a href="https://www.google.com/maps/d/embed?mid=<?php echo ($language == '') ? '1VO3LJHYX00NuuBAUCA5DHaXRhQ8' : '1ISCBf8pPrOcce1MlAoafj7t9Grg'; ?>" target="_blank" class=" btn-map-link btn btn-line yellow-br ">Google map <i class=" icons fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>

    <?php if (check_enable('event-party')): ?>
	<div class="landing-st event-party-st" id="item-4">
		<div class="container">
			<div class="heading-title heading-style-01 padding-tb-50">
				<div class="title-wrapp">
					<div class="first-letter">Event &amp; party</div>
					<h2 class="title case-1">Event &amp; party</h2>
				</div>
			</div>
			<div class="events-list">
                <?php
                foreach ($events as $event) {
                    $title = get_field($prefix_varible.'title', $event->ID, '');
                    $category = get_category_post($event->ID, 'event-party-cat');
                    $category_slug = $category_slug_html = '';
                    if (!empty($category )) {
                        $category_slug = $category->slug;
                        $category_slug_html = '<span class="cate">'.$category->slug.'</span>';
                    }

                    $area_html = get_field('area', $event->ID, '');
                    if (!empty($area_html)) {
                        $area_html = '<div class="area">
                                            <span class="lb-text">Area</span>
                                            <span class="place">'.$area_html.'</span>
                                        </div>';
                    }

                    $date_html = get_date_post($event->ID, 'M. j H:i');
                    $event_link = get_permalink($event->ID);

                    echo '<div class="event-item '.$category_slug.'">
                            <div class="event-top-block">
                                '.$category_slug_html.'
                                <span class="date">'.$date_html.'-</span>
                            </div>
                            <div class="main-block">
                                '.$area_html.'
                                <div class="title">'.$title.'</div>
                            </div>
                            <div class="right-block">
                                <a href="'.$event_link.'" class="btn black btn-line">Report <i class="icons fa fa-angle-right"></i></a>
                            </div>
                        </div>';
                }
                ?>
			</div>
			<div class="text-center">
				<a href="<?php echo home_url().'/event-party/' ?>" class="btn btn-line yellow-br text-uppercase ">Event schedule <i class=" icons fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>
    <?php endif; ?>

    <div class="landing-st contact-st">
        <div class="container">
            <div class="heading-title heading-style-01">
                <div class="title-wrapp">
                    <div class="first-letter">contact</div>
                    <h2 class="title case-5">contact</h2>
                </div>
            </div>
            <div class="text-center group-btn">
                <a href="mailto:info@designart.jp" class="btn btn-bg yellow ">Contact about DESIGNART <i class="icons fa fa-angle-right"></i></a>
                <a href="mailto:press@designart.jp" class="btn btn-bg yellow ">Contact about Press <i class="icons fa fa-angle-right"></i></a>
            </div>
            <?php get_html_share(); ?>
        </div>
    </div>
    <?php get_html_banner_page(true) ?>
</div>
<div class="wp-back-to-top top2">
	<span class="line"></span>
	<span class="text">TOP</span>
</div>


<?php get_footer('top2'); ?>

<script type="text/javascript">
	/* Add current menu
--------------------------------------------------*/

    ;(function($) {
        var url = $(location).attr('href');
        if (url) {
            $('body').addClass('body-white');
        }
      // $.each($('#primary-menu li'), function (index) {
      //     $(this).find('a').attr('data-demo', 'item-'+index);
      // })
    })(jQuery);
</script>
