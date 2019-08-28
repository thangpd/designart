<?php
header('location: '.home_url());
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package designart
 */




get_header('top2');
$language = get_key_languagle();
$prefix_varible = get_prefix_languagle($language, "_");

?>
<!-- Blog page -->
<div class="blogs-page padding-tb-50">
    <div class="container">
        <h1 style="text-align:center;">PAGE NOT FOUND!</h1>
    </div>
    <div class="landing-st contact-st">
		<?php get_html_share() ?>
    </div>
	<?php get_html_banner_page(true); ?>
    <div class="wp-back-to-top top2 show">
        <span class="line"></span>
        <span class="text">TOP</span>
    </div>
</div>
</div>
<script !src="">
    jQuery(function ($) {
        $(document).ready(function(){
            $('a[data-demo=item-0]').parent().addClass('current-menu-item');
        });
    })
</script>
<!-- end Blog page -->
<?php get_footer('top2'); ?>
