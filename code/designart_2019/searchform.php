<?php

/*
 * $terms : exhibitor_category_setting一覧
 * $terms2 : exhibitor_category_setting2一覧
 */

$terms  = get_field( 'exhibitor_category_setting', 'option' );
$terms2 = get_field( 'exhibitor_category_setting2', 'option' );

$s    = isset( $_GET['s'] ) ? $_GET['s'] : '';
$area = isset( $_GET['area'] ) ? $_GET['area'] : '';
$cate = isset( $_GET['cate'] ) ? $_GET['cate'] : '';

$language       = get_key_languagle();
$prefix_varible = get_prefix_languagle( $language, "_" );

?>

<form method="get" id="searchform" action="<?php bloginfo( 'url' ); ?>">
    <!-- フリーワード検索 -->
    <input type="text" class="freeword" placeholder="<?php echo translate_text_language('Search by keyword') ?>" id="s" name="s"
           value="<?php echo ! empty( $s ) ? $s : ''; ?>" size="30" maxlength="128">
    <input type="image" class="submit_bt" name="" src="<?php echo URL_STATICS; ?>/images/commons/search_icon.png"
           width="25" value="検索">

    <div class="radio_group_wrap">
        <div class="radio_group">
            <div class="radios">
                <div class="tit"><?php echo translate_text_language( 'AREA' ); ?></div>
                <ul>
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
                        <a class="radio_area<?php /*echo $selected; */?>" href="javascript:void(0);">
                            <input type="checkbox" name="area[]" value="all_area" <?php /*echo $checked; */?> id='all_area'><label
                                    for="all_area">ALL</label>
                        </a>
                    </li>-->
					<?php if ( ! empty( $terms ) ): ?>
						<?php foreach ( $terms as $term ):
							$selected = "";
							$checked = "";
							$terms_traned = translate_category_name( $term, $prefix_varible );
							foreach ( $area as $a ) {
								if ( strcmp( $a, $term->slug ) == 0 ) {
									$selected = " selected";
									$checked  = "checked";
								}
							}
							?>
                            <li>
                                <a class="radio_area<?php echo $selected; ?>" href="javascript:void(0);">
                                    <input type="radio" name="area"
                                           value="<?php echo $term->slug; ?>" <?php echo $checked; ?>
                                           id='<?php echo $term->slug; ?>'><label
                                            for="<?php echo $term->slug; ?>"><?php echo $terms_traned; ?></label>
                                </a>
                            </li>
						<?php endforeach; ?>
					<?php endif; ?>
                </ul>
            </div>

            <div class="radios">
                <div class="tit"><?php echo translate_text_language( 'CATEGORY' ); ?></div>
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
                        <a class="radio_area<?php /*echo $selected; */?>" href="javascript:void(0);">
                            <input type="checkbox" name="cate[]" value="all_cate" <?php /*echo $checked; */?> id='all_cate'><label
                                    for="all_cate">ALL</label>
                        </a>
                    </li>
-->
					<?php if ( ! empty( $terms2 ) ): ?>
						<?php foreach ( $terms2 as $term ):
							$selected = "";
							$checked = "";
							$terms_traned = translate_category_name( $term, $prefix_varible );
							foreach ( $cate as $c ) {
								if ( strcmp( $c, $term->slug ) == 0 ) {
									$selected = " selected";
									$checked  = "checked";
								}
							}

							?>
                            <li>
                                <a class="radio_area<?php echo $selected; ?>" href="javascript:void(0);">
                                    <input type="radio" name="cate"
                                           value="<?php echo $term->slug; ?>" <?php echo $checked; ?>
                                           id='<?php echo $term->slug; ?>'><label
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


<!--
<li>
    <a class="facet-link facet-platform-secondary" href="javascript:void(0);">
        <input type="checkbox" name="platform[]" value="Windows" id='windows'><label for="windows"><img src="/wp-content/themes/unity_v10/common/img/common/search_icon/windows.png" alt="">Windows </label></a>
</li>

-->