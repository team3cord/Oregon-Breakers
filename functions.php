<?php

// Custom Function to Include

/**
 * RENAME and REORDER functions removed by Josh Klar as they were
 * reimplemented as rich text fields in the woocommerce-ob-custom-fields
 * plugin.
 */

/* RENAME TABS */
/*add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
 
	$tabs['description']['title'] = __( 'Shipping Info' );		// Rename the description tab
	$tabs['additional_information']['title'] = __( 'Product Details' );	// Rename the additional information tab
 
	return $tabs;
 
}
 */
/* REORDER TABS */
/*add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {
 
	$tabs['description']['priority'] = 10;
	$tabs['additional_information']['priority'] = 5;
 
	return $tabs;
}*/

/*
 * Remove tabs from product details page
 */

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] ); // Remove the description tab
    unset( $tabs['reviews'] ); // Remove the reviews tab
    unset( $tabs['additional_information'] ); // Remove the additional information tab

    return $tabs;

}

add_action( 'woocommerce_before_add_to_cart_form', 'ob_summary_end', 99);

function ob_summary_end() {
    echo "</div>";
}

function customizeEditor($in) {
    $in['remove_linebreaks']=false;
    $in['remove_redundant_brs'] = false;
    $in['wpautop']=false;
    return $in;
}
add_filter('tiny_mce_before_init', 'customizeEditor');

/**
 * Hide editor for specific page templates.
 *
 */
add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;

    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if($template_file == 'home.php'){ // edit the template name
        remove_post_type_support('page', 'editor');
    }
}

?>
