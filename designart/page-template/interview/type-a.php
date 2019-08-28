<?php
$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

$title = get_field($prefix_varible . 'title', $post_id);
$date_post = get_date_post($post_id);
$cat = get_category_post($post_id, 'interview-cat');
$catName = '';
if (isset($cat->name)) {
    $catName = $cat->name;
}


$banner_id = get_field('banner_image', $post_id, '');
$banner_text = get_field($prefix_varible . 'banner_title', $post_id, '');
if (!empty($banner_id)) {
    $banner_url = wp_get_attachment_url($banner_id);
}

$previous_post = get_previous_post_id($post_id);
$next_post = get_next_post_id($post_id);

?>
<div class="interview">
    <section class="block-info-top">
        <div class="block-container">
            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter"><?php echo $title ?></div>
                </div>
                <div class="info-post">
                    <span class="block"><span class="date">DATE:</span><?php echo $date_post ?></span>
                    <span class="tag"><?php echo $catName ?></span>
                    <span class="tag">INTERVIEW</span>
                    <span class="tag">2017</span>
                </div>
            </div>

            <?php if (isset($banner_url)): ?>
                <div class="block-image">
                    <a href="#">
                        <img src="<?php echo $banner_url ?>">
                    </a>
                    <div class="description">
                        <?php echo $banner_text ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="item-tab active anchor_scroll"><a href="#left" aria-controls="home"
                                                                                     role="tab"
                                                                                     data-toggle="tab">1</a></li>
                    <li role="presentation" class="item-tab anchor_scroll"><a href="#right" aria-controls="profile"
                                                                              role="tab" data-toggle="tab">2</a></li>
                </ul>
            </div>

            <?php
            //information
            $information = get_field($prefix_varible . 'information', $post_id, '');
            echo $information;
            ?>

        </div>
    </section>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active left" id="left">
            <?php
            //part 1
            $content_part1 = get_field($prefix_varible . 'content_part_1', $post_id, '');
            if (!empty($content_part1)) {
                echo '<section class="block-text">
                <div class="block-container">
               ' . $content_part1 . '
                </div>
            </section>
            ';
            }
            ?>


            <?php
            //part 2

            $part2_img_id = get_field('image_part_2', $post_id, '');
            if (!empty($part2_img_id)) {
                $part2_img_url = wp_get_attachment_url($part2_img_id);
            }
            $content_part2 = get_field($prefix_varible . 'content_part_2', $post_id, '');
            if (!empty($content_part2)) {
                echo '<section class="block-text">
            <div class="block-container">
                <div class="block-image single">
                    <a href="#">
                        <img src="' . $part2_img_url . '">
                    </a>
                </div>
                ' . $content_part2 . '
            </div>
        </section>';
            }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane right" id="right">
            <?php
            $content_part3 = get_field($prefix_varible . 'content_part_3', $post_id, '');
            if (!empty($content_part3)) {
                echo '<section class="block-text">
            <div class="block-container">
                ' . $content_part3 . '
            </div>
        </section>';
            }
            ?>

            <!-- <?php
            $content_part3 = get_field($prefix_varible . 'content_part_3', $post_id, '');
            if (!empty($content_part3)) {
                echo '<section class="block-text">
            <div class="block-container">
                ' . $content_part3 . '
            </div>
        </section>';
            }
            ?> -->

            <?php
            $profile = get_field($prefix_varible . 'profile', $post_id, '');
            if (!empty($profile)) {
                $profile_image = get_field('profile_image', $post_id, '');
                $profile_image_url = '';
                if (!empty($profile_image)) {
                    $profile_image_url = wp_get_attachment_url($profile_image);
                }

                echo '<section class="block-text">
            <div class="block-container">
             <div class="head-title">
                    <h2 class="title upper-text">
                        chairman profile
                    </h2>
                </div>
                <div class="block-post-info n-cus">
                    <div class="block-images">
                        <a href="#">
                            <img src="' . $profile_image_url . '" class="img-res">
                        </a>
                    </div>
                    ' . $profile . '
                </div>
            </div>
        </section>';
            }
            ?>

            <?php
            $content_part_4 = get_field($prefix_varible . 'content_part_4', $post_id, '');
            if (!empty($content_part_4)) {
                echo '<section class="block-text  mt-35 sp-mt-25">
            <div class="block-container">
                ' . $content_part_4 . '
            </div>
        </section>';
            }
            ?>

            <section class="block-text founder">
                <div class="block-container">
                    <div class="head-title">
                        <h2 class="title upper-text">
                            founder profile
                        </h2>
                    </div>
                    <div class="list-founder">
                        <?php
                        $fouder_profile = get_field($prefix_varible . 'fouder_profile', $post_id, '');
                        foreach ($fouder_profile as $fouder) {
                            $image_id = current($fouder);
                            if (!empty($image_id)) {
                                $image_url = wp_get_attachment_url($image_id);
                            }
                            $content = next($fouder);

                            echo '<li class="item">
                        <div class="f-blc-img">
                            <img src="' . $image_url . '"
                                 class="img-res">
                        </div>
                        <div class="f-blc-content">
                            ' . $content . '
                        </div>
                    </li>';
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="block-container">
        <div class="bor-6px"></div>
        <div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="item-tab active"><a href="#left" aria-controls="home" role="tab"
                                                                   data-toggle="tab">1</a></li>
                <li role="presentation" class="item-tab"><a href="#right" aria-controls="profile" role="tab"
                                                            data-toggle="tab">2</a></li>
            </ul>
        </div>
    </div>
    <section class="footer-top">
        <div class="wp-block-contact landing-st contact-st">
            <div class="text-center padding-tb-30">
	            <?php get_html_share(); ?>
            </div>
        </div>
        <div class="block-container blogs-detail-page">
            <nav class="post-navigation">
                <?php
                if (!empty($previous_post)) {
                    echo '<div class="nav-links">
                            <div class="prev-post">
                                <a href="' . get_permalink($previous_post) . '" rel="prev"><i class="fa fa-angle-left"></i>prev</a>
                            </div>
                        </div>';
                }

                if (!empty($next_post)) {
                    echo '<div class="nav-links">
                            <div class="next-post">
                                <a href="' . get_permalink($next_post) . '" rel="next">Next<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>';
                }
                ?>
                ?>
            </nav>
            <div class="text-center">
                <a href="<?php echo get_home_url() . '/interview' ?>" class="btn btn-line black"><i
                            class="icons fa fa-angle-left"></i> BACK to LIST</a>
            </div>
        </div>

    </section>
    <div class="wp-back-to-top top2 show">
        <span class="line"></span>
        <span class="text">TOP</span>
    </div>
</div>

<script type="text/javascript">
    jQuery(function ($) {
        // Hàm scroll to section add class
        var section = $('.section'),
            nav_bar = $('.ds-header-black'),
            nav_bar_height = nav_bar.height();
        $(window).on('scroll', function () {
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
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 5000,
        });
        // Open Menu
        $(document).on('click', '.ds-header-black #nav-icon-open', function (e) {
            e.preventDefault();
            $(this).parents('.site-header').addClass('menu-mb-active');
            $('.header-main').append('<div class="menu-backdrops"></div>');
        });
        // Click item close menu
        if ($(window).width() <= 767) {
            $(document).on('click', '.items-black-header li .anchor_scroll', function (e) {
                e.preventDefault();
                $(this).parents('.site-header').removeClass('menu-mb-active');
                $('.menu-backdrops').remove();
            });
        }

        $('.interview .nav-tabs a').on('click', function () {
            var idAttr = $(this).attr("href"),
                index = $(this).parent("li").index();
            $(this).parents(".interview ").find(".nav-tabs li").removeClass("active");
            $(this).parents(".interview ").find(".nav-tabs li:nth-child(" + (index + 1) + ")").addClass("active");
            $(this).parents(".interview ").find(".tab-content .tab-pane").removeClass("active");
            $(idAttr).addClass("active");
            //scroll to top
            if ($('.wp-back-to-top').length > 0) {
                $('.wp-back-to-top').click();
            }

        });
    });
</script>