<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
<?php 
    $prices = explode('</span>', $price_html);

    $price_low = "";
    $price_high = "";

    /* Price low/high are flipped because New is on top in the mockup
     * and was not during my testing.
     */

    if (count($prices) > 2) {
        $price_high = "<span class='ob_manufacturer'>Used & Tested:</span> <span class='ob_manufacturer_text'>" . strip_tags($prices[0]) . "</span>";
        $price_low = "<span class='ob_manufacturer'>New:</span> <span class='ob_manufacturer_text'>" . substr(strip_tags($prices[1]), 7) . "</span>";
    } else {
        $price_high = "";
        $price_low = "<br/><span class='ob_manufacturer'>New:</span> <span class='ob_manufacturer_text'>" . strip_tags($prices[0]) . "</span>";
    }
    /*
?>
    <span class="price"><?php echo $price_html; ?></span>
<?php */

    echo $price_low;
    echo $price_high;
?>
<?php endif; ?>
