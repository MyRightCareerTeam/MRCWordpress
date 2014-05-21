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
        <button id="saveButton" onclick="saveEditor(<?php global $post; echo $post->ID; ?>)">Save</button>
        <button id="loadButton" onclick="loadData(<?php global $post; echo $post->ID; ?>)">Load</button>
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
          <div id="right-menu">
            <div class ='dcjq-vertical-mega-menu'>
              <ul>
   <li class='active'><a href='index.html'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Templates</span></a>
      <ul>
         <li class='last'><a href='#'><span onclick="putData('<p>Age 30 End Result</p><p>Personal Relationship:</p><p>Location:</p><p>Own/Rent:Commute:</p><p>Car:Weekend</p><p>Fun:Vacations:</p><p>Friends:Health:</p><p>Financial Situation:Community</p><p>Involvement:Parenting/Kids:</p><p>Extended Family (Parents/Siblings):</p><p>What I want as a Career:</p><p>What I don&rsquo;t want as a Career:</p><p>At what level of management I am:</p><p>Social Work Environment:</p><p>Physical Work Environment:</p><p>Company&rsquo;s Market:</p><p>Company&rsquo;s Values:</p>')">Template - Age 30</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Examples</span></a>
      <ul>
         <li class='last'><a href='#'><span onclick="putData('<p>Age 30 End Result<br />7/7/2011 Templateâ€EndResultâ€Age30_Values.doc Page 1 of 1<br />Personal Relationship: I married my husband at age 28. We are both athletic and<br />enjoy working out and keeping fit. He also works in the city and enjoys his job.<br />Live: We rent a great apartment in NYC in the East Village. My husband and I are<br />considering a move to the suburbs or a move to California since we do not want to<br />raise a family in the city.<br />Commute: Since we live in NYC, we both take the subway to work.<br />Car: Since we take the subway to work we only need one car. It is also very hard to<br />park cars in the East Village. We have a nice hybrid SUV.<br />Fun: NYC is a great place for a couple and we take advantage of it. We go to<br />Broadway shows, go out to restaurants and clubs. We take weekend trips to other<br />East Coast cities since both of us went to school on the East Coast and have friends<br />here. We try to take one overseas vacation each year and last year we went to<br />Australia.<br />Parenting: We both hope to have our first child before I am 32, then the next one at<br />34, and the last one at 36.<br />Extended Family: I am still close to my Dad, my brother and my step family; I see<br />them at least twice a year for the holidays. My husband has a large family which I am<br />close to as well.<br />Friends: I&rsquo;m still friends with my closest friends from high school as well as my<br />closest friend from college. I have made other good friends in the city whom I have<br />met through work and athletics.<br />Health: I belong to a fitness gym in NYC. I have run at least one marathon and one<br />half marathon; I work out five times a week, which ranges from kick boxing, to<br />running, to strengthening, to yoga and to Pilates.<br />What I don&rsquo;t want as a Career: I don&rsquo;t want to work with anything that involves math<br />and science.<br />Social Work Environment: I work in ')">College</span></a></li>
      </ul>
   </li>
   <li class='last has-subs'><a href='#'><span>Related Excercises</span></a>
      <ul>
        <li><a href='#'><span onclick="loadData(1438)">Previous Excercise<span></a></li>
      </ul>
   </li>
</ul>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>