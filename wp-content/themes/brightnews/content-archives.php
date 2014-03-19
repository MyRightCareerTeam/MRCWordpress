<?php
/**
 * The template for displaying content of search/archives.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
?>
<?php global $brightnews_options_db; ?>
      <article <?php post_class('post-entry'); ?>>
        <h2 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="post-info"><span class="post-info-author"><?php the_author_posts_link(); ?></span><span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span><?php if ( comments_open() ) : ?><span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span><?php endif; ?></p>
        <div class="post-content">
<?php if ( has_post_thumbnail() ) : ?>
          <div class="post-thumbnail">
            <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
<?php endif; ?>
          <div class="post-entry-content"><?php if ( $brightnews_options_db['brightnews_content_archives'] != 'Excerpt' ) { ?><?php global $more; $more = 0; ?><?php the_content(); ?><?php } else { the_excerpt(); } ?></div>
        </div>
        <div class="post-meta">
<?php if ( has_category() )  { ?>
            <p class="post-info post-category"><span class="post-info-category"><?php the_category(', '); ?></span></p>
<?php } ?>
<?php if ( has_tag() ) { ?>
            <p class="post-info post-tags"><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
<?php } ?>
        </div>
      </article>