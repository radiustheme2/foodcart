<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$foodcart_socials = FoodcartTheme_Helper::socials();

$foodcart_dark_logo = empty( FoodcartTheme::$options['logo']['url'] ) ? CLENIX_IMG_URL . 'logo-dark.png' : FoodcartTheme::$options['logo']['url'];

$clenix_addit_info  = ( FoodcartTheme::$options['address'] || FoodcartTheme::$options['phone'] || FoodcartTheme::$options['email'] ) ? true : false;


?>

<div class="additional-menu-area">
	<div class="sidenav">
		<a href="#" class="closebtn">x</a>
		<div class="additional-logo">
			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'topright','container' => '' ) );?>
		<div class="sidenav-address">
			<h4><?php esc_html_e( 'Follow Us', 'foodcart' );?></h4>
			<?php if ( FoodcartTheme::$options['address'] ): ?>
			<span><?php echo wp_kses_post( FoodcartTheme::$options['address'] );?></span>
			<?php endif; ?>
			<?php if ( FoodcartTheme::$options['phone'] ): ?>
			<span><a href="tel:<?php echo esc_attr( FoodcartTheme::$options['phone'] );?>"><?php echo esc_html( FoodcartTheme::$options['phone'] );?></a></span>
			<?php endif; ?>
			<?php if ( FoodcartTheme::$options['email'] ): ?>
			<span><a href="mailto:<?php echo esc_attr( FoodcartTheme::$options['email'] );?>"><?php echo esc_html( FoodcartTheme::$options['email'] );?></a></span>
			<?php endif; ?>
			<?php if ( $foodcart_socials ): ?>
				<div class="sidenav-social">
					<?php foreach ( $foodcart_socials as $foodcart_social ): ?>
						<span><a target="_blank" href="<?php echo esc_url( $foodcart_social['url'] );?>"><i class="fab <?php echo esc_attr( $foodcart_social['icon'] );?>"></i></a></span>
					<?php endforeach; ?>					
				</div>						
			<?php endif; ?>
		</div>
	</div>
	<span class="side-menu-open side-menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</span>
</div>