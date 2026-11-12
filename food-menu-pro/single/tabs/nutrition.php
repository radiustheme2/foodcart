<?php
/**
 * Template: Nutrition.
 *
 * @package RT_FoodMenuPro
 */

 use RT\FoodMenuPro\Helpers\FnsPro;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$heading = apply_filters( 'fmp_food_menu_nutrition_heading', __( 'Nutrition', 'foodcart' ) );

?>

<?php if ( $heading ): ?>
	<h2><?php echo wp_kses_post( $heading ); ?></h2>
<?php endif; ?>

<?php echo wp_kses_post( FnsPro::get_fm_nutrition_list() ); ?>