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
				<h1><?php echo sprintf( __( '%s Search Results for ', 'youniverse' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>				
			</div>
		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>
