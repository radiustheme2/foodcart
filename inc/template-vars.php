<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'foodcart_template_vars' );
if( !function_exists( 'foodcart_template_vars' ) ) {
    function foodcart_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'post':
                $prefix = 'single_post';
                break;
				case 'foodcart_recipe':
                $prefix = 'recipe';
                break;
				case 'foodcart_team':
                $prefix = 'team';
				FoodcartTheme::$options[$prefix. '_layout'] = 'full-width';
				FoodcartTheme::$options[$prefix. '_sidebar'] = '';
                break;				
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
            }
            
            $layout         	= get_post_meta( $post_id, 'foodcart_layout', true );
			$sidebar         	= get_post_meta( $post_id, 'foodcart_sidebar', true );
            $tr_header      	= get_post_meta( $post_id, 'foodcart_tr_header', true );
            $top_bar        	= get_post_meta( $post_id, 'foodcart_top_bar', true );
			$header_opt        	= get_post_meta( $post_id, 'foodcart_header_opt', true );
			$footer_area     	= get_post_meta( $post_id, 'foodcart_footer_area', true );
			$copyright_area     = get_post_meta( $post_id, 'foodcart_copyright_area', true );
            $top_bar_style  	= get_post_meta( $post_id, 'foodcart_top_bar_style', true );
            $header_style   	= get_post_meta( $post_id, 'foodcart_header', true );
            $footer_style   	= get_post_meta( $post_id, 'foodcart_footer', true );
            $padding_top    	= get_post_meta( $post_id, 'foodcart_top_padding', true );
            $padding_bottom 	= get_post_meta( $post_id, 'foodcart_bottom_padding', true );
            $has_banner     	= get_post_meta( $post_id, 'foodcart_banner', true );
            $has_breadcrumb 	= get_post_meta( $post_id, 'foodcart_breadcrumb', true );
            $bgtype         	= get_post_meta( $post_id, 'foodcart_banner_type', true );
            $bgcolor        	= get_post_meta( $post_id, 'foodcart_banner_bgcolor', true );
            $bgimg          	= get_post_meta( $post_id, 'foodcart_banner_bgimg', true );
            $pagebgcolor        = get_post_meta( $post_id, 'foodcart_page_bgcolor', true );
            $pagebgimg          = get_post_meta( $post_id, 'foodcart_page_bgimg', true );
            
            FoodcartTheme::$layout = ( empty( $layout ) || $layout == 'default' ) ? FoodcartTheme::$options[$prefix . '_layout'] : $layout;

			FoodcartTheme::$sidebar = ( empty( $sidebar ) || $sidebar == 'default' ) ? FoodcartTheme::$options[$prefix . '_sidebar'] : $sidebar;
            
			FoodcartTheme::$tr_header = ( empty( $tr_header ) || $tr_header == 'default' ) ? FoodcartTheme::$options['tr_header'] : $tr_header;
            
            FoodcartTheme::$top_bar = ( empty( $top_bar ) || $top_bar == 'default' ) ? FoodcartTheme::$options['top_bar'] : $top_bar;
            
            FoodcartTheme::$top_bar_style = ( empty( $top_bar_style ) || $top_bar_style == 'default' ) ? FoodcartTheme::$options['top_bar_style'] : $top_bar_style;
			
			FoodcartTheme::$header_opt = ( empty( $header_opt ) || $header_opt == 'default' ) ? FoodcartTheme::$options['header_opt'] : $header_opt;
            
            FoodcartTheme::$header_style = ( empty( $header_style ) || $header_style == 'default' ) ? FoodcartTheme::$options['header_style'] : $header_style;
			
            FoodcartTheme::$footer_style = ( empty( $footer_style ) || $footer_style == 'default' ) ? FoodcartTheme::$options['footer_style'] : $footer_style;
			
			FoodcartTheme::$footer_area = ( empty( $footer_area ) || $footer_area == 'default' ) ? FoodcartTheme::$options['footer_area'] : $footer_area;
			
			FoodcartTheme::$copyright_area = ( empty( $copyright_area ) || $copyright_area == 'default' ) ? FoodcartTheme::$options['copyright_area'] : $copyright_area;
            
            $padding_top = ( empty( $padding_top ) || $padding_top == 'default' ) ? FoodcartTheme::$options[$prefix . '_padding_top'] : $padding_top;
			
            FoodcartTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $padding_bottom ) || $padding_bottom == 'default' ) ? FoodcartTheme::$options[$prefix . '_padding_bottom'] : $padding_bottom;
            FoodcartTheme::$padding_bottom = (int) $padding_bottom;
			
            FoodcartTheme::$has_banner = ( empty( $has_banner ) || $has_banner == 'default' ) ? FoodcartTheme::$options[$prefix . '_banner'] : $has_banner;
            
            FoodcartTheme::$has_breadcrumb = ( empty( $has_breadcrumb ) || $has_breadcrumb == 'default' ) ? FoodcartTheme::$options[$prefix . '_breadcrumb'] : $has_breadcrumb;
            
            FoodcartTheme::$bgtype = ( empty( $bgtype ) || $bgtype == 'default' ) ? FoodcartTheme::$options[$prefix . '_bgtype'] : $bgtype;
            
            FoodcartTheme::$bgcolor = empty( $bgcolor ) ? FoodcartTheme::$options[$prefix . '_bgcolor'] : $bgcolor;
            
            if( !empty( $bgimg ) ) {
                $attch_url      = wp_get_attachment_image_src( $bgimg, 'full', true );
                FoodcartTheme::$bgimg = $attch_url[0];
            } elseif( !empty( FoodcartTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( FoodcartTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                FoodcartTheme::$bgimg = $attch_url[0];
            } else {
                FoodcartTheme::$bgimg = FOODCART_IMG_URL . 'banner.jpg';
            }
			
            FoodcartTheme::$pagebgcolor = empty( $pagebgcolor ) ? FoodcartTheme::$options[$prefix . '_page_bgcolor'] : $pagebgcolor;			
            
            if( !empty( $pagebgimg ) ) {
                $attch_url      = wp_get_attachment_image_src( $pagebgimg, 'full', true );
                FoodcartTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( FoodcartTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( FoodcartTheme::$options[$prefix . '_page_bgimg']['id'], 'full', true );
                FoodcartTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                FoodcartTheme::$options[$prefix . '_layout'] = 'full-width';
            } else if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            } else {
                $prefix = 'blog';
            }
            
            FoodcartTheme::$layout         	= FoodcartTheme::$options[$prefix . '_layout'];
            FoodcartTheme::$tr_header      	= FoodcartTheme::$options['tr_header'];
            FoodcartTheme::$top_bar        	= FoodcartTheme::$options['top_bar'];
            FoodcartTheme::$header_opt      = FoodcartTheme::$options['header_opt'];
            FoodcartTheme::$footer_area     = FoodcartTheme::$options['footer_area'];
            FoodcartTheme::$copyright_area  = FoodcartTheme::$options['copyright_area'];
            FoodcartTheme::$top_bar_style  	= FoodcartTheme::$options['top_bar_style'];
            FoodcartTheme::$header_style   	= FoodcartTheme::$options['header_style'];
            FoodcartTheme::$footer_style   	= FoodcartTheme::$options['footer_style'];
            FoodcartTheme::$padding_top    	= FoodcartTheme::$options[$prefix . '_padding_top'];
            FoodcartTheme::$padding_bottom 	= FoodcartTheme::$options[$prefix . '_padding_bottom'];
            FoodcartTheme::$has_banner     	= FoodcartTheme::$options[$prefix . '_banner'];
            FoodcartTheme::$has_breadcrumb 	= FoodcartTheme::$options[$prefix . '_breadcrumb'];
            FoodcartTheme::$bgtype         	= FoodcartTheme::$options[$prefix . '_bgtype'];
            FoodcartTheme::$bgcolor        	= FoodcartTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( FoodcartTheme::$options[$prefix . '_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( FoodcartTheme::$options[$prefix . '_bgimg']['id'], 'full', true );
                FoodcartTheme::$bgimg = $attch_url[0];
            } else {
                FoodcartTheme::$bgimg = FOODCART_IMG_URL . 'banner.jpg';
            }
			
            FoodcartTheme::$pagebgcolor = FoodcartTheme::$options[$prefix . '_page_bgcolor'];
			
            if( !empty( FoodcartTheme::$options[$prefix . '_page_bgimg']['id'] ) ) {
                $attch_url      = wp_get_attachment_image_src( FoodcartTheme::$options[$prefix . '_page_bgimg']['id'], 'full', true );
                FoodcartTheme::$pagebgimg = $attch_url[0];
            }
        }
    }
}

// Add body class
add_filter( 'body_class', 'foodcart_body_classes' );
if( !function_exists( 'foodcart_body_classes' ) ) {
    function foodcart_body_classes( $classes ) {
        
        $classes[] = 'header-style-'. FoodcartTheme::$header_style;		
        $classes[] = 'footer-style-'. FoodcartTheme::$footer_style;

        if ( FoodcartTheme::$top_bar == 1 || FoodcartTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. FoodcartTheme::$top_bar_style;
        }

        if ( FoodcartTheme::$tr_header == 1 || FoodcartTheme::$tr_header == 'on' ){ $classes[] = 'trheader'; }
        
        $classes[] = ( FoodcartTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( FoodcartTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) { $classes[] =  ' post-detail-' . FoodcartTheme::$options['post_style']; }
		
		if( is_singular( 'food-menu' ) ) { $classes[] = 'fmp'; }
				
        return $classes;
    }
}