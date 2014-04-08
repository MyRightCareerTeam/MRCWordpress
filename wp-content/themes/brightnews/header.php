<?php
/**
 * The header template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $brightnews_options_db; ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width, minimumscale=1.0, maximum-scale=1.0" />  
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/editor.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
	<![endif]-->
<?php if ($brightnews_options_db['brightnews_favicon_url'] != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($brightnews_options_db['brightnews_favicon_url']); ?>" />
<?php } ?>
<?php wp_head(); ?>  
</head>
 
<body <?php body_class(); ?> id="wrapper">
<div id="page">
<div id="main-wrapper">
  <header id="header">
<?php if ( has_nav_menu( 'top-navigation' ) || $brightnews_options_db['brightnews_header_facebook_link'] != '' || $brightnews_options_db['brightnews_header_twitter_link'] != '' || $brightnews_options_db['brightnews_header_google_link'] != '' || $brightnews_options_db['brightnews_header_rss_link'] != '' ) {  ?>
    <div id="top-navigation">
<?php if ( has_nav_menu( 'top-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'top-nav', 'theme_location'=>'top-navigation' ) ); } ?>
      
      <div class="header-icons">
<?php if ($brightnews_options_db['brightnews_header_facebook_link'] != ''){ ?>
        <a class="social-icon facebook-icon" href="<?php echo esc_url($brightnews_options_db['brightnews_header_facebook_link']); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/facebook.png" alt="Facebook" /></a>
<?php } ?>
<?php if ($brightnews_options_db['brightnews_header_twitter_link'] != ''){ ?>
        <a class="social-icon twitter-icon" href="<?php echo esc_url($brightnews_options_db['brightnews_header_twitter_link']); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/twitter.png" alt="Twitter" /></a>
<?php } ?>
<?php if ($brightnews_options_db['brightnews_header_google_link'] != ''){ ?>
        <a class="social-icon google-icon" href="<?php echo esc_url($brightnews_options_db['brightnews_header_google_link']); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/google-plus.png" alt="Google +" /></a>
<?php } ?>
<?php if ($brightnews_options_db['brightnews_header_rss_link'] != ''){ ?>
        <a class="social-icon rss-icon" href="<?php echo esc_url($brightnews_options_db['brightnews_header_rss_link']); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/rss.png" alt="RSS" /></a>
<?php } ?>
      </div>
    </div>
<?php } ?>
    
    <div class="header-content">
<?php if( get_header_image() != '' ) { ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php esc_url(header_image()); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } else { ?>
      <div class="site-title-wrapper">
        <div class="site-title-pattern"></div>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
      </div>
      <div class="site-description-wrapper">
        <div class="site-description-pattern"></div>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
      </div>
<?php } ?>         
    </div> <!-- end of header-content -->
    
    <nav id="main-navigation">
      <div class="navigation-pattern"></div>
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
    </nav>
  </header>