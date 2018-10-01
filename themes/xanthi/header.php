<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">    
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
   	<?php 
		echo '<title>';
			 wp_title('|', true, 'right');         
			// if( wp_title(' -', false) ) { echo ''; }         
			// bloginfo('name');         
		echo '</title>';
	?>
	
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!--
     [if lt IE 9]>
        <script src="<?php //echo get_template_directory_uri();    ?>/js/html5.js"></script>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif] 
    -->        

    <?php 
    global $post;
    if( $post->post_type == 'post' && $post->ID == '7' ) { ?>       
       <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php } ?>
    
    <?php wp_head(); ?>
</head>




<body>
    
<div class="container" id="wrapper">
    
    <!-- common links bar -->
    <div class="row" style="margin-top: 1em;">
        <a class="skiplink" href="#content">
            <!-- <img src="<?php //echo bloginfo('template_directory');   ?>/img/skip_link.gif" alt="skip navigation links to go directly to content" /> -->
            <?php _e('Skip to content', 'xanthi'); ?>
        </a>                                                        
        <div class="col-md-8">
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo(); ?>">
                <?php //bloginfo('name');   ?>                                
                <img src="<?php echo get_stylesheet_directory_uri().'/images/dec_logo.png'; ?>" alt="declondon logo" />                               
            </a>
        </div>
        <div class="col-md-4">            
            <?php get_search_form(); ?>             
            <div class="clearfix"></div>
            <h3 class="text-center">02072413322</h3>
            <h3 class="text-center">07780111785</h3>                        
        </div>                
    </div><!-- row -->

    


    <!-- ============ NAVIGATION =============== -->     
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                      
            </div>
                                    
                <?php
                if (has_nav_menu('top-menu')) {

                    wp_nav_menu(array(
                        'walker' => new Child_Walker_Top_Menu(),
                        'theme_location' => 'top-menu',
                        'menu_class' => 'nav navbar-nav', //<ul class=nav navbar-nav></ul>
                        //'menu' => 'Top Menu22'
                        'container' => 'div',
                        'container_class' => 'navbar-collapse collapse',
                        'after' => ' |'
                        
                        //'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s<li><a href="http://www.mungos.org/">ST MUNGO\'S</a></li></ul>'
                        //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                    ));
                }
                ?>  
        </div>        
    </nav>  
        
    
    
    
    
    
    
    <?php //Enable breadcrubs, works with YOAST PLUGIN
        /*
        if ( function_exists('yoast_breadcrumb') ) {
            echo '
            <div class="row">
                <div class="col-md-12">'.
                yoast_breadcrumb('<p id="breadcrumbs">','</p>') .'</div>
            </div>
            ';          
        } 
         * 
         */
        
        if ( function_exists('yoast_breadcrumb') ) {           
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');           
        } 
    ?>



