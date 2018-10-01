<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use this TAG if you need to support IE 9 or IE 8: in 2015 Windows XP usage was estimated at 16.94%; more than Windows Vista (1.97%) -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <!-- Google Webmaster verification -->
        <meta name="google-site-verification" content="93WZ694pSAMgOAofBVBeJiJRUmsO0jNztA_2-6zcDi4" />
        
        <!-- 
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php //bloginfo( 'pingback_url' ); ?>"> 
        -->
        
        <!--[if lt IE 9]>
            <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
        <![endif]-->      
        
	<?php wp_head(); //USE THIE TO INSERT CSS AND JS FILES WHICH ARE IN THE THEME ROOT, THE FILES YOU ENQUE IN functions.php ?>   
        
        <!-- GOOGLE ANALYTICS -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-87317549-1', 'auto'); // tracking ID:: UA-87317549-1
            ga('send', 'pageview');

        </script>
		
    </head>

    <body <?php body_class(); ?> style="background: rgba(0, 0, 0, 0) url(<?php echo get_stylesheet_directory_uri().'/img/bg.jpg)'; ?> repeat fixed 0 0; color: #424242;">
        <a class="skip-link" href="#content" style="margin-left: -9999px; margin-top: -10px;"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>
        
        <div class="container" style="box-shadow: 0px 0px 20px 5px #888888; background-color: rgba(255, 255, 255, 0.9);  margin-bottom: 10px;">

            <div id="commonlinksbar" class="row" style="padding:0.5em; border-top:#779F2D 5px solid;">			        

                <div class="three-box">
                    <img id="logo" src="<?php echo get_stylesheet_directory_uri().'/img/logo.png'; ?>" alt="logo"/>                    
                </div>                	
                <div class="three-box hide-it" style="color:#677E52;">       
                    Email: info@alphina.co.uk
                </div>
                <div id="social-icons" class="three-box clearfix">                                 	                    
                    <ul class="list-inline social-buttons">
                        <li>
                            <a href="#"><i style="color:#677E52;" class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i style="color:#677E52;" class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i style="color:#677E52;" class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>        
                </div>

            </div><!-- row -->
            
            <!-- DISPLAY THIS ONLY ON MOBILE PHONES -->
            <div class="row" id="display-on-mb">
                <div class="col-sm-12" style="color:#677E52;">
                    <!--   Email: info@alphina.co.uk -->
                    <ul>
                        <li> <a href="http://www.alphina.co.uk/cart/"> 
                            <span id="fanos-cart" class="glyphicon glyphicon-shopping-cart"></span> CART </a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- NAVIGATION ROW -->
            <div class="row"  style="padding: 0 1em 1em 1em;">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        
                        <div class="navbar-header">                            
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my-nav" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo get_home_url(); ?>" title="to home page">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </div>
                        <!-- 
                        <div class="collapse navbar-collapse" id="my-nav">
                            <ul class="nav navbar-nav">
                                <li><a href="/index.php">HOME  <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">WHOLESALE OLIVE OIL </a></li> 
                                <li><a href="#">WHOLESALE NUTS </a></li> 
                                <li><a href="/contact.php">CONTACT US </a></li> 
                            </ul>
                        </div> 
                        -->
                                                       
                        <?php
                        if (has_nav_menu('top-menu')) {
                            wp_nav_menu(array(
                                'walker' => new Child_Walker_Top_Menu(),
                                'theme_location' => 'top-menu',
                                'menu_class' => 'nav navbar-nav', //<ul class=nav navbar-nav></ul>
                                //'menu' => 'Top Menu22'
                                'container' => 'div',
                                'container_class' => 'navbar-collapse collapse',
                                'container_id' => 'my-nav',                                
                                //'after' => ' |'
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s <li> <a href="http://www.alphina.co.uk/cart/"> <span id="fanos-cart" class="glyphicon glyphicon-shopping-cart"></span> CART </a></li></ul>'

                                //'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s <li><a href="http://www.mungos.org/">ST MUNGO\'S</a></li></ul>'
                                //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                            ));
                        }
                        ?>  
                        
                    </div>
                </nav>
            </div> 
           