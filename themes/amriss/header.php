<?php  
   //  exit("under construction");
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head();  ?>
</head>


<?php $bgUrl = get_stylesheet_directory_uri(). '/assets/images/bg.jpg' ; ?>	

<body <?php body_class(); ?> style="background: rgba(0, 0, 0, 0) url(<?php echo $bgUrl; ?>) repeat fixed 0 0;">

	<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" 
		xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<defs>
			<symbol id="icon-home" viewBox="0 0 32 32">
			<title>home</title>
			<path d="M32 18.451l-16-12.42-16 12.42v-5.064l16-12.42 16 12.42zM28 18v12h-8v-8h-8v8h-8v-12l12-9z"></path>
			</symbol>
			<symbol id="icon-cart" viewBox="0 0 32 32">
			<title>cart</title>
			<path d="M12 29c0 1.657-1.343 3-3 3s-3-1.343-3-3c0-1.657 1.343-3 3-3s3 1.343 3 3z"></path>
			<path d="M32 29c0 1.657-1.343 3-3 3s-3-1.343-3-3c0-1.657 1.343-3 3-3s3 1.343 3 3z"></path>
			<path d="M32 16v-12h-24c0-1.105-0.895-2-2-2h-6v2h4l1.502 12.877c-0.915 0.733-1.502 1.859-1.502 3.123 0 2.209 1.791 4 4 4h24v-2h-24c-1.105 0-2-0.895-2-2 0-0.007 0-0.014 0-0.020l26-3.98z"></path>
			</symbol>
			<symbol id="icon-phone" viewBox="0 0 32 32">
			<title>phone</title>
			<path d="M22 20c-2 2-2 4-4 4s-4-2-6-4-4-4-4-6 2-2 4-4-4-8-6-8-6 6-6 6c0 4 4.109 12.109 8 16s12 8 16 8c0 0 6-4 6-6s-6-8-8-6z"></path>
			</symbol>
			<symbol id="icon-unlocked" viewBox="0 0 32 32">
			<title>unlocked</title>
			<path d="M24 2c3.308 0 6 2.692 6 6v6h-4v-6c0-1.103-0.897-2-2-2h-4c-1.103 0-2 0.897-2 2v6h0.5c0.825 0 1.5 0.675 1.5 1.5v15c0 0.825-0.675 1.5-1.5 1.5h-17c-0.825 0-1.5-0.675-1.5-1.5v-15c0-0.825 0.675-1.5 1.5-1.5h12.5v-6c0-3.308 2.692-6 6-6h4z"></path>
			</symbol>
			<symbol id="icon-truck" viewBox="0 0 32 32">
			<title>truck</title>
			<path d="M32 18l-4-8h-6v-4c0-1.1-0.9-2-2-2h-18c-1.1 0-2 0.9-2 2v16l2 2h2.536c-0.341 0.588-0.536 1.271-0.536 2 0 2.209 1.791 4 4 4s4-1.791 4-4c0-0.729-0.196-1.412-0.536-2h11.073c-0.341 0.588-0.537 1.271-0.537 2 0 2.209 1.791 4 4 4s4-1.791 4-4c0-0.729-0.196-1.412-0.537-2h2.537v-6zM22 18v-6h4.146l3 6h-7.146z"></path>
			</symbol>
			<symbol id="icon-heart" viewBox="0 0 32 32">
			<title>heart</title>
			<path d="M23.6 2c-3.363 0-6.258 2.736-7.599 5.594-1.342-2.858-4.237-5.594-7.601-5.594-4.637 0-8.4 3.764-8.4 8.401 0 9.433 9.516 11.906 16.001 21.232 6.13-9.268 15.999-12.1 15.999-21.232 0-4.637-3.763-8.401-8.4-8.401z"></path>
			</symbol>
			<symbol id="icon-wink" viewBox="0 0 32 32">
			<title>wink</title>
			<path d="M16 32c8.837 0 16-7.163 16-16s-7.163-16-16-16-16 7.163-16 16 7.163 16 16 16zM16 3c7.18 0 13 5.82 13 13s-5.82 13-13 13-13-5.82-13-13 5.82-13 13-13zM16.961 22.22c4.383-0.866 7.785-2.861 9.014-5.519-0.677 5.249-5.047 9.299-10.339 9.299-3.726 0-6.996-2.009-8.84-5.030 2.2 1.721 6.079 2.056 10.165 1.249zM20 11c0-1.657 0.895-3 2-3s2 1.343 2 3c0 1.657-0.895 3-2 3s-2-1.343-2-3zM11 11.609c-1.306 0-2.417 0.489-2.829 1.172-0.111-0.183-0.171-1.005-0.171-1.211 0-0.971 1.343-1.758 3-1.758s3 0.787 3 1.758c0 0.206-0.061 1.028-0.171 1.211-0.412-0.683-1.522-1.172-2.829-1.172z"></path>
			</symbol>
			<symbol id="icon-checkmark" viewBox="0 0 32 32">
			<title>checkmark</title>
			<path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
			</symbol>
			<symbol id="icon-loop" viewBox="0 0 32 32">
			<title>loop</title>
			<path d="M4 10h20v6l8-8-8-8v6h-24v12h4zM28 22h-20v-6l-8 8 8 8v-6h24v-12h-4z"></path>
			</symbol>
			<symbol id="icon-facebook" viewBox="0 0 32 32">
			<title>facebook</title>
			<path d="M19 6h5v-6h-5c-3.86 0-7 3.14-7 7v3h-4v6h4v16h6v-16h5l1-6h-6v-3c0-0.542 0.458-1 1-1z"></path>
			</symbol>
			<symbol id="icon-coin-pound" viewBox="0 0 32 32">
			<title>coin-pound</title>
			<path d="M15 2c-8.284 0-15 6.716-15 15s6.716 15 15 15c8.284 0 15-6.716 15-15s-6.716-15-15-15zM15 29c-6.627 0-12-5.373-12-12s5.373-12 12-12c6.627 0 12 5.373 12 12s-5.373 12-12 12z"></path>
			<path d="M19 22h-7v-4h3c0.552 0 1-0.448 1-1s-0.448-1-1-1h-3v-1c0-1.654 1.346-3 3-3 1.068 0 2.064 0.575 2.599 1.501 0.277 0.478 0.888 0.641 1.366 0.365s0.641-0.888 0.365-1.366c-0.892-1.542-2.551-2.499-4.331-2.499-2.757 0-5 2.243-5 5v1h-1c-0.552 0-1 0.448-1 1s0.448 1 1 1h1v6h9c0.552 0 1-0.448 1-1s-0.448-1-1-1z"></path>
			</symbol>
			<symbol id="icon-credit-card" viewBox="0 0 32 32">
			<title>credit-card</title>
			<path d="M29 4h-26c-1.65 0-3 1.35-3 3v18c0 1.65 1.35 3 3 3h26c1.65 0 3-1.35 3-3v-18c0-1.65-1.35-3-3-3zM3 6h26c0.542 0 1 0.458 1 1v3h-28v-3c0-0.542 0.458-1 1-1zM29 26h-26c-0.542 0-1-0.458-1-1v-9h28v9c0 0.542-0.458 1-1 1zM4 20h2v4h-2zM8 20h2v4h-2zM12 20h2v4h-2z"></path>
			</symbol>
			<symbol id="icon-lock" viewBox="0 0 32 32">
			<title>lock</title>
			<path d="M18.5 14h-0.5v-6c0-3.308-2.692-6-6-6h-4c-3.308 0-6 2.692-6 6v6h-0.5c-0.825 0-1.5 0.675-1.5 1.5v15c0 0.825 0.675 1.5 1.5 1.5h17c0.825 0 1.5-0.675 1.5-1.5v-15c0-0.825-0.675-1.5-1.5-1.5zM6 8c0-1.103 0.897-2 2-2h4c1.103 0 2 0.897 2 2v6h-8v-6z"></path>
			</symbol>
		</defs>
	</svg>

	
