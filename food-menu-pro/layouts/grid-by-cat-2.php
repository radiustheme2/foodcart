<?php
/**
 * Template: Grid by Category.
 *
 * @package RT_FoodMenuPro
 */

use RT\FoodMenu\Helpers\Fns;
use RT\FoodMenuPro\Helpers\FnsPro;

extract($arg);
$catImgSrc    = null;
$cat_thumb_id = get_term_meta( $term->term_id, 'fmp_cat_thumbnail_id', true );

if ( $taxonomy == 'product_cat' ) {
	$cat_thumb_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
}

if ( $cat_thumb_id ) {
	$catImageS = wp_get_attachment_image_src( $cat_thumb_id, 'large' );
	$catImgSrc = $catImageS[0];
}
?>
<div class="<?php echo esc_attr( $grid . " " . $class ); ?>">	
	<div class="food-menu-box-layout5">
		<div class="item-img">
			<img src="<?php echo esc_url( $catImgSrc ); ?>" alt="icon">
			<h3 class="item-title"><?php echo esc_html($term->name); ?></h3>
		</div>
		<div class="food-list">
				<?php
				$gridQuery = new WP_Query($args);
				if ($gridQuery->have_posts()) {
					echo '<ul class="menu-list">';
					while ($gridQuery->have_posts()) : $gridQuery->the_post();
						$id = get_the_ID();
						$image   = Fns::getFeatureImage( $id, $imgSize, $defaultImgId, $customImgSize );
						$excerpt = Fns::strip_tags_content( get_the_excerpt(), $excerpt_limit );
						$add_to_cart_button = null;
						if ($source == 'product' && $wc == true) {
							$_product = wc_get_product(get_the_ID());
							$price = $_product->get_price_html();
							$pType = $_product->get_type();
							if ($_product->is_purchasable()) {
								if ($_product->is_in_stock()) {
									$add_to_cart_button = sprintf('<a href="%1$s?add-to-cart=%2$d" class="fmp-wc-add-to-cart-btn" data-id="%2$d" data-type="%3$s">%4$s</a>',
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
				<li>				
				<?php if (in_array('title', $items)): ?>
					<h3 class="food-title fmp-title">
						<?php if ($link) { ?>
							<a class="<?php echo esc_attr($anchorClass); ?>"
							   href="<?php the_permalink() ?>"
							   data-id="<?php the_ID() ?>"><?php the_title(); ?></a>
						<?php } else {
							the_title();
						} ?>
					</h3>
				<?php endif; ?>
				<?php if (in_array('excerpt', $items)): ?>
					<p><?php echo wp_kses_post($excerpt); ?></p>
				<?php endif; ?>	
				<?php if (in_array('price', $items)): ?>
					<div class="item-price"><?php echo wp_kses_post($price); ?></div>
				<?php endif; ?>				
				</li>
                <?php
                endwhile;
                echo '</ul>';
					wp_reset_postdata();
				} else {
					echo "<p>" . __("No Menu found.", "foodcart") . "</p>";
				}
            ?>			
		</div>
	</div>
</div>
	
	