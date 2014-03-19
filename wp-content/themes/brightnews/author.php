<?php
/**
 * The author archive template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
get_header(); ?>
  
<div id="main-content">
  <div id="content">     
<?php if ( have_posts() ) : ?>
<?php the_post(); ?>
<?php brightnews_get_breadcrumb(); ?>     
      <div class="entry-headline-wrapper">
        <div class="entry-headline-content">
          <div class="entry-headline-pattern"></div><h1 class="entry-headline"><?php printf( __( 'Author Archive: %s', 'brightnews' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?></h1>
        </div>
      </div>
      
<?php rewind_posts(); ?>        
<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<div class="author-info">
		<div class="author-description">
			<h2><?php printf( __( 'About %s', 'brightnews' ), get_the_author() ); ?></h2>
      <div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'brightnews_author_bio_avatar_size', 60 ) ); ?>
		  </div>
			<p><?php the_author_meta( 'description' ); ?></p>
		</div>
		</div>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php brightnews_content_nav( 'nav-below' ); ?>
      
  </div> <!-- end of content -->   
<?php get_sidebar(); ?>
</div> <!-- end of main-content -->  
<?php get_footer(); ?>