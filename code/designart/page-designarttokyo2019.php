<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package designart
 */


get_header( 'teaser' );
$redirect_url = $_SERVER['REDIRECT_URL'];
$reg          = '/(.*)\/(.*)\/$/';
preg_match( $reg, $redirect_url, $maths );
$post = get_page_by_path( $maths[2], OBJECT, 'page' );

if ( ! empty( $post ) ) {
	$post_id        = $post->ID;
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );

	$description = get_field( $prefix_varible . 'description', $post_id, false );

	$description = str_replace( '{%URL_STATICS%}', URL_STATICS, $description );

	$html_share_top = get_html_share_top( $post->ID, false );
	$description    = str_replace( '{%HTML_SHARE_TOP%}', $html_share_top, $description );
	$description    = str_replace( '{%HOME_URL%}', home_url(), $description );


	echo $description;
	// echo apply_filters('the_content', $description);
}
?>

<script !src="">
    ;(function ($) {
        function gotoLanguageurl(languagle_change, home_url, full_link) {
            if (full_link == undefined) {
                full_link = window.location.href;
            }

            if (languagle_change != undefined) {
                full_link = full_link.replace(new RegExp('\/en($|\/)', 'g'), '/');
                full_link = full_link.replace(new RegExp('\/cn($|\/)', 'g'), '/');
                full_link = full_link.replace(home_url, home_url + '/' + languagle_change);
            }
            if (full_link.match(/\/$/) == null) {
                full_link += '/';
            }
            return full_link;
        }

        $(document).on('click', '.language a', function () {
            var languagle_change = $(this).data("val");
            jCookies.set('language', languagle_change, 1);

            window.location = gotoLanguageurl(languagle_change, '<?= home_url();?>');
        })
        $(window).scroll(function(){
            var $heightbottom = $(window).scrollTop();
            
            if($heightbottom > 100){
                $('.wp-block-infor').addClass('active');
            } else{
                $('.wp-block-infor').removeClass('active');
            }
            $('body').removeClass('scrollActive').css('padding-top', 0);
        });
    })(jQuery);

</script>

<?php
get_footer( 'teaser' );
?>





