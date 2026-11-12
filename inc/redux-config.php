<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! class_exists( 'Redux' ) ) {
    return;
}
add_action('init', function (){

});

$opt_name = 'foodcart';

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Foodcart Options', 'foodcart' ),
	
    'page_title'           => esc_html__( 'Foodcart Options', 'foodcart' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,   // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-menu',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off'  => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'foodcart-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::set_args( $opt_name, $args );

// Fields
Redux::set_section( $opt_name, array(
    'title'            => esc_html__( 'General', 'foodcart' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Primary Color', 'foodcart' ),
            'subtitle' => esc_html__( 'Theme Default: #e30025', 'foodcart' ),
            'default'  => '#e30025',
        ),
		array(
            'id'       => 'secondary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Secondary Color', 'foodcart' ),
            'subtitle' => esc_html__( 'Theme Default: #f89f24', 'foodcart' ),
            'default'  => '#f89f24',
        ),
        array(
            'id'       => 'container_width',
            'type'     => 'select',
            'title'    => esc_html__( 'Container width( Bootstrap Grid )', 'foodcart'), 
            'subtitle' => esc_html__( 'Bootstrap Grid Container Width size for site.', 'foodcart' ),
            'options'  => array(
                '1350' => esc_html__( '1350px', 'foodcart' ),
                '1240' => esc_html__( '1240px', 'foodcart' ),
                '1140' => esc_html__( '1140px', 'foodcart' ),
            ),
            'default'  => '1240',
        ),
        array(
            'id'       => 'preloader',
            'type'     => 'switch',
            'title'    => esc_html__( 'Preloader', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => false,
        ),
        array(
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Preloader Image', 'foodcart' ),
            'subtitle' => esc_html__( 'Please upload your choice of preloader image. Transparent GIF format is recommended', 'foodcart' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'preloader.gif'
            ),
            'required' => array( 'preloader', 'equals', true )
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => esc_html__( 'Back to Top Arrow', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'display_no_preview_image',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display No Preview Image on Blog/Archive', 'foodcart' ),
			'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'display_no_prev_img_related_post',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display No Preview Image on Related Post', 'foodcart' ),
			'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'no_preview_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Alternative Preview Image', 'foodcart' ),
            'subtitle' => esc_html__( 'This image will be used as preview image in some archive pages if no featured image exists', 'foodcart' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'noimage.jpg'
            ),
			'required' => array( 'display_no_preview_image', 'equals', true )
        ),
		array(
			'id'       => 'team_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Team Slug', 'foodcart' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Team breadcrumb', 'foodcart' ),
			'default'  => 'team',
		),
		array(
			'id'       => 'recipe_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Recipe Slug', 'foodcart' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Recipe breadcrumb', 'foodcart' ),
			'default'  => 'recipe',
		),
		array(
			'id'       => 'testimonial_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Testimonial Slug', 'foodcart' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Testimonial breadcrumb', 'foodcart' ),
			'default'  => 'testimonial',
		),
		array(
			'id'       => 'gallery_slug',
			'type'     => 'text',
			'title'    =>  esc_html__( 'Gallery Slug', 'foodcart' ),
			'subtitle' =>  esc_html__( 'Will be used as slug in Gallery breadcrumb', 'foodcart' ),
			'default'  => 'gallery',
		),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Contact & Socials', 'foodcart' ),
    'id'               => 'socials_section',
    'heading'          => '',
    'desc'             => esc_html__( 'In case you want to hide any field, keep that field empty', 'foodcart' ),
    'icon'             => 'el el-twitter',
    'fields' => array(
        array(
            'id'       => 'phone',
            'type'     => 'text',
            'title'    => esc_html__( 'Phone', 'foodcart' ),
            'default'  => '',
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => esc_html__( 'Email', 'foodcart' ),
            'validate' => 'email',
            'default'  => '',
        ),
        array(
            'id'       => 'address',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Address', 'foodcart' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => esc_html__( 'Facebook', 'foodcart' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => esc_html__( 'Twitter', 'foodcart' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => esc_html__( 'Linkedin', 'foodcart' ),
            'default'  => ''
        ),
		array(
            'id'       => 'social_behance',
            'type'     => 'text',
            'title'    => esc_html__( 'Behance', 'foodcart' ),
            'default'  => '',
        ),
		array(
            'id'       => 'social_dribbble',
            'type'     => 'text',
            'title'    => esc_html__( 'Dribbble', 'foodcart' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => esc_html__( 'Youtube', 'foodcart' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => esc_html__( 'Pinterest', 'foodcart' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => esc_html__( 'Instagram', 'foodcart' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_skype',
            'type'     => 'text',
            'title'    => esc_html__( 'Skype', 'foodcart' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_rss',
            'type'     => 'text',
            'title'    => esc_html__( 'RSS', 'foodcart' ),
            'default'  => '',
        ),
    )            
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header', 'foodcart' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Main Logo', 'foodcart' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'logo.png'
            ),
            'subtitle' => esc_html__( 'Logo height less than 90px is recommended', 'foodcart' ),
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__( 'Light Logo', 'foodcart' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html__( 'Used when Transparent Header is enabled. Logo height less than 90px is recommended', 'foodcart' ),
        ),
        array(
            'id'       => 'logo_width',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Area Width', 'foodcart'), 
            'subtitle' => esc_html__( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'foodcart' ),
            'options'  => array(
                '1' => esc_html__( '1 Column', 'foodcart' ),
                '2' => esc_html__( '2 Column', 'foodcart' ),
                '3' => esc_html__( '3 Column', 'foodcart' ),
                '4' => esc_html__( '4 Column', 'foodcart' ),
            ),
            'default'  => '2',
        ),
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Sticky Header', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
            'subtitle' => esc_html__( 'Show header when scroll down', 'foodcart' ),
        ),
        array(
            'id'       => 'tr_header',
            'type'     => 'switch',
            'title'    => esc_html__( 'Transparent Header', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You have to enable Banner or Slider in page to make it work properly. You can override this settings in individual pages', 'foodcart' ),
        ),
		array(
            'id'       => 'header_opt',
            'type'     => 'switch',
            'title'    => esc_html__( 'Header On/Off', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'foodcart' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'switch',
            'title'    => esc_html__( 'Top Bar', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => false,
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'foodcart' ),
        ),
        array(
            'id'       => 'top_bar_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Text Color', 'foodcart' ),
            'default'  => '#444444',
        ),
		array(
            'id'       => 'top_baricon_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Icon Color', 'foodcart' ),
            'default'  => '#444444',
        ),
        array(
            'id'       => 'top_bar_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Text Color', 'foodcart' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'foodcart' ),
            'default'  => '#efefef',
        ),
		array(
            'id'       => 'top_baricon_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Top Bar Icon Color', 'foodcart' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'foodcart' ),
            'default'  => '#efefef',
        ),
        array(
            'id'       => 'top_bar_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Top Bar Background Color', 'foodcart' ),
            'default'  => '#f8f8f8',
        ),
        array(
            'id'       => 'top_bar_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Top Bar Layout', 'foodcart' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'top1.png',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'top2.png',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'top3.png',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'foodcart' ),
        ),
        array(
            'id'       => 'header_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Header Layout', 'foodcart' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-3.jpg',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-4.jpg',
                ),
				'5' => array(
                    'title' => '<b>'. esc_html__( 'Layout 5', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-5.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'foodcart' ),
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Search Icon', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Cart Icon', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
        ),
		array(
			'id'       => 'vertical_menu_icon',
			'type'     => 'switch',
			'title'    =>  esc_html__( 'Vertical Menu Icon', 'foodcart' ),
			'on'       =>  esc_html__( 'Enabled', 'foodcart' ),
			'off'      =>  esc_html__( 'Disabled', 'foodcart' ),
			'default'  => false,
		),
		array(
			'id'       => 'online_button',
			'type'     => 'switch',
			'title'    =>  esc_html__( 'Online Button', 'foodcart' ),
			'on'       =>  esc_html__( 'Enabled', 'foodcart' ),
			'off'      =>  esc_html__( 'Disabled', 'foodcart' ),
			'default'  => true,
		),
		array(
			'id'       => 'online_button_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Text', 'foodcart' ),
			'default'  => esc_html__( 'Order Online', 'foodcart' ),
			'required' => array( 'online_button', '=', true )
		),
		array(
			'id'       => 'online_button_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'foodcart' ),
			'default'  => '#',
			'required' => array( 'online_button', '=', true )
		),
		
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Main Menu', 'foodcart' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'section-mainmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Main Menu Items', 'foodcart' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Menu Font', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align' => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' 	 => 'Roboto',
                'google'      	 => true,
                'font-size'   	 => '16px',
                'font-weight' 	 => '500',
                'line-height' 	 => '22px',
                'text-transform' => 'capitalize',
            ),
        ),
        array(
            'id'       => 'menu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Color', 'foodcart' ),
            'default'  => '#2d2d2d',
        ),
		/*menu background color for header style 6,7,8 */
        array(
            'id'       => 'menu_bgcolor_6',
            'type'     => 'color',
            'title'    => esc_html__('Menu Background Color', 'foodcart'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#111111',
			'required' => array( 
				array('header_style','equals','6')
			)
        ),
        array(
            'id'       => 'menu_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Transparent Menu Color', 'foodcart' ),
            'subtitle' => esc_html__( 'Applied when Transparent Header is enabled', 'foodcart' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'menu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Menu Hover Color', 'foodcart' ),
            'default'  => '#e30025',
        ),
        array(
            'id'       => 'section-submenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Sub Menu Items', 'foodcart' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'submenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Submenu Font', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '500',
                'line-height' => '22px',
                'text-transform' => 'inherit',
            ),
        ),
        array(
            'id'       => 'submenu_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Color', 'foodcart' ),
            'default'  => '#424242',
        ), 
        array(
            'id'       => 'submenu_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Background Color', 'foodcart' ),
            'default'  => '#ffffff',
        ),  
        array(
            'id'       => 'submenu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Color', 'foodcart' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'submenu_hover_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Submenu Hover Background Color', 'foodcart' ),
            'default'  => '#e30025',
        ),
        array(
            'id'       => 'section-resmenu',
            'type'     => 'section',
            'title'    => esc_html__( 'Mobile Menu', 'foodcart' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'resmenu_width',
            'type'     => 'slider',
            'title'    => esc_html__( 'Screen width in which mobile menu activated', 'foodcart' ),
            'subtitle' => esc_html__( 'Recommended value is: 992', 'foodcart' ),
            'default'  => 992,
            'min'      => 0,
            'step'     => 1,
            'max'      => 2000,
        ),
        array(
            'id'       => 'resmenu_typo',
            'type'     => 'typography',
            'title'    => esc_html__( 'Mobile Menu Font', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'text-transform' => true,
            'default'     => array(
				'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '15px',
                'font-weight' => '500',
                'line-height' => '22px',
                'text-transform' => 'inherit',				
            ),
        ),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Banner', 'foodcart' ),
    'id'               => 'banner_section',
    'heading'          => '',
    'icon'             => 'el el-picture',
    'fields' => array(
        array(
            'id'       => 'banner_heading_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Banner Heading Color', 'foodcart' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_active',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Breadcrumb', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
        ),
		array(
			'id'       => 'breadcrumbs_delimiter',
			'type'     => 'text',
			'title'    => esc_html__( 'Breadcrumbs Delimiter', 'foodcart' ),
			'default'  => ' - ',
		),
        array(
            'id'       => 'breadcrumb_hide_mobile',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show/Hide Breadcrumb in mobile', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => false,
        ),		
        array(
            'id'       => 'breadcrumb_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Color', 'foodcart' ),
            'default'  => '#cccccc',
        ),
        array(
            'id'       => 'breadcrumb_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Link Hover Color', 'foodcart' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_active_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Active Breadcrumb Color', 'foodcart' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_seperator_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Breadcrumb Seperator Color', 'foodcart' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'banner_bg_opacity',
            'type'     => 'text',
            'title'    => esc_html__( 'Banner Background Overlay opacity', 'foodcart' ),
            'default'  => '0.2',
        ),
        array(
            'id'       => 'banner_top_padding',
            'type'     => 'text',
            'title'    => esc_html__( 'Banner Top Gap ( Top Padding ) ', 'foodcart' ),
            'default'  => '100',
        ),
        array(
            'id'       => 'banner_bottom_padding',
            'type'     => 'text',
            'title'    => esc_html__( 'Banner Bottom Gap ( Bottom Padding ) ', 'foodcart' ),
            'default'  => '100',
        ),
		

    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer', 'foodcart' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
		/*main footer part*/
		array( 
            'id'       => 'footer_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Footer Layout', 'foodcart' ),
            'default'  => '2',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-3.jpg',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html__( 'Layout 4', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-4.jpg',
                ),
                '5' => array(
                    'title' => '<b>'. esc_html__( 'Layout 5', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-5.jpg',
                ),
            ),
            'subtitle' => esc_html__( 'You can override this settings in individual pages', 'foodcart' ),
        ),				
        array(
            'id'       => 'section-footer-area',
            'type'     => 'section',
            'title'    => esc_html__( 'Footer Area', 'foodcart' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'footer_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Footer Area', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'footer_column_2',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns for Footer 2', 'foodcart' ),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '3',
            'required' => array( 'footer_style', 'equals', '2' )
        ),
        array(
            'id'       => 'footer_column_4',
            'type'     => 'select',
            'title'    => esc_html__( 'Number of Columns for Footer 4', 'foodcart' ),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '3',
            'required' => array( 'footer_style', 'equals', '4' )
        ),
        array(
            'id'       => 'footer_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Background Color', 'foodcart' ),
            'default'  => '#1b1d1f',
            'required' => array( 'footer_area', 'equals', true ),
        ),
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Title Text Color', 'foodcart' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Text Color', 'foodcart' ),
            'default'  => '#d9d9d9',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Color', 'foodcart' ),
            'default'  => '#d9d9d9',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Footer Body Link Hover Color', 'foodcart' ),
            'default'  => '#f89f24',
            'required' => array( 'footer_area', 'equals', true )
        ),		
        array(
            'id'       => 'footer_logo_light',
            'type'     => 'media',
            'title'    => esc_html__( 'Footer Logo', 'foodcart' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html__( 'Logo height less than 90px is recommended', 'foodcart' ),
			'required' => array( 'footer_area', 'equals', true )
        ),
        array(
            'id'       => 'section-copyright-area',
            'type'     => 'section',
            'title'    => esc_html__( 'Copyright Area', 'foodcart' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'copyright_area',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Copyright Area', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'copyright_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Background Color', 'foodcart' ),
            'default'  => '#111111',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html__( 'Copyright Text Color', 'foodcart' ),
            'default'  => '#d9d9d9',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Copyright Text', 'foodcart' ),
            'default'  => '&copy; Copyright Foodcart ' . date_i18n( 'Y' ) . '. Designed and Developed by RadiusTheme',
            'required' => array( 'copyright_area', 'equals', true )
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Typography', 'foodcart' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => esc_html__( 'Body', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '400',
                'line-height' => '28px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h1', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Bitter',
                'google'      => true,
                'font-size'   => '32px',
                'font-weight' => '700',
                'line-height'   => '38px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h2', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Bitter',
                'google'      => true,
                'font-size'   => '26px',
                'font-weight' => '700',
                'line-height' => '34px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h3', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Bitter',
                'google'      => true,
                'font-size'   => '22px',
                'font-weight' => '700',
                'line-height' => '30px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h4', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Bitter',
                'google'      => true,
                'font-size'   => '20px',
                'font-weight' => '700',
                'line-height' => '28px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h5', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Bitter',
                'google'      => true,
                'font-size'   => '18px',
                'font-weight' => '700',
                'line-height' => '26px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => esc_html__( 'Header h6', 'foodcart' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Bitter',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '700',
                'line-height' => '24px',
            ),
        ),
    )
) );

