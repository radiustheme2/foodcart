<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( FoodcartTheme::$layout == 'full-width' ) {
	$foodcart_layout_class = 'col-sm-12 col-12';
}
else{
	$foodcart_layout_class = 'col-lg-9 col-md-12 col-12';
}
$foodcart_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

$foodcart_author_bio      = get_the_author_meta( 'description' );
$subtitle = get_post_meta( get_the_ID(), 'foodcart_subtitle', true );
$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'foodcart_facebook', true );
$news_author_tw = get_user_meta( $author, 'foodcart_twitter', true );
$news_author_ld = get_user_meta( $author, 'foodcart_linkedin', true );
$news_author_pr = get_user_meta( $author, 'foodcart_pinterest', true );
$foodcart_author_designation = get_user_meta( $author, 'foodcart_author_designation', true );
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( FoodcartTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $foodcart_layout_class );?>">
				<main id="main" class="site-main">
					<!-- author bio -->
					<?php if ( FoodcartTheme::$options['post_author_bio'] == '1' ) { ?>
						<div class="media about-author">
							<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
								<?php echo get_avatar( $author, 105 ); ?>
							</div>
							<div class="media-body">
								<div class="about-author-info">
									<div class="author-title"><?php the_author_posts_link();?></div>
									<div class="author-designation"><?php if ( !empty ( $foodcart_author_designation ) ) {	echo esc_html( $foodcart_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
								</div>
								<?php if ( $foodcart_author_bio ) { ?>
								<div class="author-bio"><?php echo esc_html( $foodcart_author_bio );?></div>
								<?php } ?>
								<div class="about-author-social">
								<?php ?>
									<ul class="author-box-social">
										<?php if ( ! empty( $news_author_fb ) ){ ?><a href="<?php echo esc_attr( $news_author_fb ); ?>"><li><i class="fab fa-facebook" aria-hidden="true"></i></li></a><?php } ?>
										<?php if ( ! empty( $news_author_tw ) ){ ?><a href="<?php echo esc_attr( $news_author_tw ); ?>"><li><i class="fab fa-x-twitter" aria-hidden="true"></i></li></a><?php } ?>
										<?php if ( ! empty( $news_author_ld ) ){ ?><a href="<?php echo esc_attr( $news_author_ld ); ?>"><li><i class="fab fa-linkedin-in" aria-hidden="true"></i></li></a><?php } ?>
										<?php if ( ! empty( $news_author_pr ) ){ ?><a href="<?php echo esc_attr( $news_author_pr ); ?>"><li><i class="fab fa-pinterest-p" aria-hidden="true"></i></li></a><?php } ?>
									</ul>
								<?php ?>
								</div>
							</div>
							<div class="clear"></div>
						</div>			
					<?php } ?>
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $foodcart_is_post_archive && FoodcartTheme::$options['blog_style'] == 'style4' ) {						
							echo '<div class="blog-layout-4 row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-4-masonry', get_post_format() );
							endwhile;
							echo '</div>';
						} elseif ( $foodcart_is_post_archive && FoodcartTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="blog-layout-3">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} elseif ( $foodcart_is_post_archive && FoodcartTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="row auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $foodcart_is_post_archive && FoodcartTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php FoodcartTheme_Helper::pagination();?>
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