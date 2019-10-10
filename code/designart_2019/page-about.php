<?php
get_header( 'top2' );


$post           = get_page_by_path( 'about' );
$post_id        = $post->ID;
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );
$description    = get_field( $prefix_varible . 'description', $post_id, false );
$description    = str_replace( '{%URL_STATICS%}', URL_STATICS, $description );

$html_share  = get_html_share( false );
$description = str_replace( '{%HTML_SHARE%}', $html_share, $description );

//    back history
$html_back   = back_page_history( false );
$description = str_replace( '{%BACK_HISTORY%}', $html_back, $description );
// html banner page
$html_banner_page = get_html_banner_page();
$description      = str_replace( '{%BANNER_PAGE%}', $html_banner_page, $description );

echo $description;
?>


    <!-- 固定ページ入力ソースここから-->


    <!-- 固定ページ入力ソースここまで-->


    <div class="landing-st contact-st">
        <div class="container">
			<?php get_html_contact(); ?>
        </div>
    </div>

    <!-- landing-back-to-top -->
    <div class="wp-back-to-top-wrap">
        <div class="wp-back-to-top top2">
            <img src="<?php echo URL_STATICS; ?>/images/commons/to_top_bt.png" alt="TOP">
        </div>
    </div>

    <script src="<?php echo esc_url( URL_STATICS ) ?>/js/officialgoodcafe.js"></script>
    <script !src="">
        jQuery(function ($) {
            $(document).ready(function () {
                $('a[data-demo=item-0]').parent().addClass('current-menu-item');
            });


        })
    </script>
<?php get_footer( 'top2' ) ?>