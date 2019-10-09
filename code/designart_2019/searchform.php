<?
$terms = get_field( 'exhibitor_category_setting', 'option' );
$terms2 = get_field( 'exhibitor_category_setting2', 'option' );
?>

<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
    <!-- フリーワード検索 -->
    <input type="text" id="s" name="s" value="" size="30" maxlength="128">

    <div>
    <?php if ( ! empty( $terms ) ): ?>
        <?php foreach ($terms as $term): ?>
            <input type="checkbox" name="platform[]" value="<?php echo $term->slug; ?>" id='<?php echo $term->slug; ?>'><label for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
    <div>
    <?php if ( ! empty( $terms2 ) ): ?>
        <?php foreach ($terms2 as $term): ?>
            <input type="checkbox" name="post_tag[]" value="<?php echo $term->slug; ?>" id='<?php echo $term->slug; ?>'><label for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>

    <input type="submit" name="" value="検     索">
</form>