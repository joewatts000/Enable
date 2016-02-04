<?php /* Template Name: Home Page */
get_header(); 
get_template_part('inc/banner');
?>

	<div role="main" class="page-content">
	
		<div class="row">
			<div class="content_wrap">
				<?php custom_breadcrumbs(); ?>
			</div>
		</div>
		
		
		<div id="icon_service_menu" class="row">
			<div class="content_wrap homepage-service-menu">				
				<?php 
					// Add service menu to home page
					if (is_front_page()){
						$front_page_value = 'true';
						wp_nav_menu(array(
							'theme_location' => 'find_service',
							'container' => 'div',
							'container_class' => 'service_icon_wrapper clearfix',
							'menu_class' => 'icon_menu clearfix',
							'link_before' => '<span>',     
							'link_after'  => '</span>',
							'fallback_cb' => false
						));
					} else {
						$front_page_value = 'false';
					}
					// mDR_Debug('is_front_page = '.$front_page_value);
				?>
			</div>
		</div>
		<section class="row">
			<div class="content_wrap container no-padding news-events">
				<div id="twitter">
 
					<script type="text/javascript">(function(){var ticker=document.createElement('script');ticker.type='text/javascript';ticker.async=true;ticker.src='//twitcker.com/ticker/Joewatts000.js?speed=4&background=019fe9&tweet=ffffff&open=true&container=own-container&own-container=twitter';(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(ticker);})();</script>
 
				</div>		
				<?php 
					$the_query = new WP_Query( array(
						     'posts_per_page' => 3
						) );
				?>
					<h2>News &amp; Events</h2>
					<?php if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<div class="col-sm-4 no-padding recent-post equalheights">
							<!-- article -->
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<!-- post title -->
									<h3 class="eq-h-header">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h3>
									<!-- /post title -->
									<?php the_excerpt(); // Build your custom callback length in functions.php ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="enable_btn">More news</a>
							</article>
							<!-- /article -->
						</div>
					<?php endwhile; ?>
					<?php else: ?>
						<!-- article -->
						<article>
							<h2><?php _e( 'Sorry, nothing to display.', 'youniverse' ); ?></h2>
						</article>
						<!-- /article -->
					<?php endif; wp_reset_postdata(); ?>
			</div>
		</section>
		
		
		<?php
		// display multiple feature panels
		// $show_fp = get_field('dis_ft_pan');
		// if ($show_fp == true){
			// get_template_part('inc/display_features_pos_2_fw');
			if (have_rows('add_ft')){
				echo '
				<section id="feature_multi" class="features">
					<div class="content_wrap clearfix">
					';
				while (have_rows('add_ft')){
					the_row();
					$ft_img = get_sub_field('ft_img');
					$ft_link = get_sub_field('ft_link');
					$ft_size = get_sub_field('ft_size');

					if($ft_size == "third"){
						echo '<div class="col-sm-4 feature"><a href="'.$ft_link.'"><img src="'.$ft_img.'" /></a></div>';
					}else if ($ft_size == "half"){
						echo '<div class="col-sm-6 feature"><a href="'.$ft_link.'"><img src="'.$ft_img.'" /></a></div>';
					}else if ($ft_size == "full"){
						echo '<div class="col-sm-12 feature"><a href="'.$ft_link.'"><img src="'.$ft_img.'" /></a></div>';
					}

				}
				echo '
		</div>
	</section>	
	';
			}
		// }	


		// Display any full-width features
		// $show_fp = get_field('dis_ft_pan');
		// if ($show_fp == true){
		// 	get_template_part('inc/display_feature_pos_3');
		// }
		
		// Display a map
		if (have_rows('locations')){		
			echo '
			<section class="row">
				<div class="content_wrap">
				';
				get_template_part('inc/display_map');							
				echo '
				</div>
			</section>
			';
		}
		?>
		
		
	</div>
<?php get_footer(); ?>