<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action('init', 'foodcart_textdomain');
function foodcart_textdomain() {
	// Language
	load_theme_textdomain( 'foodcart', FOODCART_BASE_DIR . 'languages' );
}


add_action('after_setup_theme', 'foodcart_setup');
if ( !function_exists( 'foodcart_setup' ) ) {
	function foodcart_setup() {

		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio' ) );
		add_theme_support( 'woocommerce' );
		
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'strong magenta', 'foodcart' ),
				'slug' => 'strong-magenta',
				'color' => '#a156b4',
			),
			array(
				'name' => __( 'light grayish magenta', 'foodcart' ),
				'slug' => 'light-grayish-magenta',
				'color' => '#d0a5db',
			),
			array(
				'name' => __( 'very light gray', 'foodcart' ),
				'slug' => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name' => __( 'very dark gray', 'foodcart' ),
				'slug' => 'very-dark-gray',
				'color' => '#444',
			),
		) );
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => __( 'Small', 'foodcart' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => __( 'Normal', 'foodcart' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => __( 'Large', 'foodcart' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => __( 'Huge', 'foodcart' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support('editor-styles');	
		
		// Image sizes
		add_image_size( 'foodcart-size1', 1210, 700, true );   // Single Post
		add_image_size( 'foodcart-size2', 900, 500, true );    // Blog layout 1,3
		add_image_size( 'foodcart-size3', 450, 330, true );    // Post Grid 1
		add_image_size( 'foodcart-size4', 375, 340, true );    // Blog layout 2
		add_image_size( 'foodcart-size5', 260, 470, true );    // Team Layout 1
		add_image_size( 'foodcart-size6', 1000, 1200, true );  // Team Layout
		
		//PARVEZ
		add_image_size( 'foodcart-size7', 610, 430, true ); 	// Post Grid 1, Recipe 1, 2
		add_image_size( 'foodcart-size8', 590, 582, true ); 	// Portfolio single 2
		add_image_size( 'foodcart-size9', 630, 517, true ); 	// Portfolio Grid 1
		add_image_size( 'foodcart-size10', 400, 400, true );  	// Team Layout 2
		
		//Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'foodcart' ),
			'topright' => esc_html__( 'Header Right', 'foodcart' ),
		) );
	}
}

// Gutenberg
function foodcart_theme_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}
add_action( 'admin_init', 'foodcart_theme_add_editor_styles' );

