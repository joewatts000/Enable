<?php get_header(); ?>
		<main role="main">
		<!-- section -->

		<div class="breadcrumbs-wrap">
			<div class="container">
				<?php custom_breadcrumbs(); ?>
			</div>
		</div>
		<!-- section -->
		<section class="page-content">
			<div class="container">
				<!-- article -->
				<article id="post-404">
					<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
					<h2>
						<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
					</h2>
				</article>
			</div>
		</section>
	</main>
<?php get_footer(); ?>
