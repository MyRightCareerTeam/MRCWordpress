<?php
/**
 * The 404 page (Not Found) template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
get_header(); ?>
  
  <div id="main-content">
    <article id="content">
<?php brightnews_get_breadcrumb(); ?>
      <h1 class="main-headline"><?php _e( 'Nothing Found', 'brightnews' ); ?></h1>
      <div class="entry-content">
        <p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'brightnews' ); ?></p><?php get_search_form(); ?>
      </div> 
    </article> <!-- end of content -->
    
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
<?php get_footer(); ?>