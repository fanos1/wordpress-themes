<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php 
	// Changing the title for various sections on the site
	if ( is_home () ) { 
	    bloginfo('name'); 
	} elseif ( is_category() || is_tag() ) {
	    single_cat_title(); 
		echo ' &bull; ' ; 
		bloginfo('name'); 
	} elseif ( is_single() || is_page() ) { 
	    single_post_title(); 
	} else { 
	    wp_title('',true); 
	} 
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
      
    
    <!-- bjqs.css contains the *essential* css needed for the slider to work -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/jcobb_slider/bjqs.css"> 
    
    <!-- load jQuery and the plugin -->
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="<?php echo bloginfo('template_directory'); ?>/jcobb_slider/js/bjqs-1.3.min.js"></script>  
    
	<?php wp_head(); ?>
</head>




<body <?php body_class(); //probably don't need this, DLEETE IT, it gives class to <body> but i don't use it in CSS ?>>
	
	<div id="wrap">  		
        <div id="header">                                
			
            <div class="search">
				<?php
				// The default search form
				get_search_form();	?>
			</div><!-- #search -->
            
            
            <?php 
			  // Checking if there's anything in Top Menu
			  if ( has_nav_menu( 'topcommonlinks-menu' ) ) {		 				
				  // If there is, adds the Top Menu area
				  wp_nav_menu( array(
					  'menu' => 'Topcommonlinks Menu',
					  'container' => 'div',
					  'container_class' => 'topcommonlinks-menu',
					  'theme_location' => 'topcommonlinks-menu'
				  ));
			  }			
			  /*---------------- 
			  wordpress will also automatically assign a class called [menu] to <UL>. so, it becomes: 
			  <ul id='x' class='menu'>
			  
			  <div class="topcommonlinks-menu">
			  	<ul id="menu-common-links-top" class='menu' >
				
				</ul>
			  </div>
			  --------------*/ ?>          
                      
		</div><!-- #header -->
        
        
        
        
		<?php
		  // Checking if there's anything in Top Menu
		  if ( has_nav_menu( 'top-menu' ) )  
		  {				
			  // If there is, adds the Top Menu area. .top-menu class is created which will be our global bar
			  wp_nav_menu( array(
					  'menu' => 'Top Menu',
					  'container' => 'div',
					  'container_class' => 'top-menu',
					  'theme_location' => 'top-menu',
					  //'link_after' => '<li>irfan kissa</li>'
			  ));
		  } 				
		?>
            
<div class="clearFloat"></div><!--cler float -->

		<div id="slide-container">
			<?php include('jcobb_slider/index2.php'); ?>
		</div><!-- #slide-container -->
        
        
       