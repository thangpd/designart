<?php get_header('top2') ?>
    <div id="testdemo"></div>
<?php
global $custom_page;
if (!empty($custom_page)) {
	$post_id = $custom_page->ID;
	$language = get_key_languagle();
	$prefix_varible = get_prefix_languagle($language, "_");
	$title = get_field($prefix_varible.'exhibitor_title', $post_id);
	$gallery = get_field('exhibitor_gallery', $post_id);
	$description = get_field($prefix_varible.'exhibitor_description', $post_id);
	$artists = get_field($prefix_varible.'exhibitor_artist', $post_id);
	$area = get_field('exhibitor_area', $post_id, '');;
	$map = get_field('exhibitor_map', $post_id);
	$map_url = '';
	if ( isset($map) && is_array($map) &&  !empty($map) ) {
		foreach ($map as $key => $value) {
			if (preg_match('/\/data$/', $key)) {
				$key = str_replace('_', '.', $key);
				$map_url = $key.$value;
			}
		}


		if (empty($map_url)) {
			$map_url = 'https://www.google.com/maps/search/?api=1&query=';
			if (isset($map['address'])) {
				$map_url .= ($map['address']);
			}
		}
	}
	$name_cat = '';
	$categorys = get_the_terms($post_id, 'exhibitor-cat');
	if (!empty($categorys)) {
		$cat_obj = $categorys[0];
		if (isset($cat_obj)) {
			$name_cat = $cat_obj->name;
		}
	}

	$venues = get_field($prefix_varible.'exhibitor_venue', $post_id);
	$text_artist = get_field($prefix_varible.'text_artist', $post_id, '');
	$text_venue = get_field($prefix_varible.'text_venue', $post_id, '');
	$description_bottom = get_field($prefix_varible.'description_bottom', $post_id, '');
}
?>
    <div class="exhibiton-detai-page padding-t-60">
        <div class="container">
            <!-- back button -->
            <!-- <?php back_page_history(true, 'top') ?> -->
            <!-- title -->
            <div class="heading-title heading-style-01 padding-tb-60">
                <div class="title-wrapp">
                    <div class="first-letter">Exhibition</div>
                    <h2 class="title case-1">Exhibition</h2>
                </div>
            </div>
            <!-- infor detail -->
            <div class="exhibiton-detail-content">
                <div class="wp-single-title">
                    <h1 class="single-title"><?php echo $title ?></h1>
                    <div class="single-info">
                        <div class="info-item">
                            <!--                             <?php if (!empty($name_cat)): ?>
                            <div class="_item">
                                <span class="lb-text"><?php echo translate_text_language("category") ?>:</span>
                                <span class="text"><?php echo $name_cat ?></span>
                            </div>
                            <?php endif; ?> -->

							<?php if (!empty($area)): ?>
                                <div class="_item">
                                    <span class="lb-text"><?php echo translate_text_language("area") ?>:</span>
                                    <span class="text"><?php echo $area ?></span>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="wp-single-content">
					<?php if ( isset($gallery) && is_array($gallery) ): ?>
                        <div class="single-slick">
                            <div class="slider_slick">
								<?php
								foreach ($gallery as $index => $item) {
									echo ' <div class="slick-block">
                                        <img src="'.$item['url'].'" alt="" class=img-responsive>
                                    </div>';
									if ($index >= 4) {
										break;
									}
								}
								?>
                            </div>
                        </div>
					<?php endif; ?>

                    <div class="heading-title heading-style-02">
                        <h2 class="title upper-text">
							<?php echo translate_text_language("information") ?>
                            <span class="line-middle"></span>
                        </h2>
                    </div>
					<?php if (!empty($description)): ?>
                        <div class="entry-content">
							<?php echo apply_filters('the_content', $description) ?>
                        </div>
					<?php endif; ?>

					<?php if (!empty($map_url)): ?>
                        <div class="wp-btn text-center">
                            <a href="<?php echo $map_url ?>" class="btn btn-line yellow" target="_blank">
								<?php echo translate_text_language('AREA MAP') ?>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
					<?php endif; ?>
                </div>
            </div>

            <!-- list block  -->
            <div class="list-block-detail clearfix">

				<?php if (isset($artists) && !empty($artists)): ?>
                    <div class="block-left">
                        <div class="heading-title heading-style-02">
                            <h2 class="title upper-text">
								<?php echo $text_artist ?>
                                <span class="line-middle"></span>
                            </h2>
                        </div>

                        <ul class="list-block-item">
							<?php
							foreach ($artists as $artist) {
								$artist_url =  $html_img = $html_name = $html_position = $html_description = $html_url = '';
//                          url
								if (isset($artist['url'])) {
									$artist_url = $artist['url'];
								}
//                            image
								if ( isset($artist['image']) ) {
									$artist_img = $artist['image'];
									if (!empty($artist_img)) {
										$html_img = '<a href="'.$artist_url.'" class="link-img">
                                                    <img src="'.$artist_img.'" alt="" class=img-responsive>
                                                </a>';
									}
								}
//                            name
								if ( isset($artist['name']) ) {
									$artist_name = $artist['name'];
									$html_name = '<div class="name">'.$artist_name.'</div>';
								}
//                            position
								if ( isset($artist['position']) ) {
									$artist_position = $artist['position'];
									$html_position = '<div class="position">'.$artist_position.'</div>';
								}

//                            description
								if ( isset($artist['description']) ) {
									$artist_description = $artist['description'];
									$html_description = apply_filters('the_content', $artist_description);
								}
//                            description
								if ( isset($artist['url']) ) {
									$artist_url = $artist['url'];
									$html_url = '  <div class="adress-contact">
                                                    <div class="website">
                                                        <a href="'.$artist_url.'">'.$artist_url.'</a>
                                                    </div>
                                                </div>';
								}

								echo '<li>
                                    <div class="wp-block-image">
                                        '.$html_img.$html_name.$html_position.'
                                    </div>
                                    <div class="wp-block-content">
                                        '.$html_description.$html_url.'
                                    </div>
                                </li>';
							}
							?>

                        </ul>
                    </div>
				<?php endif; ?>

                <span class="line-sp"></span>
                <!--                list venue-->
				<?php if (!empty($venues)): ?>
                    <div class="block-right">
                        <div class="heading-title heading-style-02">
                            <h2 class="title upper-text">
								<?php echo $text_venue ?>
                                <span class="line-middle"></span>
                            </h2>
                        </div>
                        <ul class="list-block-item">
							<?php
							for($i=0; $i<count($venues)&& $i<2; $i++){
								$venue = $venues[$i];
								$html_img = $html_name = $html_position = $html_description = $html_information = $html_url = '';

								$venue_url = take_value_array('url', $venue);
								$venue_image = take_value_array('image', $venue);
								$venue_name = take_value_array('name', $venue);
								$venue_position = take_value_array('position', $venue);
								$venue_information = take_value_array('information', $venue, array());
								$venue_description = take_value_array('description', $venue);
								if (!empty($venue_image)) {
									$html_img = '<a href="'.$venue_url.'" class="link-img">
                                                <img src="'.$venue_image.'" alt="" class=img-responsive>
                                            </a>';
								}

								if (!empty($venue_name)) {
									$html_name = '<div class="name">'.$venue_name.'</div>';
								}

								if (!empty($venue_position)) {
									$html_position = '<div class="position">'.$venue_position.'</div>';
								}


								if (!empty($venue_url)) {
									$html_url = '<div class="website">
                                                <a href="'.$venue_url.'">'.$venue_url.'</a>
                                            </div>';
								}

								if (!empty($venue_information)) {
									$html_items = '';
									for ($idx=0; $idx < count($venue_information); $idx++) {
										$item = $venue_information[$idx];
										$html_items .= '<span class="tel">
                                                        <b>'.$item['key'].':</b> '.$item['value'].' 
                                                    </span>';
									}
									$html_information = '<div class="adress-contact">
                                                '.$html_items.$html_url.'
                                            </div>';
								}else{
								    $html_information='<div class="adress-contact">
                                                '.$html_url.'
                                            </div>';
                                }

								if (!empty($venue_description)) {
									$html_description = apply_filters('the_content', $venue_description);
								}
								echo '<li>
                                <div class="wp-block-image">
                                    '.$html_img.$html_name.$html_position.'
                                </div>
                                <div class="wp-block-content">
                                    '.$html_description.$html_information.'
                                        
                                </div>
                            </li>';
							}
							?>
                        </ul>
                    </div>
				<?php endif; ?>
                <!--                end venue-->
                <!-- description bottom -->
				<?php
				if ( !empty($description_bottom) ) {
					echo '<div class="bottom-desc"><p>'.$description_bottom.'</p></div>';
				}
				?>

                <div class="wp-btn text-center">
                    <a href="<?php echo home_url().'/exhibitor/' ?>" class="btn btn-line black">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
						<?php echo translate_text_language("BACK to LIST") ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- landing-share -->
        <div class="landing-st contact-st">
            <div class="container">
                <!--					--><?php //get_html_share() ?>
                <div class="contact-info">
                    <?php get_html_contact(); ?>
                </div>
            </div>
        </div>
        <!-- landing-back-to-top -->
        <div class="wp-back-to-top-wrap">
            <div class="wp-back-to-top top2">
                <img src="<?php echo URL_STATICS; ?>/images/commons/to_top_bt.png" alt="TOP">
            </div>
        </div>
    </div>
    <link href="<?php echo URL_STATICS; ?>/libs/slick/slick.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/slick/slick.min.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            $('.slider_slick').slick({
                arrows: true,
                nextArrow: '<i class="fa fa-angle-right slick-next"></i>',
                prevArrow: '<i class="fa fa-angle-left slick-prev"></i>',
                dots: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                slidesToShow: 1,
                responsive:[
                    {
                        breakpoint:480,
                        settings: {
                            arrows: true,
                            dots: false,
                        }
                    }
                ]
            });
            $(document).ready(function () {
                $('#primary-menu').find('a[data-demo=item-1]').parent().addClass('current-menu-item');
            })
        })
    </script>
<?php get_footer('top2') ?>