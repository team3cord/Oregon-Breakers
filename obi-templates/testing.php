<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 *  Template Name: TESTING PAGE
 *

 * @package WooFramework
 * @subpackage Template
 */
get_header();
global $woo_options;
?>

    <div id="content mc-testing" class="page col-full">
        <?php woo_main_before(); ?>

        <section id="main" class="col-left">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>

            <div class="mc-service-wrap">
                <div class="col-60 mc-service-tout mc-lite">
                   <?php echo get_field('testing_tout');?>
                </div>

                <div class="col-40 mc-service-pearl">
                    <img src="http://raredimension.com/clients/oregonbreakers/i/pearl-logo.png" alt="" /><div class="mc-service-pearl-text">
                        <h2><?php echo get_field('testing_pearl_header');?></h2>
                        <span class="mc-lite"><?php echo get_field('testing_pearl_copy');?></span>
                        <a href="http://pearl1.org">Pearl1.org</a>
                    </div>
                </div>
                <div class="clr"> </div><br />
                <div class="col-60 mc-service-circuit mc-lite">
                    <h2>Circuit Breaker Testing</h2>
                    <p class="mc-lite">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut hendrerit est. Donec volutpat id justo id lobortis. Nullam dignissim sit amet tortor eu gravida. Duis a mauris in neque semper lobortis nec suscipit massa.</p>
                    <span class="mc-bold-italic">What is Acceptance Testing?</span>
                    <p class="mc-lite">Etiam pellentesque interdum sodales. Aenean non egestas arcu. Praesent in eros sit amet massa suscipit porta id non purus. Vestibulum sit amet mauris nec enim euismod euismod.</p>
                    <span class="mc-bold-italic">The Purpose of Ground Fault Protection</span>
                    <p class="mc-lite">Phasellus eu metus sagittis, ornare odio ut, lacinia tellus. Etiam commodo convallis orci, ut tempus est hendrerit eget. Donec mattis leo vel sapien eleifend, id dictum arcu pretium.</p>

                    </div>
                <div class="col-40 mc-service-pix">
                    <img class="alignnone size-full wp-image-126" src="http://ob.crosshatchcreative.com/wp-content/uploads/2014/04/services1.jpg" alt="services1" width="349" height="260" />
                    <span class="mc-service-lite-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut hendrerit est. Donec volutpat id justo id lobortis.</span>
                </div>
                <div class="col-60 mc-service-circuit mc-lite">
                    <h2 class="ground-fault">Ground Fault Testing</h2>
                    <p class="mc-lite">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut hendrerit est. Donec volutpat id justo id lobortis. Nullam dignissim sit amet tortor eu gravida. Duis a mauris in neque semper lobortis nec suscipit massa.</p>
                    <span class="mc-bold-italic">What is Acceptance Testing?</span>
                    <p class="mc-lite">Etiam pellentesque interdum sodales. Aenean non egestas arcu. Praesent in eros sit amet massa suscipit porta id non purus. Vestibulum sit amet mauris nec enim euismod euismod.</p>
                    <span class="mc-bold-italic">The Purpose of Ground Fault Protection</span>
                    <p class="mc-lite">Phasellus eu metus sagittis, ornare odio ut, lacinia tellus. Etiam commodo convallis orci, ut tempus est hendrerit eget. Donec mattis leo vel sapien eleifend, id dictum arcu pretium.</p>
                </div>
                <div class="col-40 mc-service-pix">
                    <img class="alignnone size-full wp-image-127" src="http://ob.crosshatchcreative.com/wp-content/uploads/2014/04/services2.jpg" alt="services2" width="349" height="260" />
                    <span class="mc-service-lite-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut hendrerit est. Donec volutpat id justo id lobortis.</span>
                </div>
            </div><!-- mc page wrap -->

            <p>&nbsp;</p>


            <?php
            if ( have_posts() ) { $count = 0;
                while ( have_posts() ) { the_post(); $count++;
                    ?>
                    <article <?php post_class(); ?>>



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

        </section><!-- /#main -->

        <?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>