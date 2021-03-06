<?php
/**
 * The tag archive template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
get_header(); ?>
  
<div id="main-content">
  <div id="content">     
<?php if ( have_posts() ) : ?>
<?php brightnews_get_breadcrumb(); ?>     
      <div class="entry-headline-wrapper">
        <div class="entry-headline-content">
          <div class="entry-headline-pattern"></div><h1 class="entry-headline"><?php printf( __( 'Tag Archive: %s', 'brightnews' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
        </div>
      </div>
<?php if ( tag_description() ) : ?><div class="archive-meta"><?php echo tag_description(); ?></div><?php endif; ?>
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php brightnews_content_nav( 'nav-below' ); ?>
      
  </div> <!-- end of content -->   
<?php get_sidebar(); ?>
</div> <!-- end of main-content -->  
<?php get_footer(); ?>