// Generate Common post type fields 
function foodcart_redux_post_type_fields( $prefix ){
    return array(
        array(
            'id'       => $prefix. '_layout',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Layout', 'foodcart' ),
            'options'  => array(
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'foodcart' ),
                'full-width'    => esc_html__( 'Full Width', 'foodcart' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'foodcart' ),
            ),
            'default' => 'right-sidebar'
        ),		
        array(
            'id'       => $prefix. '_sidebar',
            'type'     => 'select',
            'title'    => __( 'Custom Sidebar', 'foodcart' ),
            'options'  => FoodcartTheme_Helper::custom_sidebar_fields(),
            'default'  => 'sidebar',
            'required' => array( $prefix. '_layout', '!=', 'full-width' ),
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Top', 'foodcart' ),
            'validate'  => 'numeric',
            'default' => '100',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html__( 'Content Padding Bottom', 'foodcart' ),
            'validate'  => 'numeric',
            'default' => '100'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => esc_html__( 'Banner', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__( 'Breadcrumb', 'foodcart' ),
            'on'       => esc_html__( 'Enabled', 'foodcart' ),
            'off'      => esc_html__( 'Disabled', 'foodcart' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Banner Background Type', 'foodcart' ),
            'options'  => array(
                'bgimg'    => esc_html__( 'Background Image', 'foodcart' ),
                'bgcolor'  => esc_html__( 'Background Color', 'foodcart' ),
            ),
            'default' => 'bgimg',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => esc_html__( 'Banner Background Image', 'foodcart' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'banner.jpg'
            ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ),
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => esc_html__('Banner Background Color', 'foodcart'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#606060',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
        array(
            'id'       => $prefix. '_page_bgimg',
            'type'     => 'media',
            'title'    => esc_html__( 'Page/Post Background Image', 'foodcart' ),
            'default'  => array(
                'url'=> '',
            ),
        ),
        array(
            'id'       => $prefix. '_page_bgcolor',
            'type'     => 'color',
            'title'    => esc_html__('Page/Post Background Color', 'foodcart'), 
            'validate' => 'color',
            'transparent' => true,
            'default' => '#ffffff',
        ),
    );
}

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Layout Defaults', 'foodcart' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$foodcart_page_fields = foodcart_redux_post_type_fields( 'page' );
$foodcart_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Page', 'foodcart' ),
	'id'               => 'pages_section',
	'subsection' => true,
	'fields' => $foodcart_page_fields
	) );

//Post Archive
$foodcart_post_archive_fields = foodcart_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Blog / Archive', 'foodcart' ),
	'id'         => 'blog_section',
	'subsection' => true,
	'fields' 	 => $foodcart_post_archive_fields
	) );

