<?php 
/**
 * Template: Capsul Menu.
 *
 * @package RT_FoodMenuPro
 */

 use RT\FoodMenu\Helpers\Fns;
 use RT\FoodMenuPro\Helpers\FnsPro;

extract( $args );

$add_to_cart_button = null;

global $product;
global $woocommerce;
$label  = apply_filters('add_to_cart_text', __('Add to cart', 'foodcart'));

if ($source == 'product' && $wc == true) {
    $_product = wc_get_product($pID);
    $price = $_product->get_price_html();
    $pType = $_product->get_type();
    if ($_product->is_purchasable()) {
        if ($_product->is_in_stock()) {
            $add_to_cart_button = sprintf('<a href="%1$s?add-to-cart=%2$d" class="fmp-wc-add-to-cart-btn button alt ajax_add_to_cart add_to_cart_button product_type_simpl" data-id="%2$d" data-type="%3$s">%4$s</a>',
                $pLink,
                $pID,
                $pType,
                esc_html($add_to_cart_text)
            );
        }
    }
} else {
	$price = FnsPro::fmpHtmlPrice( $id );
}

$class .= " fmp-item-" . $pID;

?>
<div class="<?php echo esc_attr( $args['grid'] ); ?>">
	<div class="food-menu-box-layout1">
		<div class="food-img">
			<?php if ( $link ) { ?>
				<a class="<?php echo esc_attr($anchorClass); ?>" href="<?php echo esc_url($pLink); ?>"
				   data-id="<?php echo absint($pID); ?>">
				   <?php
				if ( in_array( 'image', $items, true ) ) {
					$image = Fns::getFeatureImage( $pID, $imgSize, $defaultImgId, $customImgSize );
					echo wp_kses_post( $image );
				}
				?>
				</a>
			<?php } ?>
		</div>
		<div class="food-details">
			<h3 class="item-title"><?php if ($link) { ?>
				<a class="<?php echo esc_attr($anchorClass); ?>" href="<?php echo esc_url($pLink); ?>"
				   data-id="<?php echo absint($pID); ?>"><?php echo esc_attr($title); ?></a>
			<?php } else {
				echo esc_html($title);
			} ?></h3>
			<?php if ( in_array( 'excerpt', $items, true ) ) : ?>
				<p><?php echo wp_kses_post( $excerpt ); ?></p>
			<?php endif; ?>
		</div>
		<div class="food-price">
			<span class="item-price"><?php echo wp_kses_post($price); ?></span>	
			
			<?php if (in_array('add_to_cart', $items) && $add_to_cart_button): ?>
				<?php //echo wp_kses_post($add_to_cart_button); ?>
                <button type="submit" data-quantity="1" data-product_id="<?php echo esc_attr( $product->get_id()) ; ?>"	class="fmp-wc-add-to-cart-btn button alt ajax_add_to_cart add_to_cart_button product_type_simple"><?php echo $label; ?></button>
			<?php endif; ?>
			
		</div>
	</div>
</div>