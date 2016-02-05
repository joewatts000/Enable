<?php
	if (is_front_page()){
		$js_homepage = 1;
	} else {
		$js_homepage = 0;
	}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
    
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 

		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
			var gIsHomepage = <?php echo $js_homepage; ?>;
      var templateUrl = '<?php echo site_url(); ?>';
    </script>
    
		<script src="https://use.typekit.net/aki1dfw.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>   
		
    <style type="text/css">
      .acf-map {
      	width: 100%;
      	height: 400px;
      	border: #ccc solid 1px;
      	margin: 20px 0;
      }

      /* fixes potential theme css conflict */
      .acf-map img {
         max-width: inherit !important;
      }
    </style>

    <?php wp_head(); ?>
    
  </head>
  
  <body <?php body_class(); ?>>

    <div class="feedback-form-container">
			<h2>Feedback form goes here...</h2>
			<a href="#" class="close-form">Close</a>
    </div>

    <div class="signup-form-container">
      <h2>Signup form goes here...</h2>
      <a href="#" class="close-form">Close</a>
    </div>
    
    <div class="search-container">
        <form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
        <input class="search-input" type="search" name="s" placeholder="<?php _e( 'Enter text', 'html5blank' ); ?>">
        <button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'youniverse' ); ?></button>
        </form>
        <a href="#" class="close-form">Close</a>
    </div>
    
    <div id="site_wrapper" class="container-fluid">
  
      <?php get_template_part('inc/menu'); ?>
   