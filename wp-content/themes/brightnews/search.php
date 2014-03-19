<?php
/**
 * The search results template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
get_header(); ?>
  
<div id="main-content">
  <div id="content">     
<?php if ( have_posts() ) : ?>     
      <div class="entry-headline-wrapper">
        <div class="entry-headline-content">
          <div class="entry-headline-pattern"></div><h1 class="entry-headline"><?php printf( __( 'Search Results for: %s', 'brightnews' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </div>
      </div>
      <p class="number-of-results"><?php _e( '<strong>Number of Results</strong>: ', 'brightnews' ); ?><?php echo $wp_query->found_posts; ?></p>      
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'brightnews' ); ?></h2>
			<p class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Previous results', 'brightnews' ) ); ?></p>
      <p class="nav-previous"><?php next_posts_link( __( 'Next results <span class="meta-nav">&rarr;</span>', 'brightnews' ) ); ?></p>
		</div>
<?php endif; ?>

<?php else : ?>
    <div class="entry-headline-wrapper">
        <div class="entry-headline-content">
          <div class="entry-headline-pattern"></div><h1 class="entry-headline"><?php _e( 'Nothing Found', 'brightnews' ); ?></h1>
        </div>
      </div>
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'brightnews' ); ?></p>
    <?php get_search_form(); ?>
<?php endif; ?>      
  </div> <!-- end of content -->   
<?php get_sidebar(); ?>
</div> <!-- end of main-content -->  
<?php get_footer(); ?>