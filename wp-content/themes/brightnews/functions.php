<?php
/**
 * BrightNews functions and definitions.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/

/**
 * BrightNews theme variables.
 *  
*/    
$brightnews_themename = "BrightNews";							//Theme Name
$brightnews_themever = "1.1.0";										//Theme version
$brightnews_shortname = "brightnews";							//Shortname 
$brightnews_manualurl = get_template_directory_uri() . '/docs/documentation.html';	//Manual Url
// Set path to BrightNews Framework and theme specific functions
$brightnews_be_path = get_template_directory() . '/functions/be/';									//BackEnd Path
$brightnews_fe_path = get_template_directory() . '/functions/fe/';									//FrontEnd Path 
$brightnews_be_pathimages = get_template_directory_uri() . '/functions/be/images';		//BackEnd Path
$brightnews_fe_pathimages = get_template_directory_uri() . '';	//FrontEnd Path
//Include Framework [BE] 
require_once ($brightnews_be_path . 'fw-setup.php');		   // Init 
require_once ($brightnews_be_path . 'fw-options.php');	 	 // Framework Init  
// Include Theme specific functionality [FE] 
require_once ($brightnews_fe_path . 'headerdata.php');		 // Include css and js
require_once ($brightnews_fe_path . 'library.php');	       // Include library, functions
require_once ($brightnews_fe_path . 'widget-homepage-default.php');// Homepage Default-Posts Widget

