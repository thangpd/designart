<?php
get_header('top');

$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

$page_current = 1;
$post_num = 10;
$current_uri = $_SERVER['REQUEST_URI'];

$redirect_url = get_request_url();
$redirect_url = rtrim($redirect_url, '\/');
$reg = '/\/interview\/page\/(.*)$/';
if (preg_match($reg, $redirect_url, $matchs)) {
    if (isset($matchs[1])) {
        $page_current = intval($matchs[1]);
    }
}

$post_current = ($page_current - 1) * $post_num;

$post_total = get_posts(array(
    'post_type' => 'interview',
    'posts_per_page' => -1
));

$args = array(
    'posts_per_page' => $post_num,
    'post_type' => 'interview',
    'offset' => $post_current,
    'post_status' => 'publish',
);
$posts = get_posts($args);
$maxpage = numPage(count($post_total), intval($post_num));
?>
    <section id="interview" class="section interview-list">
        <div class="block-container">
            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter">ARTICLE</div>
                </div>
            </div>
        </div>
    </section>
    <section class="information-area section-list-interview">
        <div class="wp-ds-ldpage">
            <div class="wp-block-information">
                <ul class="wp-list-infor">
                    <?php
                    foreach ($posts as $interview) {
                        $post_id = $interview->ID;
                        $post_link = get_permalink($post_id);
                        $title = get_field($prefix_varible.'title', $post_id);
                        $date_post = get_date_post($post_id);

                        $cat = get_category_post($interview->ID, 'interview-cat');
                        $catName = $cat->name;
                        echo "<li>
                                <span class='date'>{$date_post}</span>
                                <span class='category mobile'>{$catName}</span>
                                <a href='{$post_link}'
                                   class='text'>{$title}</a>
                                <span class='category pc'>{$catName}</span>
                            </li>";
                    }
                    ?>
                </ul>
                <div class="block-container blogs-detail-page">
                    <nav class="post-navigation">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '<i class="icons fa fa-angle-left"></i>Prev',
                            'next_text' => 'Next<i class="icons fa fa-angle-right"></i>',
                            'current' => $page_current,
                            'total' => $maxpage,
                            'base'  => get_home_url().'/interview/page/%#%/'
                        ));
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section contact-area section-4 ">
        <div class="wp-bg-skew wp-padding">
            <div class="wp-ds-ldpage">
                <div class="wp-block-contact landing-st contact-st">
                    <div class="text-center padding-tb-30">
	                    <?php get_html_share() ?>
                    </div>
                    <div class="title first padding-tb-30" data-info="no">Contact</div>
                    <div class="text-center group-btn">
                        <a href="mailto:info@designart.jp" class="btn btn-bg black">Contact for DESIGNART
                            <i class="icons fa fa-angle-right"></i></a>
                        <a href="<?php if($current_uri == '/en/article/'): echo "mailto:designarttokyo@camronpr.com"; else: echo "mailto:press@designart.jp"; endif; ?>" class="btn btn-bg black">Contact for Press<i class="icons fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <div class="wp-back-to-top top2 show">
    <span class="line"></span>
    <span class="text">TOP</span>
</div>
    <script type="text/javascript">
        jQuery(function ($) {
            // // Hàm scroll to section add class
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
                    } else {
                        nav_bar.find('.anchor_scroll').removeClass('active-link');
                        nav_bar.find('a[id="mn-conference"]').addClass('active-link');
                    }
                });
            });
            //click scroll to section
            var site_url = '<?php echo site_url(); ?>';
            $(document).on('click', '.anchor_scroll', function (e) {
                console.log($(this).attr('href'));
                if ($(this).attr('href') === '#contact') {
                    e.preventDefault();
                    $('.anchor_scroll').removeClass('active-link');
                    $(this).addClass('active-link');
                    var attr = $(this).attr("href");
                    $('html, body').stop().animate({
                        scrollTop: $("" + attr + "").offset().top
                    }, 1350, 'easeInOutExpo');
                } else {
                    window.location.href = site_url + '/' + $(this).attr('href');
                }
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
        })
    </script>
    <script type="text/javascript">
    ;(function ($) {
        $(".item-chr").each(function () {
            var id = $(this).attr("data-name");
            var count = 0;
            $('[data-name=' + id + ']').each(function () {
                count += parseInt($(this).attr("data-count"));
            })
            if (count == 0) {
                $('[data-name=' + id + ']').css("display", "none");
            }
        });

        $('#site-navigation a').removeClass('active-link');
        $('#interview').addClass('active-link');
        $('#interview').addClass('anchor_scroll');
    })(jQuery);
</script>
<?php
get_footer('top');
?>