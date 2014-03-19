<?php
/**
 * The footer template file.
 * @package BrightNews
 * @since BrightNews 1.0.0
*/
?>
<footer id="footer">
    <div class="footer-pattern"></div>
<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
    <div class="footer-widget-area footer-widget-area-1">
<?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>
<?php } ?>
<?php if ( is_active_sidebar( 'sidebar-3' ) ) { ?>    
    <div class="footer-widget-area footer-widget-area-2">
<?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
<?php } ?>
 <?php if ( is_active_sidebar( 'sidebar-4' ) ) { ?>   
    <div class="footer-widget-area footer-widget-area-3">
<?php dynamic_sidebar( 'sidebar-4' ); ?>
    </div>
<?php } ?>    
<?php if ( dynamic_sidebar( 'sidebar-5' ) ) : else : ?>
<?php endif; ?>
</footer>
</div>
</div> <!-- end of page --> 
<?php wp_footer(); ?>     
</body>
</html>