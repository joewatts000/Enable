<?php get_header(); ?>
	<div id="" role="main" class="page-content">
		<!-- section -->
		<div class="breadcrumbs-wrap row">
			<div class="container no-padding">
				<?php custom_breadcrumbs(); ?>
			</div>
		</div>
		<!-- section -->
		<section>
			<div class="column_wrapper row">
				<div class="content_wrap">				
					<?php
						add_action('wp_head','pluginname_ajaxurl');
						function pluginname_ajaxurl() {
							?>
								<script type="text/javascript">
									var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
								</script>
							<?php
						}
					?>
					<div class="calendar-container">
						<div class="calendar-filters">

							<select>
								<option value="all">All</option>
								<option value="category-arts">Arts</option>
								<option value="category-bereavement">Bereavement</option>
								<option value="category-filming">Filming</option>
								<option value="category-parks">Parks</option>
								<option value="category-public-halls">Public Halls</option>
								<option value="category-putney">Putney School of Art and Design</option>
								<option value="category-leisure-sports">Leisure and Sport</option>
							</select>
							<?php 
								// $args = array(
								//     'show_option_all'    => '',
								//     'orderby'            => 'name',
								//     'order'              => 'ASC',
								//     'style'              => 'list',
								//     'show_count'         => 1,
								//     'hide_empty'         => 0,
								//     'use_desc_for_title' => 1,
								//     'child_of'           => 0,
								//     'feed'               => '',
								//     'feed_type'          => '',
								//     'feed_image'         => '',
								//     'exclude'            => '',
								//     'exclude_tree'       => '',
								//     'include'            => '',
								//     'hierarchical'       => 1,
								//     'title_li'           => __( 'Categories' ),
								//     'show_option_none'   => __( '' ),
								//     'number'             => null,
								//     'echo'               => 1,
								//     'depth'              => 0,
								//     'current_category'   => 0,
								//     'pad_counts'         => 0,
								//     'taxonomy'           => 'category',
								//     'walker'             => null
								// );
								// wp_list_categories( $args ); 
							?>
						</div>
					
			        	<?php 
			        		//echo '<span class="ajaxurl">'.admin_url('admin-ajax.php').'</span>';
			        		//$chosenMonth = 0;
			        		//$chosenMonth = htmlspecialchars($_GET["calmonth"]);
							/* sample usages */
							$today = date("Y/m/d");
							$thisYear = date("Y");
							$thisMonth = date("m");
							//echo '<h2>'. date("Y") .' ' . date("M") . '</h2>';
							//echo '<h3>Today is: '. $today .'</h3>';
							//echo "Month: " + $thisMonth + '<p>hhh</p>';
							echo draw_calendar($thisMonth, $thisYear);
			        	?>
		        	</div>
		        	<div class="cal-popup"><div class="cal-popup-inner"></div></div>
		        	<div class="col-xs-12">
		        		<div class="pull-left"><a href="#" class="cal-prev">Prev Month</a></div>
		        		<div class="pull-right"><a href="#" class="cal-next">Next Month</a></div>
		        	</div>
					<?php get_template_part('pagination'); ?>
				</div>
			</div>
		</section>
	</div>
<?php get_footer(); ?>