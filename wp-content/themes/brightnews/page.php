<?php?><!DOCTYPE html>
<html>
  <head>
    <title>MyRightCareer</title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custom.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/mobile.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/editor.js"></script>
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
      <div id="content-pane">
        <div id="content">
          <?php echo '<p>Hello World</p>';?></div>
      </div>
      <div id="control-pane">
        <div id="menu">
			
		</div>
        <div id="editor">
          <div id="editor-button">
			<div id="slide-down" onClick="editor_down();"></div>
			<div id="slide-up" onClick="editor_up();"></div>
		  </div>
          <div id="editor-container">
          <div id="inner-editor"></div>  
            <script type="text/javascript">CKEDITOR.replace(document.getElementById('inner-editor'));</script>
            <button onclick="saveEditor(<?php global $post; echo $post->ID; ?>)">Save Document</button></div>
        </div>
        <div id="left-control-pane">
          <div id="slide-left" onClick="show_left();"></div>
          <div id="left-menu">
			<!--
			<nav id="main-navigation">
				<div class="navigation-pattern"></div>
				<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
			</nav> -->
			<?php if ( is_active_sidebar( 'sidebar-8' ) ) { ?>
			<?php dynamic_sidebar( 'sidebar-8' ); ?>
			<?php } ?>
		  </div>
        </div>
        <div id="right-control-pane">
          <div id="slide-right" onClick="show_right();"></div>
          <div id="right-menu"></div>
        </div>
    </div>
  </body>
</html>