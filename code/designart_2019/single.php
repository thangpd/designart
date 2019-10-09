<?php get_header('top2'); ?>
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
            <div class="blogs-detail-page padding-tb-50">
                <div class="container">
                    <div class="heading-title heading-style-01 padding-tb-50">
                        <div class="title-wrapp">
                            <div class="first-letter">News<!--NEWS NEWS TITLE--></div>
                            <h2 class="title case-3">News</h2>
                        </div>
                    </div>
                    <div class="blog-detail-content">
                        <div class="wp-single-title">
                            <?php
                            //                generate title
                            if (!empty($title)) {
                                echo "<h1 class=\"single-title\">$title</h1>";
                            }
                            ?>
                            <div class="wp-single-title">
                                <div class="single-info">
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
                                            <a href=\"".get_news_permalink($previous_post)."\" rel=\"prev\"><i class=\"fa fa-angle-left\"></i>".translate_text_language('prev')."</a>
                                        </div>";
                                }

                                if (!empty($next_post)) {
                                    echo "<div class=\"next-post\">
                                            <a href=\"".get_news_permalink($next_post)."\" rel=\"next\">".translate_text_language('next')." <i class=\"fa fa-angle-right\"></i></a>
                                        </div>";
                                }
                                ?>
                            </div>
                        </nav>
                        <div class="text-center">
                            <a href="<?php echo home_url().'/news/' ?>" class="btn btn-line black"><i class="icons fa fa-angle-left"></i> <?php echo translate_text_language('BACK to LIST') ?></a>
                        </div>
                    </div>
<!--                    <div class="landing-st contact-st">
                        <?php /*get_html_share() */?>
                    </div>-->
                    <div class="landing-st contact-st">
                        <div class="container">
			                <?php get_html_contact(); ?>
                        </div>
                    </div>
                     <div class="wp-back-to-top top2 show">
                        <span class="line"></span>
                        <span class="text">TOP</span>
                    </div>
                </div>
            </div>
            <!-- end Blog detail -->
            <?php
?>
<script !src="">
    ;(function($) {
//        active menu
        $.each($('#primary-menu a'), function (index) {
            var current = $(this);
            var href = current.prop('href');
            var is_true = href.search(/\/news\//);
            if (is_true != -1) {
                current.parent().addClass('current-menu-item');
            }
        })

        $( document ).ready(function() {
            setTimeout(function () {
                $('#primary-menu').find('a[data-demo=item-0]').parent().addClass('current-menu-item');
            }, 500);
        });
    })(jQuery);
</script>
<?php get_footer('top2'); ?>