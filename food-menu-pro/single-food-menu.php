<?php
// Layout class
if ( FoodcartTheme::$layout == 'full-width' ) {
	$foodcart_layout_class = 'col-sm-12 col-xs-12';
} else {
	$foodcart_layout_class = 'col-lg-9 col-md-12';
}
?>
<?php
get_header();
$food             = FMP()->food();
$fmp_review_count = $food->get_review_count();

?>
<div class="single-menu-area content-area">
    <div class="container">
        <div class="row">
			<?php if ( FoodcartTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			} ?>
			<div class="<?php echo esc_attr( $foodcart_layout_class ); ?>">
				<?php
				global $post;
				while ( have_posts() ) {
				the_post();

				$html = null;
				?>
				<div class="single-menu-box-layout1" id="quantity-holder">
					<div class="single-product-gallery-layout1">
						<div id="fmp-images">
							<?php
							$attachments = get_post_meta( $post->ID, '_fmp_image_gallery', true );
							if ( $post->post_type == 'product' && FMP()->isWcActive() && $product = wc_get_product( $post->ID ) ) {
								$attachments = $product->get_gallery_image_ids();
							}
							$attachments = is_array( $attachments ) ? $attachments : array();
							if ( has_post_thumbnail() ) {
								array_unshift( $attachments, get_post_thumbnail_id( $post->ID ) );
							}

							$foodcart_comments_html = $fmp_review_count == 1 ? esc_html__( 'Review', 'foodcart' ) : esc_html__( 'Reviews', 'foodcart' );
							$foodcart_comments_html = $fmp_review_count . ' ' . $foodcart_comments_html;

							if ( ! empty( $attachments ) ) {
								if ( count( $attachments ) > 1 ) { ?>
									<div id='fmp-slide-wrapper'>
										<div id='fmp-slider' class='flexslider'>
											<ul class='slides'>
												<?php foreach ( $attachments as $attachment ) { ?>
													<li class='fmp-slide'><?php echo( FMP()->getAttachedImage( $attachment, 'full' ) ); ?></li>
												<?php } ?>
											</ul>
										</div>
										<?php if ( in_array( $post->post_type, array(
											FMP()->post_type,
											'product'
										) ) ) { ?>
											<div id='fmp-carousel' class='flexslider'>
												<ul class='slides'>
													<?php foreach ( $attachments as $attachment ) { ?>
														<li class='fmp-slide-thumb'><?php echo( FMP()->getAttachedImage( $attachment, 'thumbnail' ) ); ?></li>
													<?php } ?>
												</ul>
											</div>
										<?php } ?>
									</div>
								<?php } else { ?>
									<div class='fmp-single-food-img-wrapper'>
										<?php echo( FMP()->getAttachedImage( $attachments[0] ) ); ?>
									</div>
								<?php }
							} else {
								$imgSrc = FMP()->placeholder_img_src();
								?>
								<div class='fmp-single-food-img-wrapper'>
									<img class='fmp-single-food-img' alt='Place holder image'
										 src="<?php $imgSrc; ?>"/>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="item-information">
					<div class="item-menu-header">
						<h3 class="item-title"><?php echo get_the_title(); ?></h3>
						<?php
							$fmp_type = get_post_meta( $post->ID, '_fmp_type', true );
							if ( 'variable' !== $fmp_type ) {
								$gTotal = FMP()->fmpHtmlPrice();
								if ( ! empty( $gTotal ) ) {
									echo wp_kses_post( $gTotal );
								}
						} ?>
						</div>
						<div class="item-rating">
							<ul>
								<?php if ( ! empty( $fmp_review_count ) ) { ?>
								<li class="tools-bar">
									<?php
									$total_rating = array();
									$comments     = get_comments( array(
										'post_id' => get_the_ID(),
										'number'  => $fmp_review_count
									) );
									foreach ( $comments as $comment ) {
										$meta_values = get_comment_meta( $comment->comment_ID, 'rating', true );
										array_push( $total_rating, $meta_values );
									}
									$total_star   = array_sum( $total_rating );
									$final_rate   = ( $total_star / $fmp_review_count );
									$rating_width = ( $final_rate * 100 ) / 5;
									?>
									<div itemprop="reviewRating" itemscope=""
										 itemtype="http://schema.org/Rating"
										 class="star-rating"
										 title="Rated <?php echo esc_html( $final_rate ); ?> out of 5">
									<span style="width:<?php echo esc_html( $rating_width ); ?>%"><strong
											itemprop="ratingValue"><?php echo esc_html( $final_rate ); ?></strong><?php esc_html__( 'out of 5', 'foodcart' ); ?></span>
									</div>
								</li>
								<?php } ?>
								<li>( <?php echo wp_kses_post ( $foodcart_comments_html ); ?> )</li>
								<li>
									<?php
									global $post;
									if ( 'variable' == $fmp_type ) {
										$variations = get_posts( array(
											'post_type'      => 'fmp_variation',
											'posts_per_page' => - 1,
											'post_status'    => 'any',
											'post_parent'    => $post->ID,
											'order'          => 'ASC'
										) );
										$html       = null;
										if ( ! empty( $variations ) ) {
											$html .= '<table class="fmp-price-listing">';
											foreach ( $variations as $variation ) {
												$name  = get_post_meta( $variation->ID, '_name', true );
												$price = FMP()->getPriceWithSymbol( get_post_meta( $variation->ID, '_price', true ) );
												$html  .= "<tr><td>{$name}</td><td>{$price}</td>";
											}
											$html .= '</table>';
										}
										echo wp_kses_post( $html );
									}
									?>
									<?php if ( 'variable' != $fmp_type ) { ?>
										<div class="inner-sub-title <?php if ( FoodcartTheme::$options['stock_available_display'] == 0 ) { ?> no-stock-div<?php } ?>">
											<?php if ( FoodcartTheme::$options['stock_available_display'] == 1 ) { ?>
												<div><?php esc_html_e( 'Availability', 'foodcart' ); ?> : <?php $stock_status = get_post_meta( get_the_ID(), '_stock_status', true );
													if ( $stock_status == 'instock' ) {
														echo esc_html_e( 'In stock', 'foodcart' );
													} else {
														echo esc_html_e( 'Out of stock', 'foodcart' );
													} ?></div>
											<?php } ?>
										</div>
									<?php } ?>
								</li>
							</ul>
						</div>
						<?php the_excerpt(); ?>
						<?php
						$review_active        = get_post_meta( get_the_ID(), 'comment_status', true );
						$ingredients          = (array) get_post_meta( get_the_ID(), '_ingredient' );
						$nutrition            = (array) get_post_meta( get_the_ID(), '_nutrition' );
						$ingredient_is_active = get_post_meta( get_the_ID(), '_ingredient_status', true );
						$nutrition_is_active  = get_post_meta( get_the_ID(), '_nutrition_status', true );
						?>
						<?php if ( ( ! empty( $ingredients ) && $ingredient_is_active ) || ( ! empty( $nutrition ) && $nutrition_is_active ) ) {							
						?>
						<div class="row">
							<?php if ( ! empty( $ingredients ) && $ingredient_is_active ) {
							?>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="ingredients-box">
									<h3><?php esc_html_e( 'Ingredients', 'foodcart' ); ?></h3>
									<?php									
									global $post;
									$post_id = get_the_ID();
									$post_id = absint( get_the_ID() );
									if ( !empty( $post_id )) {

									$html        = null;
									if ( !empty($ingredients) ) {
										$html .= "<ul>";
										foreach ( $ingredients as $ingredient ) {
											$ing   = ! empty( $ingredient['id'] ) ? get_term( $ingredient['id'], FMP()->taxonomies['ingredient'] ) : null;
											$unit  = ! empty( $ingredient['unit_id'] ) ? get_term( $ingredient['unit_id'], FMP()->taxonomies['unit'] ) : null;
											$value = ! empty( $ingredient['value'] ) ? ' ' . $ingredient['value'] : null;
											if ( is_object( $unit ) && $unit->name && $value ) {
												$unit = " {$unit->name}";
											} else {
												$unit = null;
											}
											if ( is_object( $ing ) ) {
												$html .= "<li><i class='fa fa-check' aria-hidden='true'></i>{$ing->name}{$value}{$unit}</li>";
											}
										}
										$html .= "</ul>";
									}
									
									echo wp_kses_post( $html );
									} ?>									
								</div>
							</div>
							<?php }
							if ( ! empty( $nutrition ) && $nutrition_is_active ) {								
							?>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="nutrition-box">
									<h3><?php esc_html_e( 'Nutrition', 'foodcart' ); ?></h3>
									<?php
									$post_id = absint( get_the_ID() );
									if ( ! $post_id ) {
										global $post;
										$post_id = $post->ID;
									}
									$html       = null;
									$nutritions = get_post_meta( $post_id, '_nutrition' );
									if ( ! empty( $nutritions ) ) {
										$html .= "<ul>";
										foreach ( $nutritions as $nutrition ) {
											$nut   = ! empty( $nutrition['id'] ) ? get_term( $nutrition['id'], FMP()->taxonomies['nutrition'] ) : null;
											$unit  = ! empty( $nutrition['unit_id'] ) ? get_term( $nutrition['unit_id'], FMP()->taxonomies['unit'] ) : null;
											$value = ! empty( $nutrition['value'] ) ? ' ' . $nutrition['value'] : null;
											if ( is_object( $unit ) && ! empty( $unit->name ) && $value ) {
												$unit = " {$unit->name}";
											} else {
												$unit = null;
											}
											if ( is_object( $nut ) ) {
												$html .= "<li><i class='fa fa-check' aria-hidden='true'></i>{$nut->name}{$value}{$unit}</li>";
											}
										}
										$html .= "</ul>";
									}
									echo wp_kses_post( $html );
									?>
								</div>
							</div>
						<?php } ?>
						</div>
					<?php } ?>
					</div>

					<div class="item-related-form">
						<?php $food = FMP()->food(); ?>
						<?php if ( ! empty( $review_active ) ) { ?>
							<div id="reviews" class="fmp-reviews">
								<!-- new S-->								
								<div class="item-reviews">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="active" href="#related4" data-toggle="tab" aria-expanded="false"><?php esc_html_e ( 'Menu Ratings' , 'foodcart' ); ?></a>
										</li>
										<li class="nav-item">
											<a href="#related5" data-toggle="tab" aria-expanded="false"><?php esc_html_e ( 'Additional Info' , 'foodcart' ); ?></a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade active show" id="related4">
										<div id="comments">
											<h4 class="fmp-reviews-title"><?php
												if ( $count = $food->get_review_count() ) {
													printf( _n( '%s review for %s%s%s', '%s reviews for %s%s%s', $count, 'foodcart' ), $count,
														'<span>',
														get_the_title(), '</span>' );
												} else {
													esc_html_e( 'Reviews', 'foodcart' );
												}
												?></h4>
											<?php
											$comments = get_comments( array(
												'post_id' => $food->id,
												'status'  => 'approve' //Change this to the type of comments to be displayed
											) );

											if ( ! empty( $comments ) && is_array( $comments ) ) : ?>
												<ul class="commentlist">
													<?php wp_list_comments( apply_filters( 'fmp_product_review_list_args',
														array( 'callback' => 'FmFilterHook::fmp_comments' ) ), $comments ); ?>
												</ul>
												<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
													echo '<nav class="fmp-pagination">';
													paginate_comments_links( apply_filters( 'fmp_comment_pagination_args', array(
														'prev_text' => '&larr;',
														'next_text' => '&rarr;',
														'type'      => 'list',
													) ) );
													echo '</nav>';
												endif; ?>
											<?php else : ?>
												<p class="fmp-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'foodcart' ); ?></p>
											<?php endif; ?>
										</div>
										</div>
										<div class="tab-pane fade" id="related5">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
								<!-- new E-->
								

								<div id="review_form_wrapper">
									<div id="review_form">
										<?php
										$commenter    = wp_get_current_commenter();
										$comment_form = array(
											'title_reply'         => have_comments() ? esc_html__( 'Add a review',
												'foodcart' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'foodcart' ),
												get_the_title() ),
											'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'foodcart' ),
											'comment_notes_after' => '',
											'fields'              => array (
												'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name','foodcart' ) . ' <span class="required">*</span></label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>',
												
												'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email','foodcart' ) . ' <span class="required">*</span></label> ' . '<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>',
											),
											'label_submit'        => esc_html__( 'Submit', 'foodcart' ),
											'logged_in_as'        => '',
											'comment_field'       => ''
										);

										$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.',
												'foodcart' ), esc_url( '/login/' ) ) . '</p>';
										// TODO check for is rating is enable
										$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'foodcart' ) . '</label><select name="rating" id="rating" aria-required="true" required>
										<option value="">' . esc_html__( 'Rate&hellip;', 'foodcart' ) . '</option>
										<option value="5">' . esc_html__( 'Perfect', 'foodcart' ) . '</option>
										<option value="4">' . esc_html__( 'Good', 'foodcart' ) . '</option>
										<option value="3">' . esc_html__( 'Average', 'foodcart' ) . '</option>
										<option value="2">' . esc_html__( 'Not that bad', 'foodcart' ) . '</option>
										<option value="1">' . esc_html__( 'Very Poor', 'foodcart' ) . '</option>
										</select></div>';

										$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your Review', 'foodcart' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

										comment_form( apply_filters( 'fmp_food_review_comment_form_args', $comment_form ) );
										?>
									</div>
								</div>

								<div class="clear"></div>
							</div> <?php } ?>
						<?php }	?>				
						
					</div>
					<div class="item-related-post">
						<?php if ( FoodcartTheme::$options['related_food_menu'] == 1 ) { ?>
							<?php get_template_part( 'template-parts/content-other', 'menu' ); ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php if ( FoodcartTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			} ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>