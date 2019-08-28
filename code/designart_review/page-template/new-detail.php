<?php 
	get_header('top');
?>
<?php
            global $custom_page;
            $post_id = get_the_ID();
            if (isset($custom_page) && !empty($custom_page)) {
                $post_id = $custom_page->ID;
            }
            $category_title = get_category_post($post_id, 'category', 'name');
            if (!isset($category_title)) {
                $category_title = '';
            }
            $language = get_key_languagle();
            $prefix_varible = get_prefix_languagle($language, "_");
            $title = get_field($prefix_varible.'title', $post_id);
            $date = get_date_post($post_id);
            $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
            $description = get_field($prefix_varible.'description', $post_id);

            $previous_post = get_previous_post_id($post_id);
            $next_post = get_next_post_id($post_id);
            ?>
            <!-- Blog detail -->
            <div class="blogs-detail-page blogs-news-detail-page padding-tb-50">
                <div class="container">
                    <div class="heading-title heading-style-01 padding-tb-50">
                        <div class="title-wrapp">
                            <div class="first-letter">INFORMATION</div>
                            <h2 class="title case-3">News</h2>
                        </div>
                    </div>
                    <div class="blog-detail-content">
                        <div class="wp-single-title">
                            <div class="wp-single-title">
                                <div class="single-info">
                                	<div class="title-signle-info"><?php echo $title ?></div>
                                    <div class="info-item"><span class="lb-text"><?php echo translate_text_language("date") ?>:</span><span class="text"> <?php echo $date ?></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="featured-image">
                            <img src="<?php echo $thumbnail_url ?>" alt="" class="img-responsive">
                        </div>
                        <div class="heading-title heading-style-02">
                            <h2 class="title upper-text">
                                <?php echo translate_text_language('information') ?>
                                <span class="line-middle"></span>
                            </h2>
                        </div>
                        <div class="entry-content">
                             <?php echo apply_filters('the_content', $description) ?>
                        </div>
                        <nav class="post-navigation">
                            <div class="nav-links">
                                <?php
                                if (!empty($previous_post)) {
                                    echo "<div class=\"prev-post\">
                                            <a href=\"".get_news_black_permalink($previous_post)."\" rel=\"prev\"><i class=\"fa fa-angle-left\"></i>".translate_text_language('prev')."</a>
                                        </div>";
                                }

                                if (!empty($next_post)) {
                                    echo "<div class=\"next-post\">
                                            <a href=\"".get_news_black_permalink($next_post)."\" rel=\"next\">".translate_text_language('next')." <i class=\"fa fa-angle-right\"></i></a>
                                        </div>";
                                }
                                ?>
                            </div>
                        </nav>
                        <div class="text-center">
                            <a href="<?php echo home_url().'/news-black/' ?>" class="btn btn-line black"><i class="icons fa fa-angle-left"></i> <?php echo translate_text_language('BACK to LIST') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Blog detail -->
            <?php
?>
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
				<div class="title first  padding-tb-30">Contact</div>
				<div class="text-center group-btn">
					<a href="mailto:info@designart.jp" class="btn btn-bg black">Contact about DESIGNART <i class="icons fa fa-angle-right"></i></a>
					<a href="mailto:press@designart.jp" class="btn btn-bg black">Contact about Press <i class="icons fa fa-angle-right"></i></a>
				</div>
              
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