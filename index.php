<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( FoodcartTheme::$layout == 'full-width' ) {
	$foodcart_layout_class = 'col-sm-12 col-12';
} else {
	$foodcart_layout_class = FoodcartTheme_Helper::has_active_widget();
}
$foodcart_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;


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
				<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $foodcart_is_post_archive && FoodcartTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $foodcart_is_post_archive && FoodcartTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $foodcart_is_post_archive && FoodcartTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						// custom post type category layout
						} else if ( class_exists( 'Foodcart_Core' ) ) {
							if ( is_tax( 'foodcart_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php FoodcartTheme_Helper::pagination(); ?>
						
					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
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