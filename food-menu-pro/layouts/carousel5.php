<?php
/**
 * Template: Carousel 5.
 *
 * @package RT_FoodMenuPro
 */

 use RT\FoodMenu\Helpers\Fns;
 use RT\FoodMenuPro\Helpers\FnsPro;

$add_to_cart_button = null;
if ($source == 'product' && $wc == true) {
    $_product = wc_get_product($pID);
    $price = $_product->get_price_html();
    $pType = $_product->get_type();
    if ($_product->is_purchasable()) {
        if ($_product->is_in_stock()) {
            $add_to_cart_button = sprintf('<a href="%1$s?add-to-cart=%2$d" class="fmp-wc-add-to-cart-btn" data-id="%2$d" data-type="%3$s">%4$s</a>',
                $pLink,
                $pID,
                $pType,
                esc_html($add_to_cart_text)
            );
        }
    }
} else {
	$price = FnsPro::fmpHtmlPrice( $pID );
}

$class .= " fmp-item-". $pID;
?>	
<div class="<?php echo esc_attr($grid . " " . $class); ?>">
    <div class="fmp-layout5-lipu fmp-box-wrapper">
        <div class="fmp-box">	
			<div class="food-menu-box-layout3">
				<div class="item-img">			
					<?php
						if ( in_array( 'image', $items ) ) {
							$image = Fns::getFeatureImage( $pID, $imgSize, $defaultImgId, $customImgSize, $lazyLoad );
							echo wp_kses_post( $image );
						}
					?>
					<div class="item-price"><?php echo wp_kses_post( $price ); ?></div>
					<div class="item-icon">
						<ul>
							<li><?php if ($link) { ?><a href="<?php echo esc_url($pLink ); ?>"><i class="fa fa-link"></i></a><?php } ?></li>
						</ul>
					</div>
				</div>
				<div class="item-content">
					<h3 class="item-title"><?php if ($link) { ?><a class="<?php echo esc_attr( $anchorClass ); ?>" href="<?php echo esc_url($pLink ); ?>" data-id="<?php echo absint( $pID ); ?>"><?php echo esc_attr( $title ); ?></a>
					<?php } else {
						echo esc_html($title);
					} ?></h3>
					<?php if (in_array('excerpt', $items)): ?>
						<p><?php echo wp_kses_post($excerpt); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>	
</div>