// Single Post
$foodcart_single_post_fields = foodcart_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Post Single', 'foodcart' ),
	'id'         => 'single_post_section',
	'subsection' => true,
	'fields' 	 => $foodcart_single_post_fields          
	) );

// Food Menu Single
$food_menu_fields = array(
    array(
        'id'       => 'related_food_menu',
        'type'     => 'switch',
        'title'    => esc_html__( 'Related Food Menu', 'foodcart' ),
        'on'       => esc_html__( 'Show', 'foodcart' ),
        'off'      => esc_html__( 'Hide', 'foodcart' ),
        'default'  => true,
    ),	
    array(
        'id'       => 'stock_available_display',
        'type'     => 'switch',
        'title'    => esc_html__( 'Display Stock Available', 'foodcart' ),
        'on'       => esc_html__( 'Show', 'foodcart' ),
        'off'      => esc_html__( 'Hide', 'foodcart' ),
        'default'  => true,
    ),
);
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Food Menu Single', 'foodcart' ),
    'id'         => 'food_menu_section',
    'subsection' => true,
    'fields' 	 => $food_menu_fields
    )
);
// Single Team
$foodcart_team_fields = foodcart_redux_post_type_fields( 'team' );
unset($foodcart_team_fields[0]);
unset($foodcart_team_fields[1]);
$foodcart_team_fields[2]['default'] = 'full-width';
Redux::setSection( $opt_name,
    array(
    'title'         =>  esc_html__( 'Single Team', 'foodcart' ),
    'id'            => 'single_team_section',
    'subsection'    => true,
    'fields'        => $foodcart_team_fields           
    )
);

