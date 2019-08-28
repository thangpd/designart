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

get_header( 'top' );

$redirect_url = $_SERVER['REDIRECT_URL']; //lấy đuôi từ link server /WP_Design_Art/about/

$reg          = '/(.*)\/(.*)\/$/';
preg_match( $reg, $redirect_url, $maths );

$post = get_page_by_path( $maths[2], OBJECT, 'page' );


if ( ! empty( $post ) ) {
	$post_id        = $post->ID;
	$language       = get_key_languagle();
	$prefix_varible = get_prefix_languagle( $language, "_" );

    print_r("ok_");
    print_r($prefix_varible);


	$description = get_field($prefix_varible.'description', $post_id, false );

	$description = str_replace( '{%URL_STATICS%}', URL_STATICS, $description );

	$html_share_top = get_html_share_top( $post->ID, false );
	$description    = str_replace( '{%HTML_SHARE_TOP%}', $html_share_top, $description );

	echo $description;
	// echo apply_filters('the_content', $description);


}
?>
	<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/jquery-easing.min.js"></script>
	<script type="text/javascript" src="<?php echo URL_STATICS; ?>/libs/slick/slick.min.js"></script>
	<script type="text/javascript">
        jQuery(function ($) {


            $('#mn-about').addClass('active-link');
            $('#mn-about').addClass('anchor_scroll');

        });


	</script>




<?php
get_footer( 'top' );
?>