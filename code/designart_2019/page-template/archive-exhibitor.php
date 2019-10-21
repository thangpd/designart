<?php
get_header( 'top2' );
$term_venue  = get_term_by( 'slug', 'artist-venue', 'exhibitor-cat' );
$term_parent = 0;
if ( isset( $term_venue ) ) {
	$term_parent = $term_venue->term_id;
}
//$terms = get_terms( array(
//    'taxonomy' => 'exhibitor-cat',
//    'hide_empty' => true,
//    'orderby'   => 'name',
//    'order' => 'ASC',
//    'parent' => $term_parent
//) );


if ( function_exists( 'acf_add_options_page' ) && ! empty( $terms = get_field( 'exhibitor_category_setting', 'option' ) ) ) {
} else {
	$terms = get_terms( [ 'taxonomy' => 'exhibitor-cat', 'hide_empty' => true ] );
}

$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );

$page = get_page_by_path( 'exhibitor' );

$description = get_field( $prefix_varible . 'description', $page->ID, '' );


/*
 * $terms : exhibitor_category_setting一覧
 * $terms2 : exhibitor_category_setting2一覧
 */

$terms = get_field( 'exhibitor_category_setting', 'option' );

$terms2 = get_field( 'exhibitor_category_setting2', 'option' );

$s    = isset( $_GET['s'] ) ? $_GET['s'] : '';
$area = isset( $_GET['area'] ) ? $_GET['area'] : '';
$cate = isset( $_GET['cate'] ) ? $_GET['cate'] : '';

?>

<div class="exhibition-page padding-t-50">
    <div class="container">
        <!-- back button -->
        <!-- <?php back_page_history( true, 'top' ) ?> -->
        <!-- title -->
        <div class="heading-title heading-style-01 padding-tb-50">
            <div class="title-wrapp">
                <div class="first-letter"><?php echo translate_text_language( 'exhibition' ); ?></div>
                <h2 class="title case-1"><?php echo translate_text_language( 'exhibition' ); ?></h2>
            </div>
        </div>
        <p class="title-des"><?php echo $description ?></p>


		<?php


		?>

        <form method="get" id="searchform" action="<?php bloginfo( 'url' ); ?>">
            <!-- フリーワード検索 -->
            <input type="text" class="freeword"
                   placeholder="<?php echo translate_text_language( 'Search by keyword' ) ?>" id="s" name="s"
                   value="<?php echo ! empty( $s ) ? $s : ''; ?>" size="30" maxlength="128">
            <input type="image" class="submit_bt" name=""
                   src="<?php echo URL_STATICS; ?>/images/commons/search_icon.png"
                   width="25" value="検索">

            <div class="radio_group_wrap">
                <div class="radio_group">
                    <div class="radios">
                        <div class="tit" data-title="<?php echo translate_text_language( 'AREA' ); ?>"><?php echo translate_text_language( 'AREA' ); ?></div>
                        <ul class="area">
							<?php
							$selected = "";
							$checked  = "";
							if ( ! empty( $area ) ) {
								foreach ( $area as $a ) {
									if ( strcmp( $a, "all_area" ) == 0 ) {
										$selected = " selected";
										$checked  = "checked";
									}
								}
							}
							?>
                            <!--<li>
                        <a class="radio_area<?php /*echo $selected; */ ?>" href="javascript:void(0);">
                            <input type="checkbox" name="area[]" value="all_area" <?php /*echo $checked; */ ?> id='all_area'><label
                                    for="all_area">ALL</label>
                        </a>
                    </li>-->
							<?php if ( ! empty( $terms ) ):


								?>
								<?php foreach ( $terms as $term ):
								$selected = "";
								$checked = "";
								$terms_traned = translate_category_name( $term, $prefix_varible );
								if ( ! empty( $area ) ) {
									foreach ( $area as $a ) {
										if ( strcmp( $a, $term->slug ) == 0 ) {
											$selected = " selected";
											$checked  = "checked";
										}
									}
								}
								?>
                                <li>
                                    <a class="radio_area<?php echo $selected; ?>" href="javascript:void(0);">
                                        <input type="radio" name="area"
                                               value="<?php echo $term->slug; ?>" <?php echo $checked; ?>><label
                                                for="<?php echo $term->slug; ?>"><?php echo $terms_traned; ?></label>
                                    </a>
                                </li>
							<?php endforeach; ?>
							<?php endif; ?>
                        </ul>
                    </div>

                    <div class="radios">
                        <div class="tit" data-title="<?php echo translate_text_language( 'CATEGORY' ); ?>"><?php echo translate_text_language( 'CATEGORY' ); ?></div>
                        <ul class="cate">
							<?php
							$selected = "";
							$checked  = "";
							if ( ! empty( $cate ) ) {
								foreach ( $cate as $c ) {
									if ( strcmp( $c, "all_cate" ) == 0 ) {
										$selected = " selected";
										$checked  = "checked";
									}
								}
							}
							?>

                            <!-- <li>
                        <a class="radio_area<?php /*echo $selected; */ ?>" href="javascript:void(0);">
                            <input type="checkbox" name="cate[]" value="all_cate" <?php /*echo $checked; */ ?> id='all_cate'><label
                                    for="all_cate">ALL</label>
                        </a>
                    </li>-->

							<?php if ( ! empty( $terms2 ) ):


								?>
								<?php foreach ( $terms2 as $term ):
								$selected = "";
								$checked = "";
								$terms_traned = translate_category_name( $term, $prefix_varible );
								if ( ! empty( $cate ) ) {
									foreach ( $cate as $c ) {
										if ( strcmp( $c, $term->slug ) == 0 ) {
											$selected = " selected";
											$checked  = "checked";
										}
									}
								}
								?>
                                <li>
                                    <a class="radio_area<?php echo $selected; ?>" href="javascript:void(0);">
                                        <input type="radio" name="cate"
                                               value="<?php echo $term->slug; ?>" <?php echo $checked; ?>
                                               ><label
                                                for="<?php echo $term->slug; ?>"><?php echo $terms_traned; ?></label>
                                    </a>
                                </li>
							<?php endforeach; ?>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </form>


        <!-- Filter category -->
        <!--        <div class="filter_category">
            <div class="block-category">
	            <?php
		/*	            $tranlated_term = get_category_exhibitor($terms,'',true);
						echo $tranlated_term;
						*/ ?>
            </div>
        </div>
-->
        <!-- scroll - page -->
		<?php echo designart_render_exhibitorarchive( $terms ) ?>

        <!-- back button -->
		<?php back_page_history( false, 'bot' ) ?>
    </div>

    <div class="wp-back-to-top-wrap">
        <div class="wp-back-to-top top2">
            <img src="<?php echo URL_STATICS; ?>/images/commons/to_top_bt.png" alt="TOP">
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        $(document).ready(function () {
            $('a[data-demo=item-1]').parent().addClass('current-menu-item');
            $('.filter_category a.category').on('click', function (e) {
                e.preventDefault();
                alert('ok');
                var window = screen.width;
                var descrease_offset = 0;
                if (window >= 1024) {
                    descrease_offset = 100;
                } else if (window <= 425) {
                    descrease_offset = 40;
                } else {
                    descrease_offset = 60;
                }
                var top_div = $($(this).attr('href')).offset().top - descrease_offset;
                $('html, body').animate({scrollTop: top_div}, 'slow');
            });


        });
    })
</script>

<script src="<?php echo URL_STATICS; ?>/js/search.js"></script>
<?php get_footer( 'top2' ) ?>
