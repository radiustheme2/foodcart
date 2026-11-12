<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Foodcart;
use FoodcartTheme_Helper;
use \WP_Query;

global $post;

$foodcart_team_designation 	= get_post_meta( $post->ID, 'foodcart_team_designation', true );
$foodcart_team_email    	= get_post_meta( $post->ID, 'foodcart_team_email', true );
$foodcart_team_skill       	= get_post_meta( $post->ID, 'foodcart_team_skill', true );
$foodcart_team_counter      = get_post_meta( $post->ID, 'foodcart_team_count', true );
$socials        			= get_post_meta( $post->ID, 'foodcart_team_socials', true );
$socials        			= array_filter( $socials );
$socials_fields 			= FoodcartTheme_Helper::team_socials();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-12">
				<div class="rtin-content">
					<div class="rtin-heading">
						<h2><?php the_title();?></h2>
					</div>
					<ul class="designation">
						<?php if ( $foodcart_team_designation ) { ?>
							<li><span class="rtin-label"><?php esc_html_e( 'Position', 'foodcart' );?>:</span><?php echo esc_html( $foodcart_team_designation );?></li>
						<?php } ?>
						<?php if ( $foodcart_team_email ) { ?>
							<li><span class="rtin-label"><?php esc_html_e( 'E-Mail', 'foodcart' );?>:</span><?php echo esc_html( $foodcart_team_email );?></li>
						<?php } ?>
					</ul>
					<?php the_content();?>
					<!-- Team Skills -->
					<?php if ( !empty( $foodcart_team_skill ) ) { ?>
					<div class="rtin-skills">
						<?php foreach ( $foodcart_team_skill as $skill ): ?>
							<?php
							if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
								continue;
							}
							$skill_value = (int) $skill['skill_value'];
							$skill_style = "width:{$skill_value}%;";

							if ( !empty( $skill['skill_color'] ) ) {
								$skill_style .= "background-color:{$skill['skill_color']};";
							}
							?>
							<div class="rtin-skill-each">
								<div class="rtin-name"><?php echo esc_html( $skill['skill_name'] );?></div>
								<div class="progress">
									<div class="progress-bar progress-bar-striped fadeInLeft animated" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?>"> <span><?php echo esc_html( $skill_value );?>%</span></div>
								</div>								
							</div>
						<?php endforeach;?> 
					</div>					
					<?php } ?>				
					<!-- Team Counter -->
					<?php if ( !empty( $foodcart_team_counter ) ) { ?>
					<div class="rtin-team-counter">
						<?php foreach ( $foodcart_team_counter as $counter ): ?>
							<?php
							if ( empty( $counter['count_name'] ) || empty( $counter['count_value'] ) ) {
								continue;
							}
							$count_value = (int) $counter['count_value'];
							?>						
							<div class="rtin-team-each">
								<h3 class="rtin-name"><?php echo esc_html( $counter['count_name'] );?></h3>
								<div class="team-counter">
									<div class="counter-detail" data-num="<?php echo esc_attr( $count_value );?>"><?php echo esc_attr( $count_value );?></div>
								</div>
							</div>
						<?php endforeach;?> 
					</div>					
					<?php } ?>
					<?php if ( !empty( $socials ) ) { ?>
						<ul class="rtin-social">
							<?php foreach ( $socials as $key => $value ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>						
					<?php } ?>
				</div>
			</div>
			<div class="col-md-5 col-12">
				<div class="rtin-thumb">
					<?php the_post_thumbnail( 'foodcart-size6' );?>
				</div>
			</div>
		</div>
	</div>
</div>