<?php get_header(); 
get_template_part('inc/banner');
?>

	<main role="main">
		<!-- section -->
		<div>
			<div class="container">
				<?php custom_breadcrumbs(); ?>
			</div>
		</div>
		<section>
			<div class="container">
				<h1><?php the_title(); ?></h1>					
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
						<br class="clear">
					</article>
					<!-- /article -->
					<?php endwhile; ?>
					<?php else: ?>
					<!-- article -->
					<article>
						<h2><?php _e( 'Sorry, nothing to display.', 'youniverse' ); ?></h2>
					</article>
					<!-- /article -->
				<?php endif; ?>				
			</div>
		</section>
	</main>
<?php get_footer(); ?>
