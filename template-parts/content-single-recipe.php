<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$thumb_size = 'foodcart-size1';

global $post;
$foodcart_recipe_pdf				= get_post_meta( get_the_ID(), 'foodcart_recipe_pdf', true );
$foodcart_recipe_ingredient_list  	= get_post_meta( get_the_ID(), 'foodcart_recipe_ingredient_list', true );
$foodcart_recipe_nutritions_list  	= get_post_meta( get_the_ID(), 'foodcart_recipe_nutritions_list', true );
$foodcart_recipe_prep_time        	= get_post_meta( get_the_ID(), 'foodcart_recipe_prep_time', true );
$foodcart_recipe_cook_time        	= get_post_meta( get_the_ID(), 'foodcart_recipe_cook_time', true );
$foodcart_recipe_ready_in        	 = get_post_meta( get_the_ID(), 'foodcart_recipe_ready_in', true );
$foodcart_recipe_serving_people		= get_post_meta( get_the_ID(), 'foodcart_recipe_serving_people', true );
$foodcart_recipe_nutrition_serve	= get_post_meta( get_the_ID(), 'foodcart_recipe_nutrition_serve', true );
$cats   							= wp_get_post_terms( $post->ID, 'foodcart_recipe_category', array( "fields" => "names" ) );
$cats   							= implode( ', ', $cats );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-recipe-inner">
		<div class="post-thumb">
			<?php
				if ( has_post_thumbnail() ){
					the_post_thumbnail( $thumb_size );
				} else {
					if ( !empty( FoodcartTheme::$options['no_preview_image']['id'] ) ) {
						echo wp_get_attachment_image( FoodcartTheme::$options['no_preview_image']['id'], $thumb_size );
					} else {
						echo '<img class="wp-post-image" src="' . FoodcartTheme_Helper::get_img( 'noimage_1210X700.jpg' ) . '" alt="'.get_the_title().'">';
					}
				}
			?>
			<?php if ( ( FoodcartTheme::$options['foodcart_recipe_author'] ) || ( FoodcartTheme::$options['foodcart_recipe_date'] ) || ( FoodcartTheme::$options['foodcart_recipe_cats'] )) { ?>
			<div class="post-meta">
				<?php if ( FoodcartTheme::$options['foodcart_recipe_author'] ) { ?>
				<span class="post-auth"><i class="fa fa-user" aria-hidden="true"></i><?php echo the_author_posts_link();?></span>
				<?php } if ( FoodcartTheme::$options['foodcart_recipe_date'] ) { ?>
				<span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date();?></span>
				<?php } if ( FoodcartTheme::$options['foodcart_recipe_cats'] ) { ?>
				<span class="post-cate"><i class="fa fa-tags" aria-hidden="true"></i><?php echo wp_kses_post( $cats );?></span>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
		<?php if ( FoodcartTheme::$options['foodcart_recipe_time'] ) { ?>
			<?php if( !empty($foodcart_recipe_prep_time) || !empty($foodcart_recipe_cook_time) || !empty($foodcart_recipe_ready_in) ){ ?>
				<ul class="tools-bar">
					<?php if(!empty($foodcart_recipe_prep_time)){ ?>
					<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php esc_html_e( 'Prep. Time', 'foodcart' );?>: <span>
						<?php echo esc_html($foodcart_recipe_prep_time); ?></span></a>
					</li>
					<?php } ?>
					<?php if(!empty($foodcart_recipe_cook_time)){ ?>
					<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php esc_html_e( 'Cooking Time', 'foodcart' );?>: <span>
						<?php echo esc_html($foodcart_recipe_cook_time); ?></span></a>
					</li>
					<?php } ?>
					<?php if(!empty($foodcart_recipe_ready_in)){ ?>
					<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?php esc_html_e( 'Ready In', 'foodcart' );?>: <span>
						<?php echo esc_html($foodcart_recipe_ready_in); ?></span></a>
					</li>
					<?php } ?>
				</ul>
			<?php } ?>
		<?php } ?>
		<?php the_content(); ?>
		<?php if ( ( FoodcartTheme::$options['foodcart_recipe_tags'] && has_tag() ) || FoodcartTheme::$options['foodcart_recipe_share'] ) { ?>
		<div class="entry-footer">
			<div class="entry-footer-meta">
				<?php if ( FoodcartTheme::$options['foodcart_recipe_tags'] && has_tag() ) { ?>
				<div class="item-tags">
					<span><?php esc_html_e( 'Tags:', 'foodcart' );?></span><?php echo get_the_term_list( $post->ID, 'post_tag', '', '', '' ); ?>
				</div>	
				<?php } if ( ( FoodcartTheme::$options['foodcart_recipe_share'] ) && ( function_exists( 'foodcart_post_share' ) ) ) { ?>
				<div class="post-share"><span><?php esc_html_e( 'Share:', 'foodcart' );?></span><?php foodcart_post_share(); ?></div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<div class="row">
		<?php if ( !empty( $foodcart_recipe_ingredient_list ) ): ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="ingredients-box">
					<h3><?php esc_html_e( 'Ingredients', 'foodcart' );?></h3>					
					<div class="recipe-serving">
						<i class="fa fa-user" aria-hidden="true"></i><?php esc_html_e( 'Serving People', 'foodcart' );?>: <span>
						<input name="action" value="foodcart_recipe_cal" type="hidden" /> 
						<input name="recipe-id" class="recipe-id" value="<?php the_ID(); ?>" type="hidden" /> 
						<input name="person-number" class="person-number" type="number" value="<?php if(!empty($foodcart_recipe_serving_people)){ ?><?php echo esc_html($foodcart_recipe_serving_people); ?><?php } else { esc_html_e( '1', 'foodcart' ); } ?>" /> 
						</span>
					</div>					
						<ul>
							<?php 
							$i = 1;
							foreach ( $foodcart_recipe_ingredient_list as $recipe_ingredient_list ): ?>
							<li id="ingredient_item_number-<?php echo esc_html($i); ?>">
								<i class="fa fa-check" aria-hidden="true"></i><?php echo esc_html($recipe_ingredient_list['ingredient_item']); ?><?php if(!empty($recipe_ingredient_list['ingredient_unit'])){ ?>: <?php } ?><span id="<?php
									if(empty($foodcart_recipe_serving_people)){
										$foodcart_recipe_serving_people = 1;
									}
									if(!empty($recipe_ingredient_list['ingredient_quantity'])){
										$single_serve = $recipe_ingredient_list['ingredient_quantity'] / $foodcart_recipe_serving_people;
										echo esc_html($single_serve);
									}
									 ?>">								
								<?php if(!empty($recipe_ingredient_list['ingredient_quantity'])){ echo esc_html($recipe_ingredient_list['ingredient_quantity']); } ?></span> <?php if(!empty($recipe_ingredient_list['ingredient_unit'])){ echo esc_html($recipe_ingredient_list['ingredient_unit']); } ?>
							</li>
							<?php $i++; endforeach;?>
						</ul>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( !empty( $foodcart_recipe_nutritions_list ) ): ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="ingredients-box">
					<h3><?php esc_html_e( 'Nutrition', 'foodcart' );?><?php if(!empty($foodcart_recipe_nutrition_serve)){ ?><span> /<?php echo esc_html($foodcart_recipe_nutrition_serve); ?></span><?php } ?></h3>					
						<ul>
							<?php foreach ( $foodcart_recipe_nutritions_list as $recipe_nutritions_list ): ?>
								<li>
									<i class="fa fa-check" aria-hidden="true"></i><?php echo esc_html($recipe_nutritions_list['nutritions_item']); ?>
								</li>
							<?php endforeach;?>
						</ul>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php if ( FoodcartTheme::$options['foodcart_recipe_down_pdf'] ) { ?>
			<?php if ( !empty( $foodcart_recipe_pdf ) ) { ?>
			<span class="download-pdf"><a href="<?php if ( !empty( $foodcart_recipe_pdf ) ) { echo wp_get_attachment_url( $foodcart_recipe_pdf ); } ?>" class="ghost-on-hover-btn" download><i class="fa fa-file-text-o" aria-hidden="true"></i><?php esc_html_e( 'Download PDF', 'foodcart' );?></a></span>
			<?php } ?>
		<?php } ?>
	</div>
</div>

<?php 
	$foodcart_recipe_other = get_post_meta( get_the_ID(), 'foodcart_recipe_other', true );
	if( $foodcart_recipe_other == 'on' && FoodcartTheme::$options['show_related_recipe'] == '1' ) {
		foodcart_related_recipe();
	}
?>