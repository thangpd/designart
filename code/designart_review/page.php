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

get_header('top2');

$redirect_url = $_SERVER['REDIRECT_URL'];
$reg = '/(.*)\/(.*)\/$/';
preg_match($reg, $redirect_url, $maths);
$post = get_page_by_path( $maths[2], OBJECT, 'page' );
if (!empty($post)) {
    $post_id = $post->ID;
    $language = get_key_languagle();
    $prefix_varible = get_prefix_languagle($language, "_");
    $description = get_field($prefix_varible.'description', $post_id, false );
    $description = str_replace('{%URL_STATICS%}', URL_STATICS, $description);

    $html_share = get_html_share(false);
    $description = str_replace('{%HTML_SHARE%}', $html_share, $description);

//    back history
    $html_back = back_page_history(false);
    $description = str_replace('{%BACK_HISTORY%}', $html_back, $description);
// html banner page
    $html_banner_page = get_html_banner_page();
    $description = str_replace('{%BANNER_PAGE%}', $html_banner_page, $description);

    echo $description;
    // echo apply_filters('the_content', $description);
}

get_footer('top2');
?>