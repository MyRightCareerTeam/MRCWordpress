<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lte IE 6]>
<link href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" rel="stylesheet" />
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

</style>

<?php wp_head(); ?>
</head>
<body>

  <div id="wrapper">

    <div id="masthead">
    
      <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    
      <p><?php bloginfo('description'); ?></p>
      
      <ul>
        <li <?php if(is_front_page()) { ?>class="current_page_item"<?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
        <?php wp_list_pages('sort_column=menu_order&title_li=' ); ?>
      </ul>
      
      <div id="masthead_image">
        
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/masthead.png" alt="rainbow" />
        
      </div>
      
    </div>
  
    <div id="content" class="clearfix">
