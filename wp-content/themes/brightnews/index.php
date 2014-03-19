<?php
/**
 * The main template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
get_header(); ?>
  
<div id="main-content">
  <div id="content">
<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
<?php endif; ?>
<?php if ($brightnews_options_db['brightnews_display_latest_posts'] != 'Hide'){ ?>     
    <section class="home-latest-posts">     
      <div class="entry-headline-wrapper">
        <div class="entry-headline-content">
          <div class="entry-headline-pattern"></div><h2 class="entry-headline"><?php if($brightnews_options_db['brightnews_latest_posts_headline'] == '') { ?><?php _e( 'Latest Posts' , 'brightnews' ); ?><?php } else { esc_attr_e($brightnews_options_db['brightnews_latest_posts_headline']); } ?></h2>
        </div>
      </div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php brightnews_content_nav( 'nav-below' ); ?>
    </section>
<?php } ?>
<?php if ( dynamic_sidebar( 'sidebar-7' ) ) : else : ?>
<?php endif; ?>      
  </div> <!-- end of content -->   
<?php get_sidebar(); ?>
</div> <!-- end of main-content -->  
<?php get_footer(); ?>