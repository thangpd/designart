<?php
// if (!check_enable('event-party')) {
//     header('location: '.home_url().'/designart2017');
// }
get_header('top2');

$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

$posts = get_posts(array(
    'post_type' => 'event-party',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'post_status' => array('future', 'publish')
));


$terms = get_terms( array(
    'taxonomy' => 'event-party-cat',
    'hide_empty' => false,
    'order' => 'DESC',
) );
$tab_term_html = '';
if (!empty($terms)) {
    foreach ($terms as $term) {
        $tab_term_html .= sprintf('<li>
                        <a class="item-filter" data-value="%1$s">
                            %2$s
                            <i class="icons fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>', $term->slug, $term->name);
    }
}

$content_html = '';
if (!empty($posts)){
    foreach ($posts as $index => $post) {
        $title = get_field($prefix_varible.'title', $post->ID, '');

        $area_html = get_field('area', $post->ID, '');
        if (!empty($area_html)) {
            $area_html = '<div class="pr-text">Area: <span class="text">'.$area_html.'</span></div>';
        }

        $cat_html = '';
        $category = get_category_post($post->ID, 'event-party-cat');
        $category_slug = $category_name =  '';

        $image_html = get_field('thumbnail', $post->ID, '');
        if (!empty($image_html)) {
            $image_html = wp_get_attachment_image_url($image_html, 'full');
        }

        if (!empty($category )) {
            $category_slug = $category->slug;
            $category_name = $category->name;
            $cat_html = '<div class="pr-text pr-category">Category: <span class="text">'.$category_name.'</span></div>';

            if ( empty($image_html) ) {
                $default_imgage = get_url_image_event_cat($category_slug);
                $image_html = $default_imgage;
            }

        }

        if (!empty($image_html)) {
            $image_html = ' <a href="#">
                                        <img src="'.$image_html.'" alt="">
                                    </a>';
        }

        $ds = get_date_post($post->ID, 'dS');
        $D = get_date_post($post->ID, 'D');
        $F = strtoupper(get_date_post($post->ID, 'F'));

        if ($index == 0 || get_date_post($post->ID) != get_date_post($posts[$index-1]->ID)) {
            $content_html .= ' <div class="block-filter"><h2 class="pri-title">'.$ds.'<span>('.$D.')</span> , '.$F.'</h2>';
        }

        $status_html = get_field('status', $post->ID, '');
        $status_html = strtolower($status_html);

        if ($status_html == 'empty') {
            $status_html = '';
        }

        if ( !empty($status_html) ) {
            $status_html = '<span class="status">【'.$status_html.'】</span>';
        }

        $schedule_html = get_field('time_schedule', $post->ID, '');
        if (!empty($schedule_html)) {
            $schedule_html = '<div class="time">time schedule: <span class="text">'.$schedule_html.'</span></div>';
        }

        $more_html = get_field('more_info', $post->ID, '');
        if (!empty($more_html)) {
            $more_html = '<a href="'.$more_html.'" class="btn btn-line black">
                                More Info
                                <i class="icons fa fa-angle-right"></i>
                            </a>';
        }

        $content_html .= ' <div class="wp-content" data-value="'.$category_slug.'">
                                <div class="wp-left">
                                   '.$image_html.'
                                </div>
                                <div class="wp-right">
                                    <div class="group-info">
                                        '.$area_html.$cat_html.'
                                    </div>
                                    <h5 class="title">
                                        '.$status_html.$title.'
                                    </h5>
                                    '.$schedule_html.$more_html.'

                                </div>
                            </div>';
        if ($index == (count($posts)-1) || get_date_post($post->ID) != get_date_post($posts[$index+1]->ID)) {
            $content_html .= '</div> <span class="line-sp"></span>';
        }
    }
    ?>
    <div class="event-party-page padding-tb-50">
        <div class="container">
            <!-- back button  -->
            <!-- <?php back_page_history() ?> -->
            <!-- title -->
            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter">Event & party</div>
                    <h2 class="title case-1">Event & party</h2>
                </div>
            </div>
            <!-- tab -->
            <div class="wp-tab">
                <div class="wp-scroll-page tab-filter">
                    <div class="show-tabs">All</div>
                    <ul class="list-scroll-item">
                        <li>
                            <a class="item-filter active-tab" data-value="">
                                All
                                <i class="icons fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <?php echo $tab_term_html; ?>
                    </ul>
                </div>
                <div class="tab-filter-section">
                    <?php echo $content_html ?>
                </div>
            </div>
            <!-- button back -->
            <?php back_page_history(true, 'bot') ?>
            <!-- landing-share -->
            <div class="landing-st contact-st">
                <?php get_html_share() ?>
            </div>
            <?php get_html_banner_page(true); ?>
            <!-- landing-back-to-top -->
             <div class="wp-back-to-top top2 show">
                <span class="line"></span>
                <span class="text">TOP</span>
            </div>
        </div>
    </div>
    <?php
}
?>
<script type="text/javascript">
    jQuery(function($) {
        var item_click = $('.wp-tab .list-scroll-item .item-filter');
        // Tab filter
        item_click.on('click', function() {
            // Get data attribute & location filter
            var data_value = $(this).attr('data-value'),
                location_filter = $('.wp-tab .tab-filter-section .block-filter');
            // Set active for item filter
            item_click.removeClass('active-tab');
            $(this).addClass('active-tab');
            // When a location selected
            if(data_value.length) {
                // Hide all all not matching
                $(this).parents('.wp-tab').find('.wp-content[data-value!=' + data_value + ']').fadeOut(150);
                // Display all matching
                $(this).parents('.wp-tab').find('.wp-content[data-value=' + data_value + ']').fadeIn(150);
            } else {
                location_filter.find('.wp-content').fadeIn(150);
            }
            //Get text when choose item for mobile
            var filter_name = $(this).text();
            $(this).parents('.wp-tab .tab-filter').find('.show-tabs').text(filter_name);
            checkFilterAll(data_value);
        });

        //Tab filter responsive
        $(document).on('click', '.wp-tab .show-tabs', function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).closest('.wp-tab .tab-filter').toggleClass('open-tab-filter-sm');
        });
        // Click outside close tab
        $(document).on('click',function() {
            $('.wp-tab .show-tabs').closest('.wp-tab .tab-filter').removeClass('open-tab-filter-sm');
        });

        function checkFilterAll(tab) {
            $('.block-filter').hide();
            if ( tab == '') {
                $('.block-filter').show();
            } else {
                $.each($('.block-filter'), function (index) {
                    var $current = $(this);
                    console.log($current.find('.wp-content[data-value='+tab+']').length);
                    if ($current.find('.wp-content[data-value='+tab+']').length > 0) {
                        $current.show();
                    }
                })
            }
        }

		$(document).ready(function(){
			$('a[data-demo=item-4]').parent().addClass('current-menu-item');
		});
	})

</script>
<?php
get_footer('top2');
?>
