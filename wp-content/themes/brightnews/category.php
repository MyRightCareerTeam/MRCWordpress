<?php
/**
 * The category archive template file.
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
          <div class="entry-headline-pattern"></div><h1 class="entry-headline"><?php single_cat_title(); ?></h1>
        </div>
      </div>
<?php if ( category_description() ) : ?><div class="archive-meta"><?php echo category_description(); ?></div><?php endif; ?>
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php brightnews_content_nav( 'nav-below' ); ?>
      
  </div> <!-- end of content -->   
<?php get_sidebar(); ?>
</div> <!-- end of main-content -->  
<?php get_footer(); ?>