<?php
/**
 * The page template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
get_header(); ?>
  
  <div id="main-content">
    <article id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php brightnews_get_breadcrumb(); ?>
      <h1 class="main-headline"><?php the_title(); ?></h1>
<?php brightnews_get_display_image_page(); ?>
      <div class="entry-content">
<?php the_content( 'Continue reading' ); ?>
      </div>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?> 
    </article> <!-- end of content -->
    
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
<?php get_footer(); ?>