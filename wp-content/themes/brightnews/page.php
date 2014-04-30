<?php?><!DOCTYPE html>
<html>
  <head>
    <title>PHP Test</title>
    <link rel="stylesheet" type="text/css" href="/MRCWordpress/wp-content/themes/brightnews/css/custom.css">
    <script type="text/javascript" src="/MRCWordpress/wp-content/themes/brightnews/js/mobile.js"></script>
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
      <div id="content-pane">
        <div id="content">
          <?php echo '<p>Hello World</p>';?></div>
      </div>
      <div id="control-pane">
        <div id="menu"></div>
        <div id="editor">
          <div id="editor-button"></div>
          <div id="editor-container"></div>
        </div>
        <div id="left-control-pane">
          <div id="slide-left" onClick="show_left();"></div>
          <div id="left-menu"></div>
        </div>
        <div id="right-control-pane">
          <div id="slide-right" onClick="show_right();"></div>
          <div id="right-menu"></div>
        </div>
    </div>
  </body>
</html>