// Initialize Widgets
add_action( 'widgets_init', 'foodcart_widgets_register' );
if ( !function_exists( 'foodcart_widgets_register' ) ) {
	function foodcart_widgets_register() {
		
		$footer_widget_titles2 = array(
			'1' => esc_html__( 'Footer (Style 2) 1', 'foodcart' ),
			'2' => esc_html__( 'Footer (Style 2) 2', 'foodcart' ),
			'3' => esc_html__( 'Footer (Style 2) 3', 'foodcart' ),
			'4' => esc_html__( 'Footer (Style 2) 4', 'foodcart' ),
		);		
		$footer_widget_titles4 = array(
			'1' => esc_html__( 'Footer (Style 4) 1', 'foodcart' ),
			'2' => esc_html__( 'Footer (Style 4) 2', 'foodcart' ),
			'3' => esc_html__( 'Footer (Style 4) 3', 'foodcart' ),
			'4' => esc_html__( 'Footer (Style 4) 4', 'foodcart' ),
		);		
		$footer_widget_titles5 = array(
			'1' => esc_html__( 'Footer (style 5) 1', 'foodcart' ),
			'2' => esc_html__( 'Footer (style 5) 2', 'foodcart' ),
			'3' => esc_html__( 'Footer (style 5) 3', 'foodcart' ),
			'4' => esc_html__( 'Footer (style 5) 4', 'foodcart' ),
		);

		// Register Widget Areas ( Common )
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'foodcart' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="rt-widget-title-holder"><h3 class="widgettitle">',
			'after_title'   => '<span class="titleinner"></span></h3></div>',
			) );
			
		if ( class_exists( 'WooCommerce' ) ) {			
			register_sidebar( array(
				'name'          => esc_html__( 'Shop Sidebar', 'foodcart' ),
				'id'            => 'shop-sidebar-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar 4 - Left', 'foodcart' ),
			'id'            => 'top4-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar 4 - Right', 'foodcart' ),
			'id'            => 'top4-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );		
		
		register_sidebar( array(
			'name'          => 'Footer Style 1',
			'id'            => 'footer-style-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. FoodcartTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		if ( !empty(FoodcartTheme::$options['footer_column_2']) ){
			$item_widget = FoodcartTheme::$options['footer_column_2'];
		} else {
			$item_widget = 3;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles2[$i],
				'id'            => 'footer-style-2-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. FoodcartTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}
		register_sidebar( array(
			'name'          => 'Footer Style 3',
			'id'            => 'footer-style-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. FoodcartTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		if ( !empty(FoodcartTheme::$options['footer_column_4']) ){
			$item_widget_4 = FoodcartTheme::$options['footer_column_4'];
		} else {
			$item_widget_4 = 3;
		}
		for ( $i = 1; $i <= $item_widget_4; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles4[$i],
				'id'            => 'footer-style-4-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
			) );
		}
		
		register_sidebar( array(
			'name'          => 'Footer Style 5',
			'id'            => 'footer-style-5',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. FoodcartTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		
	}
}

// Head Script
add_action( 'wp_head', 'foodcart_head', 1 );
if( !function_exists( 'foodcart_head' ) ) {
	function foodcart_head(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}	
}

// Footer Html
add_action( 'wp_footer', 'foodcart_footer_html', 1 );
if( !function_exists( 'foodcart_footer_html' ) ) {
	function foodcart_footer_html(){
		// Back-to-top link
		if ( FoodcartTheme::$options['back_to_top'] ){
			echo '<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>';
		}
	}	
}

// advanced search functionality
function advanced_search_query($query) {

    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['category']) )
            ));
        }    
    }
    return $query;
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

/*social link to author profile page*/
add_action( 'show_user_profile', 'foodcart_user_social_profile_fields' );
add_action( 'edit_user_profile', 'foodcart_user_social_profile_fields' );

