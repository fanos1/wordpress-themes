<?php 


// echo __DIR__;
// echo '<h3>'. dirname(__FILE__) .'</h3>';
// exit();

?>


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
				<i class="fa fa-search" aria-hidden="true"></i> 
				<input aria-label="Search"  placeholder="Search" type="search"/>
			</div>
			<div class="col-4">
				<img src="images/logo-medium.jpg" alt="" aria-label="Logo" />
			</div>
			<div class="col-4">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
				<a href="#" title="">Cart</a>
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
				<span style="float: right;"> 
					<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
				</span>
			</div>    
		</div>
		
		<!-- ======= NAVIGATION ========== -->
		<div class="container" style="overflow:visible;">        
			<div class="col-12">            
				<nav>                    
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
				</nav>	            
			</div> 		
		</div>
		
		
		<!-- SLIDER -->
		<style type="text/css">
			img {vertical-align: middle;}

			.slideshow-container {
			  max-width: 1170px;
			  position: relative;
			  margin: auto;
			}

			/* Hide the images by default */
			.mySlides {
				display: none;
				/* None of images are displayed. When page loads first time, javascript changes 1st image to "display: block" */
			}
			
			.prev, .next {
			  cursor: pointer;
			  position: absolute;
			  top: 50%;
			  width: auto;
			  margin-top: -22px;
			  padding: 16px;
			  color: white;
			  font-weight: bold;
			  font-size: 18px;
			  transition: 0.6s ease;
			  border-radius: 0 3px 3px 0;
			}
		
			/* Position the "next button" to the right */
			.next {
			  right: 0;
			  border-radius: 3px 0 0 3px;
			}
			
			/* On hover, add a black background color with a little bit see-through */
			.prev:hover, .next:hover {
			  background-color: rgba(0,0,0,0.8);
			}
			
			/* Caption text */
			.text {
			  color: #f2f2f2;
			  font-size: 15px;
			  padding: 8px 12px;
			  position: absolute;
			  bottom: 8px;
			  width: 100%;
			  text-align: center;
			}
			
			/* Number text (1/3 etc) */
			.numbertext {
			  color: #f2f2f2;
			  font-size: 12px;
			  padding: 8px 12px;
			  position: absolute;
			  top: 0;
			}
			
			/* The dots/bullets/indicators */
			.dot {
			  cursor: pointer;
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.active, .dot:hover {
			  background-color: #717171;
			}
			
			/* Fading animation */
			.fade {
			  -webkit-animation-name: fade;
			  -webkit-animation-duration: 1.5s;
			  animation-name: fade;
			  animation-duration: 1.5s;
			}

			@-webkit-keyframes fade {
			  from {opacity: .4}
			  to {opacity: 1}
			}

			@keyframes fade {
			  from {opacity: .4}
			  to {opacity: 1}
			}
		</style>
		<!-- SLIDER -->
		<div class="container">		
			<div class="col-12">
				<div class="slideshow-container" id="irfan">

					<div class="mySlides fade">
					  <div class="numbertext">1 / 3</div>					  
					  <!-- <img src="images/banner1.jpg" class="img-responsive" alt="" /> -->
					  <img src="<?php echo get_template_directory_uri(); ?>/img/banner1.jpg" class="img-responsive" alt="" />					  
					  <div class="text">Caption Text</div>
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">2 / 3</div>					  
					  <img src="<?php echo get_template_directory_uri(); ?>/img/banner2.jpg" class="img-responsive" alt="" />
					  <div class="text">Caption Two</div>
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">3 / 3</div>
					  <img src="<?php echo get_template_directory_uri(); ?>/img/banner3.jpg" class="img-responsive" alt="" />
					  <div class="text">Caption Three</div>
					</div>

					<a class="prev" onclick="prevAndNext(-1)">&#10094;</a>
					<a class="next" onclick="prevAndNext(1)">&#10095;</a>

				</div>
			
				<br>

				<div style="text-align:center">
				  <span class="dot" onclick="currentSlide(1)"></span> 
				  <span class="dot" onclick="currentSlide(2)"></span> 
				  <span class="dot" onclick="currentSlide(3)"></span> 
				</div>
			</div>
		</div>
		
		
		<!-- featured -->
		<style type="text/css">
			#featured {
				text-align: center;
			}
			#featured .row:first-child {
				margin-top: 10px;
			}
		</style>
		<div class="container" id="featured">     
			 <div class="row">
				<div class="col-12">
					<h2>Featured</h2>
				</div>
			</div>
			
			<div class="row">
				<div class="col-4">
					<img src="<?php echo get_template_directory_uri(); ?>/img/categ-pic1.jpg" alt="image" class="img-responsive">
					<p class="item-title">Product Title Here</p>
					<div class="btn btn-custom">SHOP NOW</div>
				</div>
				<div class="col-4">
				  <img src="<?php echo get_template_directory_uri(); ?>/img/categ-pic2.jpg" alt="image"class="img-responsive">
					<p class="item-title">Product Title Here</p>
					<div class="btn btn-custom">SHOP NOW</div>
				</div>
				<div class="col-4">
					<img src="<?php echo get_template_directory_uri(); ?>/img/categ-pic3.jpg" alt="image"class="img-responsive">
					<p class="item-title">Product Title Here</p>
					<div class="btn btn-custom">SHOP NOW</div>
				</div>
			</div>
		</div>
   
	
		
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
			
