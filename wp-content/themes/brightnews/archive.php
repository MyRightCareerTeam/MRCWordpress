<?php
/**
 * The archive template file.
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
          <div class="entry-headline-pattern"></div><h1 class="entry-headline"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archive: %s', 'brightnews' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive: %s', 'brightnews' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'brightnews' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive: %s', 'brightnews' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'brightnews' ) ) . '</span>' );
					else :
						_e( 'Archive', 'brightnews' );
					endif;
				?></h1>
        </div>
      </div>
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php brightnews_content_nav( 'nav-below' ); ?>
      
  </div> <!-- end of content -->   
<?php get_sidebar(); ?>
</div> <!-- end of main-content -->  
<?php get_footer(); ?>