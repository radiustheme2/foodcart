<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'foodcart_register_required_plugins' );
function foodcart_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Foodcart Core',
			'slug'         => 'foodcart-core',
			'source'       => 'foodcart-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.3'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '1.15'
		),
		array(
			'name'     => 'Food Menu',
			'slug'     => 'tlp-food-menu',
			'required' => true,
		),
		array(
			'name'         => 'Food Menu Pro',
			'slug'         => 'food-menu-pro',
			'source'       => 'food-menu-pro.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '6.0.7'
		),
		array(
			'name'         => 'LayerSlider WP',
			'slug'         => 'LayerSlider',
			'source'       => 'LayerSlider.zip',
			'required'     => false,
			'external_url' => 'https://layerslider.kreaturamedia.com',
			'version'      => '8.4.1'
		),
		
		// Repository
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'Redux Framework',
			'slug'     => 'redux-framework',
			'required' => true,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'YITH WooCommerce Compare',
			'slug'     => 'yith-woocommerce-compare',
			'required' => false,
		),	
		array(
			'name'     => 'YITH WooCommerce Quick View',
			'slug'     => 'yith-woocommerce-quick-view',
			'required' => false,
		),
		array(
			'name'     => 'YITH WooCommerce Wishlist',
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => false,
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => 'MailChimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),	
		array(
			'name'     => 'Instagram Feed',
			'slug'     => 'instagram-feed',
			'required' => false,
		),
		array(
			'name'     => 'Easy Demo Importer',
			'slug'     => 'easy-demo-importer',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'foodcart',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => FOODCART_PLUGINS_DIR,       // Default absolute path to bundled plugins.
		'menu'         => 'foodcart-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}