function foodcart_user_social_profile_fields( $user ) { ?>

	<h3><?php esc_html_e( 'User Designation' , 'foodcart' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="foodcart_author_designation"><?php esc_html_e( 'Author Designation' , 'foodcart' ); ?></label></th>
			<td><input type="text" name="foodcart_author_designation" id="foodcart_author_designation" value="<?php echo esc_attr( get_the_author_meta( 'foodcart_author_designation', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Author Designation' , 'foodcart' ); ?></span></td>
		</tr>
	</table>
	
	<h3><?php esc_html_e( 'Social profile information' , 'foodcart' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="facebook"><?php esc_html_e( 'Facebook' , 'foodcart' ); ?></label></th>
			<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'foodcart_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your facebook URL.' , 'foodcart' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="twitter"><?php esc_html_e( 'Twitter' , 'foodcart' ); ?></label></th>
			<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'foodcart_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Twitter username.' , 'foodcart' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="linkedin"><?php esc_html_e( 'LinkedIn' , 'foodcart' ); ?></label></th>
			<td><input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'foodcart_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your LinkedIn Profile' , 'foodcart' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="pinterest"><?php esc_html_e( 'Pinterest' , 'foodcart' ); ?></label></th>
			<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'foodcart_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Pinterest Profile' , 'foodcart' ); ?></span></td>
		</tr>
	</table>
<?php }

add_action( 'personal_options_update', 'foodcart_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'foodcart_extra_profile_fields' );

function foodcart_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'foodcart_facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'foodcart_twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'foodcart_linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'foodcart_pinterest', $_POST['pinterest'] );
	update_user_meta( $user_id, 'foodcart_author_designation', $_POST['foodcart_author_designation'] );
}

/*find newest post/product with time*/
function foodcart_is_new( $id ) {
	$now    = time();
	$published_date = get_post_time('U');
	$diff =  $now - $published_date;
	if ( $diff < 604800 ) { ?>
		<span class="new-post"><?php esc_html_e( 'New' , 'foodcart' ); ?></span>
	<?php }
}

if( ! function_exists( 'foodcart_post_img_src' )){
	function foodcart_post_img_src( $size = 'foodcart-size1' ){
		$post_id  = get_the_ID();
		$image_id = get_post_thumbnail_id( $post_id );
		$image    = wp_get_attachment_image_src( $image_id, $size );
		return $image[0];
	}
}

/*Post Time & time format*/
if( ! function_exists( 'foodcart_get_time' )){

	function foodcart_get_time( $return = false ){

		$post = get_post();
		
		# Date is disabled globally ----------
		if( FoodcartTheme::$options['time_format'] == 'none' ){
			return false;
		}
		# Human Readable Post Dates ----------
		elseif(  FoodcartTheme::$options['time_format'] == 'modern' ){

			$time_now  = current_time( 'timestamp' );
			$post_time = get_the_time( 'U' ) ;
			$since = sprintf( esc_html__( '%s ago' , 'foodcart' ), human_time_diff( $post_time, $time_now ) );			
		}
		else{
			$since = get_the_date();
		}

		$post_time = '<span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span>  <span>'.$since.'</span></span>';

		if( $return ){
			return $post_time;
		}

		echo wp_kses_post( $post_time );
	}

}

function widgets_scripts( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
	
}
add_action( 'admin_enqueue_scripts', 'widgets_scripts' );

/*Module: Last Post update Date*/
function foodcart_last_update() { 

	$lastupdated_args = array(
		'orderby' => 'modified',
		'posts_per_page' => 1,
		'ignore_sticky_posts' => '1'
	);
 
	$lastupdated_loop = new WP_Query( $lastupdated_args );
	
	while( $lastupdated_loop->have_posts() )  {
		$lastupdated_loop->the_post();
		echo get_the_modified_date( 'M j, Y g:i a' );
	}	
	wp_reset_postdata();
}

/*
* for most use of the get_term cached 
* This is because all time it hits and single page provide data quickly
*/
function get_img( $img ){
	$img = get_stylesheet_directory_uri() . '/assets/img/' . $img;
	return $img;
}
function get_css( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/css/' . $file . '.css';
	return $file;
}
function get_js( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/js/' . $file . '.js';
	return $file;
}
function filter_content( $content ){
	// wp filters
	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = convert_chars( $content );
	$content = wpautop( $content );
	$content = shortcode_unautop( $content );

	// remove shortcodes
	$pattern= '/\[(.+?)\]/';
	$content = preg_replace( $pattern,'',$content );

	// remove tags
	$content = strip_tags( $content );

	return $content;
}

function get_current_post_content( $post = false ) {
	if ( !$post ) {
		$post = get_post();				
	}
	$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
	$content = filter_content( $content );
	return $content;
}

function cached_get_term_by( $field, $value, $taxonomy, $output = OBJECT, $filter = 'raw' ){
	// ID lookups are cached
	if ( 'id' == $field )
		return get_term_by( $field, $value, $taxonomy, $output, $filter );

	$cache_key = $field . '|' . $taxonomy . '|' . md5( $value );
	$term_id = wp_cache_get( $cache_key, 'get_term_by' );

	if ( false === $term_id ){
		$term = get_term_by( $field, $value, $taxonomy );
		if ( $term && ! is_wp_error( $term ) )
			wp_cache_set( $cache_key, $term->term_id, 'get_term_by' );
		else
			wp_cache_set( $cache_key, 0, 'get_term_by' ); // if we get an invalid value, let's cache it anyway
	} else {
		$term = get_term( $term_id, $taxonomy, $output, $filter );
	}

	if ( is_wp_error( $term ) )
		$term = false;

	return $term;
}

/*for avobe reason*/
function cached_get_term_link( $term, $taxonomy = null ){
	// ID- or object-based lookups already result in cached lookups, so we can ignore those.
	if ( is_numeric( $term ) || is_object( $term ) ){
		return get_term_link( $term, $taxonomy );
	}

	$term_object = cached_get_term_by( 'slug', $term, $taxonomy );
	return get_term_link( $term_object );
}


/*only to show the first category in the post - primary category*/
function foodcart_if_term_exists( $term, $taxonomy = '', $parent = null ){
	if ( null !== $parent ){
		return term_exists( $term, $taxonomy, $parent );
	}

	if ( ! empty( $taxonomy ) ){
		$cache_key = $term . '|' . $taxonomy;
	}else{
		$cache_key = $term;
	}

	$cache_value = wp_cache_get( $cache_key, 'term_exists' );

	//term_exists frequently returns null, but (happily) never false
	if ( false  === $cache_value ){
		$term_exists = term_exists( $term, $taxonomy );
		wp_cache_set( $cache_key, $term_exists, 'term_exists' );
	}else{
		$term_exists = $cache_value;
	}

	if ( is_wp_error( $term_exists ) )
		$term_exists = null;

	return $term_exists;
}


if( ! function_exists( 'foodcart_get_primary_category' )){

	function foodcart_get_primary_category() {

		if( get_post_type() != 'post' ) {
			return;
		}

		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}
}

/*only to show the first category in the post - primary category ID*/
if( ! function_exists( 'foodcart_get_primary_category_id' )){

	function foodcart_get_primary_category_id(){

		$primary_category = foodcart_get_primary_category();

		if( ! empty( $primary_category[0]->term_id )){
			return $primary_category[0]->term_id;
		}

		return false;
	}
}


function foodcart_save_termmeta( $term_id ) {
    // Save term color if possible
    if( isset( $_POST['rt_category_color'] ) && ! empty( $_POST['rt_category_color'] ) ) {
        update_term_meta( $term_id, 'rt_category_color', sanitize_hex_color_no_hash( $_POST['rt_category_color'] ) );
    } else {
        delete_term_meta( $term_id, 'rt_category_color' );
    }
}
add_action( 'created_category', 'foodcart_save_termmeta' );
add_action( 'edited_category',  'foodcart_save_termmeta' );

function foodcart_category_colorpicker_enqueue( $taxonomy ) {
    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }
    // Colorpicker Scripts
    wp_enqueue_script( 'wp-color-picker' );
    // Colorpicker Styles
    wp_enqueue_style( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'foodcart_category_colorpicker_enqueue' );

//Category Color column
add_filter( 'manage_edit-category_columns', 'foodcart_edit_term_columns', 10, 3 );
function foodcart_edit_term_columns( $columns ) {
    $columns['rt_category_color'] = esc_html__( 'Category Color', 'foodcart' );
    return $columns;
}
// RENDER COLUMNS
add_filter( 'manage_category_custom_column', 'foodcart_manage_term_custom_column', 10, 3 );
function foodcart_manage_term_custom_column( $out, $column, $term_id ) {
    if ( 'rt_category_color' === $column ) {
        $value  = get_term_meta( $term_id , 'rt_category_color', true );
        if ( ! $value )
            $value = '';
        $out = sprintf( '<span class="term-meta-color-block" style="background:#%s" ></span>', esc_attr( $value ) );
    }
    return $out;
}
//find the post type function 
if ( ! function_exists ( 'foodcart_post_type' ) ) {
	function foodcart_post_type() {
		$foodcart_post_type_var =get_post_type( get_the_ID());
		echo esc_html( $foodcart_post_type_var );
	}
}

/*next previous post links*/
if ( !function_exists( 'foodcart_post_links_next_prev' ) ) {
	function foodcart_post_links_next_prev() { ?>
	<div class="row no-gutters divider post-navigation">
		<?php if ( !empty( get_previous_post_link())){ ?>
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 <?php if ( is_rtl() ){ echo esc_attr( 'text-right' ); } else { echo esc_attr( 'text-left' ); } ?>">
			<span class="prev-article">
			<i class="fa fa-angle-<?php if ( is_rtl() ){ echo esc_attr( 'right' ); } else { echo esc_attr( 'left' ); } ?>" aria-hidden="true"></i><?php previous_post_link( '%link', esc_html('Previous article' , 'foodcart' ) );?></span>
			<?php previous_post_link('<h3 class="post-nav-title">%link</h3>'); ?>
			</div>
		<?php } ?>
		<?php if ( !empty( get_next_post_link())){ ?>
			<div class=" col-lg-6 col-md-6 col-sm-6 col-6 <?php if ( empty( get_previous_post_link())){ ?>offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-left' ); } else { echo esc_attr( 'text-right' ); } ?>">
			<span class="next-article">
			<?php next_post_link( '%link', esc_html('Next article' , 'foodcart' ) );?><i class="fa fa-angle-<?php if ( is_rtl() ){ echo esc_attr( 'left' ); } else { echo esc_attr( 'right' ); } ?>" aria-hidden="true"></i></span>
			<?php next_post_link( '<h3 class="post-nav-title">%link</h3>' ); ?>
			</div>
		<?php } ?>
	</div>
<?php }
}
/*Remove the archive label*/
function foodcart_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'foodcart_archive_title' );


