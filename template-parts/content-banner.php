<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$foodcart_title = woocommerce_page_title( false );
} else if ( is_404() ) {
	$foodcart_title = FoodcartTheme::$options['error_title'];
} else if ( is_search() ) {
	$foodcart_title = esc_html__( 'Search Results for : ', 'foodcart' ) . get_search_query();
} else if ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$foodcart_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$foodcart_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'foodcart' ) );
	}
} else if ( is_archive() ) {
	$foodcart_title = get_the_archive_title();
} else if ( is_page() ) {
	$foodcart_title = get_the_title();
} else if ( is_single() ) {
	$foodcart_title = get_the_title();
}

if ( FoodcartTheme::$bgtype == 'bgcolor' ) {
	$foodcart_bg = FoodcartTheme::$bgcolor;
} else {
	$foodcart_bg = 'url(' . FoodcartTheme::$bgimg . ') no-repeat scroll center center / cover';
}

if ( !empty( FoodcartTheme::$options['post_banner_title'] ) ){
	$post_banner_title = FoodcartTheme::$options['post_banner_title'];
} else {
	$post_banner_title = esc_html__( 'Our News' , 'foodcart' );
}

?>
<?php if ( FoodcartTheme::$has_banner == '1' || FoodcartTheme::$has_banner == 'on' ): ?>
	<div class="entry-banner" style="background:<?php echo esc_html( $foodcart_bg ); ?>">
		<div class="container">
			<div class="entry-banner-content">
			<?php 
			if ( is_single() ) { ?>
				<h1 class="entry-title"><?php echo wp_kses_post( $foodcart_title );?></h1>
				<?php } else if ( is_page() ) { ?>
					<h1 class="entry-title"><?php echo wp_kses_post( $foodcart_title );?></h1>
				<?php } else { ?>
					<h1 class="entry-title"><?php echo wp_kses_post( $foodcart_title );?></h1>
				<?php } ?>
				<?php if ( FoodcartTheme::$has_breadcrumb == '1' || FoodcartTheme::$has_breadcrumb == 'on' ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php endif; ?>