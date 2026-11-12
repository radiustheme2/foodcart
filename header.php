<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
		// Preloader
		if ( FoodcartTheme::$options['preloader'] == '1' ){ 
			if ( !empty( FoodcartTheme::$options['preloader_image']['url'] ) ) {
				$preloader_img = FoodcartTheme::$options['preloader_image']['url'];
				echo '<div id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
			}
			else { ?>
			<div id="preloader">
				<div class="preloader-wrap">
					<div class="preloader-content">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<?php }			
		}
	?>
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'foodcart' ); ?></a>		
		<header id="masthead" class="site-header">			
			<div id="header-<?php echo esc_attr( FoodcartTheme::$header_style ); ?>" class="header-area header-fixed ">
				<?php if ( FoodcartTheme::$top_bar == 1 || FoodcartTheme::$top_bar == 'on' ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', FoodcartTheme::$top_bar_style ); ?>
				<?php } ?>
				
				<?php if ( FoodcartTheme::$header_opt == 1 || FoodcartTheme::$header_opt == 'on' ){ ?>
				<?php get_template_part( 'template-parts/header/header', FoodcartTheme::$header_style ); ?>
				<?php } ?>
			</div>
		</header>
		<div id="meanmenu"></div>

		<div id="header-area-space"></div>
		<div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <?php get_search_form(); ?>
        </div>
		<div id="content" class="site-content">	
			<?php
				if ( FoodcartTheme::$has_banner == '1' || FoodcartTheme::$has_banner == 'on' ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>