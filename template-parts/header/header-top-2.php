<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$foodcart_socials = FoodcartTheme_Helper::socials();
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="row">
		
			<div class="col-sm-12">
				<div class="tophead-contact">
					<ul>
						<?php if ( FoodcartTheme::$options['phone'] ): ?>
							<li>
								<i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( FoodcartTheme::$options['phone'] );?>"><?php echo esc_html( FoodcartTheme::$options['phone'] );?></a>
							</li>
						<?php endif; ?>
						<?php if ( FoodcartTheme::$options['email'] ): ?>
							<li>
								<i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( FoodcartTheme::$options['email'] );?>"><?php echo esc_html( FoodcartTheme::$options['email'] );?></a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="tophead-right">
					<?php if ( $foodcart_socials ): ?>
						<ul class="tophead-social">
							<?php foreach ( $foodcart_socials as $foodcart_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $foodcart_social['url'] );?>"><i class="fab <?php echo esc_attr( $foodcart_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