/*Infinity scroll - Ajax */
function foodcart_infinity_loading_ajax_handler(){
	
	$paged = isset($_POST['paged']) ? (absint($_POST['paged']) + 1) : 1;
	
	$num = FoodcartTheme::$options['infinity_post_load_number'];
	
	$initial_post_num = get_option( 'posts_per_page' );
	
	$args = array(
		'paged' => $paged,
		'offset' => $initial_post_num + ( $paged * $num ) ,
		'posts_per_page' => $num
	);
	$html = null;
	$more = true;
	$layout = $_POST['layout'];
	query_posts( $args );
 
	if( have_posts() ) {
		ob_start();
		// run the loop
		while( have_posts() ): the_post(); 
			
			if ( FoodcartTheme::$options['blog_style'] == 'style5' ) {
				get_template_part( 'template-parts/content-5-masonry', get_post_format() );
			} else if ( FoodcartTheme::$options['blog_style'] == 'style4' ) {
				get_template_part( 'template-parts/content-4-masonry', get_post_format() );
			} else if ( FoodcartTheme::$options['blog_style'] == 'style3' ) {
				get_template_part( 'template-parts/content-3', get_post_format() );
			} else if ( FoodcartTheme::$options['blog_style'] == 'style2' ) {
				if ( $layout == 'right-sidebar' || $layout == 'left-sidebar' ) {
				get_template_part( 'template-parts/content-2-sidebar', get_post_format() );				
				} else {
				get_template_part( 'template-parts/content-2-nosidebar', get_post_format() );
				}
				
			} else if ( FoodcartTheme::$options['blog_style'] == 'style1' ) {
				get_template_part( 'template-parts/content-1', get_post_format() );
			} 
 
		endwhile;
		$html = ob_get_clean();
 
	} else {
		$more = false;
	}	
	wp_send_json(compact('paged', 'html', 'more'));	
}
 
