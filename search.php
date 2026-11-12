<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Layout class
if ( FoodcartTheme::$layout == 'full-width' ) {
	$foodcart_layout_class = 'col-sm-12 col-12';
} else {
	$foodcart_layout_class = FoodcartTheme_Helper::has_active_widget();
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( FoodcartTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $foodcart_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-masonry-grid rt-search-post">
						<?php if ( have_posts() ) :?>
								<?php while ( have_posts() ) : the_post();
									$excerpt_length = FoodcartTheme::$options['search_excerpt_length'];
									get_template_part( 'template-parts/content-search', 'search' );
								?>
								<?php endwhile; ?>
						<?php else:?>
							<?php get_template_part( 'template-parts/content', 'none' );?>
						<?php endif;?>
					</div>
					<?php FoodcartTheme_Helper::pagination();?>
				</main>					
			</div>
			<?php
			if ( FoodcartTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>