<a class="skip-link" href="#content" style="margin-left: -9999px; margin-top: -100px;"><?php _e( 'Skip to content', 'amriss' ); ?></a>
	
<div id="page" class="site" style="
	width: 100%; 
	max-width: 1260px; 
	margin-left: auto; 
	margin-right: auto; 
	background-color: #fff; padding: 10px;">
        
	<?php  //	get_product_search_form(); 	?>    

   <div class="container hide-on-mb" style="padding-bottom: 0px;">
        <div class="col-6">           
            <?php
            	// display custome logo if admin set one 
            	the_custom_logo();

            	// if admin did not set custom logo via CUSTOMIZER
            	if (!has_custom_logo() ) { ?>				
            		<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amris_logo.png" title="logo" width="160" height="127" />
            	<?php } ?>
        </div>
        <div class="col-6 pull-right" style="font-size: 18px;">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/telephone-icon.png"  width="20" height="20"> 
			<span style="font-size: 20px;">+44 0208 471 5592 </span> <br> <br>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-icon.png" />
			<span style="font-size: 20px;"> +44 07938 552 400 </span> 
        </div>
    </div>
	
	<div class="container show-on-mb clearfix">        
        <div class="col-6">      
        	<?php 
        		// display custome logo if admin set one 
            	the_custom_logo(); //returns empt string if no logo, no need to check with if()

            	if(!has_custom_logo() ) { ?>
            		<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amris_logo.png" title="logo" width="100" height="73" />
            	<?php } ?>
        </div>
        <div class="col-6">
			<a href="javascript:void(0);" class="icon" style="text-decoration: none; font-size: 20px; color: #056839;"> &#9776; </a>			
        </div>		
    </div>

	
	<div id="home-shop-cart" class="container show-on-mb"> 
		<div class="col-2"> 
			<a href="<?php echo home_url(); ?>" title="to home page">  
				<svg class="icon icon-home" style="color: #056839;"><use xlink:href="#icon-home"></use></svg> 
			</a>
		</div>
		<div class="col-8 centreit">
			<!-- <img src="<?php // echo get_stylesheet_directory_uri(); ?>/assets/images/telephone-icon.png" width="10" height="10"> -->
			<a href="tel:+4402084715592" style="font-size: 14px; text-decoration: none; color:#056839;">0208 471 5592 </a>	
		</div>
		<div class="col-2"> 
			<a href="http://www.amrisseedsoil.co.uk/cart/">
				<svg class="icon icon-cart" style="text-align: right;"><use xlink:href="#icon-cart"></use></svg> 
			</a>
		</div>
	</div>
	
	
	<!-- NAVIGATION ROW -->		
	<div class="container" id="navigation" style="border-bottom: 1px solid #eee;  padding-bottom: 0px; margin-bottom: 20px;">                
		<!-- 
        <div class="col-3">   
            <form id="" method="post" action="">
                <div class="form-input">                    
                     <input type="submit" value="Submit"> 
                </div>
            </form>            
        </div> 
		-->
        <nav class="col-9">    
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
					'menu_class'        => 'clearfix',					
					//'menu' => 'Top Menu22'
					'container' => 'ul',
					'container_class' => 'irfan',
					'container_id' => 'kissa',                                
					//'after' => ' |'
					// 'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s </ul>'
					// 'items_wrap'  => '<ul id="%1$s" class="%2$s">%3$s <li> <a href="http://www.alphina.co.uk/cart/"> <span id="fanos-cart" class="glyphicon glyphicon-shopping-cart"></span> CART </a></li></ul>'

					//'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s <li><a href="http://www.mungos.org/">ST MUNGO\'S</a></li></ul>'
					//'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
				));
			} 
			?>  				
        </nav>
        
        <div class="col-3 pull-right" style="margin-top: 10px;">
             <a  class="shopping-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">                    
					<!-- <svg class="icon icon-cart" style="font-size: 12px; font-style: italic;"><use xlink:href="#icon-cart"></use></svg>    -->
					CART
                    <?php // echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); echo ' - ';  echo WC()->cart->get_cart_total(); ?>
					<?php  echo '('. WC()->cart->get_cart_total() .')'; ?>
                </a>
        </div>		
    </div>
	
	
    
    
    