<?php
/**
 * Plugin Name: BrightNews Homepage Default-Posts Widget
 * Description: Displays the latest posts from the selected category in the default manner.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("brightnews_homepage_default");'));
class brightnews_homepage_default extends WP_Widget {
	function brightnews_homepage_default() {
		$widget_ops = array('classname' => 'homepage-default-posts', 'description' => __('Displays the latest posts from the selected category in the default manner.', 'brightnews') );
		$control_ops = array('width' => 200, 'height' => 400);
		$this->WP_Widget('brightnewsdefault', __('BrightNews Homepage Default-Posts', 'brightnews'), $widget_ops, $control_ops);
	}
	function form($instance) {
		// outputs the options form on admin
    if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'brightnews' );
		} 

	  if ( $instance ) {
			$category = esc_attr( $instance[ 'category' ] );
		}
		else {
			$category = __( '', 'brightnews' );
		} 

		if ( $instance ) {
			$numberposts = esc_attr( $instance[ 'numberposts' ] );
		}
		else {
			$numberposts = __( '5', 'brightnews' );
    } ?>
<!-- Title -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'brightnews'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- Category -->
<p>  
	<label for="<?php echo $this->get_field_id('category'); ?>">
		<?php _e('Category:', 'brightnews'); ?>
	</label>
<?php wp_dropdown_categories( array(
    'name' => $this->get_field_name('category'),
    'id' => $this->get_field_id('category'),
    'class' => 'widefat',
    'selected' => $category,
    'show_option_none' => '- not selected -'
) ); ?>
<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
	<?php _e('Select a category of posts.', 'brightnews'); ?>
</p>
</p>
<!-- Number of posts -->
<p>
	<label for="<?php echo $this->get_field_id('numberposts'); ?>">
		<?php _e('Number of posts:', 'brightnews'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('numberposts'); ?>" name="<?php echo $this->get_field_name('numberposts'); ?>" type="text" value="<?php echo $numberposts; ?>" />
<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
	<?php _e('Insert here the number of latest posts from the selected category which you want to display.', 'brightnews'); ?>
</p>
</p>
<?php } 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['category'] = $new_instance['category'];
		$instance['numberposts'] = sanitize_text_field($new_instance['numberposts']);
	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
      $title = apply_filters('widget_title', $instance['title']);
			$category = apply_filters('widget_category', $instance['category']);
			$numberposts = apply_filters('widget_numberposts', $instance['numberposts']); ?>
<?php echo $before_widget; ?>
    <section class="home-latest-posts">
<?php $args1 = array(
  'cat' => $category,
  'showposts' => $numberposts,
	'post_type' => 'post',
	'post_status' => 'publish'
);
$brightnews_query = new WP_Query( $args1 ); ?> 
                
      <div class="entry-headline-wrapper">
        <div class="entry-headline-content">
          <div class="entry-headline-pattern"></div><h2 class="entry-headline"><?php echo $title; ?></h2>
        </div>
      </div>

<?php if ($brightnews_query->have_posts()) : while ($brightnews_query->have_posts()) : $brightnews_query->the_post(); ?>            
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>
    </section>
<?php echo $after_widget; ?>
<?php
	}
}
?>