//Recipe
$foodcart_recipe_fields = foodcart_redux_post_type_fields( 'recipe' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Single Recipe', 'foodcart' ),
	'id'         => 'recipe_section',
	'subsection' => true,
	'fields' 	 => $foodcart_recipe_fields
	) );

// Search
$foodcart_search_fields = foodcart_redux_post_type_fields( 'search' );

$excerpt_length = array (
	array(
		'id'       => 'search_excerpt_length',
		'type'     => 'text',
		'title'    => esc_html__( 'Search Excerpt Length', 'foodcart' ),
		'validate'  => 'numeric',
		'default' => '25',
	)       
);
$foodcart_search_field_2 = array_merge ( $foodcart_search_fields , $excerpt_length );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Search Layout', 'foodcart' ),
	'id'         => 'search_section',
	'heading'    => '',
	'subsection' => true,
	'fields' 	 => $foodcart_search_field_2
));

// Error 404 Layout
$foodcart_error_fields = foodcart_redux_post_type_fields( 'error' );
unset($foodcart_error_fields[0]);
$foodcart_error_fields[2]['default'] = 'full-width';
$foodcart_error_fields[2]['default'] = '120';
$foodcart_error_fields[3]['default'] = '120';
Redux::setSection( $opt_name, array(
    'title'   	 => esc_html__( 'Error 404 Layout', 'foodcart' ),
    'id'      	 => 'error_section',
    'heading' 	 => '',
    'subsection' => true,
    'fields'  	 => $foodcart_error_fields           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Shop Archive
    $foodcart_shop_archive_fields = foodcart_redux_post_type_fields( 'shop' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Shop Archive', 'foodcart' ),
        'id'         => 'shop_section',
        'subsection' => true,
        'fields' 	 => $foodcart_shop_archive_fields
        ) );

    // Woocommerce Product
    $foodcart_product_fields = foodcart_redux_post_type_fields( 'product' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Product Single', 'foodcart' ),
        'id'         => 'product_section',
        'subsection' => true,
        'fields' 	 => $foodcart_product_fields
        ) );
}

