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
<?php if ( $brightnews_options_db['brightnews_display_meta_post'] != 'Hide' ) { ?>
      <p class="post-info"><span class="post-info-author"><?php the_author_posts_link(); ?></span><span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span><span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
<?php } ?>
<?php brightnews_get_display_image_post(); ?>
      <div class="entry-content">
<?php the_content( 'Continue reading' ); ?>
      </div>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'brightnews' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php endwhile; endif; ?>
<?php if ($brightnews_options_db['brightnews_next_preview_post'] == '' || $brightnews_options_db['brightnews_next_preview_post'] == 'Display') :  brightnews_prev_next('brightnews-post-nav');  endif; ?>
 
<?php comments_template( '', true ); ?> 
    </article> <!-- end of content -->
    
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
<?php get_footer(); ?>