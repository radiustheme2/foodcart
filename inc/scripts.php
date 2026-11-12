<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 

add_action( 'wp_enqueue_scripts', 'foodcart_register_scripts', 12 );
if ( !function_exists( 'foodcart_register_scripts' ) ) {
	function foodcart_register_scripts(){
		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       FOODCART_CSS_URL . 'owl.carousel.min.css', array(), FOODCART_VERSION );
		wp_register_style( 'owl-theme-default',  FOODCART_CSS_URL . 'owl.theme.default.min.css', array(), FOODCART_VERSION );		
		wp_register_style( 'magnific-popup',     FOODCART_CSS_URL . 'magnific-popup.css', array(), FOODCART_VERSION );
		// Slider
		wp_register_style( 'nivo-slider',        FOODCART_CSS_URL . 'nivo-slider.min.css', array(), FOODCART_VERSION );
		// Slick CSS
		wp_register_style( 'slick',      		 FOODCART_CSS_URL . 'slick.css', array(), FOODCART_VERSION );
		wp_register_style( 'slick-theme',        FOODCART_CSS_URL . 'slick-theme.css', array(), FOODCART_VERSION );
		// Swiper CSS
		wp_register_style( 'swiper-slider',      FOODCART_CSS_URL . 'swiper.min.css', array(), FOODCART_VERSION );
		wp_register_style( 'multiscroll',        FOODCART_CSS_URL . 'jquery.multiscroll.min.css', array(), FOODCART_VERSION );
		wp_register_style( 'animate',        	 FOODCART_CSS_URL . 'animate.min.css', array(), FOODCART_VERSION );
		
		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',      FOODCART_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Slider
		wp_register_script( 'nivo-slider',       FOODCART_JS_URL . 'jquery.nivo.slider.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		
		// Slick js
		wp_register_script( 'imagesloaded',      FOODCART_JS_URL . 'imagesloaded.pkgd.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		wp_register_script( 'slick',             FOODCART_JS_URL . 'slick.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		
		// counter js
		wp_register_script( 'rt-waypoints',      FOODCART_JS_URL . 'waypoints.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		wp_register_script( 'counterup',         FOODCART_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		wp_register_script( 'knob',         	 FOODCART_JS_URL . 'jquery.knob.js', array( 'jquery' ), FOODCART_VERSION, true );
		wp_register_script( 'appear',         	 FOODCART_JS_URL . 'jquery.appear.js', array( 'jquery' ), FOODCART_VERSION, true );
		
		// magnific popup
		wp_register_script( 'magnific-popup',    FOODCART_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// rt-canvas-menu
		wp_register_style( 'rt-canvas-menu',     FOODCART_CSS_URL . 'rt-canvas-menu.css', '', FOODCART_VERSION );
		wp_register_script( 'rt-canvas-menu',    FOODCART_JS_URL . 'rt-canvas-menu.js', array( 'jquery' ), FOODCART_VERSION, true );
		// theia sticky
		wp_register_script( 'theia-sticky',    	 FOODCART_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Swiper Slider
		wp_register_script( 'swiper-slider',     FOODCART_JS_URL . 'swiper.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		
		wp_register_script( 'multiscroll',       FOODCART_JS_URL . 'jquery.multiscroll.min.js', array( 'jquery' ), FOODCART_VERSION, true );		
		wp_register_script( 'multiscroll-ext',   FOODCART_JS_URL . 'jquery.multiscroll.extensions.min.js', array( 'jquery' ), FOODCART_VERSION, true );		
		wp_register_script( 'rt-extension',      FOODCART_JS_URL . 'rt-extension.js', array( 'jquery' ), FOODCART_VERSION, true );
		wp_register_script( 'rt-easings',        FOODCART_JS_URL . 'jquery.easings.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		wp_register_script( 'isotope-pkgd',      FOODCART_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Parallaxie
		wp_register_script( 'parallaxie',     	 FOODCART_JS_URL . 'parallaxie.js', array( 'jquery' ), FOODCART_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'foodcart_enqueue_scripts', 25 );
if ( !function_exists( 'foodcart_enqueue_scripts' ) ) {
	function foodcart_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'foodcart-gfonts', 		FoodcartTheme_Helper::fonts_url(), array(), FOODCART_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			    FOODCART_CSS_URL . 'bootstrap.min.css', array(), FOODCART_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-foodcart',      FOODCART_ASSETS_URL . 'fonts/flaticon-foodcart/flaticon.css', array(), FOODCART_VERSION );
		
		elementor_scripts();
		wp_dequeue_style( 'fontawesome-css' );
		wp_enqueue_style( 'nivo-slider' );
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'foodcart-awesome',       FOODCART_CSS_URL . 'font-awesome.min.css', array(), FOODCART_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            FOODCART_CSS_URL . 'animate.min.css', array(), FOODCART_VERSION );	
		// Select 2 CSS
		wp_enqueue_style( 'select2',            FOODCART_CSS_URL . 'select2.min.css', array(), FOODCART_VERSION );		
		// Meanmenu CSS // @rtl
		wp_enqueue_style( 'meanmenu',     		 FOODCART_CSS_URL . 'meanmenu.css', array(), FOODCART_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'foodcart-default',    	 FOODCART_CSS_URL . 'default.css', array(), FOODCART_VERSION );
		// vc modules css
		wp_enqueue_style( 'foodcart-elementor',     FOODCART_CSS_URL . 'elementor.css', array(), FOODCART_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'foodcart-style',     	 FOODCART_CSS_URL . 'style.css', array(), FOODCART_VERSION );
		
		// Template Style
		wp_add_inline_style( 'foodcart-style',   	foodcart_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'popper',            FOODCART_JS_URL . 'popper.js', array( 'jquery' ), FOODCART_VERSION, true );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         FOODCART_JS_URL . 'bootstrap.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Parallaxie
		wp_enqueue_script( 'parallaxie',     	 FOODCART_JS_URL . 'parallaxie.js', array( 'jquery' ), FOODCART_VERSION, true );
		// smoothscroll js
		wp_enqueue_script( 'smoothscroll',     	 FOODCART_JS_URL . 'jquery.smoothscroll.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Select2 js
		wp_enqueue_script( 'select2', FOODCART_JS_URL . 'select2.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Meanmenu js
		wp_enqueue_script( 'jquery-meanmenu', 	FOODCART_JS_URL . 'jquery.meanmenu.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-nav',      	FOODCART_JS_URL . 'jquery.nav.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Countdown
		wp_enqueue_script( 'countdown',      	FOODCART_JS_URL . 'jquery.countdown.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		// Cookie js
		wp_enqueue_script( 'cookie',       		FOODCART_JS_URL . 'js.cookie.min.js', array( 'jquery' ), FOODCART_VERSION, true );
		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_script( 'rt-canvas-menu' );
		wp_enqueue_style( 'rt-canvas-menu' );
		wp_enqueue_script( 'theia-sticky' );
		if ( is_singular( 'foodcart_portfolio' ) ) {
			wp_enqueue_style( 'swiper-slider' );
			wp_enqueue_script( 'swiper-slider' );			
		}
		if ( is_singular( 'foodcart_team' ) ) {
			wp_enqueue_style( 'animate' );
			wp_enqueue_script( 'counterup' );
			wp_enqueue_script( 'rt-waypoints' );
		}
		if ( is_singular( 'foodcart_recipe' ) ) {			
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-theme-default' );
			wp_enqueue_script( 'owl-carousel' );
		}
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'foodcart-main',    	FOODCART_JS_URL . 'main.js', $dep , FOODCART_VERSION, true );
		if ( !empty( FoodcartTheme::$options['logo']['url'] ) ) {
			$logo = '<img class="logo-small" src="'. esc_url( empty( FoodcartTheme::$options['logo']['url'] ) ? FOODCART_IMG_URL . 'logo.png' : FoodcartTheme::$options['logo']['url'] ).'" />';
		} else {
			$logo = '<img class="logo-small" src="'. esc_url( FOODCART_IMG_URL . 'logo.png' ) . '" />';
		}		
		
		// localize script
		$foodcart_localize_data = array(
			'stickyMenu' 	=> FoodcartTheme::$options['sticky_menu'],
			'meanWidth'  	=> FoodcartTheme::$options['resmenu_width'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . esc_html ( $logo ) . '</a>',
			'day'	     => esc_html__('Day' , 'foodcart'),
			'hour'	     => esc_html__('Hour' , 'foodcart'),
			'minute'     => esc_html__('Minute' , 'foodcart'),
			'second'     => esc_html__('Second' , 'foodcart'),
			'extraOffset' => FoodcartTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => FoodcartTheme::$options['sticky_menu'] ? 52 : 0,
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'foodcart-nonce' )
		);
		wp_localize_script( 'foodcart-main', 'ThemeObj', $foodcart_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		 // do stuff for preview
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_style( 'nivo-slider' );
		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'appear' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );
		wp_enqueue_style(  'slick' );
		wp_enqueue_style(  'slick-theme' );
		wp_enqueue_script( 'slick' );
		
		/*wp_enqueue_style( 'multiscroll' );
		wp_enqueue_script( 'multiscroll' );
		wp_enqueue_script( 'rt-extension' );
		wp_enqueue_script( 'multiscroll-ext' );*/
	} 
}

add_action( 'wp_enqueue_scripts', 'foodcart_high_priority_scripts', 1500 );
if ( !function_exists( 'foodcart_high_priority_scripts' ) ) {
	function foodcart_high_priority_scripts() {
		// Dynamic style
		FoodcartTheme_Helper::dynamic_internal_style();
	}
}

function foodcart_template_style(){
	ob_start();
	?>
	.entry-banner {
		<?php if ( FoodcartTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( FoodcartTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( FoodcartTheme::$bgimg );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}
	.content-area {
		padding-top: <?php echo esc_html( FoodcartTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( FoodcartTheme::$padding_bottom );?>px;
	}
	#page {
		background-image: url( <?php echo FoodcartTheme::$pagebgimg; ?> );
		background-color: <?php echo FoodcartTheme::$pagebgcolor; ?>;
	}
	.single-foodcart_team #page {
		background-image: none;
		background-color: transparent;
	}
	.single-foodcart_team .content-area {
		background-image: url( <?php echo FoodcartTheme::$pagebgimg; ?> );
		background-color: <?php echo FoodcartTheme::$pagebgcolor; ?>;
	}
	<?php
	return ob_get_clean();
}
function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'foodcart-gfonts', 		FoodcartTheme_Helper::fonts_url(), array(), FOODCART_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'foodcart-awesome',       FOODCART_CSS_URL . 'font-awesome.min.css', array(), FOODCART_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );
function load_custom_wp_admin_script() {
	if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }
	wp_register_script( 'foodcart-admin-js', FOODCART_JS_URL . 'rt-widget-color.js', false, FOODCART_VERSION, true );
	wp_register_style( 'foodcart-admin-css', FOODCART_CSS_URL . 'admin-style.css', false, FOODCART_VERSION, true );
	wp_enqueue_style( 'foodcart-admin-css' );
	wp_enqueue_script( 'foodcart-admin-js' );
}

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script', 20 );