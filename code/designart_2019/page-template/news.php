<?php
get_header( 'top2' );
$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );



$page_current = 1;
$post_num     = 10;

$redirect_url = get_request_url();
$redirect_url = rtrim( $redirect_url, '\/' );
$reg          = '/\/news\/page\/(.*)$/';


if ( preg_match( $reg, $redirect_url, $matchs ) ) {
	if ( isset( $matchs[1] ) ) {
		$page_current = intval( $matchs[1] );
	}
}


$post_current = ( $page_current - 1 ) * $post_num;

$post_total = get_posts( array(
	'post_type'      => 'post',
	'posts_per_page' => -1
) );


$args    = array(
	'posts_per_page' => $post_num,
	'post_type'      => 'post',
	'offset'         => $post_current,
	'post_status'    => 'publish',
	'orderby' => 'publish_date',
	'order' => 'DESC',
);
$posts   = get_posts( $args );
$maxpage = numPage( count( $post_total ), intval( $post_num ) );

?>
    <!-- Blog page -->
    <div class="blogs-page padding-tb-50 exhibitor news">
        <div class="container">
            <!-- <?php back_page_history( true, 'top' ) ?> -->
            <div class="heading-title heading-style-01 padding-tb-50">
                <div class="title-wrapp">
                    <div class="first-letter">News</div>
                    <h2 class="title case-3">News</h2>
                </div>
            </div>
            <div class="landing-blog-wrapp">
                <div class="blogs-list">
					<?php
					foreach ( $posts as $index => $post ) {
						$post_id   = $post->ID;
						$post_link = get_news_permalink( $post_id );
						$title     = !empty(get_field( $prefix_varible . 'title', $post_id ))?get_field( $prefix_varible . 'title', $post_id ):' ';
						$date_post = get_date_post( $post_id );

						$new_icon = '';
						if ( compare_date_from_current_date( get_the_date( 'Y-m-d', $post_id ), 3 ) ) {

                            $new_icon = '<span class="new_label_news_page">NEW</span>';
                            
						}

						echo '	<div class="blog-item">
                                        <span class="info date">' . $date_post . '</span>
                                        ' . $new_icon . '
                                        <h3 class="title">
                                            <a href="' . $post_link . '" class="link">' . $title . '</a>
                                        </h3>
					                </div>';


					}
					?>
                </div>

                <!--            panigation-->
	            <?php pagination_custom_posttype($page_current,$maxpage) ?>
                <!--            end panigation-->
            </div>
            <div class="landing-st contact-st">
<!--                --><?php //get_html_share() ?>
                <div class="contact-info">
	                <?php get_html_contact(); ?>
                </div>
            </div>
            <div class="wp-back-to-top top2 show">
                <span class="line"></span>
                <span class="text">TOP</span>
            </div>
        </div>
    </div>
    <script !src="">
        jQuery(function ($) {
            $(document).ready(function () {
                $('a[data-demo=item-0]').parent().addClass('current-menu-item');
            });
        })
    </script>
    <!-- end Blog page -->
<?php get_footer( 'top2' ); ?>