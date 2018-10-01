<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?> xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="St Mungos, we provide help to homeless and vulnerable people." />
	<title>
	<?php 
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
    <!--
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    -->	
    <!-- bjqs.css contains the *essential* css needed for the slider to work -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/jcobb_slider/bjqs.css" />     
    <!-- demo.css contains some cosmetic styling for the slider, not a must -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/jcobb_slider/demo.css" />     
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
      
            
    <!-- load jQuery and the plugin -->
	<script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo bloginfo('template_directory'); ?>/jcobb_slider/js/bjqs-1.3.min.js" type="text/javascript"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/jcobb_slider/js/libs/jquery.secret-source.min.js" type="text/javascript"></script>  
    
    <!-- attach the plug-in to the slider parent element and adjust the settings as required -->
    <script type="text/javascript">
     jQuery(document).ready(function($) {
      
      $('#banner-slide').bjqs({
        animtype      : 'slide',
        height        : 300,
        width         : 950,
        responsive    : true,
        randomstart   : true
      });
      
     });
   </script>
    
	<?php wp_head(); ?>
</head>




<body <?php body_class();  ?>>		
    <div id="wrap">  	        
    	
		<a class="skiplink" href="#content-frontpage">
        	<img src="<?php echo bloginfo('template_directory'); ?>/img/skip_link.gif" alt="skip navigation links to go directly to content" />
        </a>
    
                        		
        <div id="header">        				
             <div class="logo">
            	<a href="http://www.mungos.org/" title="to St Mungos main website">                	
                    <img src="<?php echo bloginfo('template_directory'); ?>/img/logo.PNG" alt="St mungos opens doors to homeless people" />
               	</a>
            </div><!-- .logo -->
            
                                   
            <?php 
			// Checking if there's anything in Top Menu. If there is, adds the Top Menu area
			if ( has_nav_menu( 'topcommonlinks-menu' ) ) {		 								  
				wp_nav_menu( array(
					  'walker' => new Child_Walker_Nav_Menu(), //we register new class only for commonlinkbar, GLOBAR menu will use default class
					  'theme_location' => 'topcommonlinks-menu',
					  'menu' => 'Topcommonlinks Menu',
					  'container' => 'div',
					  'container_class' => 'topcommonlinks-menu'
				));				  
			}//End TOP common links bar menu  
			?>
            
           <div class="search">
				<?php
				// The default search form
				get_search_form();	?>
			</div><!-- #search -->            
		</div><!-- #header -->                    
        <div class="clearFloat"></div><!-- cler float -->
        
        
                
		<?php		
		  if ( has_nav_menu( 'top-menu' ) )  
		  {							
			  // If there is, adds the Top Menu area. .top-menu class is created which will be our global bar
			  // THE	 '<ul id="%1$s" class="%2$s">%3$s</ul>' 	IS DEFAULT, We add external link before closing </ul>
			  
			  wp_nav_menu( array(
				  'walker' => new Child_Walker_Top_Menu(),
					'theme_location' => 'top-menu',
					'menu' => 'Top Menu',
					'container' => 'div',
					'container_class' => 'top-menu',							
					//'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s<li><a href="http://www.mungos.org/">ST MUNGO\'S</a></li></ul>'
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
			  ));	 
			  
		  }//if() 		  		
		  ?>		  
										            
    	  
          
          <div class="clearFloat"></div><!-- cler float -->


		<div id="slide-container">   
			<?php include('jcobb_slider/index2.php'); ?>
		</div>
        
        
       