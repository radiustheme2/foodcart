<?php
/**
 * Template: Grid by Category.
 *
 * @package RT_FoodMenuPro
 */

 use RT\FoodMenu\Helpers\Fns;
 use RT\FoodMenuPro\Helpers\FnsPro;
 extract( $arg ); // $arg for grid && // $args for slider

?>	
	<div class="food-menu-box-content <?php echo esc_attr( $grid . " " . $class ); ?>">
		<div class="food-menu-heading">
			<h3 class="item-title"><?php echo esc_html($term->name); ?></h3>
		</div>
		<!-- Single Item -->
		<?php
		$gridQuery = new WP_Query($args);
		if ($gridQuery->have_posts()) {
		   
			while ($gridQuery->have_posts()) : $gridQuery->the_post();
				$id = get_the_ID();
				$image   = Fns::getFeatureImage( $id, $imgSize, $defaultImgId, $customImgSize );
				$excerpt = Fns::strip_tags_content( get_the_excerpt(), $excerpt_limit );
				global $product;
				global $woocommerce;
				$label  = apply_filters('add_to_cart_text', __('Add to cart', 'foodcart'));
				$add_to_cart_button = null;
				if ($source == 'product' && $wc == true) {
					$_product = wc_get_product(get_the_ID());
					$price = $_product->get_price_html();
					$pType = $_product->get_type();
					if ($_product->is_purchasable()) {
						if ($_product->is_in_stock()) {
							$add_to_cart_button = sprintf('<a href="%1$s?add-to-cart=%2$d" class="cart-btn fmp-wc-add-to-cart-btn button alt ajax_add_to_cart add_to_cart_button product_type_simple" data-id="%2$d" data-type="%3$s">%4$s</a>',
								get_the_permalink(),
								get_the_ID(),
								$pType,
								esc_html($add_to_cart_text)
							);
						}
					}
				} else {
					$price = FnsPro::fmpHtmlPrice( $pID );
				}
		?>
		<div class="media media-none--sm menu-list">
			<div class="item-img">
				<?php
					if (in_array('image', $items)) {
						if ($link) { ?>
							<a class="<?php echo esc_attr($anchorClass); ?> fmp-pull-left"
							   href="<?php the_permalink() ?>"
							   data-id="<?php the_ID() ?>"><?php echo wp_kses_post($image); ?></a>
						<?php } else {
							echo "<span class='fmp-pull-left'>" . wp_kses_post($image) . "</span>";
						}
					}
				?>
			</div>
			
			<div class="media-body space-md">
				<div class="header-wrap">	
					<?php if (in_array('title', $items)): ?>
						<h3 class="fmp-title">
							<?php if ($link) { ?>
								<a class="food-title <?php echo esc_attr($anchorClass); ?>"
								   href="<?php the_permalink() ?>"
								   data-id="<?php the_ID() ?>"><?php the_title(); ?></a>
							<?php } else {
								the_title();
							} ?>
						</h3>
					<?php endif; ?>
					<?php if (in_array('price', $items)): ?>
						<div class="item-price"><?php echo wp_kses_post($price); ?></div>
					<?php endif; ?>
				</div>
				<?php if (in_array('excerpt', $items)): ?>
					<p><?php echo wp_kses_post($excerpt); ?></p>
				<?php endif; ?>				
				<ul class="action-area"> 						
					<?php if (in_array('add_to_cart', $items) && $add_to_cart_button): ?>
					<li><?php //echo wp_kses_post($add_to_cart_button); ?>
                        <a data-quantity="1" data-product_id="<?php echo esc_attr( $product->get_id()) ; ?>" class="cart-btn fmp-wc-add-to-cart-btn button alt ajax_add_to_cart add_to_cart_button product_type_simple"><?php echo $label; ?></a>
                    </li>
					<?php endif; ?>						
				</ul>
			</div>
		</div>
		<?php
			endwhile;
				wp_reset_postdata();
			} else {
				echo "<p>" . __("No item found.", "foodcart") . "</p>";
			}
		?>

	</div>