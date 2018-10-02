<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

get_header(); ?>
	<div id="primary" class="site-content sidebar about-bg">
		<div class="main-content" role="main">
			<?php while ( have_posts() ) : the_post();
				$intro = get_field('intro');
				$description = get_field('description');
			?>
				<?php the_content(); ?>
			</div><!-- .main-content -->
		</div><!-- #primary -->
		<div id="primary" class="site-content sidebar">
			<div class="main-content" role="main">
				<?php echo $intro ?>
				<?php echo $description ?>
			<?php endwhile; // end of the loop. ?>
			<?php query_posts('post_type=services'); ?>
				<?php while ( have_posts() ) : the_post();
					$icon = get_field('icon');
					$size = "full"; ?>
					<article class="services-list">
						<aside class="services-sidebar">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</aside>
							<div class="service-images">
								<?php if($icon){
									echo wp_get_attachment_image( $icon, $size );
								} ?>
							</div>
						</article>
					<?php endwhile; // end of the loop. ?>
			<?php wp_reset_query(); ?>
			<?php while ( have_posts() ) : the_post();
				$call_to_action = get_field('call_to_action');
				$close_text = get_field('close_text');
			?>
				<?php echo $close_text ?>
				<?php echo $call_to_action ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- .main-content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
