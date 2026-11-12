<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
if( ! function_exists( 'foodcart_related_recipe' )){
	function foodcart_related_recipe(){
		$thumb_size = 'foodcart-size9';
			
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );	
		$title_length = FoodcartTheme::$options['show_related_recipe_title_limit'] ? FoodcartTheme::$options['show_related_recipe_title_limit'] : '';
		$related_post_number = FoodcartTheme::$options['show_related_recipe_number'];

		# Making ready to the Query ...
		$query_type = FoodcartTheme::$options['related_recipe_query'];

		$args = array(
			'post_type'				 => 'foodcart_recipe',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_post_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( FoodcartTheme::$options['related_recipe_sort'] ){

			$post_order = FoodcartTheme::$options['related_recipe_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'foodcart_views';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}

		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			$category_ids = array();
			$categories   = get_the_category( $post_id );

			foreach( $categories as $individual_category ){
				$category_ids[] = $individual_category->term_id;
			}

			$args['category__in'] = $category_ids;
		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		/*the_carousel*/
		if ( FoodcartTheme::$layout == 'full-width' ) {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 3 ),
				'992'  => array( 'items' => 4 ),
			);
		}
		else {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 2 ),
				'992'  => array( 'items' => 3 ),
			);
		}
		
		$count_post = $related_query->post_count;
		if ( $count_post < 4 ) {
			$number_of_avail_post = false;
		} else {
			$number_of_avail_post = true;
		}
		$owl_data = array( 
			'nav'                => false,
			'dots'               => false,
			'autoplay'           => true,
			'autoplayTimeout'    => '5000',
			'autoplaySpeed'      => '200',
			'autoplayHoverPause' => true,
			'loop'               => $number_of_avail_post,
			'margin'             => 30,
			'responsive'         => $responsive
		);

		$owl_data = json_encode( $owl_data );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
		if( $related_query->have_posts() ) { ?>

		<div class="related-recipe">	
			<div class="owl-wrap rt-woo-nav related products">
				<div class="section-title">
					<h2 class="owl-custom-nav-title"><?php esc_html_e( 'You May Also Like', 'foodcart' );?></h2>
					<?php if ( $count_post > 3 ){ ?>
					<div class="owl-custom-nav owl-nav">
						<div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div>
					</div>
					<?php } ?>
					<div class="owl-custom-nav-bar"></div>
					<div class="clear"></div>
				</div>
				<div class="rt-owl-carousel owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
					<?php while ( $related_query->have_posts() ) { 
						$related_query->the_post();
						$content = get_the_content();
						$content = apply_filters( 'the_content', $content );
						$content = wp_trim_words( $content, 10, '' );
						$title = wp_trim_words( get_the_title(), $title_length, '' );
						$cats = wp_get_post_terms( get_the_ID(), 'foodcart_recipe_category', array( "fields" => "names" ) );
						$cats = implode( ', ', $cats );
						?>
					<?php			
						$thumbnail = false;
						if ( has_post_thumbnail() ){
							$thumbnail = get_the_post_thumbnail( null, $thumb_size, array( 'class' => 'img-responsive' ) );
						}
						else {
							if ( !empty( FoodcartTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = wp_get_attachment_image( FoodcartTheme::$options['no_preview_image']['id'], $thumb_size );
							}
							elseif ( !empty( FoodcartTheme::$options['no_preview_image']['url'] ) ) {
								$thumbnail = '<img class="img-responsive wp-post-image" src="'.FOODCART_IMG_URL.'noimage_630X517.jpg" alt="'.get_the_title().'">';
							}
						}
					?>
						<div class="chef-box">
							<a href="<?php the_permalink(); ?>">
								<?php echo wp_kses_post($thumbnail); ?>
							</a>
							<div class="chef-box-content">
								<span class="chef-date"><?php echo get_the_date(); ?></span>
								<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $title ); ?></a></h3>
								<span class="chef-content"><?php echo wp_kses_post( $content ); ?></span>
								<div class="rtin-cat"><i class="fa fa-tags" aria-hidden="true"></i>
									<?php
										$i = 1;
										$term_lists = get_the_terms( get_the_ID(), 'foodcart_recipe_category' );
										if ( $term_lists && ! is_wp_error( $term_lists ) ) {
											foreach ( $term_lists as $term_list ){
												$link = get_term_link( $term_list->term_id, 'foodcart_recipe_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; }
										} ?>
								</div>
								<?php if ( !empty( $foodcart_chef_social ) ){ ?>
								<div class="chef-social-wrap">
									<div class="chef-sep"></div>
									<ul class="chef-social">
										<?php foreach ( $foodcart_chef_social as $foodcart_key => $foodcart_social ): ?>
											<?php if ( !empty( $foodcart_social ) ): ?>
												<a target="_blank" href="<?php echo esc_attr( $foodcart_social );?>"><li><i class="fa <?php echo esc_attr( FoodcartTheme::$foodcart_chef_social[$foodcart_key]['icon'] );?>"></i></li></a>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>			
				</div>
			</div>
		</div>
		<?php }
		 wp_reset_postdata(); 
	}
}
 ?>
