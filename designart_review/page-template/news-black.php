<?php 
	get_header('top');

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
		<div class="blogs-page padding-tb-50">
			<div class="container">
				<div class="heading-title heading-style-01 heading-style-news padding-tb-50">
					<div class="title-wrapp">
					    <div class="first-letter">INFORMATION</div>
					    <h2 class="title case-3">INFORMATION</h2>
				    </div>	
				</div>
				<div class="landing-blog-wrapp">
						<div class="blogs-list blogs-list-news">
			                <?php
			                foreach ($posts as $index => $post){
			                    $post_id = $post->ID;
			                    $post_link = get_news_black_permalink($post_id);
			                    $title = get_field($prefix_varible.'title', $post_id);
			                    $date_post = get_date_post($post_id);
                                $cat = get_category_post($info->ID, 'category');

			                    echo '	<div class="blog-item">
								<span class="info date">'.$date_post.'</span>
								<h3 class="title">
									<a href="'.$post_link.'" class="link">'.$title.'</a>
								</h3>
								<span class="category">'.$cat->name.'</span>
							</div>';
			                }
			                ?>
						</div>

			<!--            panigation-->

					<div class="pagination-wrapp black">
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
			</div>
		</div>	
		
<section id="contact" class="section contact-area section-4 ">
	<div class="wp-bg-skew wp-padding">
		<div class="wp-ds-ldpage">
			<div class="wp-block-contact landing-st contact-st">
				<div class="text-center padding-tb-30">
					<div class="title second">Share</div>
					<div class="social-list">
		               <a href="https://twitter.com/home?status=http://designart.jp/" target="_blank" class="social-item"><i class="fa fa-twitter"></i></a><a href="https://www.facebook.com/sharer/sharer.php?u=http://designart.jp/" target="_blank" class="social-item"><i class="fa fa-facebook-official"></i></a><a href="https://plus.google.com/share?url=http://designart.jp/" target="_blank" class="social-item"><i class="fa fa-google-plus"></i></a>
        			</div>
		         </div>
				<div class="title first padding-tb-30">Contact</div>
				<div class="text-center group-btn">
					<a href="mailto:info@designart.jp" class="btn btn-bg black">Contact about DESIGNART <i class="icons fa fa-angle-right"></i></a>
					<a href="mailto:press@designart.jp" class="btn btn-bg black">Contact about Press <i class="icons fa fa-angle-right"></i></a>
				</div>
			</div>
		</div> 
	</div>
</section>
<?php get_html_banner_page(false) ?>
<div class="wp-back-to-top top2 show">
	<span class="line"></span>
	<span class="text">TOP</span>
</div>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/slick/slick.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        //click scroll to section
        $(document).on('click','.anchor_scroll',function(e) {
            e.preventDefault();
            $('.anchor_scroll').removeClass('active-link');
            $(this).addClass('active-link');
            var attr  = $(this).attr("href");
            $('html, body').stop().animate({
                scrollTop: $(""+attr+"").offset().top
            },1350,'easeInOutExpo');
        });
        // Hàm scroll to section add class
        var section = $('.section'),
            nav_bar = $('.ds-header-black'),
            nav_bar_height = nav_bar.height();
        $(window).on('scroll', function() {
            var scroll_top = $(this).scrollTop();
            section.each(function () {
                var top = $(this).offset().top - nav_bar_height,
                    bottom = top + $(this).height();
                if (scroll_top >= top && scroll_top <= bottom) {
                    nav_bar.find('.anchor_scroll').removeClass('active-link');
                    nav_bar.find('a[href="#' + $(this).attr('id') + '"]').addClass('active-link');
                }
            });
        });
        // slick slider
        $('.slide-top').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            cssEase: 'linear',
            arrows:false,
            dots:false,
            autoplay: true,
            autoplaySpeed: 5000,
        });
        // Open Menu
        $(document).on('click', '.ds-header-black #nav-icon-open', function(e) {
            e.preventDefault();
            $(this).parents('.site-header').addClass('menu-mb-active');
            $('.header-main').append('<div class="menu-backdrops"></div>');
        });
        // Click item close menu
        if($(window).width() <= 767){
            $(document).on('click', '.items-black-header li .anchor_scroll', function(e) {
                e.preventDefault();
                $(this).parents('.site-header').removeClass('menu-mb-active');
                $('.menu-backdrops').remove();
            });
        }
    })
</script>
<?php 
	get_footer('top');
?>

<script type="text/javascript">
	 $(".anchor_scroll").click(function(event){
		 event.preventDefault();
		aler('aaaa');
		 //calculate destination place
		 var dest=0;
		 if($(this.hash).offset().top > $(document).height()-$(window).height()){
		    dest=$(document).height()-$(window).height();
		    console.log(dest);
		}else{
		    dest=$(this.hash).offset().top;
		    console.log(dest);
		}
		//go to destination
		$('html,body').animate({scrollTop:dest}, 5000,'swing');
		});
</script>