add_action('wp_ajax_foodcart_infinity_loadmore', 'foodcart_infinity_loading_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_foodcart_infinity_loadmore', 'foodcart_infinity_loading_ajax_handler'); // wp_ajax_nopriv_{action}

/*FMP layouts*/
// check if the FMP Plugin active

function foodcart_fmp_layout( $layouts ) {
	
	$layouts['capsule_menu'] = __("FoodCart - Capsule Layout", "foodcart"); 
	$layouts['grid-by-cat-1'] = __("FoodCart - Card Menu 1", "foodcart");	
	$layouts['grid-by-cat-2'] = __("FoodCart - Card Menu 2", "foodcart"); 
	$layouts['carousel5'] = __("FoodCart - Slider 1", "foodcart");
	$layouts['carousel6'] = __("FoodCart - Slider 2", "foodcart");	
	$layouts['isotope-1'] = __("FoodCart - Isotope 1", "foodcart");	
	
	return $layouts;
}
add_filter('fmp_sc_layouts', 'foodcart_fmp_layout');

function foodcart_fmp_scOptions($scId, $scMeta){
	
	$css = null;
	$layout = $scMeta['fmp_layout'][0];
	
	//only for capsule layout
	if($layout === 'capsule_menu'){
		
		$primaryColor = ( ! empty( $scMeta['fmp_primary_color'][0] ) ? $scMeta['fmp_primary_color'][0] : null );
		
		if ( $primaryColor ) {
			// Cat layout
			$css .= "#{$scId} .food-menu-box-layout1{ ";
			$css .= "background :" . $primaryColor . ";";
			$css .= "}";
		}
	}

	echo wp_kses_post( $css );
}

