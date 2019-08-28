<?php
 get_header('top');
 global $custom_page;
 $post_id = $custom_page->ID;
 $type = get_field('type', $post_id, 'a');
 $filename = dirname(__FILE__) . '/interview/type-'. $type.'.php';
 echo renderPhpFile($filename, array('post_id' => $post_id));
 get_footer('top');
?>