/**
 * BrightNews theme basic setup.
 *  
*/
function brightnews_setup() {
	// Makes BrightNews available for translation.
	load_theme_textdomain( 'brightnews', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
  add_editor_style( 'editor-style.css' );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color and image.
	$defaults = array(
	'default-color'          => '', 
  'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 634, 9999 );
  add_image_size( 'fullwidth-thumb', 924, 9999 );
  // This theme uses a custom header background image.
  $args = array(
	'flex-width'     => true,
  'flex-height'    => true,
  'header-text'    => false,);
  add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'brightnews_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function brightnews_scripts_styles() {
	global $wp_styles;
	// Adds JavaScript
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script( 'placeholders', get_template_directory_uri() . '/js/placeholders.js', array(), '2.1.0', true );
    wp_enqueue_script( 'scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
    wp_enqueue_script( 'responzive', get_template_directory_uri() . '/js/responzive.js', array(), '1.0', true );
	// Loads the main stylesheet.
	  wp_enqueue_style( 'brightnews-style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'brightnews_scripts_styles' ); 

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 *  
*/
if ( ! isset( $content_width ) )
	$content_width = 640;
  
/**
 * Creates a nicely formatted and more specific title element text.
 *  
*/
function brightnews_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'brightnews_wp_title', 10, 2 );

/**
 * Register our menus.
 *
 */
function brightnews_register_my_menus() {
  register_nav_menus(
    array(
      'main-navigation' => __( 'Main Header Menu', 'brightnews' ),
      'top-navigation' => __( 'Top Header Menu', 'brightnews' )
    )
  );
}
add_action( 'after_setup_theme', 'brightnews_register_my_menus' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function brightnews_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Right Sidebar', 'brightnews' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on all posts and pages.', 'brightnews' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => ' <div class="sidebar-headline-wrapper"><div class="sidebar-headline-pattern"></div><p class="sidebar-headline">',
		'after_title' => '</p></div>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'brightnews' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'brightnews' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'brightnews' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'brightnews' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'brightnews' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'brightnews' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'brightnews' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'brightnews' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
  register_sidebar( array(
		'name' => __( 'Homepage posts', 'brightnews' ),
		'id' => 'sidebar-7',
		'description' => __( 'The area for any BrightNews Homepage Widgets, which display latest posts from a specific category.', 'brightnews' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'brightnews_widgets_init' );

/**
 * Post excerpt settings.
 *
*/
function brightnews_custom_excerpt_length( $length ) {
return 30;
}
add_filter( 'excerpt_length', 'brightnews_custom_excerpt_length', 999 );
function brightnews_new_excerpt_more( $more ) {
return '...';}
add_filter( 'excerpt_more', 'brightnews_new_excerpt_more' );

if ( ! function_exists( 'brightnews_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function brightnews_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'brightnews' ); ?></h2>
			<p class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brightnews' ) ); ?></p>
			<p class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brightnews' ) ); ?></p>
		</div>
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function brightnews_prev_next($nav_id) { ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
  <h2 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'brightnews' ); ?></h2>
	<p class="nav-previous"><?php previous_post_link('%link', __( '&larr; Previous post' , 'brightnews' )); ?></p>
	<p class="nav-next"><?php next_post_link('%link', __( 'Next post &rarr;' , 'brightnews' )); ?></p>
</div>
<?php }

if ( ! function_exists( 'brightnews_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function brightnews_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'brightnews' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'brightnews' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'brightnews' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'brightnews' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'brightnews' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'brightnews' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'brightnews' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Function for rendering CSS3 features in IE.
 *
*/
add_filter( 'wp_head' , 'brightnews_pie' );
function brightnews_pie() { ?>
<!--[if IE]>
<style type="text/css" media="screen">
#main-wrapper, #footer, .site-description-wrapper, #top-navigation, #main-navigation a:hover, #main-navigation :hover > a, #wrapper #header #main-navigation ul ul a:hover, #wrapper #header #main-navigation ul ul :hover > a, #wrapper #header #main-navigation .current-menu-item > a, #wrapper #header #main-navigation .current-menu-ancestor > a, #wrapper #header #main-navigation .current_page_item > a, #wrapper #header #main-navigation .current-page-ancestor > a, .footer-signature {
        behavior: url("<?php echo get_template_directory_uri() . '/css/pie/PIE.php'; ?>");
        zoom: 1;
}
</style>
<![endif]-->
<?php }

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'brightnews_filter_menu_class', 10, 2 );
function brightnews_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
}

/**
 * Include the TGM_Plugin_Activation class.
 *  
*/
require_once get_template_directory() . '/class-tgm-plugin-activation.php'; 
add_action( 'tgmpa_register', 'brightnews_my_theme_register_required_plugins' );

function brightnews_my_theme_register_required_plugins() {

$plugins = array(
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => false,
		),
	);
 
 
$config = array(
		'domain'       => 'brightnews',
    'menu'         => 'install-my-theme-plugins',
		'strings'      	 => array(
		'page_title'             => __( 'Install Required Plugins', 'brightnews' ),
		'menu_title'             => __( 'Install Plugins', 'brightnews' ),
		'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', 'brightnews' ),
		'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', 'brightnews' ),
		'button'                 => __( 'Install %s Now', 'brightnews' ),
		'installing'             => __( 'Installing Plugin: %s', 'brightnews' ),
		'oops'                   => __( 'Something went wrong with the plugin API.', 'brightnews' ), // */
		'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', 'brightnews' ),
		'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'brightnews' ),
		'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', 'brightnews' ),
		'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'brightnews' ),
		'return'                 => __( 'Return to Required Plugins Installer', 'brightnews' ),
),
); 
tgmpa( $plugins, $config ); 
}

/**
 * Custom Shortcodes.
 *
*/
function brightnews_button_shortcode($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   return '<a class="custom-button" href="'.$link.'">' . do_shortcode($content) . '</a>';
}
add_shortcode( 'button', 'brightnews_button_shortcode' );
add_filter('widget_text', 'do_shortcode');

function brightnews_highlight_shortcode($atts, $content = null) {
   return '<span class="highlight-text">' . do_shortcode($content) . '</span>';
}
add_shortcode( 'highlight', 'brightnews_highlight_shortcode' );

function brightnews_image_shortcode($atts, $content = null){
return '<img src="'.$atts['src'].'" alt="" />';
}
add_shortcode('image','brightnews_image_shortcode'); ?>