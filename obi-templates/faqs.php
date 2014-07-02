<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: FAQs PAGE
 *
 *
 * @package WooFramework
 * @subpackage Template
 */
get_header();
global $woo_options;
?>

    <div id="content mc-faq" class="page col-full">
        <?php woo_main_before(); ?>

        <section id="main" class="fullwidth">
            <div class="mc-service-wrap">
            <?php
            if ( have_posts() ) { $count = 0;
                while ( have_posts() ) { the_post(); $count++;
                    ?>
                    <article <?php post_class(); ?>>

                        <header>
                            <h1><?php the_title(); ?></h1>
                        </header>


                        <section class="entry">
                            <div class="mc-faq-wrap">
                                <div class="col-90">
                                    <p class="mc-lite"><?php echo get_field('faq_copy'); ?></p>
                                </div>
                                <div class="clr"> </div>
                            </div><!-- mc service wrap -->
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

<?php get_footer(); ?>