// Blog Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Blog Settings', 'foodcart' ),
    'id'               => 'blog_settings_section',
    'icon'             => 'el el-tags',
    'heading'          => '',
    'fields' => array(
        array(
            'id'       =>'blog_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Blog/Archive Layout', 'foodcart' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'blog1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'blog2.png',
                ),
                'style3' => array(
                    'title' => '<b>'. esc_html__( 'Layout 3', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'blog3.png',
                ),
            ),
        ),
		array(
			'id'       => 'post_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Enter the Post Banner Title', 'foodcart' ),
			'default'  => esc_html__( '', 'foodcart' ),			
		),
		array(
			'id'       => 'post_content_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Content Limit', 'foodcart' ),
			'default'  => 20,
		),
        array(
            'id'       => 'blog_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Date', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => false,
        ), 
        array(
            'id'       => 'blog_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
    )            
) 
);

// Post Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Post Settings', 'foodcart' ),
    'id'               => 'post_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(	
        array(
            'id'       => 'section-submenu-2',
            'type'     => 'section',
            'title'    => esc_html__( 'Single Post/news Layout Style', 'foodcart' ),
            'indent'   => true,
        ),	
        array(
            'id'       =>'post_style',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Single Post Layout', 'foodcart' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html__( 'Layout 1', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'post-style-1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html__( 'Layout 2', 'foodcart' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'post-style-3.png',
                ),
            ),
        ),		
        array(
            'id'       => 'section-submenu-3',
            'type'     => 'section',
            'title'    => esc_html__( 'single Post info Settings', 'foodcart' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'post_featured_image',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Featured Image', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_name',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Name', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Post Date', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'time_format',
            'type'     => 'select',
            'title'    => esc_html__( 'Modern', 'foodcart'), 
            'subtitle' => esc_html__( 'Simple Date format', 'foodcart' ),
            'options'  => array(
                'modern' => esc_html__( 'Modern', 'foodcart' ),
                'none'   => esc_html__( 'None', 'foodcart' ),
            ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_comment_num',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comment Number', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'post_cats',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Categories', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Tags', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
		array(
            'id'       => 'post_share',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Share', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_links',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Next Post / Previous post', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_bio',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Author Bio', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_view',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show/hide Post View', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
			'subtitle' => esc_html__( 'Show or hide post views count number', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_length',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Reading Length Active', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => true,
        ),
        array(
            'id'       => 'section_post_related',
            'type'     => 'section',
            'title'    => esc_html__( 'Related Post Settings', 'foodcart' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'show_related_post',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Related product', 'foodcart' ),
            'on'       => esc_html__( 'On', 'foodcart' ),
            'off'      => esc_html__( 'Off', 'foodcart' ),
            'default'  => false,
        ),
		array(
			'id'       => 'show_related_post_number',
			'type'     => 'text',
			'title'    => esc_html__( 'Show Related Post Number', 'foodcart' ),
			'default'  => esc_html__( '3', 'foodcart' ),
		),
		array(
			'id'       => 'related_post_query',
			'type'     => 'radio',
			'title'    => esc_html__('Query Type', 'foodcart'), 
			'subtitle' => esc_html__('Post Query', 'foodcart'),		
			'options'  => array(
				'cat' => esc_html__( 'Posts in the same Categories', 'foodcart' ), 
				'tag' => esc_html__( 'Posts in the same Tags', 'foodcart' ), 
				'author' => esc_html__( 'Posts by the same Author', 'foodcart' ),
			),
			'default' => 'cat'
		),
		array(
			'id'       => 'related_post_sort',
			'type'     => 'radio',
			'title'    => esc_html__('Sort Order', 'foodcart'), 
			'subtitle' => esc_html__('Display post Order', 'foodcart'),
			'options'  => array(
				'recent' => esc_html__( 'Recent Posts', 'foodcart' ), 
				'rand' => esc_html__( 'Random Posts', 'foodcart' ), 
				'modified' => esc_html__( 'Last Modified Posts', 'foodcart' ),
				'popular' => esc_html__( 'Most Commented posts', 'foodcart' ),
				'views' => esc_html__( 'Most Viewed posts', 'foodcart' ),
			),
			'default' => 'recent'
		),
		array(
			'id'       => 'show_related_post_title_limit',
			'type'     => 'text',
			'title'    => esc_html__( 'Show Related Post Title Length', 'foodcart' ),
			'default'  => esc_html__( '8', 'foodcart' ),
		),
    ),
)
);
if ( class_exists( 'Foodcart_Core' ) ) {
	
	// Single Recipe Settings
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Recipe Settings', 'foodcart' ),
		'id'               => 'recipe_settings_section',
		'icon'             => 'el el-file-edit',
		'heading'          => '',
		'fields' => array(	
			array(
				'id'       => 'section-submenu-4',
				'type'     => 'section',
				'title'    => esc_html__( 'Blog Recipe info Settings', 'foodcart' ),
				'indent'   => true,
			),
			array(
				'id'       => 'foodcart_recipe_blog_date',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Recipe Date', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_blog_cats',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Categories', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_blog_views',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Views', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'section-submenu-5',
				'type'     => 'section',
				'title'    => esc_html__( 'Single Recipe info Settings', 'foodcart' ),
				'indent'   => true,
			),
			array(
				'id'       => 'foodcart_recipe_author',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author Name', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => false,
			),
			array(
				'id'       => 'foodcart_recipe_date',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Recipe Date', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_cats',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Categories', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_time',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Time', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Tags', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Share', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_down_pdf',
				'type'     => 'switch',
				'title'    => esc_html__( 'Download PDF', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'section-submenu-6',
				'type'     => 'section',
				'title'    => esc_html__( 'Related Recipe Settings', 'foodcart' ),
				'indent'   => true,
			),
			array(
				'id'       => 'show_related_recipe',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Recipe', 'foodcart' ),
				'on'       => esc_html__( 'On', 'foodcart' ),
				'off'      => esc_html__( 'Off', 'foodcart' ),
				'default'  => true,
			),
			array(
				'id'       => 'show_related_recipe_number',
				'type'     => 'text',
				'title'    => esc_html__( 'Show Related Recipe Number', 'foodcart' ),
				'default'  => esc_html__( '5', 'foodcart' ),
			),
			array(
				'id'       => 'related_recipe_query',
				'type'     => 'radio',
				'title'    => esc_html__('Query Type', 'foodcart'), 
				'subtitle' => esc_html__('Post Query', 'foodcart'),		
				'options'  => array(
					'cat' => esc_html__( 'Recipe in the same Categories', 'foodcart' ), 
					'tag' => esc_html__( 'Recipe in the same Tags', 'foodcart' ), 
					'author' => esc_html__( 'Recipe by the same Author', 'foodcart' ),
				),
				'default' => 'cat'
			),
			array(
				'id'       => 'related_recipe_sort',
				'type'     => 'radio',
				'title'    => esc_html__('Sort Order', 'foodcart'), 
				'subtitle' => esc_html__('Display post Order', 'foodcart'),
				'options'  => array(
					'recent' => esc_html__( 'Recent Recipe', 'foodcart' ), 
					'rand' => esc_html__( 'Random Recipe', 'foodcart' ), 
					'modified' => esc_html__( 'Last Modified Recipe', 'foodcart' ),
					'popular' => esc_html__( 'Most Commented Recipes', 'foodcart' ),
					'views' => esc_html__( 'Most Viewed Recipes', 'foodcart' ),
				),
				'default' => 'recent'
			),
			array(
				'id'       => 'show_related_recipe_title_limit',
				'type'     => 'text',
				'title'    => esc_html__( 'Show Related Recipe Title Length', 'foodcart' ),
				'default'  => esc_html__( '8', 'foodcart' ),
			),
		),
	)
	);
}
// Error
$foodcart_fields2 = array(
    array(
        'id'       => 'error_title',
        'type'     => 'text',
        'title'    => esc_html__( 'Page Title', 'foodcart' ),
        'default'  => esc_html__( 'Error 404', 'foodcart' ),
    ),
    array(
        'id'       => 'error_bodybg',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Background Color', 'foodcart' ),
        'default'  => '#ffffff',
    ),
    array(
        'id'       => 'error_bodybanner',
        'type'     => 'media',
        'title'    => esc_html__( 'Body Banner', 'foodcart' ),
        'default'  => array(
            'url'=> FOODCART_IMG_URL . '404.png'
        ),
    ),
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 1', 'foodcart' ),
        'default'  => esc_html__( 'Oops! That page can’t be found.', 'foodcart' ),
    ),
	array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => esc_html__( 'Body Text 2', 'foodcart' ),
        'default'  => esc_html__( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'foodcart' ),
    ),
    array(
        'id'       => 'error_text1_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Text 1 Color', 'foodcart' ),
        'default'  => '#111111',
    ),
    array(
        'id'       => 'error_text2_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html__( 'Body Text 2 Color', 'foodcart' ),
        'default'  => '#444444',
    ),
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => esc_html__( 'Button Text', 'foodcart' ),
        'default'  => esc_html__( 'GO TO HOME PAGE', 'foodcart' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Error Page Settings', 'foodcart' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $foodcart_fields2           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
    Redux::setSection( $opt_name, array(
        'title'   => esc_html__( 'WooCommerce', 'foodcart' ),
        'id'      => 'woo_Settings_section',
        'heading' => '',
        'icon'    => 'el el-shopping-cart',
        'fields'  => array(
            array(
                'id'       => 'wc_sec_general',
                'type'     => 'section',
                'title'    => esc_html__( 'General', 'foodcart' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Products Per Page', 'foodcart' ),
                'default'  => '9',
            ),
            array(
                'id'       => 'wc_product_hover',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Hover Effect', 'foodcart' ),
                'on'       => esc_html__( 'Enabled', 'foodcart' ),
                'off'      => esc_html__( 'Disabled', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_wishlist_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Add to Wishlist Icon', 'foodcart' ),
                'on'       => esc_html__( 'Enabled', 'foodcart' ),
                'off'      => esc_html__( 'Disabled', 'foodcart' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_quickview_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Quickview Icon', 'foodcart' ),
                'on'       => esc_html__( 'Enabled', 'foodcart' ),
                'off'      => esc_html__( 'Disabled', 'foodcart' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_sec_product',
                'type'     => 'section',
                'title'    => esc_html__( 'Product Single Page', 'foodcart' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_show_excerpt',
                'type'     => 'switch',
                'title'    => esc_html__( "Show excerpt when short description doesn't exist", 'foodcart' ),
                'on'       => esc_html__( 'Enabled', 'foodcart' ),
                'off'      => esc_html__( 'Disabled', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories', 'foodcart' ),
                'on'       => esc_html__( 'Show', 'foodcart' ),
                'off'      => esc_html__( 'Hide', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'foodcart' ),
                'on'       => esc_html__( 'Show', 'foodcart' ),
                'off'      => esc_html__( 'Hide', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Products', 'foodcart' ),
                'on'       => esc_html__( 'Show', 'foodcart' ),
                'off'      => esc_html__( 'Hide', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html__( 'Description Tab', 'foodcart' ),
                'on'       => esc_html__( 'Show', 'foodcart' ),
                'off'      => esc_html__( 'Hide', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html__( 'Reviews Tab', 'foodcart' ),
                'on'       => esc_html__( 'Show', 'foodcart' ),
                'off'      => esc_html__( 'Hide', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html__( 'Additional Information Tab', 'foodcart' ),
                'on'       => esc_html__( 'Show', 'foodcart' ),
                'off'      => esc_html__( 'Hide', 'foodcart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_sec_cart',
                'type'     => 'section',
                'title'    => esc_html__( 'Cart Page', 'foodcart' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross Sell Products', 'foodcart' ),
                'on'       => esc_html__( 'Show', 'foodcart' ),
                'off'      => esc_html__( 'Hide', 'foodcart' ),
                'default'  => true,
            ),
        )
	) 
);
}

// -> END Fields
