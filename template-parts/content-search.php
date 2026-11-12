<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$ul_class = $post_classes = '';

$foodcart_has_entry_meta  = ( ( !has_post_thumbnail() && FoodcartTheme::$options['blog_date'] ) || FoodcartTheme::$options['blog_author_name'] || FoodcartTheme::$options['blog_comment_num'] || FoodcartTheme::$options['blog_cats'] ) ? true : false;

$foodcart_has_entry_meta2  = ( FoodcartTheme::$options['blog_author_name'] || FoodcartTheme::$options['blog_comment_num'] || FoodcartTheme::$options['blog_cats'] ) ? true : false;

$foodcart_time_html       = sprintf( '%s <span>%s</span>,<span> %s</span>',get_the_time( 'M' ), get_the_time( 'd' ), get_the_time( 'Y' ) );
$foodcart_time_html       = apply_filters( 'foodcart_single_time', $foodcart_time_html );
$foodcart_time_html_2     = apply_filters( 'foodcart_single_time_no_thumb', get_the_time( get_option( 'date_format' ) ) );

$foodcart_comments_number = number_format_i18n( get_comments_number() );
$foodcart_comments_html = $foodcart_comments_number < 2 ? esc_html__( 'Comment' , 'foodcart' ) : esc_html__( 'Comments' , 'foodcart' );
$foodcart_comments_html = '('. $foodcart_comments_number . ') ' . $foodcart_comments_html;

$thumbnail = false;

$thumb_size = 'foodcart-size2';

if (  FoodcartTheme::$layout == 'right-sidebar' || FoodcartTheme::$layout == 'right-sidebar' ){
	$post_classes = array( 'col-lg-6 col-md-6 col-sm-6 col-12 rt-grid-item blog-layout-1' );
	$ul_class = 'side_bar';
} else {
	$post_classes = array( 'col-lg-4 col-md-4 col-sm-4 col-12 rt-grid-item blog-layout-1' );
	$ul_class = '';
}
$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( $content, FoodcartTheme::$options['post_content_limit'], '' );	
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	<div class="blog-box">
		<?php if ( has_post_thumbnail() || FoodcartTheme::$options['display_no_preview_image'] == '1'  ) { ?>
		<div class="blog-img-holder">
			<div class="blog-img">
			<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
					<?php } else {
					if ( FoodcartTheme::$options['display_no_preview_image'] == '1' ) {
						if ( !empty( FoodcartTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = wp_get_attachment_image( FoodcartTheme::$options['no_preview_image']['id'], $thumb_size );						
						}
						elseif ( empty( FoodcartTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = '<img class="wp-post-image" src="'.FOODCART_IMG_URL.'noimage_900X500.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
						}
						echo wp_kses_post( $thumbnail );				
					}
				}
				?>
			</a>
			</div>
		</div>
		<?php } ?>
		<div class="blog-content-holder">
			<?php if ( has_post_thumbnail() || FoodcartTheme::$options['display_no_preview_image'] == '1'  ) { ?>
				<?php if ( FoodcartTheme::$options['blog_date'] ) { ?>
				<div class="post-date"><?php echo get_the_date();?></div>
				<?php } ?>
			<?php } ?>
			
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php if ( $foodcart_has_entry_meta ) { ?>
			<ul>
				<?php if ( FoodcartTheme::$options['blog_author_name'] ) { ?>
				<li><i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link(); ?></li>
				<?php } if ( !is_search() && FoodcartTheme::$options['blog_cats'] ) { ?>			
				<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( FoodcartTheme::$options['blog_comment_num'] ) { ?>
				<li><i class="fa fa-comments" aria-hidden="true"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo esc_html( $foodcart_comments_html );?></a></li>
				<?php } ?>
				<?php if ( FoodcartTheme::$options['blog_date'] ) { ?>
				<li><?php if ( !has_post_thumbnail() && ( FoodcartTheme::$options['display_no_preview_image'] == 'off'  ) ) { ?>
				<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date(); ?>
				<?php } ?>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
			<div class="blog-text"><?php echo wp_kses_post( $content ); ?></div>
		</div>
	</div>
</div>