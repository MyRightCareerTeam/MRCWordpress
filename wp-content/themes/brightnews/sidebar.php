<?php
/**
 * The sidebar template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
?>
<?php global $brightnews_options_db; ?>
<?php if ($brightnews_options_db['brightnews_display_sidebar'] != 'Hide'){ ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside>
<?php } ?>