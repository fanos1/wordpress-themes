<?php
/*
 * Basic width for content. This is important becuase when you embed media using eEmbed, such as YouTube videos, this value is used.
 * As of Wordpress 3.5 and later, this has changed. 
 */
if ( ! isset( $content_width ) ) {
    $content_width = 474;
}

/*
 * extend the walker_nav_menu class, so that we can add Bootstrap CSS class
 */
class Child_Walker_Top_Menu extends Walker_Nav_Menu  
{  
    //Override the parent function, we need to add Bootstrap class name to origianal class=sub-menu CLASS.    
    function start_lvl( &$output, $depth = 0, $args = array()) {        
        
        $indent = str_repeat("\t", $depth);        
        //echo "<h1>$output</h1>";        
        $output .= "\n$indent<ul class=\"dropdown-menu -".$depth."\">\n";
    }    
   
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {	  
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            //ORIGINAL:: $classes[] = 'menu-item-' . $item->ID;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            //ORIGINAL:: $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            //ORIGINAL:: $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
                        
            $bootstrap_class = '';
            $bootstrap_caret = '';
            $bootstrap_Li = '';
            
            $myArr = get_object_vars($item); //Gets the properties of the given object            
            foreach ($myArr as $key => $v) {                
                if(is_array($v)) {
                    //We are searching for the has-children PROPERTY OF $item OBJECT
                    foreach ($v as $k => $j) {                        
                        //strcasecmp($str1, $str2) :: Binary safe case-insensitive string comparison; Returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal. 
                        if(strcasecmp($j, 'menu-item-has-children') == 0) {                                                        
                            $bootstrap_class .= ' class="dropdown-toggle" data-toggle="dropdown"';                           
                            $bootstrap_caret .= ' <b class="caret"></b>';
                            $bootstrap_Li .= ' class="dropdown"';
                        }
                    }
                }
            }    

            //====== <li> =============
            //ORIGINAL:: $output .= $indent . '<li' . $id . $value . $class_names .'>';            
            //$output .= $indent . '<li' . $id . $value . $bootstrap_Li. '>';	        
            $output .= $indent . '<li'. $bootstrap_Li. '>';	        
            
            
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';        
            
            //============ <a> ================
            $item_output = $args->before;            
            //ORIGINAL::: $item_output .= '<a'. $attributes .'>';
            $item_output .= '<a'. $attributes. $bootstrap_class .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;		            
            $item_output .= $bootstrap_caret; //Added extra
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
             
}//End class



//we need the js to appear just before the closing of the body tag. 
//This can be obtained by specifying the argument true inside the wp_enqueue_script function
function theme_add_bootstrap() {
    //================ CSS STYLES =======================
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );    
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );    
    //w:p_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300', array() );
    
    
    //==================== NIVO ==========
    // use if (is_front_page() {} to include following scripts only on FRONT PAGE if you dont need them to load on other page
    wp_enqueue_style( 'default-css', get_template_directory_uri() . '/themes-nivo/default/default.css' );
    wp_enqueue_style( 'nivoslider-css', get_template_directory_uri() . '/css/nivo-slider.css' );    
    //======================= NIVO ==========
    
    
    //JAVASCRIPTS
    wp_enqueue_script( "jquery-js", get_template_directory_uri() . "/js/jquery.min.js", array() );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );    
    
    //Make sure version is there, it didnt work
    wp_enqueue_script( "jquery-nivo-slider-js", get_template_directory_uri() . "/js/jquery.nivo.slider.js", array(), '3.2', true );
    
} 
add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );



