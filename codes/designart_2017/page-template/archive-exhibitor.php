<?php
get_header('top2');
$term_venue = get_term_by('slug', 'artist-venue', 'exhibitor-cat');
$term_parent = 0;
if (isset($term_venue)) {
    $term_parent = $term_venue->term_id;
}

//$terms = get_terms( array(
//    'taxonomy' => 'exhibitor-cat',
//    'hide_empty' => true,
//    'orderby'   => 'name',
//    'order' => 'ASC',
//    'parent' => $term_parent
//) );

$terms = array(
    'omotesando' => get_term_by('slug', 'omotesando', 'exhibitor-cat'),
    'gaienmae'  => get_term_by('slug', 'gaienmae', 'exhibitor-cat'),
    'harajuku'  => get_term_by('slug', 'harajuku', 'exhibitor-cat'),
    'meijijingumae' => get_term_by('slug', 'meijijingumae', 'exhibitor-cat'),
    'shibuya'   => get_term_by('slug', 'shibuya', 'exhibitor-cat'),
    'ebisu' => get_term_by('slug', 'ebisu', 'exhibitor-cat'),
    'daikanyama'    => get_term_by('slug', 'daikanyama', 'exhibitor-cat'),
    'nakameguro'    => get_term_by('slug', 'nakameguro', 'exhibitor-cat'),
    'roppongi'  => get_term_by('slug', 'roppongi', 'exhibitor-cat'),
    'hiroo' => get_term_by('slug', 'hiroo', 'exhibitor-cat'),
);

$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

$page = get_page_by_path('exhibitor');
$description = get_field($prefix_varible.'description', $page->ID, '');
?>

<div class="exhibition-page padding-tb-50">
	<div class="container">
		<!-- back button -->
        <!-- <?php back_page_history(true, 'top') ?> -->
		<!-- title -->
		<div class="heading-title heading-style-01 padding-tb-50">
			<div class="title-wrapp">
			    <div class="first-letter">Exhibitor</div>
			    <h2 class="title case-1">Exhibitor</h2>
		    </div>	
		</div>
        <p class="title-des"><?php echo $description ?></p>
		<!-- scroll - page -->
        <?php if (!empty($terms )): ?>
            <!-- wp-block-section -->
            <?php
            foreach ($terms as $term):
                if (!isset($term) || empty($term)) {
                    continue;
                }
                $map_cat = get_field('map', 'exhibitor-cat_'.$term->term_id, '');
            ?>
            <div id="<?php echo $term->slug ?>" class="section_scroll wp-block-section ">
                <div class="heading-title heading-style-02">
                    <h2 class="title upper-text"><?php echo $term->name ?><span class="line-middle"></span></h2>
                </div>
                <ul class="wp-list-exhibiter">
                    <?php
                    $posts = get_posts(array(
                            'post_type' => 'exhibitor',
							'posts_per_page'    => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $term->taxonomy,
                                    'field' => 'term_id',
                                    'terms' => $term->term_id,
                                )
                            ),
                            'orderby'   => 'post_title',
                            'order' => 'ASC',
                    ));
                    foreach ($posts as $post) {
                        $post_id = $post->ID;
//                        $language = get_key_languagle();
//                        $prefix_varible = get_prefix_languagle($language, "_");

                        $title = get_field($prefix_varible.'exhibitor_title', $post_id);
                        $exhibitor_thumbnail = get_field('exhibitor_thumbnail', $post_id,'');
                        $gallery = get_field('exhibitor_gallery', $post_id);
                        $thumbail_url = '';
                        if (!empty($gallery)) {
                            $thumbail_url = take_value_array('url', $gallery[0]);
                        }

                        if (!empty($exhibitor_thumbnail)) {
                            $exhibitor_thumbnail = take_value_array('url', $exhibitor_thumbnail, $exhibitor_thumbnail);
                            $thumbail_url = wp_get_attachment_image_url($exhibitor_thumbnail);
                        }
                        echo '<li class="item">
                                <div class="item-left images">
                                    <a href="'.get_permalink($post_id).'" class="link-img">
                                        <img src="'.$thumbail_url.'" alt="'.$title.'" class="img-responsive">
                                    </a>
                                </div>
                                <div class="item-right information">
                                    <div class="category">
                                       '.$term_venue->name.':
                                    </div>
                                    <div class="description">
                                        '.$title.'
                                    </div>
                                    <a href="'.get_permalink($post_id).'" class="btn btn-line yellow capti-text">
                                        '.translate_text_language('more info').'
                                        <i class="icons fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>';
                    }
                    ?>
                </ul>
            </div>
            <?php
            if (!empty($map_cat)) {
                echo '<div class="text-center"><a href="'.$map_cat.'" class="btn btn-line yellow" target="_blank">AREA MAP  <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>';
            }
            endforeach;
            ?>
        <?php endif; ?>


		<!-- back button -->
		<?php back_page_history(true, 'bot') ?>
	</div>
	<!-- landing-share -->
	<div class="landing-st contact-st">
		<div class="container">
			<?php get_html_share() ?>
		</div>
	</div>
    <?php get_html_banner_page(true); ?>
    <!-- landing-back-to-top -->
	 <div class="wp-back-to-top top2 show">
        <span class="line"></span>
        <span class="text">TOP</span>
    </div>
</div>
<script !src="">
    jQuery(function ($) {
        $(document).ready(function(){
            $('a[data-demo=item-2]').parent().addClass('current-menu-item');
        });
    })
</script>
<!-- <script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<script type="text/javascript">
	jQuery(function ($) {
		//click scroll to section
		$(document).on('click','.anchor_scroll',function(e) {
			e.preventDefault();
			$('.anchor_scroll').removeClass('active-link');
	        $(this).addClass('active-link');
	        var attr  = $(this).attr("href");
	        $('html, body').stop().animate({
	            scrollTop: $(""+attr+"").offset().top - 50
	        },1100,'easeInOutExpo');
		});
	    //scroll add class active
	    $(window).on('scroll',function() {
	    	var scroll_window = $(window).scrollTop();
	    	$('.section_scroll').each(function(num) {
	    		if(	scroll_window > $(this).offset().top - 50 && 
    				scroll_window < $(this).offset().top + $(this).outerHeight(true)) {
	    			$('.wp_scroll_section .list_scroll_section li a').removeClass('active-link');
	    			$('.wp_scroll_section .list_scroll_section li').eq(num).find('a').addClass('active-link');
	    		}
	    	});
	    });
	})
</script> -->

<?php get_footer('top2') ?>
