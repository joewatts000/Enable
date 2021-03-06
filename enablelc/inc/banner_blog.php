
<?php
	$post_id = 6; // id of the blog page
	$banner = get_field('show_banner', $post_id);
	$banner_count = 0;
	$display_arrows = get_field('show_banner_title', $post_id);
	$display_arrows = true;
	
	if ($banner == true){
	 
	 if(have_rows('select_slides', $post_id)){
		 
		 echo '
		 <div id="myCarousel" class="row carousel carousel-fade slide" data-ride="carousel">
			 <div class="carousel-inner" role="listbox">
			 ';
		 
			// display slides here
			 while (have_rows('select_slides', $post_id)){
				the_row();
				
				$value = get_sub_field( "new_slide" );
				$ID = $value;
				$args = array('p' => $ID, 'post_type' => 'banner');
				$loop = new WP_Query($args);
				
				while ($loop->have_posts()){
					$loop->the_post();
					
					$feature_image = get_field('banner_image');					
					$feature_display_size = 'banner_img'; 
					
					$show_caption = get_field('show_text_panel');
					$show_title = get_field('show_banner_title');
					$banner_text = get_field('banner_text');
					$banner_link_url = get_field('banner_link');
					$banner_link_text = get_field('banner_link_text');
					if ($banner_link_text == ''){
						$banner_link_text = 'Find out more';
					}
					
					echo '
					<div class="item'.($banner_count == 0 ? ' active' : '').'">
						';
						if ($show_caption == false && $banner_link_url != ''){
							echo '<a class="full_banner_btn" href="'.$banner_link_url.'" title="'.$banner_link_text.'">';
						}
						
						echo '<img class="slide_'.$banner_count.'" src="'.$feature_image['sizes'][$feature_display_size].'" alt="'.$feature_image["alt"].'">';
						
						if ($show_caption == false && $banner_link_url != ''){
							echo '</a>';
						}
						
						
						if ($show_caption == true){
							echo '
							<div class="">
								<div class="carousel-caption">
									';
									if ($show_title == true){
										echo '<h2>'.get_the_title().'</h2>';
									}
									
									echo $banner_text;
									
									if ($banner_link_url != ''){
										echo '<p><a class="btn btn-lg btn-primary" href="'.$banner_link_url.'" role="button">'.$banner_link_text.'</a></p>';
									}
									echo '
								</div>
							</div>
							';
						}
						echo '
					</div>
					';
					
					$banner_count ++;
					wp_reset_query();
					
				}
				 
			}
			 
			 echo '</div>'; // end of .carousel-inner
		 
			 // display indicator links
		 
			 if ($banner_count >1){
				 echo '<ol class="carousel-indicators">';
				 for ($cx = 0; $cx < $banner_count; $cx ++){
					 echo '<li data-target="#myCarousel" data-slide-to="'.$cx.'" class="'.($cx == 0 ? 'active' : '').'"></li>';
				 }
				 echo '</ol>';
			 }
			 
			 
			 

			 if ($display_arrows){
					echo '
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>

					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
					';
			 }

			echo '</div>'; // end of #myCarousel
			
		}
	}



?>

