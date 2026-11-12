<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$foodcart_theme_data = wp_get_theme();	
	$action  = 'foodcart_theme_init';
	do_action( $action );
	
	define( 'FOODCART_VERSION', ( WP_DEBUG ) ? time() : $foodcart_theme_data->get( 'Version' ) );
	define( 'FOODCART_AUTHOR_URI', $foodcart_theme_data->get( 'AuthorURI' ) );
	define( 'FOODCART_PREFIX', 'foodcart' );

	// DIR
	define( 'FOODCART_BASE_DIR',    get_template_directory(). '/' );
	define( 'FOODCART_INC_DIR',     FOODCART_BASE_DIR . 'inc/' );
	define( 'FOODCART_VIEW_DIR',    FOODCART_INC_DIR . 'views/' );
	define( 'FOODCART_LIB_DIR',     FOODCART_BASE_DIR . 'lib/' );
	define( 'FOODCART_WID_DIR',     FOODCART_INC_DIR . 'widgets/' );
	define( 'FOODCART_PLUGINS_DIR', FOODCART_INC_DIR . 'plugins/' );
	define( 'FOODCART_MODULES_DIR', FOODCART_INC_DIR . 'modules/' );
	define( 'FOODCART_ASSETS_DIR',  FOODCART_BASE_DIR . 'assets/' );
	define( 'FOODCART_CSS_DIR',     FOODCART_ASSETS_DIR . 'css/' );
	define( 'FOODCART_JS_DIR',      FOODCART_ASSETS_DIR . 'js/' );

	// URL
	define( 'FOODCART_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'FOODCART_ASSETS_URL',  FOODCART_BASE_URL . 'assets/' );
	define( 'FOODCART_CSS_URL',     FOODCART_ASSETS_URL . 'css/' );
	define( 'FOODCART_JS_URL',      FOODCART_ASSETS_URL . 'js/' );
	define( 'FOODCART_IMG_URL',     FOODCART_ASSETS_URL . 'img/' );
	define( 'FOODCART_LIB_URL',     FOODCART_BASE_URL . 'lib/' );

	//Other Plugins active or not
	define( 'FOODCART_BBPRESS_IS_ACTIVE', class_exists( 'bbPress' ) );

	// Includes
	require_once FOODCART_INC_DIR . 'helper-functions.php';
	require_once FOODCART_INC_DIR . 'redux-config.php';
	require_once FOODCART_INC_DIR . 'foodcart.php';
	require_once FOODCART_INC_DIR . 'general.php';
	require_once FOODCART_INC_DIR . 'scripts.php';
	require_once FOODCART_INC_DIR . 'template-vars.php';
	require_once FOODCART_INC_DIR . 'sidebar-generator.php';
	require_once FOODCART_MODULES_DIR . 'rt-single-recipe-slider.php';
	require_once FOODCART_MODULES_DIR . 'rt-post-related.php';

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
		require_once FOODCART_INC_DIR . 'woo-functions.php';
		require_once FOODCART_INC_DIR . 'woo-hooks.php';
	}

	// TGM Plugin Activation
	require_once FOODCART_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once FOODCART_INC_DIR . 'tgm-config.php';
	
	add_editor_style( 'style-editor.css' );
	
	add_action( 'woocommerce_single_product_summary', 'set_menu_addto_cart_template', 60 );
	function set_menu_addto_cart_template () {
		global $product;
		if ( 'setmenu' == $product->get_type() ) {
			$template_path = plugin_dir_path( __FILE__ ) . 'templates/';
			// Load the template
			wc_get_template( 'single-product/add-to-cart/setmenu.php',
				'',
				'',
				trailingslashit( $template_path ) );
		}
		
	}

	// Theme Updater
	require_once FOODCART_INC_DIR . 'Lib/updater/theme-updater.php';
