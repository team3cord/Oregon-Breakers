<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 *  Template Name: HOME PAGE
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
get_header();
global $woo_options;

?>

<?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { ?>

    <a href="/meet-the-experts"><div class="mc-homepage-banner">

            <?php
            if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { $banner = $woo_options['woo_homepage_banner_path']; }
            if ( $woo_options[ 'woo_homepage_banner' ] == "true" && is_ssl() ) { $banner = preg_replace("/^http:/", "https:", $woo_options['woo_homepage_banner_path']); }
            ?>
            <img src="<?php echo $banner; ?>" alt="" />
            <!--<h1><span><?//php echo $woo_options['woo_homepage_banner_headline']; ?></span></h1>
    		<div class="description"><?//php echo wpautop($woo_options['woo_homepage_banner_standfirst']); ?></div> -->

            <!-- <div id="obi-slider-info">
            <div class="obi-slider-text">
            <h1>Your NW Electrical Experts</h1>
            <p>We serve the Portland area with our vast knowledge of all things breakers and electrical. If you can’t find what you’re looking for here, give us a call and we’ll get you the exact part you need.</p>
            <h2>(503) 736-0921</h2>
            </div>
            <a href="/meet-the-experts" class="obi-button">Meet The Experts</a>
            </div> -->

        </div></a>

<?php } ?>

<!--SEARCH BAR-->
<div id="obi-search-bar mc-home">
    <script>
        function avalcm_search_link(vas){
            var link1=document.getElementById("home_url").value;
            var sublink=document.getElementById("categ_base_lang").value;
            var link2="";
            if (vas!="") {
                var link2=sublink + "/" + vas + "/";
            }
            var link=link1+link2;
            document.getElementById('searchform_special').action = link;
        }
    </script>
    <form role="search" method="get" id="searchform_special" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
        <div class="obi-search-wrap">
            <div class="mc-search-for">
                <label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search for products', 'woocommerce' ); ?>" onfocus="this.placeholder ='' " />
            </div>
            <div class="mc-or"><span>- OR -</span></div>
            <div class="overpower-selectbox">
                <select onchange="avalcm_search_link(this.value)" >
                    <option value=''>Manufacturers</option>
                    <?php
                    //$sql="SELECT taxonomy,slug, <code>name</code> from wp_term_taxonomy , wp_terms where wp_term_taxonomy.term_id=wp_terms.term_id and taxonomy in ('product_cat','') ORDER BY taxonomy ASC , term_taxonomy_id asc;";
                    $sql="SELECT DISTINCT meta_value from $wpdb->postmeta where meta_key = 'manufacturer'";
                    $allfilters = $wpdb->get_results($sql);
                    foreach ($allfilters as $singlefilter) {
                        echo '<option value="'. $singlefilter->meta_value.'">' . $singlefilter->meta_value. '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mc-go">
                <input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Go' ); ?>" />
                <input type="hidden" name="post_type" value="product" />
                <input type="hidden" id="home_url" value="<?php echo esc_url( home_url( '/'  ) ); ?>" />
                <input type="hidden" id="categ_base_lang" value="<?php echo _x('product-category', 'slug', 'woocommerce') ?>" />
            </div>
        </div>
    </form>
</div>
<!--SEARCH BAR END-->

<div id="mc-obi-homecats-box">
    <div class="products-left">
        <div class="obi-homecat teal1 desktop">
            <div class="mc-obi-homecat-wrap-left">
                <h3 class="mc-comercial">Commercial/Industrial</h3>
            </div>
        </div>
        <div class="mc-comm-products mc-products">
            <!--COMMERCIAL-->
            <?php echo do_shortcode("[product_categories number='12' parent='15']"); ?>
            <!--COMMERCIAL END-->

        </div>
    </div>
    <div class="products-right">
        <div class="obi-homecat teal2 desktop">
            <div class="mc-obi-homecat-wrap-right">
                <h3 class="mc-comercial">Residential</h3>
            </div>
        </div>
        <div class="mc-res-products mc-products">

            <!--RESIDENTIAL-->
            <?php echo do_shortcode("[product_categories number='12' parent='14']"); ?>
            <!--RESIDENTIAL END-->
        </div>
    </div>
</div>



<?php mystile_homepage_content(); ?>

<?php woo_loop_before(); ?>

<?php if ( $woo_options[ 'woo_homepage_blog' ] == "true" ) {
    $postsperpage = $woo_options['woo_homepage_blog_perpage'];
    ?>

    <?php

    $the_query = new WP_Query( array( 'posts_per_page' => $postsperpage ) );

    if ( have_posts() ) : $count = 0;
        ?>

        <?php /* Start the Loop */ ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>

            <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );
            ?>

        <?php
        endwhile;
        // Reset Post Data
        wp_reset_postdata();
        ?>



    <?php else : ?>

        <article <?php post_class(); ?>>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
        </article><!-- /.post -->

    <?php endif; ?>

<?php } // End query to see if the blog should be displayed ?>

<?php woo_loop_after(); ?>

</section><!-- /#main -->

<?php woo_main_after(); ?>


<?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "true" ) get_sidebar(); ?>

</div><!-- /#content -->

<div class="clr"></div>
<div id="obi-home-pearl">
    <div id="obi-home-pearl-contain">
        <img src="http://raredimension.com/clients/oregonbreakers/i/pearl-logo.png"/>
        <div class="obi-home-pearl-text">
            <h2>Recognized by Pearl</h2>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
            <span>Maecenas ut hendrerit est. Maecenas ut hendrerit est.</span><br>
            <a href="http://pearl1.org">Pearl1.org</a>
        </div>
        <div class="clr"></div>
    </div>
</div>

<div class="clr"></div>
<div id="obi-home-brands">
    <h2>We are Factory Authorized Distributors for these fine lines:</h2>
    <img src="wp-content/themes/or-breakers/i/logos-all.png"/>
</div>

<?php get_footer(); ?>
