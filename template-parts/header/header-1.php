<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = FoodcartTheme_Helper::nav_menu_args();

// Logo
$foodcart_dark_logo = empty( FoodcartTheme::$options['logo']['url'] ) ? FOODCART_IMG_URL . 'logo-dark.png' : FoodcartTheme::$options['logo']['url'];
$foodcart_light_logo = empty( FoodcartTheme::$options['logo_light']['url'] ) ? FOODCART_IMG_URL . 'logo-light.png' : FoodcartTheme::$options['logo_light']['url'];

// Menu and Icon wrapper classes
$foodcart_icon_count = 0;
if ( FoodcartTheme::$options['search_icon'] ) {
	$foodcart_icon_count++;
}
if ( FoodcartTheme::$options['cart_icon'] && class_exists( 'WooCommerce' ) ) {
	$foodcart_icon_count++;
}
if ( FoodcartTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ) {
	$foodcart_icon_count++;
}

?>
<div class="masthead-container" id="sticker">
	<div class="header-wrap-part">
		<div class="logo-part">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
		</div>
		<div class="menu-part">
			<div id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
		</div>
		<div class="info-part d-flex">
			<?php if ( $foodcart_icon_count ) { ?>
				<?php get_template_part( 'template-parts/header/icon', 'area' );?>
			<?php } ?>
			<?php if ( FoodcartTheme::$options['online_button'] ) { ?>
			<div class="header-button-wrap">
				<div class="header-button">
					<a class="ghost-btn" target="_blank" href="<?php echo esc_url( FoodcartTheme::$options['online_button_link']  );?>"><?php echo esc_html( FoodcartTheme::$options['online_button_text'] );?></a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="rt-sticky-menu-wrapper rt-sticky-menu">
	<div class="sticky-container">
		<div class="header-wrap-part">
			<div class="logo-part">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				</div>
			</div>
			<div class="menu-part">
				<div class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args ); ?>
				</div>
			</div>
			<div class="info-part d-flex">
				<?php if ( $foodcart_icon_count ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'area' );?>
				<?php } ?>
				<?php if ( FoodcartTheme::$options['online_button'] ) { ?>
				<div class="header-button-wrap">
					<div class="header-button">
						<a class="ghost-btn" target="_blank" href="<?php echo esc_url( FoodcartTheme::$options['online_button_link']  );?>"><?php echo esc_html( FoodcartTheme::$options['online_button_text'] );?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>