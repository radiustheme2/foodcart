<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$foodcart_has_entry_meta  = ( ( !has_post_thumbnail() && FoodcartTheme::$options['post_date'] ) || FoodcartTheme::$options['post_author_name'] || FoodcartTheme::$options['post_comment_num'] || FoodcartTheme::$options['post_cats'] ) ? true : false;

$foodcart_comments_number = number_format_i18n( get_comments_number() );
$foodcart_comments_html = $foodcart_comments_number < 2 ? esc_html__( 'Comment' , 'foodcart' ) : esc_html__( 'Comments' , 'foodcart' );
$foodcart_comments_html = $foodcart_comments_number .' '. $foodcart_comments_html;
$foodcart_author_bio      = get_the_author_meta( 'description' );

$subtitle = get_post_meta( get_the_ID(), 'foodcart_subtitle', true );
$youtube_link = get_post_meta( get_the_ID(), 'foodcart_youtube_link', true );
$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'foodcart_facebook', true );
$news_author_tw = get_user_meta( $author, 'foodcart_twitter', true );
$news_author_ld = get_user_meta( $author, 'foodcart_linkedin', true );
$news_author_pr = get_user_meta( $author, 'foodcart_pinterest', true );
$foodcart_author_designation = get_user_meta( $author, 'foodcart_author_designation', true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php if ( FoodcartTheme::$options['post_featured_image'] == true ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="entry-thumbnail-area"><?php the_post_thumbnail( 'foodcart-size1' , ['class' => 'img-responsive'] ); ?></div>
			<?php } ?>
		<?php } ?>
		<?php if ( $foodcart_has_entry_meta ) { ?>
		<div class="entry-meta">
			<ul>
				<?php if ( FoodcartTheme::$options['post_author_name'] ) { ?>
					<li><i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link(); ?></li>
				<?php } if ( FoodcartTheme::$options['post_date'] ) { ?>			
					<li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date();?></li>
				<?php } if ( FoodcartTheme::$options['post_comment_num'] ) { ?>
					<li><i class="fa fa-comments" aria-hidden="true"></i><?php echo esc_html($foodcart_comments_html); ?></li>
				<?php } if ( FoodcartTheme::$options['post_cats'] ) { ?>			
					<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( FoodcartTheme::$options['post_view'] && function_exists( 'foodcart_views' ) ) { ?>
					<li><span class="meta-views meta-item "><?php echo foodcart_views(); ?></span></li>
				<?php } ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
	<?php 
	if ( !empty( get_the_content() ) ) { ?>
	<div class="entry-content"><?php the_content();?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'foodcart' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) ); ?>
	</div>
	<?php } ?>
	<?php if ( ( FoodcartTheme::$options['post_tags'] && has_tag() ) || FoodcartTheme::$options['post_share'] ) { ?>
	<div class="entry-footer">
		<div class="entry-footer-meta">
			<?php if ( FoodcartTheme::$options['post_tags'] && has_tag() ) { ?>
			<div class="item-tags">
				<span><?php esc_html_e( 'Tags:', 'foodcart' );?></span><?php echo get_the_term_list( $post->ID, 'post_tag', '', '', '' ); ?>
			</div>	
			<?php } if ( ( FoodcartTheme::$options['post_share'] ) && ( function_exists( 'foodcart_post_share' ) ) ) { ?>
			<div class="post-share"><span><?php esc_html_e( 'Share:', 'foodcart' );?></span><?php foodcart_post_share(); ?></div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<!-- next/prev post -->
	<?php if ( FoodcartTheme::$options['post_links'] ) { foodcart_post_links_next_prev(); } ?>
	<!-- author bio -->
	<?php if ( FoodcartTheme::$options['post_author_bio'] == '1' ) { ?>
		<div class="media about-author">
			<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
				<?php echo get_avatar( $author, 105 ); ?>
			</div>
			<div class="media-body">
				<div class="about-author-info">
					<h3 class="author-title"><?php the_author_posts_link();?></h3>
					<div class="author-designation"><?php if ( !empty ( $foodcart_author_designation ) ) {	echo esc_html( $foodcart_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
				</div>
				<?php if ( $foodcart_author_bio ) { ?>
				<div class="author-bio"><?php echo esc_html( $foodcart_author_bio );?></div>
				<?php } ?>
				<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-x-twitter" aria-hidden="true"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li><?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>			
	<?php } ?>
	
	<?php if( FoodcartTheme::$options['show_related_post'] == '1' && is_single() && !empty ( foodcart_related_post() ) ) { ?>
		<div class="related-post">
			<?php foodcart_related_post(); ?>
		</div>
	<?php } ?>
	<?php
	if ( comments_open() || get_comments_number() ){
		comments_template();
	}
	?>
</div>