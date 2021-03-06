<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
<?php if (is_page(5)) {

   echo' <div class="sin-prod">
        <div class="sub-wrap">
            <ul>
                <li class="sub-active">FIND YOUR PART</li>
                <li>CHECKOUT</li>
                <li>ORDER CONFIRMATION</li>
            </ul>
        </div>
        <div class="sub-right-stripe"></div>
    </div>' ;
}
?>
<?php if (is_page(6)) {

    echo' <div class="sin-prod">
        <div class="sub-wrap">
            <ul>
                <li>FIND YOUR PART</li>
                <li class="sub-active mc-checkout">CHECKOUT</li>
                <li class="mc-confirm">ORDER CONFIRMATION</li>
            </ul>
        </div>
        <div class="sub-right-stripe"></div>
    </div>' ;
}
?>


    <div id="content mc-page" class="page col-full">
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="col-left">
            <div class="mc-page-wrap">

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                           
            <article <?php post_class(); ?>>
				
				<header>
			    	<h1><?php the_title(); ?></h1>
				</header>
				
                <section class="entry">
                	<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
               	</section><!-- /.entry -->

				<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
                
            </article><!-- /.post -->
            
            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
            		comments_template();
            	}

				} // End WHILE Loop
			} else {
		?>
			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        <?php } // End IF Statement ?>  
        </div>
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
	<script>
        jQuery(document).ready(function(){
            if (window.location.href.indexOf('order-received') > -1 ) {
                jQuery('li.mc-checkout').removeClass('sub-active');
                jQuery('li.mc-confirm').addClass('sub-active');

            }
        });

	</script>
<?php get_footer(); ?>