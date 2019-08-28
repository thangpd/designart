<?php
get_header( 'top2' );


$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );
$page           = get_page_by_path( 'access' );
$description    = get_field( $prefix_varible . 'description', $page->ID, '' );

echo apply_filters( 'the_content', $description );


?>



<?php get_html_banner_page( false ) ?>

<div class="wp-back-to-top top2 show">
    <span class="line"></span>
    <span class="text">TOP</span>
</div>

<script>
    jQuery(function ($) {
        $(document).ready(function () {
            $('a[data-demo=item-5]').parent().addClass('current-menu-item');
        });
    })
</script>
<?php
get_footer( 'top2' );
?>
