<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = FoodcartTheme_Helper::nav_menu_args();
$foodcart_socials = FoodcartTheme_Helper::socials();

// Logo
$foodcart_dark_logo = empty( FoodcartTheme::$options['logo']['url'] ) ? FOODCART_IMG_URL . 'logo-dark.png' : FoodcartTheme::$options['logo']['url'];
$foodcart_light_logo = empty( FoodcartTheme::$options['logo_light']['url'] ) ? FOODCART_IMG_URL . 'logo-light.png' : FoodcartTheme::$options['logo_light']['url'];

// Menu and Icon wrapper classes
$foodcart_icon_count = 0;
if ( FoodcartTheme::$options['search_icon'] ) {
	$foodcart_icon_count++;
}
if ( FoodcartTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) {
	$foodcart_icon_count++;
}

switch ( $foodcart_icon_count ) {
	case 1:
	case 2:
	$foodcart_menu_class = 'col-sm-10 col-xs-12';
	$foodcart_icon_class = 'col-sm-2 col-xs-12';
	break;
	case 3:
	$foodcart_menu_class = 'col-sm-10 col-xs-12';
	$foodcart_icon_class = 'col-sm-2 col-xs-12';
	break;	
	default:
	$foodcart_menu_class = 'col-sm-12 col-xs-12';
	break;
}

$foodcart_logo_col_num = (int) FoodcartTheme::$options['logo_width'];

$foodcart_logo_class = "col-sm-{$foodcart_logo_col_num} col-xs-12";
$foodcart_menu_class = 'col-sm-'. ( 12 - $foodcart_logo_col_num ) . ' col-xs-12';
?>
<div class="masthead-container" id="sticker">
	<div class="row header-firstrow">
		<div class="<?php echo esc_attr( $foodcart_logo_class );?>">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
			</div>
		</div>
		<div class="<?php echo esc_attr( $foodcart_menu_class );?> d-flex justify-content-end">
			<div id="site-navigation" class="main-navigation mobile-display-fix">
				<?php wp_nav_menu( $nav_menu_args );?>
			</div>
			<?php if ( FoodcartTheme::$options['phone'] ) { ?>
			<div class="header-button-wrap">
				<div class="header-button">
					<a class="ghost-btn" href="tel:<?php echo esc_attr( FoodcartTheme::$options['phone'] );?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( FoodcartTheme::$options['phone'] );?></a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $foodcart_icon_count ): ?>
				<?php get_template_part( 'template-parts/header/icon-menu', 'area' );?>
			<?php endif; ?>
		</div>
	</div>
</div>
