<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<div class="col-lg-3 col-md-12">
	<aside class="sidebar-widget-area">		
		<?php
			if ( FoodcartTheme::$sidebar ) {
				if ( is_active_sidebar( FoodcartTheme::$sidebar ) ) dynamic_sidebar( FoodcartTheme::$sidebar );
			}
			else {
				if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' );
			}
		?>
	</aside>
</div>