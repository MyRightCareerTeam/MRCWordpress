<?php?><!DOCTYPE html>
<html>
  <head>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custom.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/mobile.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/editor.js"></script>
    <meta name="viewport" content="width=device-width">
  </head>
  <body onload="loadData(<?php global $post; echo $post->ID; ?>)">
    <div id="content-pane">
      <div id="content">
        <?php echo $post->post_content ?>
      </div>
    </div>
    <div id="control-pane">
      <div id="menu">
        <button id="saveButton" onclick="saveEditor(<?php global $post; echo $post->ID; ?>)">Save Document</button>
      </div>
      <div id="editor">
        <div id="editor-button">
			     <div id="slide-down" onClick="editor_down();"></div>
			     <div id="slide-up" onClick="editor_up();"></div>
		    </div>
        <div id="editor-container">
          <div id="innerEditor"></div>  
            <script type="text/javascript">
              CKEDITOR.replace( document.getElementById('innerEditor'), {
              toolbar: [
              { name: 'document', items: [ 'NewPage', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
              [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'],      // Defines toolbar group without name.
             // '/',                                          // Line break - next group will be placed in new line.
              { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline'] }
                ]
                });
            </script>
        </div>
      </div>
        <div id="left-control-pane">
          <div id="slide-left" onClick="show_left();"></div>
          <div id="left-menu">
			    <?php if ( is_active_sidebar( 'sidebar-8' ) ) {
			    dynamic_sidebar( 'sidebar-8' );
			    } ?>
		    </div>
        </div>
        <div id="right-control-pane">
          <div id="slide-right" onClick="show_right();"></div>
          <div id="right-menu">
            <div class ='dcjq-vertical-mega-menu'>
              <?php  echo "<ul>
   <li class='active'><a href='index.html'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Products</span></a>
      <ul>
         <li><a href='#'><span>Widgets</span></a></li>
         <li><a href='#'><span>Menus</span></a></li>
         <li class='last'><a href='#'><span>Products</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Company</span></a>
      <ul>
         <li><a href='#'><span>About</span></a></li>
         <li class='last'><a href='#'><span>Location</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>"?>\
            </div>
          </div>
        </div>
      </div>
  </body>
</html>