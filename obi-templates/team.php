<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: OBI Team
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
       
    <div id="content mc-team" class="page col-full mc-team-page">
    
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="fullwidth">
           
        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                             
                <article <?php post_class(); ?>>
					
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
                    
                    <section class="entry">


                        <div class="mc-team-wrap">
                            <div class="col-60 mc-co-tout">
                                <h2><?php echo get_field('team_subhead'); ?></h2>
                                <p class="mc-lite"><?php echo get_field('team_copy'); ?></p>
                            </div>
                            <div class="col-40 mc-partner-tout">
                                <h2><?php echo get_field('team_partners'); ?></h2>
                                <div class="partner-holder"><img src="<?php echo get_field('partner_image1'); ?>"></div>
                                <div class="partner-holder"><img src="<?php echo get_field('partner_image2'); ?>"></div>
                                <div class="partner-holder"><img src="<?php echo get_field('partner_image3'); ?>"></div>
                                <div class="partner-holder"><img src="<?php echo get_field('partner_image4'); ?>"></div>
                            </div>
                            <div class="clr"> </div>
                        </div><!-- mc service wrap -->
                        <p>&nbsp;</p>

	               	</section><!-- /.entry -->


                </article><!-- /.post -->
                                                    
			<?php
					} // End WHILE Loop
				} else {
			?>

            <?php } ?>  
        
		</section><!-- /#main -->
        <div class="mc-contact-full-stripe">
            <div class="callout-bar">
                <h2>OUR TEAM</h2>
            </div>
        </div>
        <div class="mc-team-lower-wrap">
            <div class="team-spirit">
              <?php echo do_shortcode("[team_manager category='0' orderby='menu_order' limit='0' exclude='' layout='list' image_layout='boxed' image_size='shop_single']"); ?>
            </div>
        </div>
		<?php //woo_main_after(); ?>
		
    </div><!-- /#content -->
		
<?php get_footer(); ?>