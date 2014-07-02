<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: CONTACT PAGE
 *
 *
 *
 * @package WooFramework
 * @subpackage Template
 */
get_header();
global $woo_options;
?>

    <div id="content mc-contact" class="page col-full mc-team-page">
        <?php woo_main_before(); ?>

        <section id="main" class="fullwidth">

            <div class="mc-page-wrap">

             <header>
                 <h1><?php the_title(); ?></h1>
             </header>
                <div class="col-50 mc-contact-page">
                    <div id="obi-contact">
                        <span class="mc-lite"><?php echo get_field('contact_instructions'); ?></span><br /> <br /><br />
                        <?php echo get_field('contact_form'); ?>
                    </div>
                </div>

                <div class="col-50 mc-hours">
                    <h2>Hours</h2>
                    <?php echo get_field('contact_info'); ?>
                </div>
            </div> <!-- mc page wrap -->


            <div class="mc-contact-full-stripe">
                <div class="callout-bar">
                    <h2>Getting here</h2>
                </div>
            </div>

            <div class="mc-page-wrap mc-getting-wrap">
                <p class="getting-p"><?php echo get_field('getting_copy'); ?> </p>
                <div class="col-50 mc-contact-img">
                    <img class="alignnone size-full wp-image-109" src="<?php echo get_field('getting_image'); ?>" alt="obi-directions" width="500" height="320" />
                </div>
                <div class="col-50 mc-contact-map">
                    <div class="Flexible-container"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1398.281797572521!2d-122.64846604654413!3d45.49873212476995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7add3c66d970f2e4!2sOregon+Breakers%2C+inc.!5e0!3m2!1sen!2sus!4v1398382707542" width="300" height="200" frameborder="0"></iframe></div>
                </div>
            </div><!-- mc page wrap -->

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