/**
 * Xanthi setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
if ( !function_exists( 'xanthi_setup' ) ) {    
    
    function xanthi_setup() {    
        /*
         * Make Twenty Fourteen available for translation.
         *
         * Translations can be added to the /languages/ directory.
         * If you're building a theme based on Twenty Fourteen, use a find and
         * replace to change 'twentyfourteen' to the name of your theme in all
         * template files.
         */
		 
         //load_theme_textdomain( 'xanthi', get_template_directory() . '/languages' );
         //FROM SAINT MONGOES:: load_theme_textdomain( 'simple-static', TEMPLATEPATH . '/lang' );

        // This theme styles the visual editor to resemble the theme style.
	// :::add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );
   
        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );
        
        
        // Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );	
        set_post_thumbnail_size( 360, 225, true );                
	
        add_image_size( 'slider-image', 970, 310, true ); //Registers a new image size. This means WordPress will create a copy of the image with the specified dimensions when a new image is uploaded        
        add_image_size( 'testimonial-image', 500, 310, true ); //Registers a new image size. This means WordPress will create a copy of the image with the specified dimensions when a new image is uploaded        
        
        //---------------------
        // MENU AREA
        //-------------------
        register_nav_menus( 
            array(
                'top-menu' => __( 'Top Menu', 'xanthi' ),                
                'my-footer-menu' => __( 'My Footer Menu', 'xanthi' )
            ) 
        );
        
	//Switch default core markup for search form, comment form, and comments to output valid HTML5.	
	//add_theme_support( 'html5', array(
	//	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	//) );
        
        
        
	//Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats
	//add_theme_support( 'post-formats', array(
	//	'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	//) );
        
        
        
	// This theme allows users to set a custom background.
	//add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
	//	'default-color' => 'f5f5f5',
	//) ) );
        
        
        // Add support for featured content.
	//add_theme_support( 'featured-content', array(
	//	'featured_content_filter' => 'twentyfourteen_get_featured_posts',
	//	'max_posts' => 6,
	//) );
        
        
        // This theme uses its own gallery styles.
	//add_filter( 'use_default_gallery_style', '__return_false' );
        
        
        //-------------------------
        // WIDGET AREAS :: We will set up this in another function below. We could set it here
        // ------------------------
        /*
        register_sidebar( array(
                'name' => __( 'Other Page Right Column', 'xanthi' ),
                'id' => 'other-page-right-column',
                'description' => __( 'The right column on other page.', 'xanthi' ),
                'before_widget' => '<div id="otherpage-right-column" >',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'	
        ) );
        */

    }
   
}
add_action( 'after_setup_theme', 'xanthi_setup' );


//=======================
//Register widget areas.
//=======================
function xanthi_widgets_init() {
    
	require get_template_directory() . '/inc/widgets.php';        
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );
        

        //-------------------------
        // WIDGET AREAS
        // ------------------------
        // Right column widget area on front page (default output on items)
        register_sidebar( array(
                'name' => __( 'Other Page Right Column', 'xanthi' ),
                'id' => 'other-page-right-column',
                'description' => __( 'The right column on other page.', 'xanthi' ),
                'before_widget' => '<div id="otherpage-right-column" >',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'	
        ) );

        /*
			register_sidebar( array(
				'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
				'id'            => 'sidebar-1',
				'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
			) );
         * 
         */
        
}
add_action( 'widgets_init', 'xanthi_widgets_init' );


// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';


//==============
//Slider
//==============
/* 
function kiss_slider() { //Register Custom Post Type	
    //$labels = array('name'=>'Post Type 4 Slider', 'menu_name'=>'Kiss Slider');	
    $args = array(
        'labels'            => array('name'=>'Kiss Post Type Slider', 'menu_name'=>'slider'),        
        'public'            => true,        
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,        
        'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )        
    );    
    register_post_type('kiss_slider', $args);
}
add_action('init', 'kiss_slider');
 * 
 */


//============================
//Testimonials :: Testimonials Custom Post Type	
//==============================
/*
function kiss_testimonials() { 
    //$labels = array('name'=>'Post Type 4 Slider', 'menu_name'=>'Kiss Slider');	
    $args = array (
        'labels'            => array('name'=>'Kiss Post Type Testimonials', 'menu_name'=>'testimonials'),        
        'public'            => true,        
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,        
        'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )        
    );
    
    register_post_type('kiss_testimonials', $args);
}
add_action('init', 'kiss_testimonials');
 * 
 */


//IF YOU HAVE MORE THAN 1 CUSTOM POST TYPE, WRAP THEM IN A FUNCTION, AND CALL THE add_action(init)
/*
 *  This function creates 2 custome post types:
 */
function irfan_create_post_types() {    
    //1st Custom Post Type
    //$labels = array('name'=>'Post Type 4 Slider', 'menu_name'=>'Kiss Slider');	
    $args = array(
        'labels'            => array('name'=>'Kiss Post Type Slider', 'menu_name'=>'slider'),        
        'public'            => true,        
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,        
        'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )        
    );    
    register_post_type('kiss_slider', $args);
        

    //2nd Custom Post Type
    //$labels = array('name'=>'Post Type 4 Slider', 'menu_name'=>'Kiss Slider');	
    $args = array (
        'labels'            => array('name'=>'Kiss Post Type Testimonials', 'menu_name'=>'testimonials'),        
        'public'            => true,        
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,        
        'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )        
    );    
    register_post_type('kiss_testimonials', $args);                
    
}
add_action( 'init', 'irfan_create_post_types' );

 

/* ============= Simpler way to Register custom post without creating PLUGIN ================
//Register Custom Post Type
register_post_type('slider_post_type', 
        array(
            'labels'            =>  array('name' => 'Slider Post Type', 'menu_name' => 'My Slider'),
            'singular_label'    => 'Slider Post Type',
            'public'            => true,
            'show_ui'           => true,
            'capability_type'   => 'post',
            'has_archive'       => TRUE,
            'hierarchical'      => false,
            'show_in_menu'      => TRUE,            
            'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )
        )         
);
 * 
 */







