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


                <?php

                // check if the repeater field has rows of data
                if( have_rows('main_repeater') ):

                    // loop through the rows of data
                    while ( have_rows('main_repeater') ) : the_row();

                        // display a sub field value
                        ?>
                        <div class="clr"> </div><br />
                        <div class="col-60 mc-service-circuit mc-lite">
                            <?php the_sub_field('left_content'); ?>
                        </div>
                        <div class="col-40 mc-service-pix">
                            <?php the_sub_field('right_content'); ?>
                        </div>
                    <?php

                    endwhile;

                else :

                    // no rows found

                endif;

                ?>



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