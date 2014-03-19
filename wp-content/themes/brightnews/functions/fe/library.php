<?php 
/**
 * Library of Theme options functions.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/

// Display Breadcrumb navigation
function brightnews_get_breadcrumb() { 
global $brightnews_options_db;
		if ($brightnews_options_db['brightnews_display_breadcrumb'] != 'Hide') { ?>
		<?php if(function_exists( 'bcn_display' )){ _e('<p class="breadcrumb-navigation">', 'brightnews'); ?><?php bcn_display(); ?><?php _e('</p>', 'brightnews');} ?>
<?php } 
} 

// Display featured images on single posts
function brightnews_get_display_image_post() { 
global $brightnews_options_db;
		if ($brightnews_options_db['brightnews_display_image_post'] == '' || $brightnews_options_db['brightnews_display_image_post'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
    <?php if ( $brightnews_options_db['brightnews_display_sidebar'] == 'Hide' ) { ?>
      <?php the_post_thumbnail( 'fullwidth-thumb' ); ?>
    <?php } else { ?>
      <?php the_post_thumbnail(); } ?>
    <?php endif; ?>
<?php } 
}

// Display featured images on pages
function brightnews_get_display_image_page() { 
global $brightnews_options_db;
		if ($brightnews_options_db['brightnews_display_image_page'] == '' || $brightnews_options_db['brightnews_display_image_page'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
    <?php if ( is_page_template('template-full-width.php') || $brightnews_options_db['brightnews_display_sidebar'] == 'Hide' ) { ?>
      <?php the_post_thumbnail( 'fullwidth-thumb' ); ?>
    <?php } else { ?>
      <?php the_post_thumbnail(); } ?>
    <?php endif; ?>
<?php } 
} ?>