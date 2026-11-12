<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$foodcart_socials = FoodcartTheme_Helper::socials();
$nav_menu_args   = FoodcartTheme_Helper::nav_menu_args();

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

if ( !empty( FoodcartTheme::$options['online_button']) ){
$foodcart_header_button = 'col-lg-10';
} else {
$foodcart_header_button = 'col-lg-12';
}
?>
<div class="masthead-container" id="sticker">
	<div class="container">
		<div class="header-top">
			<div class="row d-flex align-items-center">
				<div class="col-lg-4">
					<ul class="phone-no">
					<?php if ( FoodcartTheme::$options['phone'] ) { ?>
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i><span><?php esc_html_e( 'Call Us: ', 'foodcart' ); ?></span><a href="tel:<?php echo esc_attr( FoodcartTheme::$options['phone'] );?>"><?php echo esc_html( FoodcartTheme::$options['phone'] );?></a>
						</li>
					<?php } ?>
					</ul>
				</div>
				<div class="col-lg-4 d-flex justify-content-center">
					<div class="site-branding">
						<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
						<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
					</div>
				</div>
				<div class="col-lg-4 d-flex justify-content-end">
					<?php if ( $foodcart_icon_count ) { ?>
						<?php get_template_part( 'template-parts/header/icon', 'area' );?>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="header-bottom">	
			<div class="row no-gutters d-flex align-items-center">
				<div class="<?php echo esc_attr( $foodcart_header_button ); ?>">
					<div id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( $nav_menu_args );?>
					</div>
				</div>
				<?php if ( FoodcartTheme::$options['online_button'] ) { ?>
				<div class="col-lg-2">					
					<div class="header-button-wrap">
						<div class="header-button">
							<a class="ghost-btn" target="_blank" href="<?php echo esc_url( FoodcartTheme::$options['online_button_link']  );?>"><?php echo esc_html( FoodcartTheme::$options['online_button_text'] );?></a>
						</div>
					</div>					
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="rt-sticky-menu-wrapper rt-sticky-menu">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="<?php echo esc_attr( $foodcart_header_button ); ?>">
				<div class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<?php if ( FoodcartTheme::$options['online_button'] ) { ?>
			<div class="col-lg-2">					
				<div class="header-button-wrap">
					<div class="header-button">
						<a class="ghost-btn" target="_blank" href="<?php echo esc_url( FoodcartTheme::$options['online_button_link']  );?>"><?php echo esc_html( FoodcartTheme::$options['online_button_text'] );?></a>
					</div>
				</div>					
			</div>
			<?php } ?>
		</div>
	</div>
</div>