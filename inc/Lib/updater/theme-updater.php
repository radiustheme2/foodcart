<?php
/**
 * @author  RadiusTheme
 * @since   1.0.1
 * @version 1.0.1
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

add_action( 'after_setup_theme', 'rt_edd_theme_updater', 20 );

function rt_edd_theme_updater(){
	$theme_data = wp_get_theme( get_template() );

	// Config settings
	$config = array(
		'remote_api_url' => 'https://www.radiustheme.com', // Site where EDD is hosted
		'item_id'        => 101073, // ID of item in site where EDD is hosted
		'theme_slug'     => '_rt_foodcart', // Theme slug
		'version'        => $theme_data->get( 'Version' ), // The current version of this theme
		'author'         => $theme_data->get( 'Author' ), // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '' // Optional, allows for a custom license renewal link
	);

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'foodcart' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'foodcart' ),
		'license-key'               => __( 'License Key', 'foodcart' ),
		'license-action'            => __( 'License Action', 'foodcart' ),
		'deactivate-license'        => __( 'Deactivate License', 'foodcart' ),
		'activate-license'          => __( 'Activate License', 'foodcart' ),
		'status-unknown'            => __( 'License status is unknown.', 'foodcart' ),
		'renew'                     => __( 'Renew?', 'foodcart' ),
		'unlimited'                 => __( 'unlimited', 'foodcart' ),
		'license-key-is-active'     => __( 'License key is active.', 'foodcart' ),
		'expires%s'                 => __( 'Expires %s.', 'foodcart' ),
	);

	// Loads the updater classes
	$updater = new EDD_Theme_Updater_Admin( $config, $strings );
}
