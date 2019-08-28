<?php
get_header('top2');
$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

$page_current = 1;
$post_num = 10;

$redirect_url = get_request_url();
$redirect_url = rtrim($redirect_url, '\/');
$reg = '/\/news\/page\/(.*)$/';
if ( preg_match($reg, $redirect_url, $matchs) ) {
    if ( isset($matchs[1]) ) {
        $page_current = intval($matchs[1]);
    }
}

$post_current = ($page_current-1)*$post_num;

$post_total = get_posts(array(
    'post_type'   => 'post',
    'posts_per_page' => -1
));

$args = array(
    'posts_per_page' => $post_num,
    'post_type'   => 'post',
    'offset'       => $post_current,
    'post_status'  => 'publish',
    'orderby'    => ['post_modified' => 'desc'],
);
$posts = get_posts($args);
$maxpage = numPage(count($post_total), intval($post_num));

?>
<!-- Blog page -->
<div class="blogs-page padding-tb-50">
	<div class="container">
		<!-- <?php back_page_history(true, 'top') ?> -->
		<div class="heading-title heading-style-01 padding-tb-50">
			<div class="title-wrapp">
			    <div class="first-letter">News</div>
			    <h2 class="title case-3">News</h2>
		    </div>	
		</div>
		<div class="landing-blog-wrapp">
			<div class="blogs-list">
                <?php
                foreach ($posts as $index => $post){
                    $post_id = $post->ID;
                    $post_link = get_news_permalink($post_id);
                    $title = get_field($prefix_varible.'title', $post_id);
                    $date_post = get_date_post($post_id);
                    echo '	<div class="blog-item">
					<span class="info date">'.$date_post.'</span>
					<h3 class="title">
						<a href="'.$post_link.'" class="link">'.$title.'</a>
					</h3>
				</div>';
                }
                ?>
			</div>

<!--            panigation-->

			<div class="pagination-wrapp">
				<nav class="navigation pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => 'Prev',
                        'next_text' => 'Next',
                        'current' => $page_current,
                        'total' => $maxpage,
                        'base'  => get_home_url().'/news/page/%#%/'
                    ));
                    ?>
				</nav>
			</div>
<!--            end panigation-->
		</div>
		<div class="landing-st contact-st">
			<?php get_html_share() ?>
		</div>
        <?php get_html_banner_page(true); ?>
        <div class="wp-back-to-top top2 show">
			<span class="line"></span>
			<span class="text">TOP</span>
		</div>
	</div>
</div>
    <script !src="">
        jQuery(function ($) {
            $(document).ready(function(){
                $('a[data-demo=item-0]').parent().addClass('current-menu-item');
            });
        })
    </script>
<!-- end Blog page -->
<?php get_footer('top2'); ?>