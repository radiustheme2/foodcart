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
    'menu_title'           => esc_html( 'Foodcart Options' ),
	
    'page_title'           => esc_html( 'Foodcart Options' ),
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
    'title'            => esc_html( 'General' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Primary Color' ),
            'subtitle' => esc_html( 'Theme Default: #e30025' ),
            'default'  => '#e30025',
        ),
		array(
            'id'       => 'secondary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Secondary Color' ),
            'subtitle' => esc_html( 'Theme Default: #f89f24' ),
            'default'  => '#f89f24',
        ),
        array(
            'id'       => 'container_width',
            'type'     => 'select',
            'title'    => esc_html( 'Container width( Bootstrap Grid )'), 
            'subtitle' => esc_html( 'Bootstrap Grid Container Width size for site.' ),
            'options'  => array(
                '1350' => esc_html( '1350px' ),
                '1240' => esc_html( '1240px' ),
                '1140' => esc_html( '1140px' ),
            ),
            'default'  => '1240',
        ),
        array(
            'id'       => 'preloader',
            'type'     => 'switch',
            'title'    => esc_html( 'Preloader' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => false,
        ),
        array(
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html( 'Preloader Image' ),
            'subtitle' => esc_html( 'Please upload your choice of preloader image. Transparent GIF format is recommended' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'preloader.gif'
            ),
            'required' => array( 'preloader', 'equals', true )
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => esc_html( 'Back to Top Arrow' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
        ),
        array(
            'id'       => 'display_no_preview_image',
            'type'     => 'switch',
            'title'    => esc_html( 'Display No Preview Image on Blog/Archive' ),
			'off'      => esc_html( 'Disabled' ),
            'on'       => esc_html( 'Enabled' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'display_no_prev_img_related_post',
            'type'     => 'switch',
            'title'    => esc_html( 'Display No Preview Image on Related Post' ),
			'off'      => esc_html( 'Disabled' ),
            'on'       => esc_html( 'Enabled' ),
            'default'  => 'off',
        ),
        array(
            'id'       => 'no_preview_image',
            'type'     => 'media',
            'title'    => esc_html( 'Alternative Preview Image' ),
            'subtitle' => esc_html( 'This image will be used as preview image in some archive pages if no featured image exists' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'noimage.jpg'
            ),
			'required' => array( 'display_no_preview_image', 'equals', true )
        ),
		array(
			'id'       => 'team_slug',
			'type'     => 'text',
			'title'    =>  esc_html( 'Team Slug' ),
			'subtitle' =>  esc_html( 'Will be used as slug in Team breadcrumb' ),
			'default'  => 'team',
		),
		array(
			'id'       => 'recipe_slug',
			'type'     => 'text',
			'title'    =>  esc_html( 'Recipe Slug' ),
			'subtitle' =>  esc_html( 'Will be used as slug in Recipe breadcrumb' ),
			'default'  => 'recipe',
		),
		array(
			'id'       => 'testimonial_slug',
			'type'     => 'text',
			'title'    =>  esc_html( 'Testimonial Slug' ),
			'subtitle' =>  esc_html( 'Will be used as slug in Testimonial breadcrumb' ),
			'default'  => 'testimonial',
		),
		array(
			'id'       => 'gallery_slug',
			'type'     => 'text',
			'title'    =>  esc_html( 'Gallery Slug' ),
			'subtitle' =>  esc_html( 'Will be used as slug in Gallery breadcrumb' ),
			'default'  => 'gallery',
		),
    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Contact & Socials' ),
    'id'               => 'socials_section',
    'heading'          => '',
    'desc'             => esc_html( 'In case you want to hide any field, keep that field empty' ),
    'icon'             => 'el el-twitter',
    'fields' => array(
        array(
            'id'       => 'phone',
            'type'     => 'text',
            'title'    => esc_html( 'Phone' ),
            'default'  => '',
        ),
        array(
            'id'       => 'email',
            'type'     => 'text',
            'title'    => esc_html( 'Email' ),
            'validate' => 'email',
            'default'  => '',
        ),
        array(
            'id'       => 'address',
            'type'     => 'textarea',
            'title'    => esc_html( 'Address' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => esc_html( 'Facebook' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => esc_html( 'Twitter' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => esc_html( 'Linkedin' ),
            'default'  => ''
        ),
		array(
            'id'       => 'social_behance',
            'type'     => 'text',
            'title'    => esc_html( 'Behance' ),
            'default'  => '',
        ),
		array(
            'id'       => 'social_dribbble',
            'type'     => 'text',
            'title'    => esc_html( 'Dribbble' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => esc_html( 'Youtube' ),
            'default'  => '',
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => esc_html( 'Pinterest' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => esc_html( 'Instagram' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_skype',
            'type'     => 'text',
            'title'    => esc_html( 'Skype' ),
            'default'  => ''
        ),
        array(
            'id'       => 'social_rss',
            'type'     => 'text',
            'title'    => esc_html( 'RSS' ),
            'default'  => '',
        ),
    )            
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Header' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html( 'Main Logo' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'logo.png'
            ),
            'subtitle' => esc_html( 'Logo height less than 90px is recommended' ),
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html( 'Light Logo' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html( 'Used when Transparent Header is enabled. Logo height less than 90px is recommended' ),
        ),
        array(
            'id'       => 'logo_width',
            'type'     => 'select',
            'title'    => esc_html( 'Logo Area Width'), 
            'subtitle' => esc_html( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width' ),
            'options'  => array(
                '1' => esc_html( '1 Column' ),
                '2' => esc_html( '2 Column' ),
                '3' => esc_html( '3 Column' ),
                '4' => esc_html( '4 Column' ),
            ),
            'default'  => '2',
        ),
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => esc_html( 'Sticky Header' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
            'subtitle' => esc_html( 'Show header when scroll down' ),
        ),
        array(
            'id'       => 'tr_header',
            'type'     => 'switch',
            'title'    => esc_html( 'Transparent Header' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => false,
            'subtitle' => esc_html( 'You have to enable Banner or Slider in page to make it work properly. You can override this settings in individual pages' ),
        ),
		array(
            'id'       => 'header_opt',
            'type'     => 'switch',
            'title'    => esc_html( 'Header On/Off' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
            'subtitle' => esc_html( 'You can override this settings in individual pages' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'switch',
            'title'    => esc_html( 'Top Bar' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => false,
            'subtitle' => esc_html( 'You can override this settings in individual pages' ),
        ),
        array(
            'id'       => 'top_bar_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Top Bar Text Color' ),
            'default'  => '#444444',
        ),
		array(
            'id'       => 'top_baricon_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Top Bar Icon Color' ),
            'default'  => '#444444',
        ),
        array(
            'id'       => 'top_bar_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Transparent Top Bar Text Color' ),
            'subtitle' => esc_html( 'Applied when Transparent Header is enabled' ),
            'default'  => '#efefef',
        ),
		array(
            'id'       => 'top_baricon_color_tr',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Transparent Top Bar Icon Color' ),
            'subtitle' => esc_html( 'Applied when Transparent Header is enabled' ),
            'default'  => '#efefef',
        ),
        array(
            'id'       => 'top_bar_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Top Bar Background Color' ),
            'default'  => '#f8f8f8',
        ),
        array(
            'id'       => 'top_bar_style',
            'type'     => 'image_select',
            'title'    => esc_html( 'Top Bar Layout' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html( 'Layout 1' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'top1.png',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html( 'Layout 2' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'top2.png',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html( 'Layout 3' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'top3.png',
                ),
            ),
            'subtitle' => esc_html( 'You can override this settings in individual pages' ),
        ),
        array(
            'id'       => 'header_style',
            'type'     => 'image_select',
            'title'    => esc_html( 'Header Layout' ),
            'default'  => '1',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html( 'Layout 1' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html( 'Layout 2' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html( 'Layout 3' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-3.jpg',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html( 'Layout 4' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-4.jpg',
                ),
				'5' => array(
                    'title' => '<b>'. esc_html( 'Layout 5' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'header-5.jpg',
                ),
            ),
            'subtitle' => esc_html( 'You can override this settings in individual pages' ),
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => esc_html( 'Search Icon' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => esc_html( 'Cart Icon' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
        ),
		array(
			'id'       => 'vertical_menu_icon',
			'type'     => 'switch',
			'title'    =>  esc_html( 'Vertical Menu Icon' ),
			'on'       =>  esc_html( 'Enabled' ),
			'off'      =>  esc_html( 'Disabled' ),
			'default'  => false,
		),
		array(
			'id'       => 'online_button',
			'type'     => 'switch',
			'title'    =>  esc_html( 'Online Button' ),
			'on'       =>  esc_html( 'Enabled' ),
			'off'      =>  esc_html( 'Disabled' ),
			'default'  => true,
		),
		array(
			'id'       => 'online_button_text',
			'type'     => 'text',
			'title'    => esc_html( 'Button Text' ),
			'default'  => esc_html( 'Order Online' ),
			'required' => array( 'online_button', '=', true )
		),
		array(
			'id'       => 'online_button_link',
			'type'     => 'text',
			'title'    => esc_html( 'Button Link' ),
			'default'  => '#',
			'required' => array( 'online_button', '=', true )
		),
		
    )            
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Main Menu' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'section-mainmenu',
            'type'     => 'section',
            'title'    => esc_html( 'Main Menu Items' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => esc_html( 'Menu Font' ),
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
            'title'    => esc_html( 'Menu Color' ),
            'default'  => '#2d2d2d',
        ),
		/*menu background color for header style 6,7,8 */
        array(
            'id'       => 'menu_bgcolor_6',
            'type'     => 'color',
            'title'    => esc_html('Menu Background Color'), 
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
            'title'    => esc_html( 'Transparent Menu Color' ),
            'subtitle' => esc_html( 'Applied when Transparent Header is enabled' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'menu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Menu Hover Color' ),
            'default'  => '#e30025',
        ),
        array(
            'id'       => 'section-submenu',
            'type'     => 'section',
            'title'    => esc_html( 'Sub Menu Items' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'submenu_typo',
            'type'     => 'typography',
            'title'    => esc_html( 'Submenu Font' ),
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
            'title'    => esc_html( 'Submenu Color' ),
            'default'  => '#424242',
        ), 
        array(
            'id'       => 'submenu_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Submenu Background Color' ),
            'default'  => '#ffffff',
        ),  
        array(
            'id'       => 'submenu_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Submenu Hover Color' ),
            'default'  => '#ffffff',
        ), 
        array(
            'id'       => 'submenu_hover_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Submenu Hover Background Color' ),
            'default'  => '#e30025',
        ),
        array(
            'id'       => 'section-resmenu',
            'type'     => 'section',
            'title'    => esc_html( 'Mobile Menu' ),
            'indent'   => true,
        ), 
        array(
            'id'       => 'resmenu_width',
            'type'     => 'slider',
            'title'    => esc_html( 'Screen width in which mobile menu activated' ),
            'subtitle' => esc_html( 'Recommended value is: 992' ),
            'default'  => 992,
            'min'      => 0,
            'step'     => 1,
            'max'      => 2000,
        ),
        array(
            'id'       => 'resmenu_typo',
            'type'     => 'typography',
            'title'    => esc_html( 'Mobile Menu Font' ),
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
    'title'            => esc_html( 'Banner' ),
    'id'               => 'banner_section',
    'heading'          => '',
    'icon'             => 'el el-picture',
    'fields' => array(
        array(
            'id'       => 'banner_heading_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Banner Heading Color' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_active',
            'type'     => 'switch',
            'title'    => esc_html( 'Enable Breadcrumb' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
        ),
		array(
			'id'       => 'breadcrumbs_delimiter',
			'type'     => 'text',
			'title'    => esc_html( 'Breadcrumbs Delimiter' ),
			'default'  => ' - ',
		),
        array(
            'id'       => 'breadcrumb_hide_mobile',
            'type'     => 'switch',
            'title'    => esc_html( 'Show/Hide Breadcrumb in mobile' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => false,
        ),		
        array(
            'id'       => 'breadcrumb_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Breadcrumb Link Color' ),
            'default'  => '#cccccc',
        ),
        array(
            'id'       => 'breadcrumb_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Breadcrumb Link Hover Color' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_active_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Active Breadcrumb Color' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'breadcrumb_seperator_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Breadcrumb Seperator Color' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'banner_bg_opacity',
            'type'     => 'text',
            'title'    => esc_html( 'Banner Background Overlay opacity' ),
            'default'  => '0.2',
        ),
        array(
            'id'       => 'banner_top_padding',
            'type'     => 'text',
            'title'    => esc_html( 'Banner Top Gap ( Top Padding ) ' ),
            'default'  => '100',
        ),
        array(
            'id'       => 'banner_bottom_padding',
            'type'     => 'text',
            'title'    => esc_html( 'Banner Bottom Gap ( Bottom Padding ) ' ),
            'default'  => '100',
        ),
		

    )
) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Footer' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
		/*main footer part*/
		array( 
            'id'       => 'footer_style',
            'type'     => 'image_select',
            'title'    => esc_html( 'Footer Layout' ),
            'default'  => '2',
            'options' => array(
                '1' => array(
                    'title' => '<b>'. esc_html( 'Layout 1' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-1.jpg',
                ),
                '2' => array(
                    'title' => '<b>'. esc_html( 'Layout 2' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-2.jpg',
                ),
                '3' => array(
                    'title' => '<b>'. esc_html( 'Layout 3' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-3.jpg',
                ),
                '4' => array(
                    'title' => '<b>'. esc_html( 'Layout 4' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-4.jpg',
                ),
                '5' => array(
                    'title' => '<b>'. esc_html( 'Layout 5' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'footer-5.jpg',
                ),
            ),
            'subtitle' => esc_html( 'You can override this settings in individual pages' ),
        ),				
        array(
            'id'       => 'section-footer-area',
            'type'     => 'section',
            'title'    => esc_html( 'Footer Area' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'footer_area',
            'type'     => 'switch',
            'title'    => esc_html( 'Display Footer Area' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
        ),
        array(
            'id'       => 'footer_column_2',
            'type'     => 'select',
            'title'    => esc_html( 'Number of Columns for Footer 2' ),
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
            'title'    => esc_html( 'Number of Columns for Footer 4' ),
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
            'title'    => esc_html( 'Footer Background Color' ),
            'default'  => '#1b1d1f',
            'required' => array( 'footer_area', 'equals', true ),
        ),
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Footer Title Text Color' ),
            'default'  => '#ffffff',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Footer Body Text Color' ),
            'default'  => '#d9d9d9',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Footer Body Link Color' ),
            'default'  => '#d9d9d9',
            'required' => array( 'footer_area', 'equals', true )
        ), 
        array(
            'id'       => 'footer_link_hover_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Footer Body Link Hover Color' ),
            'default'  => '#f89f24',
            'required' => array( 'footer_area', 'equals', true )
        ),		
        array(
            'id'       => 'footer_logo_light',
            'type'     => 'media',
            'title'    => esc_html( 'Footer Logo' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'logo2.png'
            ),
            'subtitle' => esc_html( 'Logo height less than 90px is recommended' ),
			'required' => array( 'footer_area', 'equals', true )
        ),
        array(
            'id'       => 'section-copyright-area',
            'type'     => 'section',
            'title'    => esc_html( 'Copyright Area' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'copyright_area',
            'type'     => 'switch',
            'title'    => esc_html( 'Display Copyright Area' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
        ),
        array(
            'id'       => 'copyright_bgcolor',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Copyright Background Color' ),
            'default'  => '#111111',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => esc_html( 'Copyright Text Color' ),
            'default'  => '#d9d9d9',
            'required' => array( 'copyright_area', 'equals', true )
        ),
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => esc_html( 'Copyright Text' ),
            'default'  => '&copy; Copyright Foodcart 2025 . Designed and Developed by RadiusTheme',
            'required' => array( 'copyright_area', 'equals', true )
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Typography' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => esc_html( 'Body' ),
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
            'title'    => esc_html( 'Header h1' ),
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
            'title'    => esc_html( 'Header h2' ),
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
            'title'    => esc_html( 'Header h3' ),
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
            'title'    => esc_html( 'Header h4' ),
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
            'title'    => esc_html( 'Header h5' ),
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
            'title'    => esc_html( 'Header h6' ),
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
            'title'    => esc_html( 'Layout' ),
            'options'  => array(
                'left-sidebar'  => esc_html( 'Left Sidebar' ),
                'full-width'    => esc_html( 'Full Width' ),
                'right-sidebar' => esc_html( 'Right Sidebar' ),
            ),
            'default' => 'right-sidebar'
        ),		
        array(
            'id'       => $prefix. '_sidebar',
            'type'     => 'select',
            'title'    => esc_html( 'Custom Sidebar' ),
            'options'  => FoodcartTheme_Helper::custom_sidebar_fields(),
            'default'  => 'sidebar',
            'required' => array( $prefix. '_layout', '!=', 'full-width' ),
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => esc_html( 'Content Padding Top' ),
            'validate'  => 'numeric',
            'default' => '100',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html( 'Content Padding Bottom' ),
            'validate'  => 'numeric',
            'default' => '100'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => esc_html( 'Banner' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html( 'Breadcrumb' ),
            'on'       => esc_html( 'Enabled' ),
            'off'      => esc_html( 'Disabled' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => esc_html( 'Banner Background Type' ),
            'options'  => array(
                'bgimg'    => esc_html( 'Background Image' ),
                'bgcolor'  => esc_html( 'Background Color' ),
            ),
            'default' => 'bgimg',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => esc_html( 'Banner Background Image' ),
            'default'  => array(
                'url'=> FOODCART_IMG_URL . 'banner.jpg'
            ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ),
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => esc_html('Banner Background Color'), 
            'validate' => 'color',
            'transparent' => false,
            'default' => '#606060',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
        array(
            'id'       => $prefix. '_page_bgimg',
            'type'     => 'media',
            'title'    => esc_html( 'Page/Post Background Image' ),
            'default'  => array(
                'url'=> '',
            ),
        ),
        array(
            'id'       => $prefix. '_page_bgcolor',
            'type'     => 'color',
            'title'    => esc_html('Page/Post Background Color'), 
            'validate' => 'color',
            'transparent' => true,
            'default' => '#ffffff',
        ),
    );
}

Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Layout Defaults' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$foodcart_page_fields = foodcart_redux_post_type_fields( 'page' );
$foodcart_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
	'title'            => esc_html( 'Page' ),
	'id'               => 'pages_section',
	'subsection' => true,
	'fields' => $foodcart_page_fields
	) );

//Post Archive
$foodcart_post_archive_fields = foodcart_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html( 'Blog / Archive' ),
	'id'         => 'blog_section',
	'subsection' => true,
	'fields' 	 => $foodcart_post_archive_fields
	) );

// Single Post
$foodcart_single_post_fields = foodcart_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html( 'Post Single' ),
	'id'         => 'single_post_section',
	'subsection' => true,
	'fields' 	 => $foodcart_single_post_fields          
	) );

// Food Menu Single
$food_menu_fields = array(
    array(
        'id'       => 'related_food_menu',
        'type'     => 'switch',
        'title'    => esc_html( 'Related Food Menu' ),
        'on'       => esc_html( 'Show' ),
        'off'      => esc_html( 'Hide' ),
        'default'  => true,
    ),	
    array(
        'id'       => 'stock_available_display',
        'type'     => 'switch',
        'title'    => esc_html( 'Display Stock Available' ),
        'on'       => esc_html( 'Show' ),
        'off'      => esc_html( 'Hide' ),
        'default'  => true,
    ),
);
Redux::setSection( $opt_name, array(
    'title'      => esc_html( 'Food Menu Single' ),
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
    'title'         =>  esc_html( 'Single Team' ),
    'id'            => 'single_team_section',
    'subsection'    => true,
    'fields'        => $foodcart_team_fields           
    )
);

//Recipe
$foodcart_recipe_fields = foodcart_redux_post_type_fields( 'recipe' );
Redux::setSection( $opt_name, array(
	'title'      => esc_html( 'Single Recipe' ),
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
		'title'    => esc_html( 'Search Excerpt Length' ),
		'validate'  => 'numeric',
		'default' => '25',
	)       
);
$foodcart_search_field_2 = array_merge ( $foodcart_search_fields , $excerpt_length );
Redux::setSection( $opt_name, array(
	'title'      => esc_html( 'Search Layout' ),
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
    'title'   	 => esc_html( 'Error 404 Layout' ),
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
        'title'      => esc_html( 'Shop Archive' ),
        'id'         => 'shop_section',
        'subsection' => true,
        'fields' 	 => $foodcart_shop_archive_fields
        ) );

    // Woocommerce Product
    $foodcart_product_fields = foodcart_redux_post_type_fields( 'product' );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html( 'Product Single' ),
        'id'         => 'product_section',
        'subsection' => true,
        'fields' 	 => $foodcart_product_fields
        ) );
}

// Blog Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Blog Settings' ),
    'id'               => 'blog_settings_section',
    'icon'             => 'el el-tags',
    'heading'          => '',
    'fields' => array(
        array(
            'id'       =>'blog_style',
            'type'     => 'image_select',
            'title'    => esc_html( 'Blog/Archive Layout' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html( 'Layout 1' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'blog1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html( 'Layout 2' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'blog2.png',
                ),
                'style3' => array(
                    'title' => '<b>'. esc_html( 'Layout 3' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'blog3.png',
                ),
            ),
        ),
		array(
			'id'       => 'post_banner_title',
			'type'     => 'text',
			'title'    => esc_html( 'Enter the Post Banner Title' ),
			'default'  => esc_html( '' ),			
		),
		array(
			'id'       => 'post_content_limit',
			'type'     => 'text',
			'title'    => esc_html( 'Post Content Limit' ),
			'default'  => 20,
		),
        array(
            'id'       => 'blog_date',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Date' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'blog_author_name',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Author Name' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
        array(
            'id'       => 'blog_comment_num',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Comment Number' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => false,
        ), 
        array(
            'id'       => 'blog_cats',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Categories' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
    )            
) 
);

// Post Settings
Redux::setSection( $opt_name, array(
    'title'            => esc_html( 'Post Settings' ),
    'id'               => 'post_settings_section',
    'icon'             => 'el el-file-edit',
    'heading'          => '',
    'fields' => array(	
        array(
            'id'       => 'section-submenu-2',
            'type'     => 'section',
            'title'    => esc_html( 'Single Post/news Layout Style' ),
            'indent'   => true,
        ),	
        array(
            'id'       =>'post_style',
            'type'     => 'image_select',
            'title'    => esc_html( 'Single Post Layout' ),
            'default'  => 'style1',
            'options' => array(
                'style1' => array(
                    'title' => '<b>'. esc_html( 'Layout 1' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'post-style-1.png',
                ),
                'style2' => array(
                    'title' => '<b>'. esc_html( 'Layout 2' ) . '</b>',
                    'img' => FOODCART_IMG_URL . 'post-style-3.png',
                ),
            ),
        ),		
        array(
            'id'       => 'section-submenu-3',
            'type'     => 'section',
            'title'    => esc_html( 'single Post info Settings' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'post_featured_image',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Featured Image' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_name',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Author Name' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_date',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Post Date' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
        array(
            'id'       => 'time_format',
            'type'     => 'select',
            'title'    => esc_html( 'Modern'), 
            'subtitle' => esc_html( 'Simple Date format' ),
            'options'  => array(
                'modern' => esc_html( 'Modern' ),
                'none'   => esc_html( 'None' ),
            ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_comment_num',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Comment Number' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ), 
        array(
            'id'       => 'post_cats',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Categories' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_tags',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Tags' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
		array(
            'id'       => 'post_share',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Share' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_links',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Next Post / Previous post' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_author_bio',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Author Bio' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => false,
        ),
        array(
            'id'       => 'post_view',
            'type'     => 'switch',
            'title'    => esc_html( 'Show/hide Post View' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
			'subtitle' => esc_html( 'Show or hide post views count number' ),
            'default'  => true,
        ),
        array(
            'id'       => 'post_length',
            'type'     => 'switch',
            'title'    => esc_html( 'Post Reading Length Active' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => true,
        ),
        array(
            'id'       => 'section_post_related',
            'type'     => 'section',
            'title'    => esc_html( 'Related Post Settings' ),
            'indent'   => true,
        ),
        array(
            'id'       => 'show_related_post',
            'type'     => 'switch',
            'title'    => esc_html( 'Show Related product' ),
            'on'       => esc_html( 'On' ),
            'off'      => esc_html( 'Off' ),
            'default'  => false,
        ),
		array(
			'id'       => 'show_related_post_number',
			'type'     => 'text',
			'title'    => esc_html( 'Show Related Post Number' ),
			'default'  => esc_html( '3' ),
		),
		array(
			'id'       => 'related_post_query',
			'type'     => 'radio',
			'title'    => esc_html('Query Type'), 
			'subtitle' => esc_html('Post Query'),		
			'options'  => array(
				'cat' => esc_html( 'Posts in the same Categories' ), 
				'tag' => esc_html( 'Posts in the same Tags' ), 
				'author' => esc_html( 'Posts by the same Author' ),
			),
			'default' => 'cat'
		),
		array(
			'id'       => 'related_post_sort',
			'type'     => 'radio',
			'title'    => esc_html('Sort Order'), 
			'subtitle' => esc_html('Display post Order'),
			'options'  => array(
				'recent' => esc_html( 'Recent Posts' ), 
				'rand' => esc_html( 'Random Posts' ), 
				'modified' => esc_html( 'Last Modified Posts' ),
				'popular' => esc_html( 'Most Commented posts' ),
				'views' => esc_html( 'Most Viewed posts' ),
			),
			'default' => 'recent'
		),
		array(
			'id'       => 'show_related_post_title_limit',
			'type'     => 'text',
			'title'    => esc_html( 'Show Related Post Title Length' ),
			'default'  => esc_html( '8' ),
		),
    ),
)
);
if ( class_exists( 'Foodcart_Core' ) ) {
	
	// Single Recipe Settings
	Redux::setSection( $opt_name, array(
		'title'            => esc_html( 'Recipe Settings' ),
		'id'               => 'recipe_settings_section',
		'icon'             => 'el el-file-edit',
		'heading'          => '',
		'fields' => array(	
			array(
				'id'       => 'section-submenu-4',
				'type'     => 'section',
				'title'    => esc_html( 'Blog Recipe info Settings' ),
				'indent'   => true,
			),
			array(
				'id'       => 'foodcart_recipe_blog_date',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Recipe Date' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_blog_cats',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Categories' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_blog_views',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Views' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'section-submenu-5',
				'type'     => 'section',
				'title'    => esc_html( 'Single Recipe info Settings' ),
				'indent'   => true,
			),
			array(
				'id'       => 'foodcart_recipe_author',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Author Name' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => false,
			),
			array(
				'id'       => 'foodcart_recipe_date',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Recipe Date' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_cats',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Categories' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_time',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Time' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_tags',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Tags' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_share',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Share' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'foodcart_recipe_down_pdf',
				'type'     => 'switch',
				'title'    => esc_html( 'Download PDF' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'section-submenu-6',
				'type'     => 'section',
				'title'    => esc_html( 'Related Recipe Settings' ),
				'indent'   => true,
			),
			array(
				'id'       => 'show_related_recipe',
				'type'     => 'switch',
				'title'    => esc_html( 'Show Related Recipe' ),
				'on'       => esc_html( 'On' ),
				'off'      => esc_html( 'Off' ),
				'default'  => true,
			),
			array(
				'id'       => 'show_related_recipe_number',
				'type'     => 'text',
				'title'    => esc_html( 'Show Related Recipe Number' ),
				'default'  => esc_html( '5' ),
			),
			array(
				'id'       => 'related_recipe_query',
				'type'     => 'radio',
				'title'    => esc_html('Query Type'), 
				'subtitle' => esc_html('Post Query'),		
				'options'  => array(
					'cat' => esc_html( 'Recipe in the same Categories' ), 
					'tag' => esc_html( 'Recipe in the same Tags' ), 
					'author' => esc_html( 'Recipe by the same Author' ),
				),
				'default' => 'cat'
			),
			array(
				'id'       => 'related_recipe_sort',
				'type'     => 'radio',
				'title'    => esc_html('Sort Order'), 
				'subtitle' => esc_html('Display post Order'),
				'options'  => array(
					'recent' => esc_html( 'Recent Recipe' ), 
					'rand' => esc_html( 'Random Recipe' ), 
					'modified' => esc_html( 'Last Modified Recipe' ),
					'popular' => esc_html( 'Most Commented Recipes' ),
					'views' => esc_html( 'Most Viewed Recipes' ),
				),
				'default' => 'recent'
			),
			array(
				'id'       => 'show_related_recipe_title_limit',
				'type'     => 'text',
				'title'    => esc_html( 'Show Related Recipe Title Length' ),
				'default'  => esc_html( '8' ),
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
        'title'    => esc_html( 'Page Title' ),
        'default'  => esc_html( 'Error 404' ),
    ),
    array(
        'id'       => 'error_bodybg',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html( 'Body Background Color' ),
        'default'  => '#ffffff',
    ),
    array(
        'id'       => 'error_bodybanner',
        'type'     => 'media',
        'title'    => esc_html( 'Body Banner' ),
        'default'  => array(
            'url'=> FOODCART_IMG_URL . '404.png'
        ),
    ),
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => esc_html( 'Body Text 1' ),
        'default'  => esc_html( 'Oops! That page can’t be found.' ),
    ),
	array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => esc_html( 'Body Text 2' ),
        'default'  => esc_html( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.' ),
    ),
    array(
        'id'       => 'error_text1_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html( 'Body Text 1 Color' ),
        'default'  => '#111111',
    ),
    array(
        'id'       => 'error_text2_color',
        'type'     => 'color',
        'transparent' => false,
        'title'    => esc_html( 'Body Text 2 Color' ),
        'default'  => '#444444',
    ),
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => esc_html( 'Button Text' ),
        'default'  => esc_html( 'GO TO HOME PAGE' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => esc_html( 'Error Page Settings' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $foodcart_fields2           
) 
);

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
    Redux::setSection( $opt_name, array(
        'title'   => esc_html( 'WooCommerce' ),
        'id'      => 'woo_Settings_section',
        'heading' => '',
        'icon'    => 'el el-shopping-cart',
        'fields'  => array(
            array(
                'id'       => 'wc_sec_general',
                'type'     => 'section',
                'title'    => esc_html( 'General' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_num_product',
                'type'     => 'text',
                'title'    => esc_html( 'Number of Products Per Page' ),
                'default'  => '9',
            ),
            array(
                'id'       => 'wc_product_hover',
                'type'     => 'switch',
                'title'    => esc_html( 'Product Hover Effect' ),
                'on'       => esc_html( 'Enabled' ),
                'off'      => esc_html( 'Disabled' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_wishlist_icon',
                'type'     => 'switch',
                'title'    => esc_html( 'Product Add to Wishlist Icon' ),
                'on'       => esc_html( 'Enabled' ),
                'off'      => esc_html( 'Disabled' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_quickview_icon',
                'type'     => 'switch',
                'title'    => esc_html( 'Product Quickview Icon' ),
                'on'       => esc_html( 'Enabled' ),
                'off'      => esc_html( 'Disabled' ),
                'default'  => true,
                'required' => array( 'wc_product_hover', 'equals', true )
            ),
            array(
                'id'       => 'wc_sec_product',
                'type'     => 'section',
                'title'    => esc_html( 'Product Single Page' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_show_excerpt',
                'type'     => 'switch',
                'title'    => esc_html( "Show excerpt when short description doesn't exist" ),
                'on'       => esc_html( 'Enabled' ),
                'off'      => esc_html( 'Disabled' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_cats',
                'type'     => 'switch',
                'title'    => esc_html( 'Categories' ),
                'on'       => esc_html( 'Show' ),
                'off'      => esc_html( 'Hide' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_tags',
                'type'     => 'switch',
                'title'    => esc_html( 'Tags' ),
                'on'       => esc_html( 'Show' ),
                'off'      => esc_html( 'Hide' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_related',
                'type'     => 'switch',
                'title'    => esc_html( 'Related Products' ),
                'on'       => esc_html( 'Show' ),
                'off'      => esc_html( 'Hide' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_description',
                'type'     => 'switch',
                'title'    => esc_html( 'Description Tab' ),
                'on'       => esc_html( 'Show' ),
                'off'      => esc_html( 'Hide' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_reviews',
                'type'     => 'switch',
                'title'    => esc_html( 'Reviews Tab' ),
                'on'       => esc_html( 'Show' ),
                'off'      => esc_html( 'Hide' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_additional_info',
                'type'     => 'switch',
                'title'    => esc_html( 'Additional Information Tab' ),
                'on'       => esc_html( 'Show' ),
                'off'      => esc_html( 'Hide' ),
                'default'  => true,
            ),
            array(
                'id'       => 'wc_sec_cart',
                'type'     => 'section',
                'title'    => esc_html( 'Cart Page' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'wc_cross_sell',
                'type'     => 'switch',
                'title'    => esc_html( 'Cross Sell Products' ),
                'on'       => esc_html( 'Show' ),
                'off'      => esc_html( 'Hide' ),
                'default'  => true,
            ),
        )
	) 
);
}

// -> END Fields
