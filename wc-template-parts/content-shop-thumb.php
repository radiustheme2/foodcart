<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<div class="product-thumb-area">
	<?php
	global $product;
	woocommerce_show_product_loop_sale_flash();?>
	<a href="<?php the_permalink(); ?>"><?php
	woocommerce_template_loop_product_thumbnail();
	?></a>
	<?php if ( FoodcartTheme::$options['wc_product_hover'] ): ?>
		<div class="product-info">
			<ul>
				<?php if ( function_exists( 'YITH_WCQV_Frontend' ) && FoodcartTheme::$options['wc_quickview_icon'] ): ?>
					<li><a href="" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>"><i class="fa fa-search"></i></a></li>
				<?php endif; ?>
				<?php if ( class_exists( 'YITH_WCWL_Shortcode' ) && FoodcartTheme::$options['wc_wishlist_icon'] ) { ?>
					<?php
					$args = array(
						'icon'  => 'none',
						'label' => '',
					);
					?>
					<li><?php echo YITH_WCWL_Shortcode::add_to_wishlist( $args );?></li>
					<li><?php echo do_shortcode( '[yith_compare_button]' ); ?> </li>
				<?php } ?>
			</ul>
		</div>
	<?php endif; ?>
</div>