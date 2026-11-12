<?php 
/**
 * Template: Capsul card Menu.
 *
 * @package RT_FoodMenuPro
 */

 use RT\FoodMenu\Helpers\Fns;
 use RT\FoodMenuPro\Helpers\FnsPro;

extract( $arg );
$class .= " fmp-item-" . $pID;
?>
	<div class="rc-carousel owl-nav-layout2" id="quantity-holder" data-loop="true" data-items="2" data-margin="30" data-autoplay="false"
	data-autoplay-timeout="5000" data-smart-speed="700" data-dots="false" data-nav="true" data-nav-speed="false"
	data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true"
	data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
	data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="2" data-r-large-nav="true" data-r-large-dots="false">
	
		<div class="food-menu-box-content">
			<div class="food-menu-heading">
				<h3 class="item-title"><?php echo esc_html($term->name); ?></h3>
			</div>
			<?php
			$gridQuery = new WP_Query( $args );
			if ( $gridQuery->have_posts() ) {
				while ( $gridQuery->have_posts() ) : $gridQuery->the_post();
					$id      = get_the_ID();
					$image   = Fns::getFeatureImage( $id, $imgSize, $defaultImgId, $customImgSize );
					$excerpt = Fns::strip_tags_content( get_the_excerpt(), $excerpt_limit );
					//$price   = FMP()->fmpHtmlPrice( $id );
					$price = FnsPro::fmpHtmlPrice( $id );
			?>
			<div class="media media-none--sm">
				<div class="item-img">
					<?php if ( $link ) { ?>
						<a class="<?php echo esc_attr( $anchorClass ); ?>" href="<?php echo esc_url( $pLink ); ?>"
						   data-id="<?php echo esc_attr( absint( $pID )); ?>"><?php echo wp_kses_post( $args['img'] ) ; ?></a>
					<?php } ?>
				</div>
				<div class="media-body space-md">
					<h3 class="food-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>					
					<?php if( in_array('excerpt', $items ) ): ?>
					<p><?php echo esc_html( $excerpt ); ?></p>
					<?php endif; ?>
					<div class="item-price"><?php echo wp_kses_post($price); ?></div>
					<ul class="action-area">
						<li>
							<div class="input-group quantity-holder">
								<input type="text" name='quantity' class="form-control quantity-input" value="1" placeholder="1">
								<div class="input-group-btn">
									<button class="quantity-btn quantity-plus" type="button">
										<i class="fas fa-plus" aria-hidden="true"></i>
									</button>
									<button class="quantity-btn quantity-minus" type="button">
										<i class="fas fa-minus" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</li>
						<li>
						<?php if ( in_array( 'add_to_cart', $items ) && $add_to_cart_button ): ?>
							<?php echo wp_kses_post( $add_to_cart_button ); ?>
						<?php endif; ?>
						</li>
					</ul>
				</div>
			</div>
		<?php
				endwhile;
			} else { ?>
				<p><?php esc_html_e( 'No item found', 'foodcart' );?></p>
		<?php }	wp_reset_postdata(); ?>
			
		</div>		
	</div>
	
<?php ?>