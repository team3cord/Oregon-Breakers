<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	echo '<div class="footer-wrap">';

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>
	<?php woo_footer_before(); ?>
    
		<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">
	
			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>
	
			<div class="block footer-widget-<?php echo $i; ?>">
	        	<?php woo_sidebar( 'footer-' . $i ); ?>
			</div>
	
		        <?php } ?>
			<?php } // End WHILE Loop ?>
	
		</section><!-- /#footer-widgets  -->
	<?php } // End IF Statement ?>
    	
        <div id="footer-questions">
        <span class="fregular">Still have questions?<br/>
Give the experts a call:</span> <span class="fbold">(503) 736-0921</span>
        </div>
        
        <div id="footer-testimonials">
        <?php echo do_shortcode("[testimonial_rotator id='92']"); ?>
        </div>
        
        <div id="footer-contact">
        
        <!--FOOTER LEFT-->
        <div class="footer-contact-left">
        
         <!--Google Map-->
        <div class="col-60">
        <div class="Flexible-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1398.281797572521!2d-122.64846604654413!3d45.49873212476995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7add3c66d970f2e4!2sOregon+Breakers%2C+inc.!5e0!3m2!1sen!2sus!4v1398382707542" width="200" height="150" frameborder="0" style="border:0"></iframe>
        </div>
        </div>
         <!--Google Map END-->
        
         <!--Contact info-->
        <div class="col-40">
        <span class="fbold">Located in inner SE Portland</span><br/>
        3365 SE 17th Avenue<br/>
        Portland, OR 97292
        <div class="lined"></div>
        <span class="fbold">Open 7am – 4pm<br/>
        Monday through Friday</span><br/>
        (503) 736-0921<br/>
        (800) 943-3323
        </div>
         <!--Contact info END-->
        
        </div>
        <!--FOOTER LEFT END-->
        
       <!--FOOTER RIGHT-->
        <div class="footer-contact-right">
        
        <div class="col-100">
        
        <div class="col-50">
        <ul>
        <li><a href="http://www.oregonbreakers.com/">Home</a></li>
		<li><a href="/products">Products</a></li>
		<li><a href="/testing-services">Testing Services</a></li>
		<li><a href="/meet-the-experts">Meet the Experts</a></li>
        </ul>
		</div>
        
        <div class="col-50">
         <ul>
        <li><a href="/faqs">FAQs</a></li>
		<li><a href="/sell-materials">Sell Materials</a></li>
		<li><a href="contact">Contact Us</a></li>
        </ul>
		</div>
        
        </div>
        
        <div class="clr"></div>
        
        <div class="lined"></div>
        
        <div class="col-100">
        
        <div class="col-25">
        <img src="http://raredimension.com/clients/oregonbreakers/i/pearl-logo.jpg"/>
        </div>
        
        <div class="col-75">
        Recognized by PEARL<br/>
        <a href="http://pearl1.org">Pearl1.org</a>
        </div>
        
        </div>
        
        </div>
        <!--FOOTER RIGHT END-->
        
        <div class="clr"></div>
        </div>
        
		<footer id="footer">
	
			<div id="copyright" class="col-left">
			<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
	
					echo stripslashes( $woo_options['woo_footer_left_text'] );
	
			} else { ?>
				<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
			<?php } ?>
			</div>
	
			<div id="credit" class="col-right">
	        Website by <a href="http://crosshatchcreative.com" class="crosshatch">Crosshatch Creative.</a>
			</div>
	
		</footer><!-- /#footer  -->
	
	</div><!-- / footer-wrap -->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>