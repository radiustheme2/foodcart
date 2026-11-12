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
	$foodcart_layout_class = 'col-lg-9 col-md-12 col-12';
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
<div class="single-recipe-area">
    <div class="container">
        <div class="row">
			<?php
			if ( FoodcartTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
            <div class="<?php echo esc_attr( $foodcart_layout_class );?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content-single', 'recipe' );?>
				<?php endwhile; ?>
            </div>
			<?php
			if ( FoodcartTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>