add_action( 'fmp_sc_custom_css', 'foodcart_fmp_scOptions', 999, 2 );

add_action( 'fmp_sc_custom_script', 'foodcart_fmp_sc_enque_sciprt', 999, 1 );

function foodcart_fmp_sc_enque_sciprt ( $scId ){
	//change my current slug
	$layout = get_post_meta($scId, 'fmp_layout', true);
	if($layout == "grid-by-cat-card-menu-1"){
		/*CSS*/
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		/*JS*/
		wp_enqueue_script( 'owl-carousel' );
	}
	
}

/*Set Menu Product Type*/
if ( class_exists( 'WooCommerce' ) ) {
	//Register a new product type.
	add_action( 'init', 'foodcart_register_set_menu_product_type' );
	 
	function foodcart_register_set_menu_product_type() {

		class WC_Product_Setmenu extends WC_Product {

			public function __construct( $product ) {
				$this->product_type = 'setmenu';
				parent::__construct( $product );
			}
		}
	}
	//Add a corresponding tab to it when selected.
	add_filter( 'product_type_selector', 'foodcart_add_set_menu_product_type' );
	 
	function foodcart_add_set_menu_product_type( $types ){
		
		$types[ 'setmenu' ] = __( 'Set Menu Product', 'foodcart' );
	 
		return $types;  
	}
/*Show pricing fields for Set Menu product*/
function simple_rental_custom_js() {
	if ( 'product' != get_post_type() ) :
		return;
	endif;
	?><script type='text/javascript'>
		jQuery( document ).ready( function() {
			
			jQuery( '.options_group.pricing' ).addClass( 'show_if_setmenu' ).show();
			
		});
	</script><?php
}

add_action( 'admin_footer', 'simple_rental_custom_js' );
	//Add fields to the created tab.
	add_filter( 'woocommerce_product_data_tabs', 'foodcart_set_menu_product_tab' , 999);
	 
	function foodcart_set_menu_product_tab( $tabs) {
			 
		$tabs['setmenu'] = array( 
			'label'    => __( 'Set Menu Tab', 'foodcart' ),
			'target' => 'setmenu_product_options',
			'class'  => array( 'show_if_setmenu' ),		  
		);		
		$tabs['inventory']['class'][]= 'show_if_setmenu';
		
		return $tabs;
	}
	//This is tab field
	add_action( 'woocommerce_product_data_panels', 'foodcart_setmenu_product_tab_content' );
	 
	function foodcart_setmenu_product_tab_content() {
	 
	 ?><div id='setmenu_product_options' class='panel woocommerce_options_panel'><?php
	 ?><div class='options_group'><?php
					 
		woocommerce_wp_text_input(
			array(
			  'id' => 'setmenu_product_info',
			  'label' => __( 'Select The Product Spec', 'foodcart' ),
			  'placeholder' => '',
			  'desc_tip' => 'true',
			  'description' => __( 'Enter Demo product Info.', 'foodcart' ),
			  'type' => 'text'
			)
		);
		global $post;
		
	 ?>
	 	<p class="form-field">
			<label for="setmenu_products"><?php esc_html_e( 'Select Product Names', 'foodcart' ); ?></label>
			<select class="wc-product-search" multiple="multiple" style="width: 50%;" id="setmenu_products" name="setmenu_products[]" data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'foodcart' ); ?>" data-action="woocommerce_json_search_products_and_variations" data-exclude="<?php echo intval( $post->ID ); ?>">
				<?php
				
				$product_ids = get_post_meta($post->ID, 'setmenu_products');

				foreach ( $product_ids as $product_id ) {
					$product = wc_get_product( $product_id );					
						echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
				}				
				?>
			</select>
		</p>
	 
	 </div>
	 </div><?php
	}
	
	//Save the meta data to the database
	add_action( 'woocommerce_process_product_meta', 'save_setmenu_settings' );
		 
	function save_setmenu_settings( $post_id ){
			 
		$setmenu_products = $_POST['setmenu_products'];
			 
		delete_post_meta($post_id, 'setmenu_products');
		if(!empty($setmenu_products)){
			foreach($setmenu_products as $product){
				add_post_meta($post_id, 'setmenu_products', $product);
			}
		}
			
	}
		
}