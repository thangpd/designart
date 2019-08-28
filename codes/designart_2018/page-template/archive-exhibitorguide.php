<?php
get_header( 'top2' );
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );

$page = get_page_by_path( 'access-exhibitorguide' );


$description = get_field( $prefix_varible . 'description', $page->ID, '' );


?>

<div class="exhibition-page access-page padding-tb-50">
    <div class="container">
        <!-- back button -->
        <!-- <?php back_page_history( true, 'top' ) ?> -->
        <!-- title -->
        <div class="heading-title heading-style-01 padding-tb-50">
            <div class="title-wrapp">
                <div class="first-letter"><?php echo translate_text_language('exhibition guide'); ?></div>
                <h2 class="title case-1"><?php echo translate_text_language('exhibition guide'); ?></h2>
            </div>
        </div>
        <!--exhibitor guild list-->
        <p class="title-des"><?php echo $description ?></p>
        <h3 class="exhibitor_list">
			<?php echo translate_text_language('Squeeze by tag'); ?>
            <span class="line-middle"></span>
        </h3>
        <div class="exhibitor_guide_container_ajax">
			<?php echo do_shortcode( '[exhibitor_guide_list]' ) ?>
        </div>
		<?php get_html_information_center(); ?>
        <!-- landing-share -->
        <div class="landing-st contact-st">
            <div class="container">
				<?php get_html_share() ?>
                <div class="contact-info">
					<?php get_html_contact(); ?>
                </div>
            </div>
        </div>
    </div>


    <!-- landing-back-to-top -->
    <div class="wp-back-to-top top2 show">
        <span class="line"></span>
        <span class="text">TOP</span>
    </div>
</div>

<script>
    jQuery(function ($) {
        $(document).ready(function () {

            $('a[data-demo=item-5]').parent().addClass('current-menu-item');


        });
    })
</script>


<?php get_footer( 'top2' ) ?>
