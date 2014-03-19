<?php
/**
 * Headerdata of Theme options.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/  

// additional js and css
if(	!is_admin()){  
function brightnews_fonts_include () {
global $brightnews_options_db;
// Google Fonts
$bodyfont = $brightnews_options_db['brightnews_body_google_fonts'];
$headingfont = $brightnews_options_db['brightnews_headings_google_fonts'];
$descriptionfont = $brightnews_options_db['brightnews_description_google_fonts'];
$headlinefont = $brightnews_options_db['brightnews_headline_google_fonts'];
$headlineboxfont = $brightnews_options_db['brightnews_headline_box_google_fonts'];
$postentryfont = $brightnews_options_db['brightnews_postentry_google_fonts'];
$sidebarfont = $brightnews_options_db['brightnews_sidebar_google_fonts'];
$menufont = $brightnews_options_db['brightnews_menu_google_fonts'];
$topmenufont = $brightnews_options_db['brightnews_top_menu_google_fonts'];

$fonturl = "http://fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$headlineboxfonturl = $fonturl.$headlineboxfont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
$topmenufonturl = $fonturl.$topmenufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('google-font8', $menufonturl);
		 }
     if ($topmenufont != 'default' && $topmenufont != ''){
      wp_enqueue_style('google-font9', $topmenufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('google-font10', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'brightnews_fonts_include' );
}

// additional js and css
function brightnews_css_include () {
global $brightnews_options_db;
	if ($brightnews_options_db['brightnews_css'] == 'Blue (default)' ){
			wp_enqueue_style('brightnews-style', get_stylesheet_uri());
		}

		if ($brightnews_options_db['brightnews_css'] == 'Brown' ){
			wp_enqueue_style('style-brown', get_template_directory_uri().'/css/brown.css');
		}
    
    if ($brightnews_options_db['brightnews_css'] == 'Orange' ){
			wp_enqueue_style('style-orange', get_template_directory_uri().'/css/orange.css');
		}

		if ($brightnews_options_db['brightnews_css'] == 'Red' ){
			wp_enqueue_style('style-red', get_template_directory_uri().'/css/red.css');
		}
    
    if ($brightnews_options_db['brightnews_css'] == 'Turquoise' ){
			wp_enqueue_style('style-turquoise', get_template_directory_uri().'/css/turquoise.css');
		}
		
	if ($brightnews_options_db['brightnews_css'] == 'MyRightCareer' ){
			wp_enqueue_style('style-MyRightCareer', get_template_directory_uri().'/css/MyRightCareer.css');
		}
}
add_action( 'wp_enqueue_scripts', 'brightnews_css_include' );

// Background Pattern
function brightnews_get_background_pattern() {
    $background_color = get_background_color(); 
    if ($background_color != '') { ?>
		<?php _e('html body { background: none; }', 'brightnews'); ?>
<?php } 
}

// Display sidebar
function brightnews_display_sidebar() {
global $brightnews_options_db;
    $display_sidebar = $brightnews_options_db['brightnews_display_sidebar']; 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper #content { width: 930px; }', 'brightnews'); ?>
<?php } 
}

// Footer widgets
function brightnews_footer_widgets() {
		if (!is_active_sidebar( 'sidebar-2' ) && !is_active_sidebar( 'sidebar-3' ) && !is_active_sidebar( 'sidebar-4' )) { ?>
		<?php _e('#wrapper #footer, #footer .footer-signature { border: none; }', 'brightnews'); ?>
<?php } 
}

// Site Title and Description letters style
function brightnews_site_title_letters() {
global $brightnews_options_db;
    $site_title_letters = $brightnews_options_db['brightnews_site_title_letters']; 
		if ($site_title_letters == 'Normal') { ?>
		<?php _e('#wrapper .site-title, #wrapper .site-description { text-transform: none; }', 'brightnews'); ?>
<?php } 
}

// Opacity of Background Pattern for Header Site Title
function brightnews_get_header_title_background_pattern_opacity() {
global $brightnews_options_db;
    $header_title_background_pattern_opacity = $brightnews_options_db['brightnews_header_title_background_pattern_opacity']; 
		if ($header_title_background_pattern_opacity != '' && $header_title_background_pattern_opacity != '100' && $header_title_background_pattern_opacity != 'Default') { ?>
		<?php _e('#wrapper .site-title-pattern { opacity: 0.', 'brightnews'); ?><?php echo $header_title_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'brightnews'); ?><?php echo $header_title_background_pattern_opacity ?><?php _e('); }', 'brightnews'); ?>
<?php } 
    elseif ($header_title_background_pattern_opacity == '100') { ?>
    <?php _e('#wrapper .site-title-pattern { opacity: 1; filter: alpha(opacity=100); }', 'brightnews');
} 
    else { _e('#wrapper .site-title-pattern { opacity: 0.2; filter: alpha(opacity=20); }', 'brightnews');
} 
} 

// Opacity of Background Pattern for Header Site Description
function brightnews_get_header_description_background_pattern_opacity() {
global $brightnews_options_db;
    $header_description_background_pattern_opacity = $brightnews_options_db['brightnews_header_description_background_pattern_opacity']; 
		if ($header_description_background_pattern_opacity != '' && $header_description_background_pattern_opacity != '100' && $header_description_background_pattern_opacity != 'Default') { ?>
		<?php _e('#wrapper .site-description-pattern { opacity: 0.', 'brightnews'); ?><?php echo $header_description_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'brightnews'); ?><?php echo $header_description_background_pattern_opacity ?><?php _e('); }', 'brightnews'); ?>
<?php } 
    elseif ($header_description_background_pattern_opacity == '100') { ?>
    <?php _e('#wrapper .site-description-pattern { opacity: 1; filter: alpha(opacity=100); }', 'brightnews');
} 
    else { _e('#wrapper .site-description-pattern { opacity: 0.45; filter: alpha(opacity=45); }', 'brightnews');
} 
} 

// Opacity of Background Pattern for Header Menu
function brightnews_get_header_menu_background_pattern_opacity() {
global $brightnews_options_db;
    $header_menu_background_pattern_opacity = $brightnews_options_db['brightnews_header_menu_background_pattern_opacity']; 
		if ($header_menu_background_pattern_opacity != '' && $header_menu_background_pattern_opacity != '100' && $header_menu_background_pattern_opacity != 'Default') { ?>
		<?php _e('#wrapper .navigation-pattern { opacity: 0.', 'brightnews'); ?><?php echo $header_menu_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'brightnews'); ?><?php echo $header_menu_background_pattern_opacity ?><?php _e('); }', 'brightnews'); ?>
<?php } 
    elseif ($header_menu_background_pattern_opacity == '100') { ?>
    <?php _e('#wrapper .navigation-pattern { opacity: 1; filter: alpha(opacity=100); }', 'brightnews');
} 
    else { _e('#wrapper .navigation-pattern { opacity: 0.4; filter: alpha(opacity=40); }', 'brightnews');
} 
} 

// Opacity of Background Pattern for Main Content Headline Boxes
function brightnews_get_content_headlines_background_pattern_opacity() {
global $brightnews_options_db;
    $content_headlines_background_pattern_opacity = $brightnews_options_db['brightnews_content_headlines_background_pattern_opacity']; 
		if ($content_headlines_background_pattern_opacity != '' && $content_headlines_background_pattern_opacity != '100' && $content_headlines_background_pattern_opacity != 'Default') { ?>
		<?php _e('#wrapper .entry-headline-pattern { opacity: 0.', 'brightnews'); ?><?php echo $content_headlines_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'brightnews'); ?><?php echo $content_headlines_background_pattern_opacity ?><?php _e('); }', 'brightnews'); ?>
<?php } 
    elseif ($content_headlines_background_pattern_opacity == '100') { ?>
    <?php _e('#wrapper .entry-headline-pattern { opacity: 1; filter: alpha(opacity=100); }', 'brightnews');
} 
    else { _e('#wrapper .entry-headline-pattern { opacity: 0.45; filter: alpha(opacity=45); }', 'brightnews');
} 
} 

// Opacity of Background Pattern for Sidebar Headline Boxes
function brightnews_get_sidebar_headlines_background_pattern_opacity() {
global $brightnews_options_db;
    $sidebar_headlines_background_pattern_opacity = $brightnews_options_db['brightnews_sidebar_headlines_background_pattern_opacity']; 
		if ($sidebar_headlines_background_pattern_opacity != '' && $sidebar_headlines_background_pattern_opacity != '100' && $sidebar_headlines_background_pattern_opacity != 'Default') { ?>
		<?php _e('#wrapper .sidebar-headline-pattern { opacity: 0.', 'brightnews'); ?><?php echo $sidebar_headlines_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'brightnews'); ?><?php echo $sidebar_headlines_background_pattern_opacity ?><?php _e('); }', 'brightnews'); ?>
<?php } 
    elseif ($sidebar_headlines_background_pattern_opacity == '100') { ?>
    <?php _e('#wrapper .sidebar-headline-pattern { opacity: 1; filter: alpha(opacity=100); }', 'brightnews');
} 
    else { _e('#wrapper .sidebar-headline-pattern { opacity: 0.45; filter: alpha(opacity=45); }', 'brightnews');
} 
} 

// Opacity of Background Pattern for Footer
function brightnews_get_footer_background_pattern_opacity() {
global $brightnews_options_db;
    $footer_background_pattern_opacity = $brightnews_options_db['brightnews_footer_background_pattern_opacity']; 
		if ($footer_background_pattern_opacity != '' && $footer_background_pattern_opacity != '100' && $footer_background_pattern_opacity != 'Default') { ?>
		<?php _e('#wrapper .footer-pattern { opacity: 0.', 'brightnews'); ?><?php echo $footer_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'brightnews'); ?><?php echo $footer_background_pattern_opacity ?><?php _e('); }', 'brightnews'); ?>
<?php } 
    elseif ($footer_background_pattern_opacity == '100') { ?>
    <?php _e('#wrapper .footer-pattern { opacity: 1; filter: alpha(opacity=100); }', 'brightnews');
} 
    else { _e('#wrapper .footer-pattern { opacity: 0.35; filter: alpha(opacity=35); }', 'brightnews');
} 
} 

// TEXT COLORS AND FONTS
// Body font
function brightnews_get_body_font() {
global $brightnews_options_db;
    $bodyfont = $brightnews_options_db['brightnews_body_google_fonts'];
    if ($bodyfont != 'default' && $bodyfont != '') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #page #comments .comment, #wrapper #page #comments .comment time, #wrapper #content #commentform .form-allowed-tags, #wrapper #content #commentform p, #wrapper input, #wrapper button, #wrapper select { font-family: "', 'brightnews'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Site title font
function brightnews_get_headings_google_fonts() {
global $brightnews_options_db;
    $headingfont = $brightnews_options_db['brightnews_headings_google_fonts']; 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #header .site-title { font-family: "', 'brightnews'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Site description font
function brightnews_get_description_font() {
global $brightnews_options_db;
    $descriptionfont = $brightnews_options_db['brightnews_description_google_fonts']; 
    if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
    <?php _e('#wrapper #page #header .site-description {font-family: "', 'brightnews'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Page/post headlines
function brightnews_get_headlines_font() {
global $brightnews_options_db;
    $headlinefont = $brightnews_options_db['brightnews_headline_google_fonts'];
    if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #page .navigation .section-heading { font-family: "', 'brightnews'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Headline Boxes font
function brightnews_get_headline_box_google_fonts() {
global $brightnews_options_db;
    $headline_box_google_fonts = $brightnews_options_db['brightnews_headline_box_google_fonts']; 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper #content .entry-headline-content .entry-headline { font-family: "', 'brightnews'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Post entry font
function brightnews_get_postentry_font() {
global $brightnews_options_db;
    $postentryfont = $brightnews_options_db['brightnews_postentry_google_fonts']; 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #page .post-entry .post-entry-headline, #wrapper #page .slides li, #wrapper #page .home-list-posts ul li { font-family: "', 'brightnews'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
} 

// Sidebar widget headlines font
function brightnews_get_sidebar_widget_font() {
global $brightnews_options_db;
    $sidebarfont = $brightnews_options_db['brightnews_sidebar_google_fonts'];
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #page #sidebar .sidebar-widget .sidebar-headline { font-family: "', 'brightnews'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Footer widget headlines font
function brightnews_get_footer_widget_font() {
global $brightnews_options_db;
    $sidebarfont = $brightnews_options_db['brightnews_sidebar_google_fonts'];
    if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #page #footer .footer-widget .footer-headline { font-family: "', 'brightnews'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Header Main menu font
function brightnews_get_menu_font() {
global $brightnews_options_db;
    $menufont = $brightnews_options_db['brightnews_menu_google_fonts']; 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #header #main-navigation ul li { font-family: "', 'brightnews'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// Header Top menu font
function brightnews_get_top_menu_font() {
global $brightnews_options_db;
    $topmenufont = $brightnews_options_db['brightnews_top_menu_google_fonts']; 
		if ($topmenufont != 'default' && $topmenufont != '') { ?>
		<?php _e('#wrapper #header #top-navigation ul li { font-family: "', 'brightnews'); ?><?php echo $topmenufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'brightnews'); ?>
<?php } 
}

// User defined CSS.
function brightnews_get_own_css() {
global $brightnews_options_db;
    $own_css = $brightnews_options_db['brightnews_own_css']; 
		if ($own_css != '') { ?>
		<?php echo $own_css ?>
<?php } 
}

// Display custom CSS.
function brightnews_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php brightnews_get_own_css(); ?>
<?php brightnews_get_background_pattern(); ?>
<?php brightnews_display_sidebar(); ?>
<?php brightnews_footer_widgets(); ?>
<?php brightnews_site_title_letters(); ?>
<?php brightnews_get_header_title_background_pattern_opacity(); ?>
<?php brightnews_get_header_description_background_pattern_opacity(); ?>
<?php brightnews_get_header_menu_background_pattern_opacity(); ?>
<?php brightnews_get_content_headlines_background_pattern_opacity(); ?>
<?php brightnews_get_sidebar_headlines_background_pattern_opacity(); ?>
<?php brightnews_get_footer_background_pattern_opacity(); ?>
<?php brightnews_get_body_font(); ?>
<?php brightnews_get_headings_google_fonts(); ?>
<?php brightnews_get_description_font(); ?>
<?php brightnews_get_headlines_font(); ?>
<?php brightnews_get_headline_box_google_fonts(); ?>
<?php brightnews_get_postentry_font(); ?>
<?php brightnews_get_sidebar_widget_font(); ?>
<?php brightnews_get_footer_widget_font(); ?>
<?php brightnews_get_menu_font(); ?>
<?php brightnews_get_top_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'brightnews_custom_styles');	?>