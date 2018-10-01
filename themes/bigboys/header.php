<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>    
			<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" /> 

		<?php wp_head(); ?>
        
		<script>
        
        /* ---------------
        conditionizr.com  
        ----------------
        TUTORIAL:  https://toddmotto.com/meet-conditionizr-the-conditional-free-legacy-retina-script-and-style-loader/
        
        Conditionizr has an integrated script and style loading facility, allowing you to specify which scripts and styles you’d like to load for which browser. For example, a user browsing with IE7 would first receive an ‘ie7′ HTML class, then receive the ie7.js and ie7.css files that Conditionizr automatically serves
        */
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {} // Put your scripts and tests here for legacy browsers
        });
        </script>

	</head>
    
    
	<body <?php body_class(); ?>>
        
  

		<style type="text/css">
			/* ========== header ============= */
			.align-right {
				text-align: right;
			}
			#header {
				margin-top: 30px;
			}
			#header {
				text-align: center;
			}
			#header .col-4:first-child { 
				display: none;
			}        
			#header .col-4:nth-child(n+3) { 
				display: none; /* Default is not to display on mobile this SHOPPING CART, We display later on Desktop with Media */
			}
			#header a {
				text-decoration: none;
				color: #000;
				padding-left: 5px;
			}
			.fa-search, 
			.fa-shopping-cart {
				cursor: pointer;
			}
		</style>   		
		<div class="container" id="header">	
			<div class="col-4">
                    <!-- 
				<i class="fa fa-search" aria-hidden="true"></i> 
				<input aria-label="Search"  placeholder="Search" type="search"/>
                    -->
                <?php 	get_product_search_form(); 	?>  
			</div>
			<div class="col-4">
				<!-- <img src="<?php // echo get_bloginfo('stylesheet_directory'); ?>/img/logo-medium.jpg" alt="" aria-label="Logo" />  -->
                <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
                <!-- <img src="<?php // echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img"> -->
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-medium.jpg" alt="Logo" /> 
			</div>
			<div class="col-4">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
				<a href="https://www.bigboybrandzzonline.com/cart/" title="to shopping cart">Cart</a>
			</div>
		</div>
		
		
		
		<style type="text/css">
			#mb-menu-icon {
				margin-top: 20px; 
				border-top: 1px #ccc solid; 
				border-bottom: 1px #ccc solid; 
				padding: 10px; 
			}
		</style>
		<div class="container" id="mb-menu-icon"> 
		<!-- Hide this on Desktops :: container holding mobile NAV icon -->
			<div class="col-12">
				<a href="javascript:void(0);" class="icon">
					<i class="fa fa-bars" aria-label="Menu Icon" style="font-size:24px; color: #040404;"></i> 
				</a>
				
                <!-- <span style="float: right;">  </span> -->
                
                <a href="https://www.bigboybrandzzonline.com/cart/"  style="float: right;">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                </a>					
			</div>    
		</div>
		
        
        
		<!-- ======= NAVIGATION ========== -->
		<div class="container" style="overflow:visible;">        
			<div class="col-12">            
				<nav>        
                    <!-- 
					<ul id="myTopnav" class="clearfix">
						<li class="dropdown"><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> HOME</a></li>									
						<li class="dropdown"><a href="shop.html" class="dropbtn">PRODUCTS <i class="fa fa-sort-down"></i> </a>
							<ul class="child-ul">
								<li class="dropdown"><a href="#">Rape Seed Oil</a></li>
								<li class="dropdown"><a href="#">Safflower Seeds</a></li>
							</ul>
						</li>					
						<li class="dropdown"><a href="shop.html" title=""> HOODIES</a></li>
						<li class="dropdown"><a href="contact-us.html" title=""> CONTACT</a></li>
					</ul> 
                    -->
                    
					<?php
					/*  
					wp_nav_menu( array(
						'theme_location' => 'top-menu',				
						'menu_id'        => 'myTopnav',
						'menu_class'        => 'clearfix',

					));
					*/
					if (has_nav_menu('top-menu')) {
						
						wp_nav_menu(array(
							'walker' => new Child_Walker_Top_Menu(),
							'theme_location' => 'top-menu',
							'menu_id'        => 'myTopnav',
							'menu_class'        => 'clearfix'
							/* 
							 'menu' => 'Top Menu22'
							 'container' => 'ul',
							 'container_class' => 'irfan',
							 'container_id' => 'kissa',                                 
							 'before' => ' |'
							 'after' => ' |'
							 'link_before' => ' |'
							 'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s </ul>'
							 'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s <li> <a href="http://www.alphina.co.uk/cart/"> <span id="fanos-cart" class="glyphicon glyphicon-shopping-cart"></span> CART </a></li></ul>'

							 'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s <li><a href="http://www.mungos.org/">ST MUNGO\'S</a></li></ul>'
							 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
							*/
						));
					} 
					?>
                    
				</nav>	            
			</div> 		
		</div>
		
		
       
		<!-- SLIDER -->
		
        
		
		
        
		<!-- featured -->
	
   
	
        
		
		<!-- ========= HTML5 CONTENT ============ -->

			<!-- header 
			<header class="header clear" role="banner">
			-->
					<!-- 
					<div class="logo">
						<a href="<?php // echo home_url(); ?>">
					-->
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<!-- <img src="<?php // echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img"> -->
                            <!-- <img src="<?php // echo get_template_directory_uri(); ?>/img/logo1.png" alt="Logo" /> -->
					<!-- 	
						</a>
					</div>
					-->

					<!-- nav 
					<nav class="nav" role="navigation">
						<?php // html5blank_nav(); ?>
					</nav> 
					-->
			

			<!-- </header> -->
			
