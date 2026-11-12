<?php
$foodcart_footer_column = 1;
switch ( $foodcart_footer_column ) {
	case '1':
	$foodcart_footer_class = 'col-lg-12 col-sm-12 col-12';
	break;
	case '2':
	$foodcart_footer_class = 'col-lg-6 col-sm-6 col-12';
	break;
	case '3':
	$foodcart_footer_class = 'col-lg-4 col-sm-4 col-12';
	break;		
	default:
	$foodcart_footer_class = 'col-lg-3 col-sm-6 col-12';
	break;
}
// Logo
$foodcart_light_logo = empty( FoodcartTheme::$options['footer_logo_light']['url'] ) ? FOODCART_IMG_URL . 'logo-light.png' : FoodcartTheme::$options['footer_logo_light']['url'];
$foodcart_socials = FoodcartTheme_Helper::socials();
?>


<?php if ( FoodcartTheme::$footer_area == 1 || FoodcartTheme::$footer_area == 'on' ){ ?>
		<div class="footer-top-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="footer-logo"><a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $foodcart_light_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a></div>
					</div>
					<div class="col-md-6">
						<?php
							for ( $i = 1; $i <= $foodcart_footer_column; $i++ ) {
								echo '<div class="' . $foodcart_footer_class . '">';
								dynamic_sidebar( 'footer-style-3' );
								echo '</div>';
							}
						?>
					</div>
					<div class="col-md-3">
						<div class="footer-social">
						<?php if ( $foodcart_socials ): ?>
							<ul class="tophead-social">
								<?php foreach ( $foodcart_socials as $foodcart_social ): ?>
									<li><a target="_blank" href="<?php echo esc_url( $foodcart_social['url'] );?>"><i class="fab <?php echo esc_attr( $foodcart_social['icon'] );?>"></i></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php } ?>

<?php if ( FoodcartTheme::$copyright_area == 1 || FoodcartTheme::$copyright_area == 'on' ) { ?>
	<div class="footer-bottom-area">
		<div class="container">
			<div class="copyright"><?php echo wp_kses_post( FoodcartTheme::$options['copyright_text'] );?></div>
		</div>
	</div>
<?php } ?>