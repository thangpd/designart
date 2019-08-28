<?php get_header('top2') ?>

<?php
$page_id = get_the_ID();

$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

$youtube_url = get_field('background_youtube', $page_id, '');
if ( preg_match('/v=(.*)/', $youtube_url, $matches) ) {
    $youtube_url = '//www.youtube.com/embed/'.$matches[1];
}

$title = get_field($prefix_varible.'title', $page_id, '');
$subtitle = get_field($prefix_varible.'subtitle', $page_id, '');
$description = get_field($prefix_varible.'description', $page_id, '');
$subdescription = get_field($prefix_varible.'subdescription', $page_id, '');
$special_site_url = get_field('special_site_url', $page_id, '');
$exhibitor_list_url = get_field('exhibitor_list_url', $page_id, '');
$pdf1 = get_field('pdf1', $page_id, '');
$pdf2 = get_field('pdf2', $page_id, '');

$pdf1_url = $pdf2_url = '';
if ( $pdf1 ) {
    $pdf1_url = wp_get_attachment_url( $pdf1 );;
}

if ( $pdf2 ) {
    $pdf2_url = wp_get_attachment_url( $pdf2 );;
}

$list_gallery = get_field('list_gallery', $page_id, '');
$list_gallery2 = get_field('gallery', $page_id, '');

$author_video = get_field($prefix_varible . 'author_video', $page_id, '');
?>

    <div class="sc-video">
        <div class="sc-video__bg-mb">
            <iframe width="100%" height="560" src="<?php echo esc_url($youtube_url) ?>?rel=0&autoplay=1&loop=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        </div>
        <div class="author-video"><?php echo $author_video; ?></div>
    </div>

    <section class="intro">
        <div class="container">
            <div class="row intro-header">
                <div class="col-md-12">
                    <h2 class="intro-title">
                        <?php echo esc_html($title) ?>
                    </h2>
                    <div class="description"><?php echo $description ?></div>
                </div>
            </div>
            <div class="row intro-content">
                <div class="col-md-12">
                    <h3><?php echo esc_html($subtitle) ?></h3>
                    <div class="description"><?php echo $subdescription ?></div>
                    <br>

                    <?php if (!empty($special_site_url) ): ?>
                    <p><?php echo translate_text_language('1x') ?>: <a class="has-decoration" href="<?php echo $special_site_url ?>">DESIGNART 2017</a></p>
                    <?php endif; ?>

                    <?php if (!empty($exhibitor_list_url) ): ?>
                    <p><?php echo translate_text_language('2x') ?>: <a class="has-decoration" href="<?php echo esc_url($exhibitor_list_url) ?>">DESIGNART 2017 <?php echo translate_text_language('2x') ?></a></p>
                    <?php endif; ?>

                    <?php if (!empty($pdf1_url) && !empty($pdf2_url)): ?>
                        <p class="download"><?php echo translate_text_language('3x') ?>(PDF): <?php echo translate_text_language('4x') ?>
                            <a href="<?php echo esc_url($pdf1_url) ?>"><span class="pdf-icon"></span></a>/ <?php echo translate_text_language('5x') ?>
                            <a href="<?php echo esc_url($pdf2_url) ?>"><span class="pdf-icon"></span></a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-content">
        <div class="container">

            <!-- Block PC -->
            <div class="block-pc">
                <?php foreach($list_gallery as $obj): ?>
                <?php
                $arr = array_values($obj);
                $title = isset($arr[0]) ? $arr[0] : '';
                $gallery = isset($arr[1]) ? $arr[1] : '';
                ?>

                <div class="row img-block">
                    <div class="col-md-12">
                        <h2 class="title"><?php echo esc_html($title) ?></h2>
                    </div>
                    <div class="col-md-12 img-list">
                        <?php foreach($gallery as $img): ?>
                        <?php
                        $img_url = isset($img) ? wp_get_attachment_url($img) : '';
                        if ( !empty($img_url) ) :
                        ?>
                        <div class="img-item">
                            <div class="fancybox" data-fancybox="<?php echo esc_attr(strtolower($title)) ?>" href="<?php echo esc_url($img_url) ?>" title="<?php echo esc_attr(strtolower($title)) ?>"><img
                                        src="<?php echo esc_url($img_url) ?>"
                                        alt="" class="img-responsive"></div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><!-- /block-pc -->

            <!-- /block-mobile -->
            <div class="block-mobile">

                <?php foreach($list_gallery as $obj): ?>
                    <?php
                    $arr = array_values($obj);
                    $title = isset($arr[0]) ? $arr[0] : '';
                    $gallery = isset($arr[1]) ? $arr[1] : '';
                    ?>

                    <div class="row img-block">
                        <div class="col-md-12">
                            <h2 class="title"><?php echo esc_html($title) ?></h2>
                        </div>
                        <div class="col-md-12 img-list">
                            <?php foreach($gallery as $img): ?>
                                <?php
                                $img_url = isset($img) ? wp_get_attachment_url($img) : '';
                                if ( !empty($img_url) ) :
                                    ?>
                                    <div class="img-item">
                                        <div class="fancybox" data-fancybox="m-<?php echo esc_attr(strtolower($title)) ?>" href="<?php echo esc_url($img_url) ?>" title="<?php echo esc_attr(strtolower($title)) ?>"><img
                                                    src="<?php echo esc_url($img_url) ?>"
                                                    alt="" class="img-responsive"></div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <!-- /block mobile -->

        </div> <!-- /container -->
    </section>

    <div class="landing-st contact-st report">
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
    <div class="wp-back-to-top top2 show">
        <span class="line"></span>
        <span class="text">TOP</span>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>
    <script>
        (function ($) {
            $(".fancybox").fancybox({
                prevEffect      : 'none',
                nextEffect      : 'none',
                closeBtn        : false,
                helpers     : {
                    title   : { type : 'inside' },
                    buttons : {}
                }
            });
        })(jQuery);
    </script>

    <script !src="">
        jQuery(function ($) {
            $(document).ready(function(){
                $('a[data-demo=item-6]').parent().addClass('current-menu-item');
            });
        })
    </script>
<?php get_footer('top2') ?>