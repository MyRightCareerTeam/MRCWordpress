<?php?><!DOCTYPE html>
<html>
  <head>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custom.css">
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/mobile.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/editor.js"></script>
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
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
          </div>
        </div>
        <div id="right-control-pane">
          <div id="slide-right" onClick="show_right();"></div>
          <div id="right-menu">
            <button class="right-button"></button>
            <button class="right-button"></button>
            <button class="right-button"></button>
            <button class="right-button"></button>
          </div>
        </div>
    </div>
  </body>
</html>