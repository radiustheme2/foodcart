<?php
global $post;

$current_post = get_the_ID();

if ( FoodcartTheme::$layout == 'full-width' ) {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 1 ),
		'768'  => array( 'items' => 1 ),
		'992'  => array( 'items' => 1 ),
		);
} else {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 1 ),
		'768'  => array( 'items' => 1 ),
		'992'  => array( 'items' => 1 ),
		);
}

$owl_data = array( 
	'nav'                => false,
	'dots'               => false,
	'autoplay'           => true,
	'autoplayTimeout'    => '5000',
	'autoplaySpeed'      => '200',
	'autoplayHoverPause' => true,
	'loop'               => true,
	'margin'             => 30,
	'responsive'         => $responsive
	);

$owl_data = json_encode( $owl_data );

wp_enqueue_style( 'owl-carousel' );
wp_enqueue_style( 'owl-theme-default' );
wp_enqueue_script( 'owl-carousel' );
?>
<?php
$query = new WP_Query( array( 'post_type' => 'food-menu', 'post__not_in' => array( $current_post ) ) );
if ( $query->have_posts() ) { ?>
<div class="owl-wrap related-products rt-woo-nav">
	<h2 class="inner-sub-title title-bar-big-left-close"><?php esc_html_e( 'YOU MAY ALSO LIKE', 'foodcart' );?></h2>
	<div class="owl-custom-nav">
		<div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div>
	</div>
	<div class="owl-custom-nav-bar"></div>
	<div class="clear"></div>
	<div class="owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
		<ul class="no-margin-left">
		<?php
			$count = 1;
			while ( $query->have_posts() ) {
			$query->the_post();
			$content = wp_trim_words(get_the_excerpt(), 30, '');
		?>	
			<li class="single-item-box">
				<!-- Layout -->				
				<div class="media media-none--xs">
					<div class="item-img">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'foodcart-size10', array( 'class' => 'img-responsive' ) ); ?></a>
					</div>
					<div class="media-body space-md">
						<h3 class="food-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
						<div class="item-rating">
						<?php if ( ! empty( $fmp_review_count ) ) { ?>
							<ul class="tools-bar">
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
							</ul>
						<?php } ?>
						</div>					
						<p><?php echo wp_kses_post( $content ); ?></p>
						<div class="item-price"><?php $gTotal = FMP()->fmpHtmlPrice(); ?><div class="offers"><?php echo wp_kses_post($gTotal); ?></div></div>
					</div>
				</div>				
				<!-- Layout -->
			</li>
			<?php 
			if (($count % 2) == 0){ ?>
				</ul> 
				<?php  if ( $query->current_post + 1 < $query->post_count ) {  ?>
				<ul class="no-margin-left">
			<?php }
				}  
			 $count++; ?>			
		<?php } ?>
	</div>
</div>
<?php } wp_reset_postdata(); ?>